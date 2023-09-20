<?php
//main page
// Include configuration file
include_once "Paypal/config.php";
// Include database file
include_once "data.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template</title>
    <!-- Bootstrap core CSS -->
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
            <h1 class="text-info">Shopping Cart</h1>
            <table class="table bg-white">
                <tr>
                    <th>Remove</th>
                    <th>Image</th>
                    <th>Project Description</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><img style="max-width: 120px; max-height: 120px;" src="<?php echo $items[$_POST['item_number']-1]['image'] ?>"></td>
                    <td><?php echo $items[$_POST['item_number']-1]['description'] ?></td>
                    <td id="price"><?php echo $items[$_POST['item_number']-1]['price'] ?></td>
                    <td><input type="number" name="quantity" id="quantity" value="1" onchange="Calculate(this.value)">
                        <script>
                        function Calculate(val) {
                            document.getElementById("total").innerHTML = "$" + val * <?php echo $items[$_POST['item_number']-1]['price'] ?>;
                        }
                        </script></td>
                    <!-- js calculation -->
                    <td><div id="total">$<?php echo $items[$_POST['item_number']-1]['price'] ?></div></td>
                </tr>
            </table>
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