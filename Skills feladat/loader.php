<?php
    $page = @$_GET['pg'];

    switch($page){
        case 'info':   { include('_infoRecord.php'); break; }
        case 'create': { include('_createRecord.php'); break; }
        case 'update': { include('_updateRecord.php'); break; }
        case 'delete': { include('_deleteRecord.php'); break; }
    }
?>