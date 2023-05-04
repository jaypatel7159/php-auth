<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addcategory'])){

    $cname = $_POST['cname'];
    $clogo = $_FILES['clogo']['name'];


    move_uploaded_file($_FILES['clogo']['tmp_name'],"images/".$_FILES['clogo']['name']);

    $sql = "insert into category (cat_name, cat_logo) values ('$cname','$clogo')";

    $res = mysqli_query($conn,$sql);

    if($res == true){
       // header("location:admin.php?view=listcategory.php");
       ?>
        <script language="JavaScript">
          location.href="admin.php?view=listcategory.php";
        </script>
        <?php
    }
    else{
        echo mysqli_error($conn);
    }



}

if(isset($_REQUEST['id'])){

    $cid = $_REQUEST['id'];

    $ssql = "select * from category where cat_id = '$cid'";

    $sres = mysqli_query($conn,$ssql);

    $row = mysqli_fetch_array($sres);
}


if(isset($_POST['update'])){

    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $clogo = $_FILES['clogo']['name'];

    if($clogo=="")
    {


        $usql = "update category set cat_name='$cname' where cat_id='$cid'";


    }else{


    move_uploaded_file($_FILES['clogo']['tmp_name'],"images/".$_FILES['clogo']['name']);


    $usql = "update category set cat_name='$cname',cat_logo='$clogo' where cat_id='$cid'";

    }

    $ures = mysqli_query($conn,$usql);

    if($ures == true){
       // header("location:admin.php?view=listcategory.php");
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listcategory.php";
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
        <input type="hidden" name="cid" value="<?=$row[0]; ?>">
        <table>
            <th colspan="2"><h1  align="center">Add Category</h1></th>
            <tr>
                <td>Category Name:</td>
                <td><input type="text" name="cname" value="<?=$row[1]; ?>"></td>
            </tr>
            


            <tr>
                <td>Category Logo:</td>
                <td><input type="file" name="clogo" >
                <?php
                        if($_REQUEST['id']){
                    ?> <img src="images/<?=$row[3]; ?>"  width="100" height="100"  />
                    <?php } ?></td>
            </tr>


            <tr>
                <td colspan="2" align="center">
                    <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update category">
                    <?php }
                    else{?>
                    <input type="submit" name="addcategory" value="Add category">
                <?php } ?></td>
            </tr>
        </table>
    </form>
</body>
</html>