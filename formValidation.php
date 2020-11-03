<?php
    session_start();
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

    header("Location: /");

    if ($nameErr === "" && $emailErr === "") {
        require './connectDb.php';
        $sql = "INSERT INTO users (fullname, email, comment)
        VALUES ('$name', '$email', '$comment')";

        if ($conn->query($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $_SESSION["nameErr"] = $nameErr;
        $_SESSION["emailErr"] = $emailErr;
    }
?>
