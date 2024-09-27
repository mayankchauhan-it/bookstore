<?php
session_start();
include "../website/connection.php";
include "../website/header.php";

if(isset($_POST['s1'])) {
    $msg = "";
    // p1 is an array of products added by the user into the cart
    $arr = $_POST['p1'];

    foreach($arr as $key => $value) {
        $cart = "SELECT i_id FROM cart WHERE c_id = $key";
        $tmp = mysqli_query($con, $cart); // Add $con to the mysqli_query
        $tmp1 = mysqli_fetch_row($tmp);
        
        $item = "SELECT * FROM item WHERE i_id = " . $tmp1[0];
        $item1 = mysqli_query($con, $item); // Add $con to the mysqli_query
        $item2 = mysqli_fetch_row($item1);
        
        if($value > $item2[6]) {
            $msg .= "<br><h3 align='center'>Only $item2[6] $item2[2] is available</h3>";
        } else {
            $upd = "UPDATE cart SET i_qnt = $value WHERE c_id = $key";
            mysqli_query($con, $upd); // Add $con to the mysqli_query
        }
    }
}

if(isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
}

if(!isset($_POST['s1']) && isset($_GET['i_id'])) {
    if(!isset($_GET['msg'])) {
        $sql = "SELECT * FROM items WHERE i_id = $i_id";
        $res = mysqli_query($con, $sql); // Add $con to the mysqli_query
        $row = mysqli_fetch_row($res);
    }

    $sql1 = "SELECT * FROM user WHERE u_nm = '" . $_SESSION['u_nm'] . "'";
    $res1 = mysqli_query($con, $sql1); // Add $con to the mysqli_query
    $row1 = mysqli_fetch_row($res1);
    $_SESSION['u_id'] = $row1[0];

    if(!isset($_GET['msg'])) {
        if($row[6] <= 0) {
            $msg = "<h3 align='center'>$row[2] is not available</h3>";
        } else {
            $msg = "";
            $sql2 = "INSERT INTO cart (c_id, i_id, u_id, i_nm, i_price, i_image, i_qnt) 
                     VALUES ('" . $row[0] . "', '" . $row1[0] . "', '" . $row[2] . "', 
                             '" . $row[3] . "', '" . $row[4] . "', '" . $row[5] . "', 1)";
            mysqli_query($con, $sql2); // Add $con to the mysqli_query
            header("Location:../website/index.php");
        }
    }
}

$q = "SELECT * FROM cart WHERE u_id = " . $_SESSION['u_id'];
$r = mysqli_query($con, $q); // Add $con to the mysqli_query
?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="container">
        <h3 class="text-center">Shopping Cart</h3>
        
        <?php 
        if(isset($msg)) {
            echo $msg;
        } 
        if(isset($_GET['msg'])) {
            echo $_GET['msg'];
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tot = 0;
                        while($result = mysqli_fetch_row($r)) { ?>
                        <tr>
                            <td>
                                <img src="images/<?php echo $result[5]; ?>" alt="Img" width="150" height="150">
                            </td>
                            <td><?php echo "Rs.: " . $result[4]; ?></td>
                            <td><input type="text" size="3" value="<?php echo $result[6]; ?>" name="p1[<?php echo $result[0]; ?>]" /></td>
                            <td><?php echo "Rs.: " . ($result[4] * $result[6]); ?></td>
                            <td><a href="delete1.php?c_id=<?php echo $result[0]; ?>" class="btn btn-danger">Remove</a></td>
                        </tr>
                        <?php 
                        $tot += $result[4] * $result[6]; 
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <h4>Total payable amount: <?php echo "Rs.: " . $tot; ?></h4>
            </div>
            <div class="col-md-6 text-right">
                <input type="submit" name="s1" value="Update" class="btn btn-primary" />
                <a href="checkout.php" class="btn btn-success">Checkout</a>
            </div>
        </div>
    </div>
</form>

<script>
function tmp() {
    history.back();
}	
</script>

<?php include "../website/footer.php"; ?>
