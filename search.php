<?php 
require 'includes/init.php';

$conn = require 'includes/db.php';
$article = '';

$array = (array(1=>"Volvo", 2=>"BMW", 3=>"Toyota"));
$cars = array (
    array("name"=>"Volvo","age"=>"22",3=>18),
    array("name"=>"BMW","age"=>"15",3=>13),
    array("name"=>"Saab","age"=>"5",3=>2),
    array("name"=>"Land Rover","age"=>"17",3=>15)
  );
 if (isset($_GET['art']) && $_GET['art']) {
     $article = $_GET['art'];
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div>
        <h2 class="p3">My search Bar</h2>
    </div>
<div class="container p3">
<div class="form-group">
    <input class="form-control" placeholder="Artikel Suchen" id="search" value="<?= $article ?>" name="search" type="text" class="form-control">
</div>
<div class="list-group" id="result"></div>

</div>
   <script>
       $(document).ready(function(){

        var myArray = <?php echo json_encode($cars) ?>;
       

           $('#search').keyup(function(){
            
           var input = $(this).val()
           var filter = new RegExp(input, "i")
           $('#result').html('');
           
     if (input != "") {
        $(myArray).filter(function(key, value){   
    if (value.name.search(filter) != -1 || value.age.search(filter) != -1 ) {
        $('#result').append('<a href="search.php?art='+ value.name +'" class="list-group-item list-group-item-action">'+ value.name + '</a>')      
} 
    })
     }else{
        $('#result').append('<p>Insert Article name or number to search</p>')  
     }
      
      })

    })
        
   </script>
   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
