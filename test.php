<?php
session_start();
require('connection.php');
$temp=1;
$query_string = $_SERVER['QUERY_STRING'];
$data = explode('=',$query_string);
$temp=$data[1];
if (isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $query = "SELECT * FROM `customer`where email='$email'";
    $sql =  $con->prepare($query);
    $result = $sql->execute();
    $customer = $sql->fetch(PDO::FETCH_ASSOC);
}
if($temp==99){
// session_destroy();
unset($customer);
unset($_SESSION['email']);
// var_dump($x);
}
?>
<?php
require('connection.php');
        $query = "SELECT * FROM `car` limit 4";
        $sql =  $con->prepare($query);
        $result = $sql->execute();
        $cars = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Car Rental System</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid nav-class">
                <p class="navbar-text pt-2 offset-1 navfont mt-2">Top Trending Renting Website With Best Prices</p>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse offset-2 fs-6" id="navbarNavDropdown">
                    <ul class="navbar-nav offset-4 justify-content-between navfont">
                        <li class="nav-item px-2">
                            <?php
                            if(isset($customer)):?>
                            <a class="nav-link active navbar-text" aria-current="page" href="details.php?customer_id=<?php echo $customer['customer_id']?>"><?php echo $customer['fname'];?></a>
                            <?php else: ?>
                             <a class="nav-link active navbar-text" aria-current="page" href="login.php">Login</a>
                             <?php endif;?>
                             
                        </li>
                        <li class="nav-item px-2">
                        <?php
                            if(isset($customer)):?>
                            <a class="nav-link active navbar-text" aria-current="page" href="<?php echo $_SERVER['PHP_SELF'] .'?signout=99'?>">Signout</a>
                            <?php else: ?>
                             <!-- <a class="nav-link active navbar-text" aria-current="page" href="login.php">Login</a> -->
                             <?php endif;?>
                        </li>
                        <li class="nav-item px-2 mt-1">
                            <a class="nav-link navbar-text" href="search.php"><i class="fa-solid fa-magnifying-glass glass"></i></a>
                        </li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle navbar-text" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Currency:USD
                            </a>
                            <ul class="dropdown-menu border-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">EGP</a></li>
                                <li><a class="dropdown-item" href="#">AED</a></li>
                                <li><a class="dropdown-item" href="#">SAR</a></li>
                            </ul>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link cart-edit navbar-text" href="#"><i class="fa-solid fa-cart-shopping"></i>
                                My Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row d-flex bg-white justify-content-center test rounded-pill searchbar pb-5">
            <form class="d-flex search-edit border rounded-pill">
                <input class="form-control-plaintext font1" type="search" placeholder="Search Here What You Need..."
                    aria-label="Search">
                <button class="border-start" type="submit"><i class="fa-solid fa-magnifying-glass glass"></i></button>
            </form>
        </div>
        <div class="container-fluid footer-bg pt-4 mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-1 col-sm-1 col-md-1 col-lg-2 text-start mb-2">
                        <p class="font2 text-white mt-1">Fashion</p>
                    </div>
                    <div class="col-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 text-end px-0">
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Home</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Women</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Men</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Footwear</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Accessories</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Sales</a>
                        <a class="text-decoration-none px-sm-1 px-lg-2 links text-wrap font3" href="#">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://fashionmagazine.com/wp-content/uploads/2019/03/2019-03-06-1.jpg"
                    class="d-block w-100 images" alt="..." height="580">
                <div class="carousel-caption d-sm-block d-md-block caption w-25 top-50 start-50 translate-middle h-25">
                    <h6 class="text-uppercase mt-3">Something is Better</h6>
                    <h1 class="text-uppercase h1 fs-3">fashion lorem</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://t4.ftcdn.net/jpg/03/03/61/39/360_F_303613999_boeluBi6e7QIa47sg2CAxUNT5VUwWuFy.jpg"
                    class="d-block w-100 images" alt="..." height="580">
                <div class="carousel-caption d-sm-block d-md-block caption w-25 top-50 start-50 translate-middle h-25">
                    <h6 class="text-uppercase mt-3">Something is Better</h6>
                    <h1 class="text-uppercase h1 fs-3">fashion lorem</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCxCt5L-PYZV8OBS2fknWZ6nH4oxcTcFLyOg&usqp=CAU"
                    class="d-block w-100 images" alt="..." height="580">
                <div class="carousel-caption d-sm-block d-md-block caption w-25 top-50 start-50 translate-middle h-25">
                    <h6 class="text-uppercase mt-3">Something is Better</h6>
                    <h1 class="text-uppercase h1 fs-3">fashion lorem</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container-fluid bg-white pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 flex-column">
                    <div class="">
                        <img src="https://img.freepik.com/premium-photo/elegant-beautiful-woman-black-dress-hat_149155-3288.jpg?w=2000"
                            alt="" class="img-fluid ps-1">
                        <h5 class="spacing fw-light pt-4">Hot Collection</h5>
                        <h2>New Trend For Women</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam tempore vel sit et minima
                            incidunt suscipit odit ducimus. Asperiores ullam nobis incidunt laudantium eum quidem
                            assumenda fugit optio eos provident!</p>
                        <button type="button"
                            class="btn btn-outline-secondary px-4 mt-3 mx-xxl-0 mb-xl-4 mb-lg-4 mb-md-4 mb-sm-4 mb-4">Shop
                            Now</button>
                    </div>
                </div>
                <div class="col-xxl-5 flex-column">
                    <div>
                        <img src="https://img.freepik.com/premium-photo/elegant-beautiful-woman-black-dress-hat_149155-3288.jpg?w=2000"
                            alt="" class="img-fluid pb-4">
                        <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg" alt=""
                            class="img-fluid pt-3">
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="col-2">
                        <p class="text-center fs-5 hr-font">Featured Items</p>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <ul class="list-unstyled d-inline-flex">
                        <li class="pb-2 px-4"><a href="#" class="footer-font text-decoration-none font4">All</a></li>
                        <li class="pb-2 px-4"><a href="#" class="footer-font text-decoration-none font4">Men</a></li>
                        <li class="pb-2 px-4"><a href="#" class="footer-font text-decoration-none font4">Women</a></li>
                        <li class="pb-2 px-4"><a href="#" class="footer-font text-decoration-none font4">Kids</a></li>
                    </ul>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-3">
                    <?php foreach($cars as $car):?>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <a href="">
                            <?php
                        $url = "images/" . $car['image'];
                        echo "<img src='$url' class='card-img-top image-hover' alt='...'>"
                        ?>
                                    <!-- class="card-img-top image-hover" alt="..."> -->
                                    <div class="hide">
                                        <i class="fa-solid fa-eye fa-2x eye-color"></i>
                                    </div>
                            </a>
                            <div class="card-img-overlay card2 top-0 end-50 pb-4 pt-2">
                                <h5 class="card-title text-white card-font fw-bold">$<?php echo $car['price'] ?></h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $car['brand'].'/'. $car['model'] ?></h5>
                                <div class="mt-3">
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-cart-shopping"></i></i></a>
                                    <a href="" class="btn border-secondary rounded-circle"><i
                                            class="fa-solid fa-share-nodes"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex mb-5">
        <div class="col-6">
            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-6">
            <img src="https://img.freepik.com/premium-photo/elegant-beautiful-woman-black-dress-hat_149155-3288.jpg?w=2000"
                alt="" class="img-fluid">
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row pt-4">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2">
                    <p class="text-center fs-5 hr-font">Trending Items</p>
                </div>
                <div class="col-5">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-4 g-3">
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-img-overlay card2 top-0 end-50 pb-4 pt-2">
                                <h5 class="card-title text-white card-font fw-bold">$150.00</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Suspendisse et.</h5>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <div class="mt-3">
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-cart-shopping"></i></i></a>
                                    <a href="" class="btn border-secondary rounded-circle"><i
                                            class="fa-solid fa-share-nodes"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-img-overlay card2 top-0 end-50 pb-4 pt-2">
                                <h5 class="card-title text-white card-font fw-bold">$150.00</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Suspendisse et.</h5>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <div class="mt-3">
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-cart-shopping"></i></i></a>
                                    <a href="" class="btn border-secondary rounded-circle"><i
                                            class="fa-solid fa-share-nodes"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-img-overlay card2 top-0 end-50 pb-4 pt-2">
                                <h5 class="card-title text-white card-font fw-bold">$150.00</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Suspendisse et.</h5>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <div class="mt-3">
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-cart-shopping"></i></i></a>
                                    <a href="" class="btn border-secondary rounded-circle"><i
                                            class="fa-solid fa-share-nodes"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-img-overlay card2 top-0 end-50 pb-4 pt-2">
                                <h5 class="card-title text-white card-font fw-bold">$150.00</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Suspendisse et.</h5>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <div class="mt-3">
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <a href="" class="btn border-secondary rounded-circle me-2"><i
                                            class="fa-solid fa-cart-shopping"></i></i></a>
                                    <a href="" class="btn border-secondary rounded-circle"><i
                                            class="fa-solid fa-share-nodes"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center my-5">
                    <a href="" class="btn border-secondary px-4">Load More</a>
                </div>
            </div>
        </div>
    </div>
    <div class="image-background">
        <div class="text-center pb-1">
            <i class="fa-solid fa-quote-left mt-5 fa-2x quote-icon"></i>
            <div class="text-center mx-5 px-5 mb-5 mt-4 pb-5">
                <p class="text-white text-wrap mx-5 px-5 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Perferendis minima debitis accusantium excepturi architecto maxime non dolor? Molestias quibusdam
                    accusamus magni, est quidem</p>
                <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg" alt="" class="mb-1 mt-5"
                    height="75">
                <p class="text-white pt-0 mb-0 text-uppercase">md shahin alam</p>
                <p class="text-white pt-0">Ceo Of TTCM</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row pt-4">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2">
                    <p class="text-center fs-5 hr-font">Latest Blog</p>
                </div>
                <div class="col-5">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">Some Headline Here</h3>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, autem dicta,
                                    pariatur nesciunt ipsam inventore quibusdam tempore accusamus aut assumenda
                                    reiciendis eveniet sunt, quidem saepe aliquid sed molestias qui nemo.</p>
                                <div class="mt-3">
                                    <button class="btn border-secondary px-4">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">Some Headline Here</h3>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, autem dicta,
                                    pariatur nesciunt ipsam inventore quibusdam tempore accusamus aut assumenda
                                    reiciendis eveniet sunt, quidem saepe aliquid sed molestias qui nemo.</p>
                                <div class="mt-3">
                                    <button class="btn border-secondary px-4">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-md-2 border-0">
                            <img src="https://manofmany.com/wp-content/uploads/2019/04/David-Gandy.jpg"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">Some Headline Here</h3>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, autem dicta,
                                    pariatur nesciunt ipsam inventore quibusdam tempore accusamus aut assumenda
                                    reiciendis eveniet sunt, quidem saepe aliquid sed molestias qui nemo.
                                <div class="mt-3">
                                    <button class="btn border-secondary px-4">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center my-5">
                    <a href="" class="btn border-secondary px-4">Load More</a>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-2">
                    <p class="text-center fs-5 hr-font">Shop By Brand</p>
                </div>
                <div class="col-5">
                    <hr>
                </div>
                <div class="col-3">
                    <img src="https://logonoid.com/images/themeforest-logo.png" alt="" class="img-fluid">
                </div>
                <div class="col-3">
                    <img src="https://logonoid.com/images/themeforest-logo.png" alt="" class="img-fluid">
                </div>
                <div class="col-3">
                    <img src="https://logonoid.com/images/themeforest-logo.png" alt="" class="img-fluid">
                </div>
                <div class="col-3">
                    <img src="https://logonoid.com/images/themeforest-logo.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid footer-color pt-5 px-0" id="footer">
            <div class="container pt-5">
                <div class="row justify-content-evenly">
                    <div class="col-lg-2 offset-lg-1 col-sm-6 col-md-6 col-7 ms-5 flex-column">
                        <div>
                            <h5 class="h5 fw-bold text-white text-uppercase pb-3">shops
                            </h5>
                            <ul class="list-unstyled">
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">New In</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Women</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Men</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Schuhe
                                        Shoes</a>
                                </li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4 text-nowrap">Bags &
                                        Accessories</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Top
                                        Brands</a>
                                </li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4 text-nowrap">Sale & Special
                                        Offers</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Lookbook</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-md-4 col-9 offset-1 flex-column pb-3 pb-sm-0 ms-auto ms-sm-0">
                        <div>
                            <h5 class="h5 fw-bold text-white text-uppercase pb-3">information
                            </h5>
                            <ul class="list-unstyled">
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">About us</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Customer
                                        Service</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">New
                                        Collection</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Best
                                        Sellers</a>
                                </li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4">Manufactures</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Privacy
                                        Policy</a>
                                </li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4 text-nowrap">Terms &
                                        Conditions</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-5 col-md-5 col-7 offset-1 flex-column pb-3 pb-sm-0 ms-sm-5">
                        <div>
                            <h5 class="h5 fw-bold text-white text-uppercase pb-3 text-nowrap">customer service
                            </h5>
                            <ul class="list-unstyled">
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Search
                                        Terms</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Advanced
                                        Search</a></li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4 text-nowrap">Orders And
                                        Returns</a></li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Contact
                                        Us</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">RSS</a></li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4 text-nowrap">Help & FAQs</a>
                                </li>
                                <li class="pb-2"><a href="#"
                                        class="footer-font text-decoration-none font4">Consultant</a>
                                </li>
                                <li class="pb-2"><a href="#" class="footer-font text-decoration-none font4">Store
                                        Locations</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-md-4 col-7 offset-1 flex-column pb-3 pb-sm-0 ms-sm-6">
                        <div>
                            <h5 class="h5 fw-bold text-white text-uppercase pb-2">newsletter
                            </h5>
                            <ul class="list-unstyled">
                                <li class="pb-3">
                                    <p class="footer-font text-decoration-none text-nowrap font4">Sign Up For News
                                        Letter</p>
                                </li>
                                <li class="pb-3">
                                    <form action="">
                                        <input type="text" placeholder="Type Your E-mail"
                                            class="mb-2 w-100 text-center bg-transparent border border-1">
                                        <button type="submit" class="w-100 sub-button">Subscribe</button>
                                    </form>
                                </li>
                            </ul>
                            <div
                                class="row flex-row pt-lg-1 py-2 py-lg-0 justify-content-xxl-center justify-content-lg-evenly me-2">
                                <div
                                    class="col-xl-2 col-lg-1 col-md-2 col-sm-2 col-3 resize px-sm-3 ps-md-4 px-xl-2 ps-lg-2">
                                    <a href="https://facebook.com" target="blank"> <i
                                            class="fa-brands fa-square-facebook fa-2x font4"></i> </a>
                                </div>
                                <div class="col-xl-2 col-lg-1 col-md-2 col-sm-2 col-2 px-sm-3 ps-md-4 px-xl-2 ps-lg-3">
                                    <a href="https://behance.net" target="blank"> <i
                                            class="fa-brands fa-square-behance fa-2x font4"></i> </a>
                                </div>
                                <div class="col-xl-2 col-lg-1 col-md-2 col-sm-2 col-2 px-sm-3 ps-md-4 px-xl-2 ps-lg-3">
                                    <a href="https://vimeo.com" target="blank"> <i
                                            class="fa-brands fa-vimeo fa-2x font4"></i> </a>
                                </div>

                                <div class="col-xl-2 col-lg-1 col-md-2 col-sm-2 col-2 px-sm-3 ps-md-4 px-xl-2 ps-lg-3">
                                    <a href="https://twitter.com/home?lang=en" target="blank"> <i
                                            class="fa-brands fa-square-twitter fa-2x font4"></i> </a>
                                </div>

                                <div class="col-xl-2 col-lg-1 col-md-2 col-sm-2 col-2 px-sm-3 ps-md-4 px-xl-2 ps-lg-3">

                                    <a href="https://www.youtube.com/" target="blank"> <i
                                            class="fa-brands fa-square-youtube fa-2x font4"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-bg">
            <div class="container pt-3 px-xxl-4 px-xl-4 px-lg-5 px-md-4 d-flex">
                <div class="col-xxl-6 col-xl-4 col-lg-6 col-md-4 col-sm-4 col-4">
                    <p class="px-xxl-4 offset-1 font5">© 2014 ELLA Fashion Store Shopify. All Rights Reserved. Ecommerce
                        Software by Shopify.</p>
                </div>
                <div
                    class="col-xxl-6 col-xl-8 col-lg-6 col-md-8 px-md-4 px-sm-4 col-sm-8 col-8 px-4 text-end footer-padding">
                    <a href="#" class="footer-font font-resize text-decoration-none font5 px-2">VISA</a>
                    <a href="#" class="footer-font font-resize text-decoration-none font5 px-2">Master Card</a>
                    <a href="#" class="footer-font font-resize text-decoration-none font5 px-2">PayPal</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>