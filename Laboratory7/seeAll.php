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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
            height: 3000px;
            background-color: #ffeee6;
        }
        #search
        {
            padding: 5px 15px;
            background-color:  #330000;
            border-radius:4px;
            color: white;
            font-weight: bold;
            margin-left: 600px;
            position: relative;
            top: 225px;
        }
        #category
        {
            position: absolute;
            margin-left:450px;
            top:230px;
        }
        
    </style>
</head>
<body>
    <div class="main">
    <div> 
        <img src="food.jpeg" id="header">
    </div>
    <input type="text" placeholder="Enter category" id="category">
    <button id="search">SEARCH</button >
    <p id ="sh"></p>

    <?php
        $result = mysqli_query($con, "SELECT * FROM RECIPES");
       
        while($row = mysqli_fetch_array($result)){
            echo '<div style="background-color: #ffcbb3; 
                width:1200px; 
                height: 280px; 
                border: 1px solid white; 
                border-radius: 4px; 
                margin-top: 250px ;
                margin-left: 0px;"> ';
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
            echo "<div>";
        }
        mysqli_close($con);
    ?> 
    </div>
    <script>
        $(document).ready(function(){
            $('#search').on('click',function(){
                var filterByName= $('#category').val();
             
            $.ajax({
                type: "GET",
                url: 'search.php?filterr=' + filterByName, 
                success: function(data)
                {
                    console.log(data);
                    var myData= JSON.parse(data);
                    var str1;
                    for (var i in myData) {
                        var counter = myData[i];
                        console.log(counter['Time']);
                        str1= str1 +  '<div style="background-color: #ffcbb3; width:1200px;  height: 280px; border: 1px solid white; border-radius: 4px; margin-top: 250px ; margin-left: 0px;"> '
                        + '<p style="font-size:30px; font-style: italic; margin-left: 350px; color: white;">' + counter['Name']+'</p>'
                        + '<br>'
                        +'<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' + counter['Description'] + '</p>'
                        + '<br>'
                        + '<p style="font-size:20px; font-style: italic; margin-left: 30px; margin-top: -30px;"> Ingredients </p>'
                        + '<br>'
                        +  '<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' + counter['Ingredients']+'</p>'
                        + '<br>'
                        + '<p style="font-size:20px; font-style: italic; margin-left: 30px; margin-top: -30px;"> Estimated time </p>'
                        + '<br>'
                        + '<p style="font-size:15px;  margin-left: 30px; margin-top: -30px;">' + counter['Time'] + '</p>'
                        +"</div>";
                    }
                    var strr='<div> <img src="food.jpeg" id="header"> </div> <input type="text" placeholder="Enter category" id="category"> <button id="search">SEARCH</button>  </div>';
                        var final= strr+str1;
               
                        $(".main").replaceWith(final);
                }
                });
            });
        });
    </script>
    <div>
</body>
</html>