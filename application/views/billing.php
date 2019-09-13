<?php
$grand_total = 0;

if ($cart = $this->cart->contents()) :
    foreach ($cart as $item) :
        $grand_total = $grand_total + $item['subtotal'];
    endforeach;
endif;
?>
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
            <div class="panel-heading">Billing Info</div>
        </div>
        <div class="panel-body">

            <form name="billing" method="post" action="<?php echo base_url() . 'index.php/billing/save_order' ?>">
                <input type="hidden" name="command" />
                <div align="center">
                    <table border="0" class="table" cellpadding="2px">
                        <tr>
                            <td>Order Total:</td>
                            <td><strong>Rs. <?php echo number_format($grand_total, 2); ?></strong></td>
                        </tr>
                        <tr>
                            <td>Your Name:</td>
                            <td><?php echo $userdata[0]->name; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $userdata[0]->email; ?></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="Back to Cart" class="btn btn-info" onclick="window.location='cart'" /></td>
                            <td><input type="submit" value="Place Order" class="btn btn-success" /></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>

</body>

</html>