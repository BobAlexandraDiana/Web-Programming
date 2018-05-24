<?php
    session_start();
    $con = mysqli_connect("localhost","BobAlexandraDiana","abc","Recipes");
    if (!$con) 
        {
        die('Could not connect: ' . mysqli_error());
        }
    if ( $_SERVER['REQUEST_METHOD'] == 'POST')
        {       
                $recipeName = $_POST['nameR'];
              
                $recipeCat = $_POST['category']; 
                $recipeDesc = $_POST['Description'];
                $recipeIng = $_POST['ingredients'];
                $recipeTime =(int) $_POST['time'];
                
                echo $recipeName;
                echo $recipeCat;
                echo $recipeIng;
                echo $recipeTime;

                $queryIns = "INSERT INTO RECIPES(Category, Name, Description, Ingredients, Time) VALUES ( '$recipeCat ', '$recipeName' ,  '$recipeDesc' , '$recipeIng' , $recipeTime ) ";
                $res= mysqli_query($con, $queryIns);
      }
?>
<!doctype html>
<html>
<head>
    <title> Add </title>
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
            height: 900px;
            background-color: #ffeee6;
        }
        input[type=text]
        {   
            width: 300px;
            padding: 12px 20px;
            margin: 8px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-left: 150px;
            margin-top: 40px;
        }
        label
        {
            position: relative;
            top: 35px;
            margin-left:150px;
        }
        form
        {
            width: 600px;
            margin-top: 250px;
            margin-left:250px;
            padding: 10px 55px 40px;
            border: 15px solid white;
            box-shadow: 0 0 10px;
            border-radius: 2px;
            font-size: 15px;
            height:500px;
        }
        #submit
        {
            padding: 10px 15px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            margin-left: -220px;
            margin-top: 680px;
            position: absolute;
            top: 50px;
        }

    </style>
</head>
<body>
<div class="main">
    <div> 
        <img src="food.jpeg" id="header">
    </div>
    <form method="POST" action="addPage.php">
    <input type="text" placeholder="Enter Name" name="nameR">
    <input type="text" placeholder="Enter Category" name="category">
    <input type="text" placeholder="Enter Description" name="Description">
    <input type="text" placeholder="Enter Ingredients" name="ingredients">
    <input type="text" placeholder="Enter Time" name="time">
    <button id="submit" name="btn1">Add Recipe </button >
    </form>

</div>

</body>
</html>