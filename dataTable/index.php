<!DOCTYPE HTML>  
    <html>
    <head>
    </head>
    <body> 
        <?php
            require './connectDb.php';
            $sql = "SELECT u.name, u.email, GROUP_CONCAT(distinct(t.name)) team_name
            FROM users u
                INNER JOIN team_users tu
                ON u.id = tu.user_id
                INNER JOIN teams t
                ON t.id = tu.team_id
            GROUP BY u.id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Name</th><th>Email</th><th>Team Name</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["team_name"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
    </body>
</html>