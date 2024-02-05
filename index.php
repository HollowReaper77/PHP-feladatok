<!DOCTYPE html>
<?php
     require_once("env.php");
     require_once("database.php");
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
    <main>
        <header><?php echo $title; ?></header>
    </main>
    </div>
    
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>