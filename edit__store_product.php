<?php 

include ('db_connection.php');






?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Store Product</title>
</head>
<body>
    <?php 

     
    if(isset ($_GET['id'])){
    $getid=  $_GET['id'];
   
    $sql="SELECT * FROM store_product WHERE store_product_id=$getid";
    $query=$conn->query($sql);
   $data=mysqli_fetch_assoc($query);
   $store_product_id=$data['store_product_id'];
   $store_product_name=$data['store_product_name'];
   $store_product_quentity=$data['store_product_quentity'];
   $store_product_entrydate=$data['store_product_entrydate'];
}

    
    if(isset ($_POST['store_product_name'])){
         $new_store_product_name=     $_POST['store_product_name'];
        $new_store_product_quentity=  $_POST['store_product_quentity'];
      
        $new_store_product_entrydate=$_POST['store_product_entrydate'];
        $new_store_product_id=       $_POST['store_product_id'];

        $sql1="UPDATE store_product SET 
        store_product_name='$new_store_product_name',
        store_product_quentity='$new_store_product_quentity',
        store_product_entrydate='$new_store_product_entrydate'
       
        WHERE store_product_id='$new_store_product_id'";
  
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
    <select name="store_product_name" id="">
      <?php 
       $sql= "SELECT * FROM product";
       $query=$conn->query($sql);
       
       
        while  ($data= mysqli_fetch_array($query)){
           $data_id=  $data['product_id'];
           $data_name=  $data['product_name'];
           ?>
           <option value='<?php echo $data_id ?>' <?php if($store_product_name==$data_id){
            echo 'selected';
           } ?>>
          <?php echo $data_name ?> 
        </option>";
          
        <?php }
      
      ?>
    </select>
    <br><br>
    Product Quentity:<br>
    <input type="number" name="store_product_quentity" value="<?php echo $store_product_quentity ?>"><br><br>
    Store Entry Date:<br>
    <input type="date" name="store_product_entrydate" value="<?php echo $store_product_entrydate ?>">
    <input type="text" name="store_product_id" value="<?php echo $store_product_id ?>" hidden>
    <br><br>
    <input type="submit" value="Submit product">
    </form>
    
</body>
</html>