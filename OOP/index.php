<?php
include 'includes/person.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<head>
<body>

<?php
    //creating objects
    $person1 = new Person("Kudzie ","blue ",28);
    echo $person1->name;
    echo $person1->eyeColor;
    
    $person1->setName("James");
    echo $person1->name;

    echo $person1->getName();

    //deleting objects
    $objects = new NewClass;
    unset($objects);
    echo $objects->getProperty();

    


?>

</body>
<html>