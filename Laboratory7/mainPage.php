<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset ($_POST['btn1']))
    {
    header("location: seeAll.php");
    }
    if (isset ($_POST['btn2']))
    {
    header("location: editPage.php");
    }
    if (isset ($_POST['btn3']))
    {
    header("location: addPage.php");
    }
    if (isset ($_POST['btn4']))
    {
    header("location: deletePage.php");
    }
}
?>
<!doctype html>
<html>
<head>
    <title> Main Page </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
            height: 800px;
            background-color: #ffeee6;
        }
        
        #seeAll
        {
            padding: 10px 300px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            font-size: 25px;
            margin-left: 300px;
            margin-top: 300px;
            position: absolute;
        }
        #edit
        {
            padding: 10px 275px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            font-size: 25px;
            margin-left: 300px;
            margin-top: 375px;
            position: absolute;
        }
        #add
        {
            padding: 10px 275px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            font-size: 25px;
            margin-left: 300px;
            margin-top: 450px;
            position: absolute;
        }
        #delete
        {
            padding: 10px 260px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            font-size: 25px;
            margin-left: 300px;
            margin-top: 520px;
            position: absolute;
        }
    </style>
</head>
<body>
<div class="main">
    <div> 
        <img src="food.jpeg" id="header">
    </div>
    <form method= "POST" action="mainPage.php">
    <button id="seeAll" name="btn1">Recipes</button >
    <button id="edit" name="btn2">Edit Recipes</button >
    <button id="add" name="btn3">Add Recipes</button >
    <button id="delete" name="btn4">Delete Recipes</button >
    <form>
</div>


</body>
</html>