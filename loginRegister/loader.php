<?php
    // kiolvassuk az url-ből a pg paraméter értékét (ha van ilyen)  
    $page = @$_GET['pg'];

    // eldöntjük a page alapján, hogy melyik fájlt tölstük be
    switch($page){
        case 'info':   { include('_infoRecord.php'); break; }
        case 'create': { include('_createRecord.php'); break; }
        case 'update': { include('_updateRecord.php'); break; }
        case 'delete': { include('_deleteRecord.php'); break; }
    }
?>