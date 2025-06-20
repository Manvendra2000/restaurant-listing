<?php
session_start();

class CartManager
{
    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function updateCart(array $incomingCart): array
    {
        $existingCart = $_SESSION['cart'];
        $existingRestaurantId = $existingCart[0]['restaurantId'] ?? null;
        $incomingRestaurantId = $incomingCart[0]['restaurantId'] ?? null;

        if ($existingRestaurantId !== null && $incomingRestaurantId !== null && $existingRestaurantId !== $incomingRestaurantId) {
            $this->clearCart();
        }

        $_SESSION['cart'] = $incomingCart;
        $this->calculateItemPrices();

        return [
            'success' => true,
            'message' => 'Cart updated successfully!',
            'data' => $_SESSION['cart']
        ];
    }

    public function clearCart(): void
    {
        $_SESSION['cart'] = [];
        $_SESSION['cart-subtotal'] = 0;
        $_SESSION['cart-tax'] = 0;
        $_SESSION['cart-total'] = 0;
    }

    public function getCart(): array 
    {
        return $_SESSION['cart'] ?? [];
    }

    public function calculateItemPrices(): void
    {
        $cart = $this->getCart();
        $subtotal = 0;

        foreach ($cart as $i => $item) {
            $price = $this->calculateCartItemPrice(
                $item['selectedItem'] ?? [],
                $item['variants'] ?? [],
                $item['addons'] ?? [],
                $item['quantity'] ?? 1
            );

            $cart[$i]['cost'] = $price;
            $subtotal += $price;
        }

        $_SESSION['cart'] = $cart;
        $_SESSION['cart-subtotal'] = $subtotal;

        if ($subtotal < 99) {
            $total = $subtotal;
        } elseif ($subtotal <= 500) {
            $total = 99;
        } else {
            $total = 99 + ($subtotal - 500);
        }
    
        $_SESSION['cart-tax'] = round(0, 2);
        $_SESSION['cart-total'] = round($total, 2);
    }

    public function getCheckoutTotals(): array
    {
        return [
            'subtotal' => round((float) ($_SESSION['cart-subtotal'] ?? 0), 2),
            'tax' => round((float) ($_SESSION['cart-tax'] ?? 0), 2),
            'total' => round((float) ($_SESSION['cart-total'] ?? 0), 2)
        ];
    }

    public function generatePrice($price) {
        return $price/100;
    }

    public function generateDiscountedPrice($price) {
        $discount = 20;
        $discountedPrice = $price - ($price * $discount / 100);
        return ceil(round($discountedPrice, 2));
    }

    public function calculateCartItemPrice(array $product, array $selectedVariants, array $selectedAddons, int $quantity): float
    {
        $basePrice = $product['finalPrice'] ?? $product['price'] ?? $product['defaultPrice'] ?? 0;
        $variantsCost= [];
        // STEP 1: Handle variant pricing (if applicable)
        if (!empty($product['variantsV2']['pricingModels'])) {
            foreach ($product['variantsV2']['pricingModels'] as $model) {
                $matched = true;
                foreach ($model['variations'] as $variant) {
                    $groupId = $variant['groupId'];
                    $variantId =  $variant['variationId'];
                    if (!isset($selectedVariants[$groupId])  || $selectedVariants[$groupId] != $variantId) {
                        $matched = false;
                        break;
                    }
                }
               
                if ($matched) {
                    $variantsCost[] = isset($model['finalPrice']) && isset($model['finalPrice']['units']) ? $model['finalPrice']['units'].'00': (isset($model['price']) ? $model['price'] : $basePrice);
                    break;
                }
            }
        }
        
        $basePrice = count($variantsCost) > 0  ? max($variantsCost) : $basePrice;
        $basePrice = $this->generateDiscountedPrice($this->generatePrice($basePrice));
        // STEP 2: Calculate addon cost
        $addonTotal = 0;
        if (!empty($product['addons']) && is_array($selectedAddons)) {
            foreach ($selectedAddons as $addon) {
                foreach ($product['addons'] as $addonGroup) {
                    if ($addonGroup['groupId'] == $addon['groupId']) {
                        foreach ($addonGroup['choices'] as $choice) {
                            if (
                                $choice['id'] == $addon['variantId'] &&
                                !empty($choice['isEnabled']) &&
                                !empty($choice['inStock'])
                            ) {
                                $addonTotal += $choice['price'];
                            }
                        }
                    }
                }
            }
        }

        // STEP 3: Total = (base + addons) * quantity
        $totalPrice = ($basePrice + $this->generatePrice($addonTotal)) * $quantity;

        return round($totalPrice, 2);
    }
}

///////////////////////////
// Request Handling Logic
///////////////////////////

$data = json_decode(file_get_contents('php://input'), true);

$cartManager = new CartManager();
$response = ['success' => false, 'message' => 'Invalid request', 'data' => null];

if (isset($data['action'])) {
    switch ($data['action']) {
        case 'clear':
            $cartManager->clearCart();
            $response = [
                'success' => true,
                'message' => 'Cart cleared successfully!',
                'data' => []
            ];
            break;

        case 'checkout-totals':
            $response = [
                'success' => true,
                'message' => 'Checkout totals retrieved',
                'data' => $cartManager->getCheckoutTotals()
            ];
            break;

        default:
            $response = [
                'success' => false,
                'message' => 'Unknown action'
            ];
            break;
    }
} elseif (isset($data['cart']) && is_array($data['cart'])) {
    $response = $cartManager->updateCart($data['cart']);
}

header('Content-Type: application/json');
echo json_encode($response);
