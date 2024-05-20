<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD using PHP and MySql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-success" href="/create.php">Add New Client</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adrees</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP Stated here -->
                <!-- Database Connection -->
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "crud";

                    // creating connection
                    $connection = new mysqli($servername, $username, $password, $database);

                    // checking connection
                    if($connection -> connect_error){
                        die("Connection Failed: " . $connection->connect_error);
                    }


                    // reading data from database
                    $sql = "select * from clients";
                    $result = $connection->query($sql);

                    if(!$result){
                        die("Invalid Query: " . $connection->error);
                    }

                    // reading data from each row
                    while($row = $result -> fetch_assoc()){
                        echo "
                            <tr>
                                <td>$row[id]</td>
                                <td>$row[name]</td>
                                <td>$row[email]</td>
                                <td>$row[phone]</td>
                                <td>$row[address]</td>
                                <td>$row[created_at]</td>
                                <td>
                                    <a class='btn btn-secondary btn-sm' href='/CRUD/edit.php?id=$row[id]'>Edit</a>
                                    <a class='btn btn-outline-danger btn-sm' href='/CRUD/delete.php?id=$row[id]'>Delete</a>
                                </td>
                            </tr>
                        ";
                    }

                ?>

            </tbody>
        </table>

    </div>    
</body>
</html>