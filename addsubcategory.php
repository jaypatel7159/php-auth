<?php
ini_set("display_errors","OFF");
$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addsubcategory'])){

    $scname = $_POST['scname'];
    $sclogo = $_FILES['slogo']['name'];
  
    $cid = $_POST['category'];


    move_uploaded_file($_FILES['slogo']['tmp_name'],"images/".$_FILES['slogo']['name']);

     $sql = "insert into sub_category (scat_name, scat_logo, cat_id) values ('$scname','$sclogo',$cid)";
  
     
    $res = mysqli_query($conn,$sql);

    if($res == true){
        //echo "subcategory added.";
        //header("location:admin.php?view=listsubcategory.php");
        ?>
        <script language="JavaScript">
          location.href="admin.php?view=listsubcategory.php";
        </script>
        <?php
    }
    else{
        echo mysqli_error($conn);
    }



}

if($_REQUEST['id']){

    $scid = $_REQUEST['id'];

    $ssql = "select * from sub_category where scat_id = '$scid'";
    
    

    $sres = mysqli_query($conn,$ssql);

    $row = mysqli_fetch_array($sres);
}


if(isset($_POST['update'])){

    $scid = $_POST['scid'];
    $scname = $_POST['scname'];
    $sclogo = $_FILES['slogo']['name'];
    $cid = $_POST['category'];

    if($sclogo=="")
    {


        $usql = "update sub_category set scat_name='$scname', cat_id='$cid' where scat_id='$scid'";


    }else{


    move_uploaded_file($_FILES['slogo']['tmp_name'],"images/".$_FILES['slogo']['name']);


    $usql = "update sub_category set scat_name='$scname',scat_logo='$sclogo', cat_id='$cid' where scat_id='$scid'";

    }


     //$usql = "update subcategory set scat_name='$sname', scat_logo='$sclogo', cat_id='$country' where scat_id='$sid'";

 

    $ures = mysqli_query($conn,$usql);

    if($ures == true){
       // header("location:admin.php?view=listsubcategory.php");
       ?>
        <script language="JavaScript">
          location.href="admin.php?view=listsubcategory.php";
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
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="scid" value="<?=$row[0]; ?>">
        <table>
            <th colspan="2"><h1  align="center">Add Sub-Category</h1></th>
            <tr>
                <td>Sub-Category Name:</td>
                <td><input type="text" name="scname" value="<?=$row[1]; ?>"></td>
            </tr>
            <tr>
                <td>Category Logo:</td>
                <td><input type="file" name="slogo" >
                <?php
                        if($_REQUEST['id']){
                    ?> <img src="images/<?=$row[2]; ?>"  width="100" height="100"  />
                    <?php } ?></td>
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
                    
                    <?php if($row[3]==$viewcategory->c_id) print "selected";   ?>
                    
                    value="<?php echo $viewcategory->cat_id; ?>" >
                    <?php echo $viewcategory->cat_name; ?> </option>
                    <?php }?>
                </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update subcategory">
                    <?php }
                    else{?>    
                <input type="submit" name="addsubcategory" value="Add subcategory">
            <?php }?></td>

            </tr>
        </table>
    </form>
</body>
</html>