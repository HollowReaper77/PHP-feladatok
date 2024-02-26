<h3>Record information</h3>
<?php
    // átvesszük az url-ből az id értékét
    $id = $_GET['id'];
    // lekérdezzük a megadott id-jű rekordot
    $db->query('SELECT * FROM garancia WHERE ID='.$id);
    // megjelenítjük az adatait
    $db->showRecord();

?>

<?php $datetime1 = date_create('2009-10-11'); $datetime2 = date_create('2009-10-13'); $interval = date_diff($datetime1, $datetime2); echo $interval->format('%m months'); ?>
<a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>

        
