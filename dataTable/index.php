<!DOCTYPE HTML>  
    <html>
    <head>
    </head>
    <body> 
        <?php
            require './connectDb.php';
            $sql = "SELECT users.name, email, teams.name team_name
            FROM users
            INNER JOIN teams
            WHERE users.team_id = teams.id";

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