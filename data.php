<?php
$con = mysqli_connect("localhost","root","","keystroke") or die("Database Connection Failed");


$record="INSERT INTO `key record`(`id`, `user_id`, `entry`, `difference1`, `keytime1`, `difference2`, `keytime2`, `secdiff`, `keydiff`) values ('','".$_POST['inid']."','','".$_POST['secondsDifference1']."','".$_POST['totalt']."','','','','')";
$add=mysqli_query($con,$record) or die('Insert Fail');

if($add)
{
    echo "rec added";
}

?>
