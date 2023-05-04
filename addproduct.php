


<?php 
 ini_set("display_errors","OFF");

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addproduct'])){


    
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $pcode = $_POST['pcode'];
    $bid = $_POST['brand'];
    $cid = $_POST['category'];
    $scid = $_POST['scategory'];
    $pimg = $_FILES['pimg']['name'];
    $plogo = $_FILES['plogo']['name'];
   
    
    

    move_uploaded_file($_FILES['pimg']['tmp_name'],"images/".$_FILES['pimg']['name']);
    
    move_uploaded_file($_FILES['plogo']['tmp_name'],"images/".$_FILES['plogo']['name']);

     $insert_sql = "insert into product (prod_name, prod_desc, prod_code, b_id, cat_id, scat_id, prod_img, prod_logo) values 
    ('$pname','$pdesc','$pcode','$bid','$cid','$scid','$pimg','$plogo')";

   




    $insert_res = mysqli_query($conn,$insert_sql);

    if($insert_res == true){
       
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listproduct.php";
       </script>
       <?php
    }
    else{
        echo mysqli_error($conn);
    }


}

if(isset($_REQUEST['id'])){

    $pid = $_REQUEST['id'];

    $show_sql = "select * from product where prod_id = $pid";

    $show_res = mysqli_query($conn,$show_sql);

    $row = mysqli_fetch_array($show_res);
}

if(isset($_POST['update'])){

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $pcode = $_POST['pcode'];
    $bid = $_POST['brand'];
    $cid = $_POST['category'];
    $scid = $_POST['scategory'];
    $pimg = $_FILES['pimg']['name'];
    $plogo = $_FILES['plogo']['name'];

    if($pimg=="" && $plogo=="")
    {


        $update_sql = "update product set prod_name='$pname', prod_desc='$pdesc', prod_code='$pcode', b_id='$bid', cat_id='$cid', scat_id='$scid' where prod_id='$pid'";


    }elseif($pimg=="" && $plogo!=""){
        move_uploaded_file($_FILES['pimg']['tmp_name'],"images/".$_FILES['pimg']['name']);

        $update_sql = "update product set prod_name='$pname', prod_desc='$pdesc', prod_code='$pcode', b_id='$bid', cat_id='$cid', scat_id='$scid',prod_logo='$plogo' where prod_id='$pid'";

    }elseif($plogo=="" && $pimg!=""){
        move_uploaded_file($_FILES['plogo']['tmp_name'],"images/".$_FILES['plogo']['name']);

        $update_sql = "update product set prod_name='$pname', prod_desc='$pdesc', prod_code='$pcode', b_id='$bid', cat_id='$cid', scat_id='$scid',prod_img='$pimg' where prod_id='$pid'";

    }else{
        
        move_uploaded_file($_FILES['pimg']['tmp_name'],"images/".$_FILES['pimg']['name']);
    
        move_uploaded_file($_FILES['plogo']['tmp_name'],"images/".$_FILES['plogo']['name']);

    
        $update_sql = "update product set prod_name='$pname', prod_desc='$pdesc', prod_code='$pcode', b_id='$bid', cat_id='$cid', scat_id='$scid',prod_img='$pimg',prod_logo='$plogo' where prod_id='$pid'";

    }


    //print $update_sql;
    

    $update_res = mysqli_query($conn,$update_sql);
   
   
   if($update_res){
       // header("location:admin.php?view=listuser.php");
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listproduct.php";
       </script>
       <?php
    }
    else{
        echo mysqli_error($conn);
    }
}



?>
<html>
    <style>
        table{
            border: 1px solid black;
            width: 100%;
            
        }
        form {
            padding: 20px;
        }
        
    </style>
<body>
    
    <form method="post"  enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?=$row[0];?>">
        <table>
            <th colspan="2">Add Product</th>
            <tr>
                <td>Product Name</td>
                <td><input id=fname  type="text" name="pname" value="<?=$row[1];?>"></td>
            </tr>
            <tr>
                <td>Product Desc</td>
                <td><input type="text" id="lname" name="pdesc" value="<?=$row[2];?>"></td>
            </tr>
            <tr>
                <td>Product code</td>
                <td><input type="text" id="uname" name="pcode" value="<?=$row[3];?>"></td>
            </tr>
            <tr>
                <td>Select Brand:</td>
                <td><select name="brand">
                    <?php

                    $csql = "select * from brand";

                    $result = mysqli_query($conn,$csql);

                    while ($viewbrand = mysqli_fetch_object($result)){
                         

                    ?>
                    <option 
                    
                    <?php if($row[3]==$viewbrand->b_id) print "selected";   ?>
                    
                    value="<?php echo $viewbrand->b_id; ?>" >
                    <?php echo $viewbrand->b_name; ?> </option>
                    <?php }?>
                </select></td>
            </tr>
           
            <tr>
                <td>Select Category:</td>
                <td><select name="category">
                    <?php

                    $csql = "select * from category";

                    $result = mysqli_query($conn,$csql);

                    while ($viewcategory = mysqli_fetch_object($result)){
                         

                    ?>
                    <option 
                    
                    <?php if($row[5]==$viewcategory->cat_id) print "selected";   ?>
                    
                    value="<?php echo $viewcategory->cat_id; ?>" >
                    <?php echo $viewcategory->cat_name; ?> </option>
                    <?php }?>
                </select></td>
            </tr>
            <tr>
                <td>Select Sub-Category:</td>
                <td><select name="scategory">
                    <?php

                    $csql = "select * from sub_category";

                    $result = mysqli_query($conn,$csql);

                    while ($viewscategory = mysqli_fetch_object($result)){
                         

                    ?>
                    <option 
                    
                    <?php if($row[6]==$viewscategory->scat_id) print "selected";   ?>
                    
                    value="<?php echo $viewscategory->scat_id; ?>" >
                    <?php echo $viewscategory->scat_name; ?> </option>
                    <?php }?>
                </select></td>
            </tr>
            
           
            
            
            <tr>
                <td>Product Photo</td>
                <td><input type="file" name="pimg"> <?php
                        if($_REQUEST['id']){
                    ?><img src="images/<?=$row[7]?>" width="50" hight="50" >
                    <?php } ?></td>
            </tr>
            <tr>
                <td>Product Logo</td>
                <td><input type="file" name="plogo"> <?php
                        if($_REQUEST['id']){
                    ?><img src="images/<?=$row[8]?>" width="50" hight="50" >
                    <?php } ?></td>
            </tr>
            
            <td>
                <td colspan="2">
                <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update Product">
                    <?php }
                    else{?>
                    <input type="submit" id="submit" name="addproduct" value="Add Product">
                    <?php }?>    
                </td>
            </td>
        </table>
    </form >
</body>
</html>
<!doctype html>
