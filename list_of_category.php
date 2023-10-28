<?php 
include ('db_connection.php');

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Category</title>
</head>
<body>
    
<?php 
     $sql= "SELECT * FROM category_table";
     $query = $conn->query($sql);
     echo "<table border=1 border ><tr><th>Category</th><th>Date</th><th>Action</th></tr>";
    while( $data=mysqli_fetch_assoc($query)){
        $category_id=$data['category_id'];
         $category_name= $data['category_name'];
        $category_entrydate=$data['category_entrydate'];
         echo "<tr><td>$category_name</td>";
        echo "
        <td>$category_entrydate</td>
        <td><a href='edit_category.php?id=$category_id'>Edit</a></td>
        </tr>";
    }

    echo "</table>";
     ?>




   
</body>
</html>