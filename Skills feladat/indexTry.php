<!DOCTYPE html>
<?php
     require("env.php");
     require("database.php");
     $db = new db($dbhost, $dbname, $dbuser, $dbpass);
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
    <header><?php echo $title; ?></header>
    <main>


<?php
    // űrlap kiértékelés, ha rákattintottunk a submit gombra
    if (isset($_POST['submitBtn'])){

        if ($_POST["name"] == ""){
            echo '<div class="alert alert-danger mt-3" role="alert">Add meg az adatokat</div>';
        }
        else{
            echo $db->execute("INSERT INTO hamburgerek VALUES(null, '".$_POST['name']."', '".$_POST['skill'].")");
            echo '<div class="alert alert-success" role="alert">Hamburger felvéve!</div>';

        }
    }
?>

<div class="inputForm">
    <form action="index.php" method="post">

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="">
        <label for="name">Name:</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="descr" name="descr" placeholder="">
        <label for="descr">Skills</label>
    </div>


    <input type="submit" name="submitBtn" value="submit" class="btn btn-primary">

    </form>
</div>







<?php
      
      $db->query("SELECT 
          ID, 
          name AS Hamburger, 
          description AS Leírás, 
          price AS 'Ár (".PENZNEM.")', 
          cal AS Kalória 
      FROM ".$table);
     
      $db->toTable('d');

  ?>
</main>
    <footer><?php echo $company.' - '.$author; ?></footer>
    </div>
    
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>