<?php 

include ('db_connection.php');

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <?php 
    
    if(isset ($_POST['category_name'])){
        echo $category_name=     $_POST['category_name'];
        echo $category_entrydate=$_POST['category_entrydate'];

      $sql=  "INSERT INTO category_table(category_name,category_entrydate) 
              VALUES ('$category_name','$category_entrydate')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
    ?>



    <form action="add_category.php" method="POST">
    Category:<br>
    <input type="text" name="category_name"><br><br>
    Category Entry Date:<br>
    <input type="date" name="category_entrydate">
    <br><br>
    <input type="submit" value="Submit Category">
    </form>
    
</body>
</html>