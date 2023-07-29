<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="cphonebookstyle.css" rel="stylesheet" type="text/css">
    <title>Adventurer Log Phonebook</title>
    
    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup",function(){
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function(){
                    $(this).toggle($(this).find('td:nth-child(2)').text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>



</head>
<body>
    <a href="bacantoweb.php" class="logo">
<img src="ALlogo.png" alt>
    </a>
<div id="center-overlay">
        <img src="cpbbg.png" alt="Center Overlay Image">
    </div>
    <div class="container my-5">
        <h2>Phonebook Contacts</h2>
        <a class="btn btn-primary" href="contactcreate.php" role="button">New Contact</a>
        <br>
       


        <div class="my-3"></div>
        <div class="form-group">
            <input type="text" id="searchInput" placeholder="Search..." class="form-control">
        </div>
        <div class="my-3"></div>


        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email Address</th>
                    <th>Address</th>
                    <th>Notes</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody id="myTable">

                <?php
                    $servername= "localhost";
                    $username = "id21003525_dominique";
                    $password = "CDominique_826";
                    $database ="id21003525_credentials";

                    //Connection pi sa data base uwu - cduminek
                    $connection = new mysqli($servername, $username, $password, $database);

                    //Verify connection
                    if($connection->connect_error){
                        die("Connection Failed: ".$connection->connect_error);
                    }

                    //Read all row from the data base lamesa
                    $sql = "SELECT * FROM dcontacts";
                    $result = $connection->query($sql);


                    if(!$result){
                        die("Invalid query: ". $connection->error);
                    }

                    //basa data sa bawat row 
                    while($row = $result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[id]</td>
                        <td>$row[user_name]</td>
                        <td>$row[phone_num]</td>
                        <td>$row[email_add]</td>
                        <td>$row[address]</td>
                        <td>$row[notes]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='contactedit.php?id=$row[id]'>EDIT</a>
                            <a class='btn btn-primary btn-sm' href='contactdelete.php?id=$row[id]'>DELETE</a>
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