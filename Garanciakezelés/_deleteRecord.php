<h3>Delete record</h3>

<?php
    $id = @$_GET['id'];

    if (isset($_POST['deleteBtn'])){
        $db->execute('DELETE FROM garancia WHERE ID='.$id);
        echo '<div class="alert alert-success" role="alert">
        Sikeres törlés!
        </div>';
    }
    else{   
        echo 'Biztosan törlöd az alűábbi rekordot?';
        $db->query('SELECT * FROM garancia WHERE ID='.$id);
        $db->showRecord();
        echo '<form method="POST">
        <input type="submit" value="Törlés" name="deleteBtn" class="btn btn-danger mb-3">
        <a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>
        </form>';
    }

?>


