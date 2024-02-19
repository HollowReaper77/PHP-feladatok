<!DOCTYPE html>
<?php
    require('env.php');
    require('database.php');
    $db = new db($dbhost, $dbname, $dbuser, $dbpass);
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo $title ?></h1>
        </header>
        
        <section>
            <?php 
                include('loader.php');
            ?>
        </section>
        
        <main>
            <?php
                $db->query('SELECT * FROM skills'); 
                $db->toTable('c|i|u|d');
            ?>
        </main>
        <footer>
            <?php echo $author.' - '.$company; ?>
        </footer>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>