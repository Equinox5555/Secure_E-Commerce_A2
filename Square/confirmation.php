<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use Square\SquareClient;
use Square\Exceptions\ApiException;

// dotenv is used to read from the '.env' file created
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();

// Use the environment and the key name to get the appropriate values from the .env file.
$access_token = getenv('SQUARE_ACCESS_TOKEN');
$location_id =  getenv('SQUARE_LOCATION_ID');

// Initialize the authorization for Square
$client = new SquareClient([
  'accessToken' => $access_token,
  'environment' => getenv('ENVIRONMENT')
]);

$transaction_id = $_GET["transactionId"];

try {
  $orders_api = $client->getOrdersApi();
  $response = $orders_api->retrieveOrder($transaction_id);
} catch (ApiException $e) {
  // If an error occurs, output the message
  echo 'Caught exception!<br/>';
  echo '<strong>Response body:</strong><br/>';
  echo '<pre>';
  var_dump($e->getResponseBody());
  echo '</pre>';
  echo '<br/><strong>Context:</strong><br/>';
  echo '<pre>';
  var_dump($e->getContext());
  echo '</pre>';
  exit();
}

// If there was an error with the request we will
// print them to the browser screen here
if ($response->isError()) {
  echo 'Api response has Errors';
  $errors = $response->getErrors();
  echo '<ul>';
  foreach ($errors as $error) {
    echo '<li>❌ ' . $error->getDetail() . '</li>';
  }
  echo '</ul>';
  exit();
} else {
  $order = $response->getResult()->getOrder();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>
    <link rel="stylesheet" href="../assets/css/layout.css">
</head>
<body style="background-color:powderblue;" >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-info" href="#">OrdinaryWebsite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/Secure_E-Commerce_A2/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
  <header class="container">
    <div id="square-logo"></div>
    <h1 class="header">Custom Checkout Confirmation</h1>
  </header>


  <div class="page-container">
    <div id="content-wrap" class="container">
      <div class="container" id="confirmation">
        <div>
          <div>
            <?php
            echo ("Order " . $order->getId());
            ?>
          </div>
          <div>
            <?php
            echo ("Status: " . $order->getState());
            ?>
          </div>
        </div>
        <div>
          <?php
          foreach ($order->getLineItems() as $line_item) {
            // Display each line item in the order, you may want to consider formatting the money amount using different currencies
            echo ("
              <div class=\"item-line\">
                <div class=\"item-label\">" . $line_item->getName() . " x " . $line_item->getQuantity() . "</div>
                <div class=\"item-amount\">$" . number_format((float)$line_item->getTotalMoney()->getAmount() / 100, 2, '.', '') . "</div>
              </div>");
          }


          // Display total amount paid for the order, you may want to consider formatting the money amount using different currencies
          echo ("
            <div>
              <div class=\"item-line total-line\">
                <div class=\"item-label\">Total</div>
                <div class=\"item-amount\">$" . number_format((float)$order->getTotalMoney()->getAmount() / 100, 2, '.', '') . "</div>
              </div>
            </div>
            ");
          ?>
        </div>
        <div>
          <span>Payment Successful!</span>
          <a href="http://localhost/Secure_E-Commerce_A2/">Back to home page</a>
        </div>
      </div>
        </div>
  </div>
  <footer id="footer"
            class="d-flex flex-wrap justify-content-between align-items-center py-2 my-0 border-top bg-dark">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-light">© 2023 OrdinaryWebsite Inc</span>
            </div>
        </footer>
</body>
