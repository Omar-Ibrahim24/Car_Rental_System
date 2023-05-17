<?php
        session_start();
        if(isset($_POST['submit']))
        {
        require_once('connection.php');
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone_number=$_POST['phone_number'];
        // $gender=$_POST['gender'];
        $password=$_POST['password'];
         if($email!=""){
            $query = "SELECT * FROM customer where email = '$email'";
            $sql = $con->prepare($query);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            if($user!=null){
                echo "<div class='text-center'><h1>Email already exists</h1></div>";
            }
            else{
                $_SESSION['fname']=$fname;
                $_SESSION['lname']=$lname;
                $_SESSION['email']=$email;
                $_SESSION['phone_number']=$phone_number;
                $_SESSION['Gender']=$gender;
                $_SESSION['password']=$password;
                header('Location:admin_signup_user.php');
            }
         }
        }
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
    <title>Sign Up</title>
</head>

<script>
    function empty(e) {
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var gender = document.getElementById("gender").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;
        var x=document.forms["contactform"]["fname"].value;
        if (x == "") {
            alert("Fisrt Name is empty");
            return false;
            e.cancelBubble=true;
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
        if (confirm_password == "") {
            alert("Confirm Password is empty");
            return false;
        }
        if (password != confirm_password) {
            alert("Password And Confirm Password are not the same");
            return false;
        }

    }
</script>
<body>
    <div class="d-flex align-items-center justify-content-center login font">
        <form action="" id="contactform" onsubmit="return empty(this)" method="POST" class="border border-dark rounded border-2 w-25 shadow-sm p-3 mb-5 bg-body rounded form1">
            <div class="text-danger d-flex align-items-center justify-content-center flex-column">
                <h3 class="font2">Signup</h3><i class="fa-solid fa-user fa-2x"></i>
            </div>
            <div class="mb-1 mx-3">
                <label for="fname" class="form-label text-danger fw-bold"><i class="fa-solid fa-user"></i>First Name</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="fname" placeholder="Please Enter Your First Name" id="fname">
            </div>
            <div class="mb-1 mx-3">
                <label for="lname" class="form-label text-danger fw-bold"><i class="fa-solid fa-user"></i>Last Name</label>
                <input type="text" class="form-control shadow-sm bg-body rounded" name="lname" placeholder="Please Enter Your Last Name" id="lname">
            </div>
            <div class="mb-1 mx-3">
                <label for="email" class="form-label text-danger fw-bold"><i class="fa-solid fa-envelope"></i> Email Address</label>
                <input type="email" class="form-control shadow-sm bg-body rounded" name="email" placeholder="Please Enter Your Email" id="email">
            </div>
            <div class="mb-1 mx-3">
                <label for="phone" class="form-label text-danger fw-bold"><i class="fa-solid fa-envelope"></i> Phone Numbner</label>
                <input type="number" class="form-control shadow-sm bg-body rounded" name="phone_number" placeholder="Please Enter Your Phone Number" id="phone_number">
            </div>
            <div class="mb-1 mx-3">
                <label for="gender" class="form-label text-danger fw-bold"><i class="fa-solid fa-mars-and-venus"></i> Gender</label>
                <input type="radio" class="shadow-sm bg-body rounded" name="Gender" placeholder="" id="" value="male">Male
                <input type="radio" class="shadow-sm bg-body rounded" name="Gender" placeholder="" id="" value="female">Female
            </div>
            <div class="mb-1 mx-3">
                <label for="password" class="form-label text-danger fw-bold"><i class="fa-solid fa-lock"></i> Password</label>
                <input type="password" class="form-control shadow-sm bg-body rounded" name="password" placeholder="Please Enter Your Password" id="password">
            </div>
            <div class="mb-1 mx-3">
                <label for="confirm_password" class="form-label text-danger fw-bold"><i class="fa-solid fa-lock"></i> Confirm
                    Password</label>
                <input type="password" class="form-control shadow-sm bg-body rounded mb-2" name="confirm_password" placeholder="Please Confirm Your Password" id="confirm_password">
            </div>
            <div class="mb-1 mx-3">
                <a href="login.html" class="text-danger fw-bold text-decoration-none">Already Have An Account? Log in</a>
            </div>
            <button type="submit" name="submit" class="btn btn-danger mx-3 mb-4 px-3">Sign Up</button>
        </form>
    </div>
    
</body>
</html>