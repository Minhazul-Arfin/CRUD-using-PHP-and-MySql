<?php

    // Connecting to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud";

    // creating connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Initializing variables with empty values
    $id = "";
    $name = "";
    $phone = "";
    $email = "";
    $address = "";
    
    $errorMessage = "";
    $successMessage = "";

    // checking if request received from GET Method
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // GET METHOD: show the data of the client

        if(!isset($_GET["id"])){
            header("location:/crud/index.php");
            exit;
        }

        $id = $_GET["id"];

        // read the row of the selected id of client from data table
        $sql = "select * from clients where id = $id";
        $result = $connection -> query($sql);
        $row = $result -> fetch_assoc();

        // if data not found, redirect to the index page
        if(!$row){
            header("location:/index.php");
            exit;
        }

        // otherwise read the data
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
    }
    else{
        // POST Method: update the data of the client
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do{

            // checking if any empty fields are inserted or not
            if(empty($name) || empty($phone) || empty($email) || empty($address)){
                $errorMessage = "All the fields are required!";
                break;
            }
            
            // if nothing empty then update data
            $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = '$_GET[id]' ";
            // echo $sql;
            $result = $connection -> query($sql);

            // chcking sql query executed correctly or not
            if(!$result){
                $errorMessage = "Invalid Query: " . $connection -> error;
                break;
            }

            $successMessage = "Client Updated Successfully!";

        }while(false);

        header("location:/index.php");
        exit;
    }   

?>

<!-- HTML Structure -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Edit Client</h2>

        <!-- Show Error Message if Empty field submitted -->
        <?php
            if(!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
        ?>

        <form method="post">
            <!-- catching id of edit customer -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- Name Input Field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name?>">
                </div>
            </div>

            <!-- Email Input Field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email?>">
                </div>
            </div>
            
            <!-- Phone Input Field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone?>">
                </div>
            </div>

            <!-- Address Input Field -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address?>">
                </div>
            </div>

            <!-- Show Success Message if everything ok -->
            <?php
                if(!empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                    ";
                }
            ?>


            <!-- Submit and Cancel Button -->
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/index.php" class="btn btn-outline-secondary" role="button">Back to Home</a>
                </div>
            </div>

        </form>
    </div>
    
</body>
</html>