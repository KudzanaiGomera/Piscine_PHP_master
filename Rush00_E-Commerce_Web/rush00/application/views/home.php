<?php
session_start();
$connect = mysqli_connect("localhost", "root", "81483465law", "rush00");
?>
<!doctype html>
<html>
<head>
    <title>rush00</title>
</head>
<body>
<div class="container" style="width:60%;">
    <h2 align="center">rush00</h2>
    <?php
    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div style="width: 40%; box-shadow: 4px 4px 22px gray;" id="block">
            <form method="post" action="./application/items/basket.php?action=add&id=<?php echo $row["id"]; ?>">
            <div align="center" id="images">
            <img src="<?php echo $row["image"]; ?>" alt="samsung">
            <h5><?php echo $row["name"]; ?></h5>
            <h5>R <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1" style="width: 60%">
            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
            <input type="submit" name="add" style="margin-top:5px;" value="Add to Cart">
            <button type="submit" formaction="./application/items/basket.php">Go to cart</button>
            </div>
            </form>
            </div>
            <?php
        }
    }
    else 
    echo "failed\n";
    ?>
 </div>
 </body>
</html>

