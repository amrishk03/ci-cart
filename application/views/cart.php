<!DOCTYPE html>
<html>

<head>
	<title>KMart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<script>
		function clear_cart() {
			var result = confirm('Are you sure want to clear all bookings?');

			if (result) {
				window.location = "<?php echo base_url(); ?>index.php/cart/remove/all";
			} else {
				return false; // cancel button
			}
		}
	</script>
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">Shopping @ KMart</h3>
		<br />
		<h5 align="right">Welcome <?php echo $userdata[0]->name; ?></h5>
		<p align="right"><a href="<?php echo  base_url() . 'index.php/shop/logout'; ?>">Logout</a></p>

		<div class="panel panel-default">
			<div class="panel-heading">Your Shopping Cart </div>
		</div>
		<div class="panel-body">


			<div style="color:#F00"><?php echo $message ?></div>
			<div class="table-responsive">
				<div class="form-group" style="float: right;">
					<input type="button" value="Continue Shopping" onclick="window.location='shop'" class="btn btn-info" />
				</div>
				<table border="" class="table" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
					<?php if ($cart = $this->cart->contents()) : ?>

						<tr bgcolor="#FFFFFF" style="font-weight:bold">
							<td><label>S.No.</label></td>
							<td><label>Name</label></td>
							<td><label>Price</label></td>
							<td><label>Qty</label></td>
							<td><label>Amount</label></td>
							<td><label>Options</label></td>
						</tr>
						<?php
						echo form_open('cart/update_cart');
						$grand_total = 0;
						$i = 1;

						foreach ($cart as $item) :
							echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
							echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
							echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
							echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
							echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
							?>
							<tr bgcolor="#FFFFFF">
								<td>
									<?php echo $i++; ?>
								</td>
								<td>
									<?php echo $item['name']; ?>
								</td>
								<td>
									Rs. <?php echo number_format($item['price'], 2); ?>
								</td>
								<td>
									<?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
								</td>
								<?php $grand_total = $grand_total + $item['subtotal']; ?>
								<td>
									Rs. <?php echo number_format($item['subtotal'], 2) ?>
								</td>
								<td>
									<?php echo anchor('cart/remove/' . $item['rowid'], 'Cancel'); ?>
								</td>
							<?php endforeach; ?>
						</tr>
						<tr>
							<td><b>Order Total: Rs. <?php echo number_format($grand_total, 2); ?></b></td>
							<td colspan="5" align="right">
								<input type="button" class="btn btn-danger" value="Clear Cart" onclick="clear_cart()">
								<input type="submit" class="btn btn-warning" value="Update Cart">
								<?php echo form_close(); ?>
								<input type="button" class="btn btn-success" value="Proceed" onclick="window.location='billing'">
							</td>
						</tr>
					<?php endif; ?>
				</table>
			</div>
		</div>
	</div>
	</div>
</body>

</html>