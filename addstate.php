<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['addstate'])){

    $sname = $_POST['sname'];
    $sdesc = $_POST['sdesc'];
    $cid = $_POST['country'];

     $sql = "insert into state (s_name, s_desc, c_id) values ('$sname','$sdesc',$cid)";
  
     
    $res = mysqli_query($conn,$sql);

    if($res == true){
        //echo "State added.";
        //header("location:index.php?view=liststate.php");
        ?>
        <script language="JavaScript">
          location.href="admin.php?view=liststate.php";
        </script>
        <?php
    }
    else{
        echo mysqli_error($conn);
    }



}

if($_REQUEST['id']){

    $sid = $_REQUEST['id'];

    $ssql = "select * from state where s_id = '$sid'";
    
    

    $sres = mysqli_query($conn,$ssql);

    $row = mysqli_fetch_array($sres);
}


if(isset($_POST['update'])){

    $sid = $_POST['sid'];
    $sname = $_POST['sname'];
    $sdesc = $_POST['sdesc'];
    $country = $_POST['country'];

     $usql = "update state set s_name='$sname', s_desc='$sdesc',c_id='$country' where s_id='$sid'";

 

    $ures = mysqli_query($conn,$usql);

    if($ures == true){
       // header("location:index.php?view=liststate.php");
       ?>
        <script language="JavaScript">
          location.href="index.php?view=liststate.php";
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
    <form method="post">
    <input type="hidden" name="sid" value="<?=$row[0]; ?>">
        <table>
            <th colspan="2"><h1  align="center">Add State</h1></th>
            <tr>
                <td>State Name:</td>
                <td><input type="text" name="sname" value="<?=$row[1]; ?>"></td>
            </tr>
            <tr>
                <td>State Detail:</td>
                <td><textarea name="sdesc"><?=$row[2]; ?></textarea></td>
            </tr>
            <tr>
                <td>Select Country:</td>
                <td><select name="country">
                    <?php

                    $csql = "select * from country";

                    $result = mysqli_query($conn,$csql);

                    while ($viewcountry = mysqli_fetch_object($result)){
                         

                    ?>
                    <option 
                    
                    <?php if($row[3]==$viewcountry->c_id) print "selected";   ?>
                    
                    value="<?php echo $viewcountry->c_id; ?>" >
                    <?php echo $viewcountry->c_name; ?> </option>
                    <?php }?>
                </select></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update state">
                    <?php }
                    else{?>    
                <input type="submit" name="addstate" value="Add State">
            <?php }?></td>

            </tr>
        </table>
    </form>
</body>
</html>