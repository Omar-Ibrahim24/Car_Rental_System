<?php
require_once 'connection.php';
$query_string = $_SERVER['QUERY_STRING'];
$data = explode('=',$query_string);
$query = "SELECT * FROM customer where customer_id = $data[1]";
$sql = $con->prepare($query);
$sql->execute();
$customer = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<table class="table">
    <thead>
            <tr>
                <th scope="col">Customer Id</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo $customer['customer_id'];?></td>
                    <td><?php echo $customer['fname'];?></td>
                    <td><?php echo $customer['lname'];?></td>
                    <td><?php echo $customer['email'];?></td>
                    <td><?php echo $customer['gender'];?></td>
                    <td><?php echo $customer['phone_number'];?></td>
                    <td><?php echo $customer['type'];?></td>
                </tr>
        </tbody>
    </table>
    <a href="test.php?=customer_id=<?php echo $customer['customer_id'];?>" class="btn btn-primary">Return To Main Page</a>
    <a href="test.php?signout=99" class="btn btn-danger">Sign Out</a>
    <?php if($customer['type']=='admin'):?>
    <a href="Dashboard.php?admin_id=<?php echo $customer['customer_id'];?>" class="btn btn-warning">Dashboard</a>
    <?php endif;?>
</body>
</html>