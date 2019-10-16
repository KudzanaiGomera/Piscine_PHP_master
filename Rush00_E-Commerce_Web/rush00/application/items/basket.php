<?php
    session_start();
    function refresh($url = NULL) {
        if(empty($url)) {
            $url = $_SERVER['REQUEST_URI'];
        }
        header("Location: ".$url);
        exit();
    }

    $link = mysqli_connect("localhost", "root", "81483465law", "rush00");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if (!$_SESSION['loggued_on_user']) {
        $login = $_SERVER['REMOTE_ADDR'];
        if (strstr($login, "::")) {
            $login = trim(str_ireplace("::", " ", $login));
        }
    } else {
        $login = $_SESSION['loggued_on_user'];
    }

    if ($_SESSION['loggued_on_user'] == $login) {
        $addr = $_SERVER['REMOTE_ADDR'];
        if (strstr($addr, "::")) {
            $addr = trim(str_ireplace("::", " ", $addr));
        }

        $query = mysqli_query($link, "SELECT * FROM `order` WHERE addr='$addr' AND ordered='0'");

       if ($row = mysqli_fetch_array($query)) {
            $query = mysqli_query($link, "UPDATE `order` SET login = '$login' WHERE addr='$addr' AND ordered='0'");
        }
    }
    /* Delete this */
    if(isset($_POST["add"]))
{
    if(isset($_SESSION["cart"]))
    {
        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["cart"]);
            $item_array = array(
            'product_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="../../index.php"</script>';
        }
        else
        {
            echo '<script>alert("Products already added to cart")</script>';
            echo '<script>window.location="../../index.php"</script>';
        }
    }
    else
    {
        $item_array = array(
        'product_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'product_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
/* Also this */
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["cart"] as $keys => $values)
        {
            if($values["product_id"] == $_GET["id"])
            {
                unset($_SESSION["cart"][$keys]);
            }
        }
    }
}

    /* $resLogQuery = mysqli_query($link, "SELECT * FROM `order` WHERE login='$login' AND `ordered`='0'"); */
    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($link, $query);
    echo "<div class='center'>";
    echo "<div class='table'>";
    echo "<table><br>";
    /* $i = 0;
    $total = 0; */
    if(!empty($_SESSION["cart"]))
    {
        $total = 0;
        foreach($_SESSION["cart"] as $keys => $values)
    /* foreach (/* $resLogQuery *$result as $elem) */ {
        echo "<tr>";
        echo "<td style='color: #003559; height: 70px; font-weight: bold'>" . $values["item_name"] . "</td>";
        echo "<td style='color: #003559; height: 70px; font-weight: bold'>" . $values["item_quantity"] . "</td>";
        echo "<td style='color: #9ACD32; height: 70px;'>" . $values["product_price"] . " $</td>";
       /*  echo "<td><form method='post'><input type='hidden' name='hidden' value='$i'><input style='padding: 10px; margin-top: 10px;' type='submit' name='submit' value='Delete'></form></td>"; */
       ?><td><a href="application/items/basket.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span>remove</span></a></td></tr><?php
        
       $total = $total + ($values["item_quantity"] * $values["product_price"]);
    }
    echo "<tr><td style='color: #003559; height: 70px; font-weight: bold'>Total: </td><td style='color: #9ACD32; height: 70px;'>$total $</td><td><form method='post'><input style='padding: 10px; margin-top: 10px;' type='submit' name='order' value='Order'></form></td></tr>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
}
/* 
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] == "Delete") {
            $i = (int)$_POST['hidden'];
            $find = 0;

            foreach ($resLogQuery  $result as $elem) {
                /* if ($find == $i) {
                    $id = $elem['id'];
                    mysqli_query($link, "DELETE FROM `product` WHERE id = '$id'");
                    refresh();
                }
                $find++; 
                if($elem["id"] == $_GET["id"])
                {
                    unset($result);
                }
            }
        }
    } */

    if (isset($_POST['order'])) {
        if ($_POST['order'] == 'Order') {
            if (!$_SESSION['loggued_on_user']) {
                header("location: ../../index.php?page=login");
            } else {
                mysqli_query($link, "UPDATE `order` SET ordered = '1' WHERE login='$login' AND ordered='0'");
                echo "<div><h2 style='color: green'>Your order has been sent</h2></div>";
            }
        }
    }

    ?>