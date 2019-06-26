<?php

$con = mysqli_connect("localhost", "root", "", "keystroke") or die(mysqli_error());
if(isset($_REQUEST)) {
    $text = $_POST['text'];
    $secdiff = $_POST['seconddiffrence'];
    $add = "INSERT INTO `key record`(`id`,`entry`,`difference`,`keytime`) VALUES (''," . $text . ",''," . $secdiff . ")";
    if (mysqli_query($con, $add)) {

        header('Location:ind.php');

    } else {

        echo "Error: " . $add . "" . mysqli_error($con);

    }
}
?>
