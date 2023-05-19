<?php
    session_start();
   include('connect.php');
?>
<!DOCTYPE html>
    <head>
        <title></title>
        <link rel="stylesheet" href="Add,Login,Signin styles.css">
        <script src="https://kit.fontawesome.com/ccec6b3bca.js" crossorigin="anonymous"></script>

    </head>
    <header>
            <div class="nav1">
                <div class ="image">
                    <a href="Home.php"><i class="fa-solid fa-house"></i> Home</a>
                </div>
    
                <div class="timeHelp">
                    <div class="help">
                        <a href="http://"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout
                        </a>
                    </div>

                    <div class="help">
                        <a href="http://" target="_blank"><i class="fa-solid fa-circle-info"></i> Help?
                        </a>
                    </div>
                </div>

            </div>

            <div class="nav2">
                <div class="beauty">
                    <h2><i>The Beauty Product Hub</i></h2>
                </div>
            </div>
    </header>
    <body>
        
        <br>
        <p>
            <h2><i><b>Add a product</b></i></h2>
        </p>
        <br/>

       <div>
            <form action="Add.php" method="post">
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="text" name="brand" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="brand" class="labels"> Product Brand</label>
                    </div>
                </div>

                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="text" name="name" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="name" class="labels"> Product Name</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="text" name="size" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="size" class="labels"> Product Size</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="CategoryContainer">
                        <div class="cateLabel">
                            <label for="category" class="labels" title="Product Category"> Product Category</label>
                        </div>
    
                        <div class="cateOptions">
                            <select name="category" id="category" >
                                <optgroup label="Product Category">
                                    <option value="">Select</option>
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

                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="number" step = 0.01 name="price" class="inputs"  autocomplete= "off" placeholder= " " required />
                        <label for="price" class="labels"> Price</label>
                    </div>
                </div>
    
                <div class="inputBarier">
                    <div class="inputContainer">
                        <input type="url" name="website" class="inputs"  autocomplete= "off" placeholder= " "/>
                        <label for="website" class="labels">Website</label>
                    </div>
                </div>
    
                <div class="descBarier">
                    <div class="descContainer">
                        <label for="description" class="labelz"> Product Description</label>
                        <textarea id="description" name="description" maxlength="320"></textarea>
                    </div>
                </div>
    
                <div class="ingreBarier">
                    <div class="ingreContainer">
                        <label for="Ingredients" class="labels">Product Ingredients</label>
                        <textarea id="Ingredients" name="Ingredients" maxlength="400"></textarea>
                    </div>
                </div>
    
             <!--IMAGE DRAG AND DROP--> 
               <div class="body-img">
                    <div class="wrapper">
                        <div class="box">
                            <div class="input-bx">
                                <h2 class="upload-area-title">Upload Images</h2>
                                
                                    <input type="file" id="upload" accept="image/*" multiple hidden>
                                    <label for="upload" class="uploadLabel">
                                        <span><i class="fa-solid fa-upload"></i></span>
                                        <p>Click To Upload</p>
                                    </label>
                              
                            </div>

                            <div id="filewrapper">
                                <h3 class="uploaded"> Uploaded Pictures</h3>
                                <div id="queued-div"></div>
                            </div>
                        </div>
                </div>
               </div>
                <!--IMAGE DRAG AND DROP-->
               
               <div class="inputBarier">
                    <input type="submit" name="add" id="add" value="add" placeholder="Add" required/>
                    
                </div>
            </form>
        </div>
    <script src="add_script.js"></script>
    </body>
    <footer>
        <div>
        <?php
            if(isset($_POST['add'])){

                $user_email = $_SESSION['email'];
                $brand = $_POST['brand'];
                $name = $_POST['name'];
                $size = $_POST['size'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $website = $_POST['website'];
                $description = $_POST['description'];
                $ingredients = $_POST['Ingredients'];

                if (!empty($name) && !empty($brand) && !empty($size) && !empty($category) && !empty($price) && !empty($category) && !empty($website)){

                    $sql ="INSERT INTO products (user_email, brand, name, details, ingredients, website, size, price, category) VALUES ('$user_email','$brand','$name','$description', '$ingredients', '$website', '$size', '$price','$category')";
                    $result = mysqli_query($conn, $sql);

                    if($result){
                        echo "Successfully Created";
                    }else{
                        echo "Something went wrong please try again.";
                    }

                }else{
                    echo "A field is empty";
                }

            }else{
                echo  "Try again";
            }
        ?>
        </div>
    </footer>
</html>