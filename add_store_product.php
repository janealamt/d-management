<?php 

include ('db_connection.php');
include ('my_function.php');





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Store Product</title>
</head>
<body>
    <?php 
    
    if(isset ($_POST['store_product_name'])){
         $store_product_name=     $_POST['store_product_name'];
        $store_product_quentity=     $_POST['store_product_quentity'];
      
        $store_product_entrydate=$_POST['store_product_entrydate'];

      $sql=  "INSERT INTO store_product(store_product_name,store_product_quentity,store_product_entrydate) 
              VALUES ('$store_product_name',' $store_product_quentity',' $store_product_entrydate')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
    ?>
   


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    
    Product :<br>
    <select name="store_product_name" id="">
       <?php data_list('product','product_id','product_name'); ?> 
    </select>
    <br><br>
    Product Quentity:<br>
    <input type="text" name="store_product_quentity"><br><br>
    Store Entry Date:<br>
    <input type="date" name="store_product_entrydate">
    <br><br>
    <input type="submit" value="Submit product">
    </form>
    
</body>
</html>