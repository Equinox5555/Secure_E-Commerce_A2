<?php
//main page
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
            <h1 class="text-info">Products Page</h1>
            <div class="row">
                <?php foreach ($items as $i): ?>
                    <div class="col-12 col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-secondary">
                            <div class="card-body">
                            <img class ="card-img-top img-fluid" height="20vh" src=<?php echo $i["image"]?> alt=<?php echo $i["name"] ?>>
                                <h5 class="card-title"><?php echo $i["name"] ?></h5>
                                <p class="card-text"><?php echo $i["specs"] ?></p>
                                <form class="text-center" action="cart.php" method="post">
                                    <input type="hidden" name="item_name" value="<?php echo $i["name"]; ?>" />
                                    <input type="hidden" name="item_number" value="<?php echo $i["id"]; ?>" />
                                    <input type=submit value="Buy" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
