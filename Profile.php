<?php
    session_start();
   include('connect.php');
?>
<!DOCTYPE html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="Home,Profile.css">
    <script src="https://kit.fontawesome.com/ccec6b3bca.js" crossorigin="anonymous"></script>

</head>

<header>
    <div class="nameProfile">
        <div><i class="fa-regular fa-user"></i></div>
       <div>
        <?php
            if (isset($_SESSION['id'])){
                $name = $_SESSION['name'];
                $surname = $_SESSION['surname'];
                echo "$name $surname";
            }
        ?>
    </div>
    </div>
</header>

<body>
    <div class="ProfileDetails">
        <div class="profileList"><a href="Home.php"><i class="fa-solid fa-house"></i> Home</a></div>
        <div class="profileList"><i class="fa-regular fa-eye"></i> All Products</div>
        <div class="profileList"><i class="fa-sharp fa-regular fa-credit-card"></i> Change Card Details</div>
        <div class="profileList"><a href="Add.php"><i class="fa-solid fa-plus"></i> Add Product</a></div>
        <div class="profileList"><a href="Logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>
    </div>
</body>

</html>