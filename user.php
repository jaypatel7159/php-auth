<script language="JavaScript">


// function validate()
// {

//     var x = document.getElementById("fname").value;
//     var y = document.getElementById("lname").value;
//     var z = document.getElementById("uname").value;
//    alert("first name: " + x + "<br>" +  y +"<br>" + z);

// return false;
// }


// function change()
//{

//    var x = document.getElementById("fname").value;
//    alert("first name: " + x);
// // alert(document.getElementById("fname").value);

// return false;
// }

</script>


<?php 
 ini_set("display_errors","OFF");

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['save'])){


    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $cid = $_POST['country'];
    $sid = $_POST['state'];
    $city = $_POST['city'];
    $did = $_POST['degree'];
    $degree_name = implode('-',$did);
    $img = $_FILES['img']['name'];
    $hobby = $_POST['hobby'];
    $hobby_name = implode(',',$hobby);

    
    

    move_uploaded_file($_FILES['img']['tmp_name'],"images/".$_FILES['img']['name']);

     $insert_sql = "insert into user (f_name,l_name,u_name,email,pass,gender,hobby,c_id,s_id,city,d_id,img) values 
    ('$fname','$lname','$uname','$email','$pass','$gender','$hobby_name','$cid','$sid','$city','$degree_name','$img')";

   




    $insert_res = mysqli_query($conn,$insert_sql);

    if($insert_res == true){
       // header("location:admin.php?view=listuser.php");
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listuser.php";
       </script>
       <?php
    }
    else{
        echo mysqli_error($conn);
    }


}

if(isset($_REQUEST['id'])){

    $sid = $_REQUEST['id'];

    $show_sql = "select * from user where u_id = $sid";

    $show_res = mysqli_query($conn,$show_sql);

    $row = mysqli_fetch_array($show_res);
}

if(isset($_POST['update'])){

    $uid = $_POST['uid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $hobby_name = implode(',',$hobby);
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $degree = $_POST['degree'];
    $degree_name = implode('-',$degree);
    $img = $_FILES['img']['name'];

    if($img=="")
    {


        $update_sql = "update user set f_name='$fname', l_name='$lname', u_name='$uname', email='$email', pass='$pass', gender='$gender',hobby='$hobby_name', c_id='$country', s_id='$state', city='$city', d_id='$degree_name' where u_id='$uid'";


    }else{
        
        move_uploaded_file($_FILES['img']['tmp_name'],"images/".$_FILES['img']['name']);

    
         $update_sql = "update user set f_name='$fname', l_name='$lname', u_name='$uname', email='$email', pass='$pass', gender='$gender',hobby='$hobby_name', c_id='$country', s_id='$state', city='$city', d_id='$degree_name', img='$img' where u_id='$uid'";

    }


    //print $update_sql;
    

    $update_res = mysqli_query($conn,$update_sql);
   
   
   if($update_res){
       // header("location:admin.php?view=listuser.php");
       ?>
       <script language="JavaScript">
         location.href="admin.php?view=listuser.php";
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
    
    <form method="post"   onsubmit="return validate()" enctype="multipart/form-data">
        <input type="hidden" name="uid" value="<?=$row[0];?>">
        <table>
            <th colspan="2">User Login</th>
            <tr>
                <td>First Name</td>
                <td><input id=fname  onclick="JavaScript:click();" type="text" name="fname" value="<?=$row[1];?>"></td>
            </tr>
            <tr>
                <td>Last Nam</td>
                <td><input type="text" id="lname" name="lname" value="<?=$row[2];?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" id="uname" name="uname" value="<?=$row[3];?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?=$row[4];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" value="<?=$row[5];?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender" value="male"<?php if($row[6] == "male") echo "checked";  ?>>Male
                    <input type="radio" name="gender" value="female" <?php if($row[6] == "female") echo "checked";  ?>>Female</td>
            </tr>
            <tr>
                <td>Hobby</td>
                <td>
                <?php

                    $hby = @explode(",",$row['hobby']);
                   
                    ?>
                    <input type="checkbox" name="hobby[]" value="cricket" <?php if(in_array("cricket",$hby)){?> checked="checked"<?php }?>>cricket
                    <input type="checkbox" name="hobby[]" value="coding" <?php if(in_array("coding",$hby)){?> checked="checked"<?php }?>>Coding
                    <input type="checkbox" name="hobby[]" value="traveling" <?php if(in_array("traveling",$hby)){?> checked="checked"<?php }?>>Traveling</td>
            </tr>
            <tr>
                <td>Country</td>
                <td><select name="country">
                    <?php
                    $sql = "select * from country where c_id";

                    $c_res = mysqli_query($conn,$sql);
                    


                    while($c_col = mysqli_fetch_object($c_res)){
                    ?>
                    <option 
                    <?php if($row[8] == $c_col->c_id) print "selected"; ?>
                    value="<?php echo $c_col->c_id;?>"><?php echo $c_col->c_name;?></option>
                    <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>State</td>
                <td><select name="state">
                <?php
                    $sql = "select * from state where s_id";

                    $s_res = mysqli_query($conn,$sql);
                    


                    while($s_col = mysqli_fetch_object($s_res)){
                    ?>
                    <option 
                    <?php if($row[9] == $s_col->s_id) print "selected"; ?>
                    value="<?php echo $s_col->s_id;?>"><?php echo $s_col->s_name;?></option>
                    <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" value="<?=$row[10]; ?>"></td>
            </tr>
            <tr>
                <td>Degree</td>
            <?php

   $degree= $row['d_id'];

    $arr_degree=explode("-",$degree);

?>

                <td><select name="degree[]" multiple size = 4>
                <?php

                    $sql = "select * from degree where d_id";

                    $d_res = mysqli_query($conn,$sql);

                    while($d_col = mysqli_fetch_object($d_res)){
                    ?>
                    <option      
                    
                    <?php if(in_array($d_col->d_name,$arr_degree)) print "selected"; ?>

                    >
                    <?php echo $d_col->d_name;?>
                </option>
                    <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>Upload Your Photo</td>
                <td><input type="file" name="img"> <?php
                        if($_REQUEST['id']){
                    ?><img src="images/<?=$row[12]?>" width="50" hight="50" >
                    <?php } ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <td>
                <td colspan="2">
                <?php
                        if($_REQUEST['id']){
                    ?>
                    <input type="submit" name="update" value="Update user">
                    <?php }
                    else{?>
                    <input type="submit" id="submit" name="save" value="Save">
                    <?php }?>    
                </td>
            </td>
        </table>
    </form >
</body>
</html>
<!doctype html>
