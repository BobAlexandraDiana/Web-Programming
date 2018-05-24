<?php

    session_start();
    $con = mysqli_connect("localhost","BobAlexandraDiana","abc","Recipes");
    if (!$con) {
        die('Could not connect: ' . mysqli_error());
    }

?>

<!doctype html>
<html>
<head>
    <title>Recipes</title>
    <style>
        #header
        {
            position:absolute;
            width:100%;
            top:0;
        }
        .main
        {
            position:absolute;
            top:0;
            width:100%;
            height: 2000px;
            background-color: #ffeee6;
        }
    </style>
</head>
<body>
    <div class="main">
    <div> 
        <img src="food.jpeg" id="header">
    </div>
    <?php

        $result = mysqli_query($con, "SELECT * FROM RECIPES");
        echo "<table>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "<td>" . $row['Ingredients'] . "</td>";
            echo "<td>" . $row['Time'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);

    ?> 
    </div>
</body>
</html>
