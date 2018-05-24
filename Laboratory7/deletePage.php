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
                $queryStr = "SELECT * FROM RECIPES WHERE Name='" . $recipeName . "' " ;
                $sqlResult = mysqli_query($con, $queryStr);
                if (mysqli_num_rows($sqlResult) == 1) 
                {
                    $queryStrr = "DELETE FROM RECIPES WHERE Name='" . $recipeName . "' " ;
                    mysqli_query($con, $queryStrr);
                }
                else 
                 {
                    echo 'No recipie with that name!';
                 }       
        }
?>

<!doctype html>
<html>
<head>
    <title> Delete </title>
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
            margin-top: 60px;
        }
        label
        {
            position: relative;
            top: 45px;
            margin-left:150px;
        }
        form
        {
            width: 600px;
            margin-top: 350px;
            margin-left:250px;
            padding: 10px 55px 40px;
            border: 15px solid white;
            box-shadow: 0 0 10px;
            border-radius: 2px;
            font-size: 15px;
            height:200px;
        }
        #submit
        {
            padding: 10px 15px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            margin-left: -200px;
            margin-top: 480px;
            position: absolute;
            top: 20px;
        }

    </style>
</head>
<body>
<div class="main">
    <div> 
        <img src="food.jpeg" id="header">
    </div>
    <form method="POST" action="deletePage.php">
    <label>TO BE DELETED RECIPE : </label>
    <input type="text" placeholder="Enter Name" name="nameR">
    <button id="submit" name="del">Delete Recipe </button >
    </form>

</div>

</body>
</html>