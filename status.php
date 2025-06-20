<?php 
 require_once 'config/index.php';
 require_once 'classes/class-jsonfetcher.php';

 $status = [];
 foreach($server_urls as $server_url):
    $url = $server_url .'/server.php';
    $fetcher = new JsonFetcher($url, 'GET', ['action' => 'server-status']);
    $result = $fetcher->fetch();
    if (array_key_exists('success', $result) && $result['success'] == true) {
        $status[$server_url] = $result['data']['status'];
    }else{
        $status[$server_url] = 'offline';
    }
    
 endforeach;   
?>

<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Server Status Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .status-dot {
      height: 12px;
      width: 12px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 5px;
    }
    .online { background-color: #28a745; }
    .offline { background-color: #dc3545; }
  </style>
</head>
<body class="bg-light p-4">
  <div class="container">
    <h3 class="mb-4">Web Server Status</h3>
    <ul class="list-group">
      <?php foreach ($status as $name => $s): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <?= htmlspecialchars($name) ?>
          <span class="badge bg-light text-dark">
            <span class="status-dot <?= $s ?>"></span>
        

            <?= $s == 'online' ? 'Online' : 'Offline' ?> |
Hits: <?php
  $counts = file_exists('proxy-count.json') ? json_decode(file_get_contents('proxy-count.json'), true) : [];
  echo isset($counts[$name]) ? $counts[$name] : 0;
?>
          </span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
