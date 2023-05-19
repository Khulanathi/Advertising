<?php
    session_start();
   include('connect.php');

   $query = "SELECT * FROM products ORDER BY p_id DESC";
   $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="Home,Profile.css">
        <script src="https://kit.fontawesome.com/ccec6b3bca.js" crossorigin="anonymous"></script>

    </head>

    <header class="header">
        <div class="nav1">
            <div class ="image">
              <?php
                    if (isset($_SESSION['id'])){
                        $name = $_SESSION['name'];
                        echo '<a href ="Home.php"><h2>Welcom ' .$name . '</h2></a>';
                    }
                    else{
                        echo "Today Date";
                    }


                ?>
            </div>

            <div class="timeHelp">
                <?php
                    if (isset($_SESSION['id'])){
                        echo '<div class="help"><a href="Add.php"><i class="fa-solid fa-plus"></i> Add</a></div>';
                        echo '<div class="help"><a href="Logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></div>';
                        echo '<div class="help"><a href="http://" target="_blank"><i class="fa-solid fa-circle-info"></i> Help?</a></div>';
                    }else{
                        echo '<div class="help"><a href="Signup.php"><i class="fa-solid fa-user-plus"></i> Sign-Up</a></div>';
                        echo '<div class="help"><a href="Login.php"><i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i> Login</a></div>';
                        echo '<div class="help"><a href="http://" target="_blank"><i class="fa-solid fa-circle-info"></i> Help?</a></div>';
                    }
                ?>
                
            </div>

        </div>
  
        <div class="nav2">
            <div class="empDiv">
                <?php
                if(isset($_SESSION['id'])){
                    echo '<div class="div1">
                    <a href="Profile.php"><i class="fa-solid fa-user"></i> Profile</a>
                    </div>';

                    echo '<div class="div1"> </div>';
                }else{
                    echo '<div class="div1"></div>
                    <div class="div1"></div>';
                }

                ?>
            </div>
            
            <div class="beauty">
                <h2><i>The Beauty Product Hub</i></h2>
            </div>

            <div class="navSearch">
                <div class="search">
                    <input type="search" name="search" value="" placeholder="Search..." class="input" />
                    <button type="submit" class="buttonSubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
            
        </div>
    </header>


    <body>
        <div>
            <h2><i>Beauty Products</i></h2>
        <br>
        
        <div class="inputBarier">
            <div class="CategoryContainer">
                <div class="cateLabel">
                    <label for="category" class="labels" title="Product Category">Filter products by: </label>
                </div>

                <div class="cateOptions">
                    <select name="category" id="category" >
                        <optgroup label="Product Category">
                            <option value="">All</option>
                            <option value="Oral Care">Oral Care</option>
                            <option value="Skin Care">Skin Care</option>
                            <option value="Hair Care">Hair Care</option>
                            <option value="Body Care">Body Care</option>
                            <option value="Makeup">Makeup</option>
                            <option value="Fragrance">Fragrance</option>
                            <option value="Other">Other</option>
                        </optgroup>
                    </select>
                </div>

            </div>
        </div>
        
        <br>
        <?php
            
            
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="contentContainer">';
                echo '<div class="content">';
                echo '<div>Product: '.$row['brand'].' '.$row['name']. '</div>';
                echo '<div>Size: ' .$row['size'].'ml</div>';
                echo '<div>Price: R'.$row['price']. '</div>';
                echo '<div>Category: '.$row['category']. '</div>';
                echo '<div>Website: <a href ="' .$row['website'].'" target="_blank">' .$row['website'] . '</a></div>';
                echo '<div>Ingredients: '.$row['ingredients']. '</div>';
                echo '<div>Description: '.$row['details']. '</div>';
                echo '</div>';
                echo '<div class="contentImg">';
                echo '<img src="" alt="PRODUCT PICTURES">';
                echo '</div>';
                echo '</div>';

    
            }

            mysqli_close($conn);
        ?>
           
        
    </body> 

    <footer>
        <div class="warn">
            <div>
                Please note all products are not sold on this website contact the owner or the stores wesite for further details on their products !!!

            </div>
        </div>
    </footer>
</html>