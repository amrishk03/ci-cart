<!DOCTYPE html>
<html>

<head>
	<title>KMart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">Shopping @ KMart</h3>
		<br />
		<h5 align="right">Welcome <?php echo $userdata[0]->name; ?></h5>
		<p align="right"><a onclick="window.location='cart'">My Cart</a> | <a href="<?php echo  base_url() . 'index.php/shop/logout'; ?>">Logout</a></p>

		<div class="panel panel-default">
			<div class="panel-heading">Products</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-span-12 form-group" style="float:right">
						<form method="post" accept="<?php echo base_url() . "index.php/shop"; ?>">
							<label>Filter By: <?php //echo $filter;?></label>
							<select class="form-control" name="filter" onchange="this.form.submit();">
								<option value="">--------</option>
								<option value="name_asc" <?php echo ($filter != 'name_asc') ? "" : "selected"; ?>>Name Asc</option>
								<option value="name_desc" <?php echo ($filter != 'name_desc') ? "" : "selected"; ?>>Name Desc</option>
								<option value="price_asc" <?php echo ($filter != 'price_asc') ? "" : "selected"; ?>>Price Low to High</option>
								<option value="price_desc" <?php echo ($filter != 'price_desc') ? "" : "selected"; ?>>Price High to Low</option>
							</select>
						</form>
					</div>
				</div>
				<div class="">
					<table border="0" cellpadding="2px" width="600px">
						<?php
						foreach ($products as $product) {
							$id = $product['serial'];
							$name = $product['name'];
							$description = $product['description'];
							$price = $product['price'];
							?>
							<tr>
								<td><img src="<?php echo base_url() . $product['picture'] ?>" /></td>
								<td><b><?php echo $name; ?></b><br />
									<?php echo $description; ?><br />
									Price:<big style="color:green">
										Rs. <?php echo $price; ?></big><br /><br />
									<?php
									echo form_open('cart/add');
									echo form_hidden('id', $id);
									echo form_hidden('name', $name);
									echo form_hidden('price', $price);
									echo form_submit('action', 'Add to Cart');
									echo form_close();
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr size="1" />
								</td>
							<?php } ?>
					</table>
				</div>

			</div>
		</div>
	</div>

</body>

</html>