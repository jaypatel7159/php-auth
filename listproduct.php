<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

//$show_sql = "select * from user";
$show_sql = "SELECT product.prod_id, product.prod_name, product.prod_desc, product.prod_code, brand.b_name, category.cat_name, sub_category.scat_name, product.prod_img, product.prod_logo 
from product 
INNER JOIN brand ON product.b_id=brand.b_id 
INNER JOIN category ON product.cat_id=category.cat_id 
INNER JOIN sub_category ON product.scat_id=sub_category.scat_id 
order by prod_id DESC";


$show_res = mysqli_query($conn,$show_sql);

if(isset($_REQUEST['id'])){

    $pid = $_REQUEST['id'];

    $del_sql = "delete from product where prod_id = '$pid'";

    $del_res = mysqli_query($conn,$del_sql);

    if($del_res == true){
        //header("location:admin.php?view=listuser.php");
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
</head>

<body>
  <style>
    .p-0 {
    padding: 20px !important; 
    }
    td {
    font-size: 12px;
    border: 1px solid;
}
th {
  border: 1px solid;
    font-size: 15px;
    padding: 0 5px;
}
  </style>

  
  <div class="card">
    
    <div class="card-body table-responsive p-0">
      <table class="table-striped table-valign-middle">
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Desc</th>
            <th>Product Code</th>
            <th>Brand Name</th>
            <th>Category Name</th>
            <th>Sub-Category Name</th>
            <th>Product Image</th>
            <th>Product Logo</th>
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
            <td align="center"><img src="images/<?=$row[7]; ?>" width="40" height="40"></td>
            <td align="center"><img src="images/<?=$row[8]; ?>" width="40" height="40"></td>
            <td align="center"><a href="admin.php?view=addproduct.php&id=<?=$row[0]; ?>">Update</a></td>
            <td align="center"><a href="admin.php?view=listproduct.php&id=<?=$row[0]; ?>">Delete</a></td>

          </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>

</body>

</html>
