<?php
	session_start();
    $usn = $_POST["usn"];
    $pn = $_POST["pn"];
    $r = $_POST["r"];
    $rc = $_POST["rc"];
    $sa1 = $_POST["sa1"];
    $sa2 = $_POST["sa2"];
    $sa3 = $_POST["sa3"];
    $pc = $_POST["pc"];
    $rp = $_POST["rp"];
    $ad = $_POST["ad"];
    $cd = $_POST["cd"];
    $ed = $_POST["ed"];


    $bid = $_SESSION["bid"];
	$con = mysqli_connect('localhost','root','990622$Grow','3241_pj');
	If (!$con)
	{ die('Could not connect'.mysqli_connect_error());
    }

    $sql = "update customer set User_name = '" . $usn . "', Phone_number = '". $pn. "', 
    Address_id = '". 
    ($bid+100). "', Rating = '". $r . "', Rating_count  = '". $rc ."' where Buyer_id = '" .$_SESSION["bid"]. "'";
    $result=mysqli_query($con, $sql) or die(mysqli_error($con));

    $s2 = "insert into address_table values('". ($bid+100). "','" . $bid."','" .$sa1. "','"
    .$sa2."','". $sa3. "','".$pc."','".$rp ."','". $ad. "')";
    $result2 =mysqli_query($con, $s2) or die(mysqli_error($con));

    $s3 = "insert into payment_info values('". ($bid+100). "','" . $bid."','" ."N/A". "','"
    .$cd."','". $ed."')";
    $result2 =mysqli_query($con, $s3) or die(mysqli_error($con));

    echo 'Update successfully ';
    echo '<br>';
    echo '<a href="http://localhost:8080/3241_pj/Customer_info.php" class = "return_hp">return</a>';
    
    
?>