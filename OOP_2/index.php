<?php
include 'includes/autoLoader.inc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <?php

            $person1 = new Person\Person("Daniel");
            echo $person1->getPerson();

            echo "<br>";

            $house1 = new House("Johndoeroad", 12);
            echo $house1->getAddress();

        ?>

    </body>
</html>
