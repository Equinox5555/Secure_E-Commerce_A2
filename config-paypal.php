<?php
//global variable configuration
/*
* PayPal configuration
*/
// PayPal configuration
define('PAYPAL_ID', 's3916422@student.rmit.edu.au'); //seller email
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE
//redirect page
define('PAYPAL_RETURN_URL', 'http://localhost/Secure_E-Commerce_A2/confirmation.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/Secure_E-Commerce_A2/index.php'); 
define('PAYPAL_NOTIFY_URL', 'http://127.0.0.1/Secure_E-Commerce_A2/ipn.php');
//define currency
define('PAYPAL_CURRENCY', 'AUD');

// Change not required
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)? "https://www.sandbox.paypal.com/cgi-bin/webscr": "https://www.paypal.com/cgi-bin/webscr");
?>