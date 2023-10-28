<?php 

include ('db_connection.php');
include ('my_function.php');





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spend Product</title>
</head>
<body>
    <?php 
    
    if(isset ($_POST['spend_product_name'])){
         $spend_product_name=     $_POST['spend_product_name'];
        $spend_product_quentity=     $_POST['spend_product_quentity'];
      
        $spend_product_entrydate=$_POST['spend_product_entrydate'];

      $sql=  "INSERT INTO spend_product(spend_product_name,	spend_product_quentity,spend_product_entrydate) 
              VALUES (
                '$spend_product_name',' $spend_product_quentity',' $spend_product_entrydate')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    }
    
    ?>
   


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    
    Product :<br>
    <select name="spend_product_name" id="">
       <?php data_list('product','product_id','product_name'); ?> 
    </select>
    <br><br>
    Product Quentity:<br>
    <input type="number" name="spend_product_quentity"><br><br>
    Spend Entry Date:<br>
    <input type="date" name="spend_product_entrydate">
    <br><br>
    <input type="submit" value="Submit product">
    </form>
    
</body>
</html>