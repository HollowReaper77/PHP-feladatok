<?php
    if (isset($_POST['add'])){
        if (empty($_POST['name'])){
            echo '<div class="alert alert-danger" role="alert">
                Add meg a nevet!
            </div>';
        }else{
            $db->execute("INSERT INTO garancia VALUES(null, '".$_POST['item']."', '".$_POST['ar']."', '".$_POST['vasarlasideje']."', '".$_POST['garanciaido']."')");
            echo '<div class="alert alert-success" role="alert">
            Sikeres felvétel!
        </div>';
        }
    }
?>

<form method="post">

    <h3>Add new record</h3>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="item" name="item" placeholder="">
        <label for="item">Item</label>
    </div>

    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="ar" name="ar" placeholder="">
        <label for="ar">Ár</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="vasarlasideje" name="vasarlasideje" placeholder="">
        <label for="vasarlasideje">Vasárlás ideje</label>
    </div>

    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="garanciaido" name="garanciaido" placeholder="">
        <label for="garanciaido">Garancia idő</label>
    </div>

    <input type="submit" value="Submit" name="add" class="btn btn-primary mb-3">
    <a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>

</form>