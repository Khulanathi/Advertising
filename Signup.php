<?php
    session_start();
   include('connect.php');
?>
<!DOCTYPE html>
    <head>
        <title>Sign-Up</title>
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
                    <a href="Login.php"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </div>
                <div class="help">
                    <a href="http://" target="_blank">Help? <i class="fa-solid fa-circle-info"></i> 
                    </a>
                </div>
            </div>

        </div>

        <div class="nav2">
            <div class="beauty">
                <h2><i>Create An Account</i></h2>
            </div>
        </div>
    </header>
    <body>
        
        <br>
        <p>
            <h2><i><b>Sign-Up</b></i></h2>
        </p>
        <br/>

        <div>
            <form action="Signup.php" method="post">
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="text" name="name" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="name" class="labels">Name</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="text" name="surname" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="surname" class="labels"> Surname</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="email" name="email" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="email" class="labels"> Email</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="password" name="password" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="password" class="labels"> Password</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="password" name="rePassword" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="rePassword" class="labels"> Confirm Password</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <input type="submit" name="signup" id="signup"  value ="signup"  placeholder= "Sign-up" required />
                    
                </div>
            </form>

        </div>
        
    </body>
    <footer>
    <div>
            <?php
                if(isset($_POST['signup'])){
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];
                    $password  = $_POST['password'];
                    $repasword = $_POST['rePassword'];

                    if ($password === $repasword){
                        $query ="SELECT * FROM user WHERE email =  '$email' ";
                        $tester = mysqli_query($conn,$query);
                        
                        if(mysqli_num_rows($tester) == 0){

                            if (!empty($name) && !empty($surname) && !empty($email) && !empty($password) ){
                                $sql ="INSERT INTO user (name, surname, email, password) VALUES ('$name','$surname','$email', '$password')";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    echo "Successfully Created";
                                    header("Location: Login.php");
                                }else{
                                    echo "Something went wrong please try again.";
                                }
                            }
                            else{
                                echo "Please make sure no required field is empty";
                            }
                        }else{
                            echo "Email already registered";
                        }                      
                    }
                    else{
                        echo "passwords dont match";
                    }
                    
                } else{
                    echo "Nothing has been set yet";
                }
            ?>
        </div>

    </footer>
</html>