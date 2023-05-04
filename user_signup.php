<?php 
 ini_set("display_errors","OFF");

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['signup'])){


    
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
         location.href="login.php";
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

</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <style>
      .pb-5 {
    padding-bottom: 0rem!important;
}
div#merge {
    display: flex;
}
.form-label {
    margin-bottom: 0.5rem;
    float: left;
}

    </style>
  <form method="post" enctype="multipart/form-data">
    
  <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-6 col-md-8 col-lg-6 col-xl-5">

        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">SignUp</h2>
              
            <div id="merge">
              <div class="form-outline form-white mb-4">
              <label class="form-label" >First Name</label>
                <input type="text"  name="fname" class="form-control form-control-lg" />
              </div>&nbsp;&nbsp;

              <div class="form-outline form-white mb-4">
              <label class="form-label" >Last Name</label>
                <input type="text"  name="lname" class="form-control form-control-lg" />
              </div>
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" >Username</label>
                <input type="text" name="uname" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Email</label>
                <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" name="pass" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" >Gender</label>
              <input type="radio" name="gender" value="male"<?php if($row[6] == "male") echo "checked";  ?>  />Male &nbsp;
              <input type="radio" name="gender" value="female" <?php if($row[6] == "female") echo "checked";  ?> />Female
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" >Hobby</label>
              <?php

                $hby = @explode(",",$row['hobby']);

                ?>
                <input type="checkbox" name="hobby[]" value="cricket" <?php if(in_array("cricket",$hby)){?> checked="checked"<?php }?>>cricket &nbsp;
                <input type="checkbox" name="hobby[]" value="coding" <?php if(in_array("coding",$hby)){?> checked="checked"<?php }?>>Coding &nbsp;
                <input type="checkbox" name="hobby[]" value="traveling" <?php if(in_array("traveling",$hby)){?> checked="checked"<?php }?>>Traveling &nbsp;
              </div>

              <div id="merge">
              <div class="form-outline form-white mb-4">
              <label class="form-label" >Country</label>
              <select name="country" class="form-control form-control-lg">
                    <?php
                    $sql = "select * from country where c_id";

                    $c_res = mysqli_query($conn,$sql);
                    


                    while($c_col = mysqli_fetch_object($c_res)){
                    ?>
                    <option 
                    <?php if($row[8] == $c_col->c_id) print "selected"; ?>
                    value="<?php echo $c_col->c_id;?>"><?php echo $c_col->c_name;?></option>
                    <?php } ?>
                </select>
              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <div class="form-outline form-white mb-4">
              <label class="form-label" >State</label>
              <select name="state" class="form-control form-control-lg">
                <?php
                    $sql = "select * from state where s_id";

                    $s_res = mysqli_query($conn,$sql);
                    


                    while($s_col = mysqli_fetch_object($s_res)){
                    ?>
                    <option 
                    <?php if($row[9] == $s_col->s_id) print "selected"; ?>
                    value="<?php echo $s_col->s_id;?>"><?php echo $s_col->s_name;?></option>
                    <?php } ?>
                </select>
              </div>
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" >City</label>
                <input type="text" name="city" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" >State</label>
              <?php

   $degree= $row['d_id'];

    $arr_degree=explode("-",$degree);

?>
              <select name="degree[]" multiple size = 4 class="form-control form-control-lg">
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
                </select>
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" >Upload Your Photo</label>
              <input type="file" name="img"> <?php
                        if($_REQUEST['id']){
                    ?><img src="images/<?=$row[12]?>" width="50" hight="50" class="form-control form-control-lg">
                    <?php } ?> 
              </div>

            

              <button class="btn btn-outline-light btn-lg px-5" name="signup" type="submit">Sign Up</button>

             

            </div>

            <div>
              <p class="mb-0">have an account? <a href="login.php" class="text-white-50 fw-bold">Login</a>
              </p>
            </div>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 

    <!--form method="post">
    <input type="hidden" name="user_id"  value="<?=$row[0];?>">
        <table align="center" border="1" width="50%">
            <th colspan="2"><h1>Admin Login</h1></th>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form-->
</body>
</html>