<?php
require('connection.php');
$query_string = $_SERVER['QUERY_STRING'];
$data = explode('=', $query_string);
if ($data[0] == 'delete') {
    $query = "DELETE FROM car WHERE plate_number = '$data[1]'";
    $sql = $con->prepare($query);
    $sql->execute();
}
?>
<?php
// start connection between server and database
// database type , host , database name
// mysql , http://mydatabase.com , mydatabase
// require('connection.php');
// $query = "SELECT * FROM `car`";
// $sql =  $con->prepare($query);
// $result = $sql->execute();
// $cars = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
session_start();
require('connection.php');
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM customer where email = '$email'";
    $sql = $con->prepare($query);
    $sql->execute();
    $admin = $sql->fetch(PDO::FETCH_ASSOC);
    if ($admin['type'] != 'admin') {
        header("location:notfound.html");
    } elseif ($admin['type'] == 'admin') {
        require('connection.php');
        $query = "SELECT * FROM `car`";
        $sql =  $con->prepare($query);
        $result = $sql->execute();
        $cars = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
} else
    header("location:notfound.html");
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

    <title>view cars</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {

            background-image: url('images/car-background.jpg');
            background-size: center;
            background-position: center center;

        }

        table {
            background-color: rgba(0, 0, 10, 0.6);


        }

        table,
        th,
        td {
            border: 2px solid;
            color: white;
        }

        img {
            height: 100px;
            width: 150px;

        }
    </style>

</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">plate_number</th>
                <th scope="col">brand</th>
                <th scope="col">model</th>
                <th scope="col">release_year</th>
                <th scope="col">color</th>
                <th scope="col">price</th>
                <th scope="col">seats</th>
                <th scope="col">office_id</th>
                <th scope="col">state</th>
                <th scope="col">image</th>




            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) : ?>
                <tr>

                    <td><?php echo $car['plate_number']; ?></td>
                    <td><?php echo $car['brand']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['release_year']; ?></td>
                    <td><?php echo $car['color']; ?></td>
                    <td><?php echo $car['price']; ?></td>
                    <td><?php echo $car['seats']; ?></td>
                    <td><?php echo $car['office_id']; ?></td>
                    <td><?php echo $car['state']; ?></td>

                    <td><?php
                        $url = "images/" . $car['image'];
                        echo "<img src='$url'>"

                        ?></td>
                    <td>
                        <a href="<?php echo $_SERVER['PHP_SELF'] . '?delete=' . $car['plate_number'] ?>"><i class="fa-solid fa-trash-can " style="color:red;"></i></a>
                        <a href="./update_car_form.php?plate_number=<?php echo $car['plate_number']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>


            <?php endforeach; ?>



        </tbody>
    </table>

    <a href="addCar.php">
        <button class="offset-5 btn btn-success" style="width: 20%; color: white;  ">
            <h6><strong>ADD CAR</strong> </h5>
        </button>

        <a href="addPlate.php">
            <button class="offset-5 btn btn-primary" style="width: 20%; color: white;  ">
                <h6><strong>ADD Plate</strong> </h5>
            </button>
            <button class="offset-5 btn btn-primary">
                <a href="test.php" class="btn btn-primary">Return To Main Page</a>
            </button>
</body>

</html>