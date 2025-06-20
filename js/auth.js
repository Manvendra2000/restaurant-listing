

$(document).ready(function () {
    $('#signIn').on('click', function (e) {
        e.preventDefault(); // Prevent form submission
        showLoader(); // Show a loader (if you have one)

        const formData = {
            action: 'signin',
            email: $('#signin-email').val(),
            password: $('#signin-password').val()
        };

        $.ajax({
            url: baseUrl + '/auth-handler.php', // The endpoint to send the data
            method: 'POST', // POST method
            contentType: 'application/json', // Sending JSON data
            data: JSON.stringify(formData), // Stringify the form data
            success: function (response) {
                const res = JSON.parse(response); // Parse the JSON response
                //showCartAlert(res.message, 'success', 'signinMessage'); // Show the response message
                let location = baseUrl

                if (res?.user && res?.user.role == 'ADMIN') {
                    location += '/admin'
                }

                if (res.success) {
                    window.location.href = location
                }

                if (!res.success) {
                    let message = 'Something went wrong.';
                    if (res.message) {

                        message = res.message || message;

                    }

                    showCartAlert(message, 'danger', 'signupMessage'); // Display error message
                }

            },
            error: function (response) {
                let message = 'Something went wrong.';
                if (response.responseText) {
                    try {
                        const res = JSON.parse(response.responseText);
                        message = res.message || message;
                    } catch (e) {
                        // Handle case where response is not valid JSON
                    }
                }
                showCartAlert(message, 'danger', 'signupMessage'); // Display error message
            },
            complete: function () {
                showLoader(false); // Hide the loader after request is complete
            }
        });
    });
    // $('#signupForm').on('click', function (e) {
    //     e.preventDefault();

    //     const firstname = $('#firstname').val().trim();
    //     const lastname = $('#lastname').val().trim();
    //     const email = $('#email').val().trim();
    //     // const countryCode = $('#countryCode').val().trim();
    //     // const phone = $('#phone').val().trim();
    //     const password = $('#password').val().trim();

    //     // Email Regex
    //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    //     if (!emailRegex.test(email)) {
    //         showCartAlert('Please enter a valid email address.', 'danger', 'signupMessage')
    //         return;
    //     }

    //     // Phone validation: 10 digits only
    //     const phoneRegex = /^\d{10}$/;
    //     // if (!phoneRegex.test(phone)) {
    //     //     showCartAlert('Phone number must be exactly 10 digits.', 'danger', 'signupMessage')
    //     //     return;
    //     // }

    //     // Optionally validate required fields
    //     if (!firstname || !email || !password) {
    //         showCartAlert('Please fill in all required fields.', 'danger', 'signupMessage')
    //         return;
    //     }

    //     showLoader();

    //     const formData = {
    //         action: 'signup',
    //         firstname,
    //         lastname,
    //         email,
    //         countryCode: null,
    //         phone: null,
    //         password
    //     };

    //     $.ajax({
    //         url: baseUrl + '/auth-handler.php',
    //         method: 'POST',
    //         contentType: 'application/json',
    //         data: JSON.stringify(formData),
    //         success: function (response) {
    //             const res = JSON.parse(response);
    //             if (res.success) {
    //                 showCartAlert(res.message, 'success', 'signupMessage');
    //                 // window.location.href = 'dashboard.html';
    //             }
    //         },
    //         error: function (response) {
    //             let message = 'Something went wrong.';
    //             if (response.responseText) {
    //                 try {
    //                     const res = JSON.parse(response.responseText);
    //                     message = res.message || message;
    //                 } catch (e) {
    //                     // response is not valid JSON
    //                 }
    //             }
    //             showCartAlert(message, 'danger', 'signupMessage');
    //         },
    //         complete: function () {
    //             showLoader(false);
    //         }
    //     });
    // });

	//	Signup ✅ → then Signin ✅ → then Redirect ✅
	//	Uses same email/password from the signup.
    
    $('#signupForm').on('click', function (e) {
        e.preventDefault();
    
        const firstname = $('#firstname').val().trim();
        const lastname = $('#lastname').val().trim();
        const email = $('#email').val().trim();
        const password = $('#password').val().trim();
    
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showCartAlert('Please enter a valid email address.', 'danger', 'signupMessage')
            return;
        }
    
        if (!firstname || !email || !password) {
            showCartAlert('Please fill in all required fields.', 'danger', 'signupMessage')
            return;
        }
    
        showLoader();
    
        const formData = {
            action: 'signup',
            firstname,
            lastname,
            email,
            countryCode: null,
            phone: null,
            password
        };
    
        $.ajax({
            url: baseUrl + '/auth-handler.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response) {
                const res = JSON.parse(response);
                if (res.success) {
                    // ✅ Automatically Sign In After Successful Signup
                    $.ajax({
                        url: baseUrl + '/auth-handler.php',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            action: 'signin',
                            email: email,
                            password: password
                        }),
                        success: function (signinRes) {
                            const loginData = JSON.parse(signinRes);
                            let location = baseUrl;
    
                            if (loginData?.user?.role === 'ADMIN') {
                                location += '/admin';
                            }
    
                            if (loginData.success) {
                                window.location.href = location; // Redirect after login
                            }
                        }
                    });
                } else {
                    showCartAlert(res.message, 'danger', 'signupMessage');
                }
            },
            error: function (response) {
                let message = 'Something went wrong.';
                if (response.responseText) {
                    try {
                        const res = JSON.parse(response.responseText);
                        message = res.message || message;
                    } catch (e) {}
                }
                showCartAlert(message, 'danger', 'signupMessage');
            },
            complete: function () {
                showLoader(false);
            }
        });
    });

    $('#logout').on('click', function (e) {
        e.preventDefault();  // Prevent the default form submission or link behavior

        $.ajax({
            url: `${baseUrl}/auth-handler.php`, // Your logout endpoint
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ action: 'logout' }), // Send a request to the server to log out
            success: function (response) {
                const res = JSON.parse(response);
                if (res.success) {
                    // Optional: Redirect user after logout
                    window.location.href = baseUrl // Redirect to login page or home
                } else {
                    // Show error message if logout fails
                    alert(res.message || 'Logout failed');
                }
            },
            error: function (err) {
                console.log(err)
                alert('An error occurred while logging out.');
            }
        });
    });


    // checkIn signin and signup

    $('#checkin-signin').on('click', function (e) {
        e.preventDefault(); // Prevent form submission
        showLoader(); // Show a loader (if you have one)

        const formData = {
            action: 'signin',
            email: $('#checkin-signin-email').val(),
            password: $('#checkin-signin-password').val()
        };

        $.ajax({
            url: baseUrl + '/auth-handler.php', // The endpoint to send the data
            method: 'POST', // POST method
            contentType: 'application/json', // Sending JSON data
            data: JSON.stringify(formData), // Stringify the form data
            success: function (response) {
                const res = JSON.parse(response); // Parse the JSON response
                //showCartAlert(res.message, 'success', 'signinMessage'); // Show the response message
                console.log(res)
                if (res?.user) {
                    const addClass = ['checkin-sign', 'checkin-signin-notice', 'checkin-signin-credits'];
                    const removeClass = ['checkin-lgout', 'checkin-signed-notice', 'checkin-signed-credits'];
                    for (const className of removeClass) {
                        $(`.${className}`).removeClass('d-none')
                    }
                    for (const className of addClass) {
                        $(`.${className}`).addClass('d-none')
                    }
                    $('#checkin-name').val(res?.user?.firstname + ' ' + res?.user?.lastname)
                    $('#checkin-email').val(res?.user?.email)
                }

                // if (res.success) {
                //     window.location.href = location
                // }

                if (!res.success) {
                    let message = 'Something went wrong.';
                    if (res.message) {

                        message = res.message || message;

                    }

                    showCartAlert(message, 'danger', 'signupMessage'); // Display error message
                }

            },
            error: function (response) {
                let message = 'Something went wrong.';
                if (response.responseText) {
                    try {
                        const res = JSON.parse(response.responseText);
                        message = res.message || message;
                    } catch (e) {
                        // Handle case where response is not valid JSON
                    }
                }
                showCartAlert(message, 'danger', 'signupMessage'); // Display error message
            },
            complete: function () {
                showLoader(false); // Hide the loader after request is complete
            }
        });
    });

    $('#checkin-logout').on('click', function (e) {
        e.preventDefault();  // Prevent the default form submission or link behavior

        $.ajax({
            url: `${baseUrl}/auth-handler.php`, // Your logout endpoint
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ action: 'logout' }), // Send a request to the server to log out
            success: function (response) {
                const res = JSON.parse(response);
                if (res.success) {
                    const removeClass = ['checkin-sign', 'checkin-signin-notice', 'checkin-signin-credits'];
                    const addClass = ['checkin-lgout', 'checkin-signed-notice', 'checkin-signed-credits'];
                    for (const className of removeClass) {
                        $(`.${className}`).removeClass('d-none')
                    }
                    for (const className of addClass) {
                        $(`.${className}`).addClass('d-none')
                    }

                    $('#checkin-name').val('')
                    $('#checkin-email').val('')


                } else {
                    // Show error message if logout fails
                    showCartAlert(res.message || 'Logout failed', 'danger', 'signupMessage');
                }
            },
            error: function (err) {
                console.log(err)
                alert('An error occurred while logging out.');
            }
        });
    });


    $('#checkin-signup').on('click', function (e) {
        e.preventDefault();

        const firstname = $('#checkin-firstname').val().trim();
        const lastname = $('#checkin-lastname').val().trim();
        const email = $('#checkin-signup-email').val().trim();
        // const countryCode = $('#countryCode').val().trim();
        // const phone = $('#phone').val().trim();
        const password = $('#checkin-password').val().trim();

        // Email Regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showCartAlert('Please enter a valid email address.', 'danger', 'signupMessage')
            return;
        }

        // Phone validation: 10 digits only
        const phoneRegex = /^\d{10}$/;
        // if (!phoneRegex.test(phone)) {
        //     showCartAlert('Phone number must be exactly 10 digits.', 'danger', 'signupMessage')
        //     return;
        // }

        // Optionally validate required fields
        if (!firstname || !email || !password) {
            showCartAlert('Please fill in all required fields.', 'danger', 'signupMessage')
            return;
        }

        showLoader();

        const formData = {
            action: 'signup',
            firstname,
            lastname,
            email,
            countryCode: null,
            phone: null,
            password
        };

        $.ajax({
            url: baseUrl + '/auth-handler.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response) {
                const res = JSON.parse(response);
                if (res.success) {
                    showCartAlert(res.message, 'success', 'signupMessage');
                    // window.location.href = 'dashboard.html';
                }
            },
            error: function (response) {
                let message = 'Something went wrong.';
                if (response.responseText) {
                    try {
                        const res = JSON.parse(response.responseText);
                        message = res.message || message;
                    } catch (e) {
                        // response is not valid JSON
                    }
                }
                showCartAlert(message, 'danger', 'signupMessage');
            },
            complete: function () {
                showLoader(false);
            }
        });
    });

    $('#checkin-payment').on('click', async function () {
        let isValid = true;
        let formData = {};

        // Validate text and email inputs
        $('#locationDetails input[type="text"], #locationDetails input[type="email"]').each(function () {
            const parent = $(this).closest('.bbvRuI');
            const inputId = $(this).attr('id');
            const value = $(this).val().trim();

            if (value === '') {
                isValid = false;
                parent.addClass('is-invalid');
            } else {
                parent.removeClass('is-invalid');
                if (inputId) {
                    formData[inputId] = value;
                }
            }
        });

        // Check if a "save as" radio option is selected
        const saveAsSelected = $('input[name="save-as"]:checked');
        if (!saveAsSelected.length) {
            isValid = false;
            alert("Please select a 'Save as' option.");
        } else {
            // Optional: add radio selection to formData
            formData['saveAs'] = saveAsSelected.val();
        }

        if (isValid) {
            try {
                showLoader();
                const result = await addCheckInDetails(formData)
                showLoader(false);
                const { order_id } = result;
                if (order_id) {
                    $('#checkin-order-id').val(order_id);
                    $('.nasa-payment-form').submit()
                } else {
                    throw new Error('unable to create order')
                }
            } catch (err) {
                showCartAlert(err?.message, 'danger', 'signupMessage');
            }
        }
    });


});
