<!DOCTYPE html>
<?php
     require_once("env.php");
     require_once("database.php");
     $db = new db($dbhost, $dbname, $dbuser, $dbpass);
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
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
                    echo '<div class="alert alert-danger mt-3" role="alert">Add meg a hamburger nevét!</div>';
                }
                else{
                    echo $db->execute("INSERT INTO hamburgerek VALUES(null, '".$_POST['name']."', '".$_POST['descr']."', ".$_POST['price'].", ".$_POST['cal'].")");
                    echo '<div class="alert alert-success" role="alert">Hamburger felvéve!</div>';

                }
            }
        ?>

        <div class="accordion accordion-flush m-3" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Manage hamburgers
                </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <form action="index.php" method="post">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                            <label for="name">Hamburger name:</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="descr" name="descr" placeholder="">
                            <label for="descr">Description:</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="price" name="price" placeholder="">
                            <label for="price">Price:</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="cal" name="cal" placeholder="">
                            <label for="cal">Cal.:</label>
                        </div>
                        
                        <input type="submit" name="submitBtn" value="submit" class="btn btn-primary">

                    </form>
                </div>
                </div>
            </div>
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