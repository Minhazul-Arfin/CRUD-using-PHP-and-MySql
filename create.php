<!-- PHP Codes Here -->
<?php

    // Connecting to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud";

     // creating connection
     $connection = new mysqli($servername, $username, $password, $database);


    // Initializing variables with empty values
    $name = "";
    $phone = "";
    $email = "";
    $address = "";
    
    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do{
            if(empty($name) || empty($phone) || empty($email) || empty($address)){
                $errorMessage = "All the fields are required!";
                break;
            }

            // IF all fields are valid, adding new clients

            $sql = "INSERT INTO clients (name, email, phone, address)" . 
                    "VALUES('$name', '$email', '$phone', '$address')";

            $result = $connection -> query(($sql));

            if(!$result){
                $errorMessage = "Invalid Query: " . $connection -> error;
                break;
            }

            $name = "";
            $phone = "";
            $email = "";
            $address = "";

            $successMessage = "Client added successfully";

        }while(false);
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
        <h2>Create New Client</h2>

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