<h3>Update record</h3>
<?php
   $id = @$_GET['id'];

   if (isset($_POST['update'])){
    if (empty($_POST['name'])){
        echo '<div class="alert alert-danger" role="alert">
            Add meg a nevet!
        </div>';
    }else{
        $db->execute("UPDATE skills SET name='".$_POST['name']."', skills='".$_POST['skills']."' WHERE ID=".$id);
        echo '<div class="alert alert-success" role="alert">
        Sikeres módosítás!
        </div>';
    }
}

   $result = $db->query('SELECT * FROM skills WHERE ID='.$id)[0];
   echo '
   <form method="post">
   
   <div class="form-floating mb-3">
       <input type="text" class="form-control" id="name" name="name" placeholder="" value="'.$result['name'].'">
       <label for="name">Name</label>
   </div>
   <div class="form-floating mb-3">
       <textarea class="form-control" placeholder="Write a skills..." id="skills" name="skills">'.$result['skills'].'</textarea>
       <label for="skills">Skills</label>
   </div>
   <input type="submit" value="Submit" name="update" class="btn btn-primary mb-3">
   <a href="index.php" class="btn btn-secondary mb-3">Mégsem</a>
   </form>';
?>

