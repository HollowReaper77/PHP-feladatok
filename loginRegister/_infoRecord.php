<h3>Record information</h3>
<?php
    // átvesszük az url-ből az id értékét
    $id = $_GET['id'];
    // lekérdezzük a megadott id-jű rekordot
    $db->query('SELECT * FROM skills WHERE ID='.$id);
    // megjelenítjük az adatait
    $db->showRecord();

?>
<a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>

        
