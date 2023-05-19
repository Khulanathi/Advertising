<?php
    session_start();
   include('connect.php');
?>

<!DOCTYPE html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="Add,Login,Signin styles.css">
        <script src="https://kit.fontawesome.com/ccec6b3bca.js" crossorigin="anonymous"></script>

    </head>

    <header>
        <div class="nav1">
            <div class ="image">
                <a href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
            </div>

            <div class="timeHelp">
                <div class="date">Todays date</div>
                <div class="help">
                    <a href="Signup.php"><i class="fa-solid fa-user-plus"></i>Signup</a>
                </div>
                <div class="help">
                    <a href="http://" target="_blank"><i class="fa-solid fa-circle-info"></i>  Help?</a>
                </div>
            </div>

        </div>

        <div class="nav2">
            <div class="beauty">
                <h2><i>Already Hava An Account</i></h2>
            </div>
        </div>
    </header>

    <body>
    <br/>
        <p>
            <h2><i><b>Login</b></i></h2>
        </p>
    <br/>

        <div>
            <form action="Login.php" method="post">
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="email" name="email" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="email" class="labels">Email</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="password" name="password" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="password" class="labels">Password</label>
                    </div>
                </div>

                <div class="inputBarier">
                    <input type="submit" name="login" id="login"  value ="login"  placeholder= "Login" required />
                </div>
            </form>
        </div>
    </body>
    <footer>
        <div>
            <?php
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password  = $_POST['password'];
                
                if(!empty($email) && !empty($password) && !is_numeric($email)){
                    $query = "select * from user where email = '$email' limit 1";
			        $result = mysqli_query($conn, $query);

                    if($result) {
                        if($result && mysqli_num_rows($result) > 0){

                            $user_data = mysqli_fetch_assoc($result);
                            
                            if($user_data['password'] === $password){

                                $_SESSION['id'] = $user_data['id'];
                                $_SESSION['email'] = $user_data['email'];
                                $_SESSION['name'] = $user_data['name'];
                                $_SESSION['surname'] = $user_data['surname'];
                                $nameUser=$user_data['name'];
                                // $mail = $user_data['email'];
                                // $mailz = $_SESSION['email'];
                                header("Location: Home.php");
                                echo"welcom $nameUser";
                                die;
                            } else{
                                echo"wrong password";
                                echo "<script type='text/jevascript'>alert('Incorrect password');
                                document.location='Login.php</script>";
                            }


                        } else{
                            echo "user was not found";
                        }

                    } else {
                        echo "User not found";
                    }

                } else {
                    echo "Empty fields detected";
                }

            } else {
                echo "Nothing has been set yet";
            }
            ?>
        </div>
    </footer>
</html>