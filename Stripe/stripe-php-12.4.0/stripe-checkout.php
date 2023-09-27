<?php 

require 'init.php';

$stripe = new \Stripe\StripeClient('sk_test_51NsFqvJcSNRCgF4hgvPZu542mSil9uQfg0TiXtUoa78fXWsbE96ZhKq1y2cYSdl8ktMMfShxrIRn2KbkXkgERCNm00B6b7BfKo');

$checkout_session = $stripe->checkout->sessions->create([
    'line_items' => [[
      'price_data' => [
        'currency' => 'aud',
        'product_data' => [
          'name' => $_POST['item_name'],
        ],
        'unit_amount' => intval($_POST['amount']*100),
      ],
      'quantity' =>  intval($_POST['quantity']),
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/Secure_E-Commerce_A2/stripe-success.php',
    'cancel_url' => 'http://localhost/Secure_E-Commerce_A2/index.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>