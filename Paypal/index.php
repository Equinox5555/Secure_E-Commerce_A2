<?php
//main page
// Include configuration file
include_once "config.php";
// Include database file
include_once "../data.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Gateway</title>
</head>
<body>
	<h1>Item Catalogue</h1>

	<table>
		<?php foreach ($items as $i) { ?>
			<tr>
	            <th><?php echo $i["name"]; ?></th>
	            <th>
	                <img width="150" height="150" src="<?php echo $i["image"]; ?>" alt="<?php echo $i["name"]; ?>">
	            </th>
	            <th>
                	This is a good laptop
                </th>
                <th> 
                        Price: $<?php echo $i["price"] . PAYPAL_CURRENCY; ?>
                </th>
                <th> 
<!-- define paypal button and send data -->
					<form action="<?php echo PAYPAL_URL; ?>" method="post" style="padding: 0; margin: 0;">

                    <!-- Specify a Buy Now button. -->
						<input type="hidden" name="cmd" value="_xclick" />

                    <!-- Identify your business so that you can collect the payments. -->
						<input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>" />

                    <!-- Specify details about the item that buyers will purchase. part of this field will be used in ipn.php-->
						<input type="hidden" name="item_name" value="<?php echo $i["name"]; ?>" />
						<input type="hidden" name="item_number" value="<?php echo $i["id"]; ?>" />
						<input type="hidden" name="amount" value="<?php echo $i["price"]; ?>" />
						<input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>" />

                    <!-- Specify URLs -->
						<input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
						<input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">
						<input type="image" border="0" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"/>
						</form>
                </th>
	          </tr>
		<?php } ?>
	</table>
	
</body>
</html>