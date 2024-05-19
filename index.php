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
        <a class="btn btn-primary" href="">New Client</a>
        <br>

        <table>
            <thead>
                <tr>ID</tr>
                <tr>Name</tr>
                <tr>Email</tr>
                <tr>Phone</tr>
                <tr>Adrees</tr>
                <tr>Created At</tr>
                <tr>Action</tr>
            </thead>
            <tbody>
                <tr>
                <td>20001</td>
                <td>Elon Mask</td>
                <td>elon.mask@gmail.com</td>
                <td>+9980456826</td>
                <td>New York, USA</td>
                <td>12/07/2005</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="">Edit</a>
                    <a class="btn btn-primary btn-sm" href="">Delete</a>
                </td>
                </tr>
            </tbody>
        </table>

    </div>    
</body>
</html>