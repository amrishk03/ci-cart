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
        <p align="right"><a href="<?php echo  base_url() . 'index.php/shop/logout'; ?>">Logout</a></p>

        <div class="panel panel-default">
            <div class="panel-heading">Billing Info</div>
        </div>
        <div class="panel-body">
            <?php
            echo "Thank You! your order has been placed!<br />";
            echo "<a class='btn btn-info' href=" . base_url() . "index.php/shop>Go back to product page</a>";
            ?>
        </div>
    </div>

</body>

</html>