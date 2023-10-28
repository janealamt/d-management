<?php 

include ('db_connection.php');
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Spend Product</title>
</head>
<body>
    <?php 

     
    if(isset ($_GET['id'])){
    $getid=  $_GET['id'];
   
    $sql="SELECT * FROM spend_product WHERE spend_product_id=$getid";
    $query=$conn->query($sql);
   $data=mysqli_fetch_assoc($query);
   $spend_product_id=$data['spend_product_id'];
   $spend_product_name=$data['spend_product_name'];
   $spend_product_quentity=$data['spend_product_quentity'];
   $spend_product_entrydate=$data['spend_product_entrydate'];
}

    
    if(isset ($_POST['spend_product_name'])){
         $new_spend_product_name=     $_POST['spend_product_name'];
        $new_spend_product_quentity=  $_POST['spend_product_quentity'];
      
        $new_spend_product_entrydate=$_POST['spend_product_entrydate'];
        $new_spend_product_id=       $_POST['spend_product_id'];

        $sql1="UPDATE spend_product SET 
        spend_product_name='$new_spend_product_name',
        spend_product_quentity='$new_spend_product_quentity',
        spend_product_entrydate='$new_spend_product_entrydate'
       
        WHERE spend_product_id=$new_spend_product_id";
  
        if($conn->query($sql1)===TRUE){
          echo 'Update Successfully';
     }
     else{
       echo 'not update'.$conn->error;
     }
  
      }
    
    ?>
   


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    
    Product :<br>
    <select name="spend_product_name" id="">
      <?php 
       $sql= "SELECT * FROM product";
       $query=$conn->query($sql);
       
       
        while  ($data= mysqli_fetch_array($query)){
           $data_id=  $data['product_id'];
           $data_name=  $data['product_name'];
           ?>
           <option value='<?php echo $data_id ?>' <?php if($spend_product_name==$data_id){
            echo 'selected';
           } ?>>
          <?php echo $data_name ?> 
        </option>";
          
        <?php }
      
      ?>
    </select>
    <br><br>
    Product Quentity:<br>
    <input type="text" name="spend_product_quentity" value="<?php echo $spend_product_quentity ?>"><br><br>
   Spend Entry Date:<br>
    <input type="date" name="spend_product_entrydate" value="<?php echo $spend_product_entrydate ?>">
    <input type="text" name="spend_product_id" value="<?php echo $spend_product_id ?>" hidden>
    <br><br>
    <input type="submit" value="Submit product">
    </form>
    
</body>
</html>