<!DOCTYPE HTML>  
    <html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>  
        <?php
            $nameErr = $emailErr = "";
            $name = $email = $comment = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {  
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                } else {
                    $name = test_input($_POST["name"]);
                }
            
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } elseif (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                } else {
                    $email = test_input($_POST["email"]);
                }

                if (empty($_POST["comment"])) {
                    $comment = "";
                } else {
                    $comment = test_input($_POST["comment"]);
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <div class="container-fluid">
            <h2>PHP Form</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" name="name" class="form-control" id="nameInputEmail1" aria-describedby="nameHelp" placeholder="Enter Name">
                    <div class="text-danger"><?php echo $nameErr;?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <div class="text-danger"><?php echo $emailErr;?></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <textarea name="comment" class="form-control" id="commentFormControlTextarea" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button><br><br>
            </form>
            <?php
                if ($nameErr === "" && $emailErr === "") {
                    echo "<h2>Your Input:</h2>";
                    echo "Name: $name";
                    echo "<br>";
                    echo "Email: $email";
                    echo "<br>";
                    echo "Comment: $comment";
                }
            ?>
        </div>
    </body>
</html>

