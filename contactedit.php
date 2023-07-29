<?php

$servername= "localhost";
$username = "id21003525_dominique";
$password = "CDominique_826";
$database ="id21003525_credentials";

$connection = new mysqli($servername, $username, $password, $database);


    $id= "";
    $user_name = "";
    $phone_num = "";
    $email_add = "";
    $address = "";
    $notes = "";
    $errorMessage = "";
    $successMessage = "";


    if($_SERVER['REQUEST_METHOD']== 'GET'){

          // GET Method: Show the data of the contacts pare
      if (!isset ($_GET["id"])) {
        header("location:cphonebook.php");
        exit;
      }
      
      $id = $_GET["id"];

      // read the row of the selected client from database table
      $sql = "SELECT * FROM dcontacts WHERE id=$id";
      $result = $connection->query($sql);
      $row = $result->fetch_assoc();
    
      if (!$row) {
        header("location: cphonebook.php");
        exit;
      }
        $user_name = $row["user_name"];
        $phone_num = $row["phone_num"];
        $email_add = $row["email_add"];
        $address = $row["address"];
        $notes = $row["notes"];

    
}  
    else {
        // POST Method: Sana ol nag uupdate

        $id = $_POST["id"];
        $user_name = $_POST["user_name"];
        $phone_num = $_POST["phone_num"];
        $email_add = $_POST["email_add"];
        $address = $_POST["address"];
        $notes = $_POST["notes"];

        do{
            if (empty($id) || empty($user_name) || empty($phone_num) || empty($email_add)|| empty($address)|| empty($notes)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE dcontacts " . 
            "SET user_name='$user_name', phone_num='$phone_num', email_add='$email_add', address='$address', notes= '$notes' ". 
            "WHERE id = $id";

            $result = $connection->query($sql);


            if(!$result) {
                $errorMessage = "Invalid query: ". $connection->error;
                break;
            }

            $successMessage = "Contacts updated correctly";
            header("location:cphonebook.php");
            exit;

        }while(false);
    }
    





?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"> </script>
    <link href="cphonebookstyle.css" rel="stylesheet" type="text/css">

    <title>Edit Contact List</title>
</head>
<body>
    <div id="center-overlay">
        <img src="cpbbg.png" alt="Center Overlay Image">
    </div>
    <div class="container my-5">
        <h2>Edit Contact</h2>
        
        <?php
        if (!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show'  role='aler'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        } 
        ?>
        <form method="post">
            <input type="hidden" name= "id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>">
                     </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone Number</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone_num" value="<?php echo $phone_num ?>">
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email_add" value="<?php echo $email_add ?>">
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address ?>">
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Notes</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="notes" value="<?php echo $notes ?>">
                    </div>
                </div>

                <?php
                    if( !empty($successMessage)){
                        echo"
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success aler-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>    
                        ";
                    }
                ?>


                <div class="row mb-3">
                     <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a  class="btn btn-primary" href="/cphonebook/cphonebook.php" role="button">Cancel</a>
                </div>
            </div> 
        </form>
    </div>
    
</body>
</html>