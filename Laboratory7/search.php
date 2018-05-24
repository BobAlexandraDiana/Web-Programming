<?php
         session_start();
         $con = mysqli_connect("localhost","BobAlexandraDiana","abc","Recipes");
         if (!$con) {
             die('Could not connect: ' . mysqli_error());
         }
        $namee= $_GET['filterr'];
        $result = mysqli_query($con, " SELECT Name, Description, Ingredients, Time FROM RECIPES WHERE Name= '" . $namee . "' ");
       
        $datee= date("Y/m/d");
        $queryIns = "INSERT INTO Logs(SearchWord, Date) VALUES ( '$namee ', '$datee') ";
        mysqli_query($con, $queryIns);

        $response=[];
        while($row = mysqli_fetch_array($result)){
            array_push($response, $row);
            //echo json_encode($row);
        }
            echo json_encode($response);
            
           /* json_encode(array(
                'name' => $row['Name'],
                'description' => $row['Description'],
                'ing' => $row['Ingredients'],
                'time'=> $row['Time']
            ));*/
           /* echo '<div style="background-color: #ffcbb3; 
                width:1200px; 
                height: 280px; 
                border: 1px solid white; 
                border-radius: 4px; 
                margin-top: 250px ;
                margin-left: 30px;"> ';
            echo '<p style="font-size:30px; font-style: italic; margin-left: 350px; color: white;">' . $row['Name'] . '</p>';
            echo "<br>";
            echo '<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' . $row['Description'] . '</p>';
            echo "<br>";
            echo '<p style="font-size:20px; font-style: italic; margin-left: 30px; margin-top: -30px;"> Ingredients </p>';
            echo "<br>";
            echo '<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' . $row['Ingredients'] . '</p>';
            echo "<br>";
            echo '<p style="font-size:20px; font-style: italic; margin-left: 30px; margin-top: -30px;"> Estimated time </p>';
            echo "<br>";
            echo '<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' . $row['Time'] . '</p>';
            echo "<div>";*/
        
        mysqli_close($con);
?> 