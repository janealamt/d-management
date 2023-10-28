<?php 

include ('db_connection.php');

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <?php 
    
    if(isset ($_POST['product_name'])){
         $product_name=     $_POST['product_name'];
        $product_category=     $_POST['product_category'];
        $product_code=     $_POST['product_code'];
        $product_entrydate=$_POST['product_entrydate'];

      $sql=  "INSERT INTO product(product_name,product_category,product_code,product_entrydate) 
              VALUES ('$product_name',' $product_category',' $product_code',' $product_entrydate')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
    ?>
    <?php 
    
   $sql= "SELECT * FROM category_table";
   $query=$conn->query($sql);
  
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    Product:<br>
    <input type="text" name="product_name"><br><br>
    Product Category:<br>
    <select name="product_category" id="">
        <?php 
      while  ($data= mysqli_fetch_array($query)){
    $category_id=  $data['category_id'];
    $category_name=  $data['category_name'];
    echo "<option value='$category_id'>$category_name</option>";
      }
    ?>
        
    </select>
    <br><br>
    Product Code:<br>
    <input type="text" name="product_code"><br><br>
    Product Entry Date:<br>
    <input type="date" name="product_entrydate">
    <br><br>
    <input type="submit" value="Submit product">
    </form>
    
</body>
</html>