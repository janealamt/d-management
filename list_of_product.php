<?php 
include ('db_connection.php');
$sql1="SELECT * FROM category_table";
$query1=$conn->query($sql1);

$data_list=array();


while($data1=mysqli_fetch_assoc($query1)){
$category_id   =$data1['category_id'];
$category_name =$data1['category_name'];
$data_list[$category_id]=$category_name;
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Product</title>
</head>
<body>
    
<?php 
     $sql= "SELECT * FROM product";
     $query = $conn->query($sql);
     echo "<table border=1 border ><tr><th>Product Name</th><th>Product Category</th><th>Product Code</th><th>Date</th><th>Action</th></tr>";
    while( $data=mysqli_fetch_assoc($query)){
        $product_id=$data['product_id'];
         $product_name= $data['product_name'];
         $product_category= $data['product_category'];
         $product_code= $data['product_code'];
        $product_entrydate=$data['product_entrydate'];
         echo "<tr>
         <td>$product_name</td>
         <td>$data_list[$product_category]</td>
         <td>$product_code</td>";
        echo "
        <td>$product_entrydate</td>
        <td><a href='edit_product.php?id=$product_id'>Edit</a></td>
        </tr>";
    }

    echo "</table>";
     ?>




   
</body>
</html>