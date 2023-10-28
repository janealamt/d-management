<?php 

include ('db_connection.php');
echo "<br>";

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <?php 
   
  
    if(isset($_GET['id'])){
        $getid=$_GET['id'];
        $sql="SELECT * FROM category_table WHERE category_id=$getid";
        $query=$conn->query($sql);
        $data=mysqli_fetch_assoc($query);
       $category_id=$data['category_id'];
       $category_name=$data['category_name'];
       $category_entrydate=$data['category_entrydate'];
    }
    
    if(isset($_POST['category_name'])) {
      $new_category_name=  $_POST['category_name'];
     $new_category_entrydate=  $_POST['category_entrydate'];
      $new_category_id= $_POST['category_id'];

      $sql1="UPDATE category_table SET category_name='$new_category_name',
      category_entrydate='$new_category_entrydate' WHERE category_id=$new_category_id";
      if($conn->query($sql1)===TRUE){
           echo 'Update Successfully';
      }
      else{
        echo 'not update';
      }
    }
    ?>



    <form action="edit_category.php" method="POST">
    Category:<br>
    <input type="text" name="category_name" value="<?php echo $category_name ?>"><br><br>
    Category Entry Date:<br>
    <input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>">
    <br><br>
    <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden>
    <input type="submit" value="Update">
    </form>
    
</body>
</html>