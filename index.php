<?php
    session_start(); 
?>
<!DOCTYPE HTML>  
    <html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body> 
        <div class="container-fluid">
            <h2>PHP Form</h2>
            <form method="post" action="/formValidation.php">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="nameInputEmail1" aria-describedby="nameHelp" placeholder="Enter Name">
                    <div class="text-danger"><?php echo $_SESSION["nameErr"];?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <div class="text-danger"><?php echo $_SESSION["emailErr"];?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <textarea name="comment" class="form-control" id="commentFormControlTextarea" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button><br><br>
            </form>
        </div>
        <?php
            unset($_SESSION['nameErr']);
            unset($_SESSION['emailErr']);
            require './connectDb.php';
            $sql = "SELECT id, fullname, email, comment FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h1>id: " . $row["id"]. " - Name: " . $row["fullname"]. " - Email: " . $row["email"]. " - Comment: " . $row["comment"] . "</h1><br>";
                }
            } else {
                echo "<h1>0 results</h1>";
            }
            $conn->close();
        ?>
    </body>
</html>