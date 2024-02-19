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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="mb-3">
            <h1><?php echo $title ?></h1>
        </header>
        
        <section>
            <?php 
                // url alapján eldönti, hogy mit tölt be ebbe a div-be, a különböző CRUD műveletek php fájljait
                include('loader.php');
            ?>
        </section>
        
        <main>
            <?php
                // lekérdezzük a táblában lévő adatokat
                $db->query('SELECT * FROM skills'); 
                // majd beletesszük egy táblázatba őket. A create, info, update és delete műveletgombokat megjelenítjük
                $db->toTable('c|i|u|d');
            ?>
        </main>
        <footer>
            <?php 
                // a láblécben kiíratjuk a szerző infokat
                echo $author.' - '.$company;
            ?>
        </footer>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
    /*
    $_SESSION['uid'] = 1;
    unset($_SESSION['uid']);
    */
?>