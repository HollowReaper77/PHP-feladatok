<?php
    if (isset($_POST['add'])){
        if (empty($_POST['name'])){
            echo '<div class="alert alert-danger" role="alert">
                Add meg a nevet!
            </div>';
        }else{
            $db->execute("INSERT INTO skills VALUES(null, '".$_POST['name']."', '".$_POST['skills']."')");
            echo '<div class="alert alert-success" role="alert">
            Sikeres felvétel!
        </div>';
        }
    }
?>

<form method="post">

    <h3>Add new record</h3>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="">
        <label for="name">Name</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Write a skills..." id="skills" name="skills"></textarea>
        <label for="skills">Skills</label>
    </div>
    <input type="submit" value="Submit" name="add" class="btn btn-primary mb-3">
    <a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>

</form>