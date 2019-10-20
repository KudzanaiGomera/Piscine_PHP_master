<?php
    session_start();
    $order = 0;
    if (!isset($_GET['page']) || $_GET['page'] == "home") {
        $page = "application/views/home.php";
    }
    if ($_GET['page'] == "contact") {
        $page = "application/views/contact.html";
    }
    if ($_GET['page'] == "login") {
        $page = "application/authorization/login.php";
    }
    if ($_GET['page'] == "create") {
        $page = "application/authorization/create.php";
    }
    if ($_GET['page'] == "modif") {
        $page = "application/authorization/modif.php";
    }
    if ($_GET['page'] == "logout") {
        $page = "application/authorization/logout.php";
    }
    if ($_GET['admin'] == "admin") {
        header("location: application/admin/admin.php");
    }
    if ($_GET['page'] == "all" || $_GET['page'] == "iphone" || $_GET['page'] == "ipad" || $_GET['page'] == "imac" || $_GET['page'] == "4s" || $_GET['page'] == "5s" || $_GET['page'] == "6s") {
        $page = "application/items/items.php";
    }
    if ($_GET['page'] == "basket") {
        $page = "application/items/basket.php";
    }
    if (!$_SESSION['loggued_on_user']) {
        $login = $_SERVER['REMOTE_ADDR'];
        if (strstr($login, "::")) {
            $login = trim(str_ireplace("::", " ", $login));
        }
    } else {
        $login = $_SESSION['loggued_on_user'];
    }

    $link = mysqli_connect("localhost", "root", "123456789", "rush00");

    if (mysqli_connect_errno()) {
        try {
            include("install.php");
        } catch (mysqli_sql_exception $ex) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

    }

    if ($resLogQueryBask = mysqli_query($link, "SELECT * FROM `order` WHERE login='$login' AND ordered='0'")) {
        foreach ($resLogQueryBask as $elem) {
           $order++;
        }
    }
?>

<!DOCTYPE html>
   <html>
    <head>
        <title>Wild & Free Clothing</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
            <link rel="stylesheet" type="text/css" href="css/main.css" />
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scaleable=no">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
             <link rel="stylesheet" href="css/app.css">
                <link rel="stylesheet" href="css/login.css">
                <link rel="stylesheet" href="css/contact.css">
                <link rel="stylesheet" href="css/items.css">
                <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
            <div class="container">
                    <a href="index.php" class="navbar-brand" id="text">Wild & Free Clothing</a>
                         <ul class="navbar navbar-nav">
                            <li><a href="index.php?page=basket">Basket<?php if ($order) {echo "(".$order.")";}?></a></li>
                         <!--Drop Down Menu-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Women<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">dresses</a></li>
                                <li><a href="#">tops</a></li>
                                <li><a href="#">jeans</a></li>
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Men<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                               <li><a href="#">Shirts</a></li>
                                <li><a href="#">suits</a></li>
                                <li><a href="#">shoes</a></li>
                                <li><a href="#">jeans</a></li>
                           </ul>
                        </li>
                        <?php
                                if ($_SESSION['loggued_on_user'] == "") {
                                    echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                                } else {
                                    echo "<li><a href=\"index.php?page=modif\">".$_SESSION['loggued_on_user']."</a></li>";
                                    echo "<li><a href=\"index.php?page=logout\">LogOut</a></li>";
                                }
                            ?>
                            <li><a href="index.php?page=home">Home</a></li>
                            <li><a href="index.php?page=contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
            
            <div class="container">
                <?php include $page; ?>
            </div>
           <!------------------------Footer----------->
            <section id="footer">
                <div class="container text-center">
                   <p>&copy; <a href="#">kgomera & tmuzeren</a>.2019.</p>
                    </div>
            </section>
            <!------------------Footer End------->
            <script src="js/main.js"></script>
    </body>
</html>