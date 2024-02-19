<h3>Record information</h3>
<?php
    $id = $_GET['id'];
    $db->query('SELECT * FROM skills WHERE ID='.$id)->showRecord();
?>