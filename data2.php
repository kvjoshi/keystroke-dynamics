<?php
$con = mysqli_connect("localhost","root","","keystroke") or die("Database Connection Failed");

$record="UPDATE `key record` SET `difference2`='".$_POST['secondsDifference2']."',`keytime2`='".$_POST['totalt2']."',`secdiff`='".$_POST['sim1']."',`keydiff`='".$_POST['sim2']."' WHERE `user_id`='".$_POST['inid']."'";
$add=mysqli_query($con,$record) or die('Insert Fail');

if($add)
{
    echo "rec added";
}

?>
