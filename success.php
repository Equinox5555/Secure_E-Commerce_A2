<?php
// Include configuration file	
include 'Paypal/config.php';	
include 'data.php';

// If transaction data is available in the URL 
if(!empty($_GET['item_number']) && !empty($_GET['tx']) 
&& !empty($_GET['amt']) && !empty($_GET['cc']) 
&& !empty($_GET['st'])){ 
		// Get transaction information from URL 
		$item_number = $_GET['item_number'];  
		$txn_id = $_GET['tx']; 
		$payment_gross = $_GET['amt']; 
		$currency_code = $_GET['cc']; 
		$payment_status = $_GET['st']; 
		// Get product info from the database 
		$result = array();

		foreach ($items as $product) {
			    if ($product['id'] === $item_number) {
			        $result = $product;
			        break;
			    }
			}

		$product_name = $result['name'];
		$product_price = $result['price'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Gateway</title>
	<link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>
    <link rel="stylesheet" href="./assets/css/layout.css">
</head>
<body style="background-color:powderblue;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand text-info" href="#">OrdinaryWebsite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/Secure_E-Commerce_A2/index.php">Home <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>

            <!-- If logged in, this section should be replaced by Hi username! -->
            <!-- <ul class="navbar-nav my-2 my-lg-0">
                
            </ul> -->
        </div>
    </nav>
	<div class="page-container">
        <div id="content-wrap" class="container">
			<div class="container">
				<div class="status">
					<?php
					if(!empty($txn_id)){ 
					?>
						<h1 class="success">Your Payment has been Successful</h1>
						
						<h4>Payment Information</h4>
						<p><b>Transaction ID:</b> <?php echo $txn_id; ?></p>
						<p><b>Paid Amount:</b> <?php echo $payment_gross; ?></p>
						<p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
						
						<h4>Product Information</h4>
						<p><b>Name:</b> <?php echo $product_name; ?></p>
						<p><b>Price:</b> <?php echo $product_price; ?></p>
					<?php 
					}else{ 
					?>
						<h1 class="error">Your Payment has Failed</h1>
					<?php 
					} 
					?>
				</div>
				<a href="index.php" class="btn-link">Back to Products</a>
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
</html>