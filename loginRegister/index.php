<!DOCTYPE html>
<?php
    // behúzzuk a változókaz és az adatbázis osztályt
    require('env.php');
    require('database.php');
    // létrehozunk egy adatbázis objektumot, amin keresztül végezzük majd a műveleteket
    $db = new db($dbhost, $dbname, $dbuser, $dbpass);
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
        <section>
            <?php 
                // url alapján eldönti, hogy mit tölt be ebbe a div-be, a különböző CRUD műveletek php fájljait
                include('loader.php');
            ?>
        </section>


    <form class="login">
        <input type="text" name="name" id="name" placeholder="név">
        <input type="password" name="paswd" id="paswd" placeholder="jelszó">
    </form>

    <form class="register">
        <input type="text" name="name" id="name" placeholder="név">
        <input type="password" name="paswd" id="paswd" placeholder="jelszó">
        <input type="password" name="paswd2" id="paswd2" placeholder="jelszó ismétlése">
    </form>
</body>
</html>