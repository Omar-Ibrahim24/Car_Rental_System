<?php
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "car_rental_system";
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$start_date=$_SESSION['start_date'];
$end_date=$_SESSION['end_date'];

$date1=date_create($start_date);
$date2=date_create($end_date);
$diff=date_diff($date1,$date2);
$Today_Date = date('m/d/Y');


#Get All data from Cart Table to Show them in cart 
$total_price=0;
$query3 = "SELECT plate_number,price FROM `cart`";
$result3 = mysqli_query($connect, $query3);
while($row = mysqli_fetch_array($result3))
{

// var_dump($row['price']);

// var_dump($diff);

 
$price=(int)$row['price'] *(int)$diff;
$plate_number=$row['plate_number'];


    $reserved="INSERT INTO reservation (customer_id,reserved_date, start_date, end_date ,plate_number, total_cost  ) VALUES (2,,'$Today_Date','$start_date','$end_date','$plate_number','$price')";
    $result2 = mysqli_query($connect, $reserved);





    #$total_price=$total_price+$row['price'];
    #$plates=$plates."'".$row[0]."'".",";
}

#$plates=trim($plates, ",");


if(isset($_POST['Checkout']))
{      

    
    
    #Reserve Order in reservation table
    

    
  

    #Delete All elements in cart
    $delete="DELETE FROM cart";
    $resul3 = mysqli_query($connect, $delete);



//     echo "<script>
// alert('Operation Done Successfully');
// window.location.href='http://localhost/Final%20Update%201/search.php';
// </script>";

}






?>

