<?php
ini_set("display_errors","ON");

$conn = mysqli_connect("localhost","root","","online_dukan");

//$show_sql = "select * from user";
$show_sql = "SELECT user.u_id, user.f_name, user.l_name, user.u_name, user.email, user.pass, user.gender, user.hobby, country.c_name, state.s_name, user.city, user.d_id, user.img 
from user 
INNER JOIN country ON user.c_id=country.c_id 
INNER JOIN state ON user.s_id=state.s_id 
order by u_id DESC";


$show_res = mysqli_query($conn,$show_sql);

if(isset($_REQUEST['delete'])){
 
  $del_user = $_POST['del'];

  if($del_user){
    foreach($del_user as $deluser){
      $dsql = "delete from user where u_id = ".$deluser;
     
      mysqli_query($conn,$dsql);
      ?>
        <script language="JavaScript">
            location.href = "admin.php?view=listuser.php";

        </script><?php
    }
  }
}
else{
    echo mysqli_error($conn);
}



?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  
  <script language="JavaScript">
    function test(srh) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        document.getElementById("demo").innerHTML =
          this.responseText;
      }
      xhttp.open("GET", "ajax_user.php?srh=" + srh);
      xhttp.send();
      //alert(srh);


    }

  </script>


</head>

<body>
  <style>
    .p-0 {
    padding: 20px !important; 
    }
    th, td {
    border: 1px solid;
    padding: 0 5px;
}
td {
    font-size: 12px;
}
  </style>

  
  <div class="card">
  <form method="post">
        <div class="input-group">
        <table class="table table-striped table-valign-middle">
        <tr>
              <td colspan="6" align="right">
          <input type="search" onkeyup="test(this.value)" name="user_search"></td>
        </tr>
        </table>

        </div>
      </form>

      <div id="demo">

    
    
    <div class="card-body table-responsive p-0">
    <form method="post">
      <table class="table-striped table-valign-middle">
        <thead>
          <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Degree</th>
            <th>User Image</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
              
                                              
        while($row=mysqli_fetch_array($show_res)){
        ?>
          <tr>
            
            <td><?=$row[0]; ?></td>
            <td><?=$row[1]; ?></td>
            <td><?=$row[2]; ?></td>
            <td><?=$row[3]; ?></td>
            <td><?=$row[4]; ?></td>
            <td><?=$row[5]; ?></td>
            <td><?=$row[6]; ?></td>
            <td><?=$row[7]; ?></td>
            <td><?=$row[8]; ?></td>
            <td><?=$row[9]; ?></td>
            <td><?=$row[10]; ?></td>
            <td><?=$row[11]; ?></td>
            <td><img src="images/<?=$row[12]; ?>" width="40" height="40"></td>
            <td><a href="admin.php?view=user.php&id=<?=$row[0]; ?>" class="button" type="submit">Update</a></td>
            <td align="center"><input type="checkbox" name="del[]" value="<?=$row[0]; ?>"></td>

          </tr>
          <?php } ?>
            
            <tr>
              <td colspan="15" align="right"><input type="submit" value="Delete" name="delete"></td>
            </tr>
           
          </tbody>
        </table>
        </form>
    </div>
      </div>
  </div>

</body>

</html>
