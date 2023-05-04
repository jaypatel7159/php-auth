<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addcountry'])){

    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $flag = $_FILES['flag']['name'];


    move_uploaded_file($_FILES['flag']['tmp_name'],"images/".$_FILES['flag']['name']);

    $sql = "insert into country (c_name, c_desc,flag) values ('$cname','$cdesc','$flag')";

    $res = mysqli_query($conn,$sql);

    if($res == true){
       // header("location:index.php?view=listcountry.php");
       ?>
        <script language="JavaScript">
          location.href="admin.php?view=listcountry.php";
        </script>
        <?php
    }
    else{
        echo mysqli_error($conn);
    }



}

if(isset($_REQUEST['id'])){

    $cid = $_REQUEST['id'];

    $ssql = "select * from country where c_id = '$cid'";

    $sres = mysqli_query($conn,$ssql);

    $row = mysqli_fetch_array($sres);
}


if(isset($_POST['update'])){

    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $flag = $_FILES['flag']['name'];

    if($flag=="")
    {


        $usql = "update country set c_name='$cname', c_desc='$cdesc' where c_id='$cid'";


    }else{


    move_uploaded_file($_FILES['flag']['tmp_name'],"images/".$_FILES['flag']['name']);


    $usql = "update country set c_name='$cname', c_desc='$cdesc',flag='$flag' where c_id='$cid'";

    }

    $ures = mysqli_query($conn,$usql);

    if($ures == true){
       // header("location:index.php?view=listcountry.php");
       ?>
       <script language="JavaScript">
         location.href="index.php?view=listcountry.php";
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
            <th colspan="2"><h1  align="center">Add Country</h1></th>
            <tr>
                <td>Country Name:</td>
                <td><input type="text" name="cname" value="<?=$row[1]; ?>"></td>
            </tr>
            <tr>
                <td>Country Detail:</td>
                <td><input type="text" name="cdesc" value="<?=$row[2]; ?>"></td>
            </tr>


            <tr>
                <td>Country Flag:</td>
                <td><input type="file" name="flag" >
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
                    <input type="submit" name="update" value="Update Country">
                    <?php }
                    else{?>
                    <input type="submit" name="addcountry" value="Add Country">
                <?php } ?></td>
            </tr>
        </table>
    </form>
</body>
</html>