<?php
session_start();
if (isset($_POST['submit'])) {
    require_once('connection.php');
    $customer_id = $_POST['customer_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['Gender'];
    $password = $_POST['password'];
    if ($email != "") {
        $query = "SELECT * FROM customer where email = '$email'";
        $sql = $con->prepare($query);
        $sql->execute();
        $user = $sql->fetch(PDO::FETCH_ASSOC);
        echo ($user['customer_id']);
        var_dump($customer_id);
        if ($user != null and $customer_id != $user['customer_id']) {
            echo "<div class='text-center'><h1>Email already exists</h1></div>";
        } else {
            // $_SESSION['customer_id']=$customer_id;
            // $_SESSION['fname']=$fname;
            // $_SESSION['lname']=$lname;
            // $_SESSION['email']=$email;
            // $_SESSION['phone_number']=$phone_number;
            // $_SESSION['gender']=$gender;
            // $_SESSION['password']=$password;
            $query = "UPDATE customer SET fname = '$fname' ,lname='$lname',email = '$email', phone_number = '$phone_number' , gender = '$gender' , password = '$password' WHERE customer_id = '$customer_id'";
            $sql = $con->prepare($query);
            $result = $sql->execute();
            if ($result == 0) {
                echo file_get_contents('errors.html');
            } else {
                header('Location:dashboard.php');
            }
            // header('Location:admin_update_customer.php');
        }
    }
}
?>
<?php
require_once 'connection.php';
$query_string = $_SERVER['QUERY_STRING'];
$data = explode('=', $query_string);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="signup.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style2.css">
    <title>Add Customer</title>
</head>

<script>
    function empty(e) {
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var gender = document.getElementById("gender").value;
        var password = document.getElementById("password").value;
        var x = document.forms["contactform"]["fname"].value;
        if (x == "") {
            alert("Fisrt Name is empty");
            return false;
            e.cancelBubble = true;
        }
        if (lname == "") {
            alert("Last Name is empty");
            return false;
        }
        if (email == "") {
            alert("Email is empty");
            return false;
        }
        if (gender == "") {
            alert("Gender is empty");
            return false;
        }
        if (password == "") {
            alert("Password is empty");
            return false;
        }

    }
</script>

<body>
    <div class="d-flex align-items-center justify-content-center login font">
        <form action="" id="contactform" onsubmit="return empty(this)" method="POST" class="border border-dark rounded border-2 w-25 shadow-sm p-3 mb-5 bg-body rounded form1">
            <div class="text-danger d-flex align-items-center justify-content-center flex-column">
                <h3 class="font2">Update Customer</h3><i class="fa-solid fa-user fa-2x"></i>
            </div>
            <div class="mb-1 mx-3">
                <input type="hidden" class="form-control shadow-sm bg-body rounded" name="customer_id" value="<?php echo $customer['customer_id'] ?>" id="customer_id">
            </div>
            <div class="mb-1 mx-3">
                <label for="fname" class="form-label text-danger fw-bold"><i class="fa-solid fa-user"></i>First Name</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="fname" value="<?php echo $customer['fname'] ?>" id="fname">
            </div>
            <div class="mb-1 mx-3">
                <label for="lname" class="form-label text-danger fw-bold"><i class="fa-solid fa-user"></i>Last Name</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="lname" value="<?php echo $customer['lname'] ?>" id="lname">
            </div>
            <div class="mb-1 mx-3">
                <label for="email" class="form-label text-danger fw-bold"><i class="fa-solid fa-envelope"></i> Email Address</label>
                <input type="email" class="form-control shadow-sm bg-body rounded" name="email" value="<?php echo $customer['email'] ?>" id="email">
            </div>
            <div class="mb-1 mx-3">
                <label for="phone" class="form-label text-danger fw-bold"><i class="fa-solid fa-envelope"></i> Phone Numbner</label>
                <input type="number" class="form-control shadow-sm bg-body rounded" name="phone_number" value="<?php echo $customer['phone_number'] ?>" id="phone_number">
            </div>
            <div class="mb-1 mx-3">
                <label for="gender" class="form-label text-danger fw-bold"><i class="fa-solid fa-mars-and-venus"></i> Gender</label>
                <input type="radio" class="shadow-sm bg-body rounded" name="Gender" <?php if ($customer['gender'] == 'male') echo 'checked="checked"'; ?> id="" value="male">Male
                <input type="radio" class="shadow-sm bg-body rounded" name="Gender" <?php if ($customer['gender'] == 'female') echo 'checked="checked"'; ?> id="" value="female">Female
            </div>
            <div class="mb-1 mx-3">
                <label for="password" class="form-label text-danger fw-bold"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" class="form-control shadow-sm bg-body rounded" name="password" value="<?php echo $customer['password'] ?>" id="password">
            </div>
            <button type="submit" name="submit" class="btn btn-danger mx-3 mb-4 px-3">Update</button>
        </form>
    </div>

</body>

</html>