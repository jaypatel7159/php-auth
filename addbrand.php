<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addbrand'])){

    $bname = $_POST['bname'];
    $blogo = $_FILES['blogo']['name'];


    move_uploaded_file($_FILES['blogo']['tmp_name'],"images/".$_FILES['blogo']['name']);

    $sql = "insert into brand (b_name,b_logo) values ('$bname','$blogo')";

    $res = mysqli_query($conn,$sql);

    if($res == true){
       // header("location:admin.php?view=listcountry.php");
       ?>
        <script language="JavaScript">
          location.href="admin.php?view=listbrand.php";
        </script>
        <?php
    }
    else{
        echo mysqli_error($conn);
    }



}

if(isset($_REQUEST['id'])){

    $bid = $_REQUEST['id'];

    $ssql = "select * from brand where b_id = '$bid'";

    $sres = mysqli_query($conn,$ssql);

    $row = mysqli_fetch_array($sres);
}


if(isset($_POST['update'])){

    $bid = $_POST['bid'];
    $bname = $_POST['bname'];
    $blogo = $_FILES['blogo']['name'];

    if($flag=="")
    {


        $usql = "update brand set b_name='$bname' where b_id='$bid'";


    }else{


    move_uploaded_file($_FILES['blogo']['tmp_name'],"images/".$_FILES['blogo']['name']);


    $usql = "update country set b_name='$bname',b_logo='$blogo' where c_id='$cid'";

    }

    $ures = mysqli_query($conn,$usql);

    if($ures == true){
       // header("location:admin.php?view=listcountry.php");
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listbrand.php";
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
        <input type="hidden" name="bid" value="<?=$row[0]; ?>">
        <table>
            <th colspan="2"><h1  align="center">Add Brand</h1></th>
            <tr>
                <td>Brand Name:</td>
                <td><input type="text" name="bname" value="<?=$row[1]; ?>"></td>
            </tr>
            

            <tr>
                <td>Brand Logo:</td>
                <td><input type="file" name="blogo" >
                <?php
                        if($_REQUEST['id']){
                    ?> <img src="images/<?=$row[2]; ?>"  width="100" height="100"  />
                    <?php } ?></td>
            </tr>


            <tr>
                <td colspan="2" align="center">
                    <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update Brand">
                    <?php }
                    else{?>
                    <input type="submit" name="addbrand" value="Add Brand">
                <?php } ?></td>
            </tr>
        </table>
    </form>
</body>
</html>