<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

$sql = "select * from brand";

$res = mysqli_query($conn,$sql);

//delete

if(isset($_REQUEST['id'])){

    $cid = $_REQUEST['id'];

    $dsql = "delete from brand where b_id = '$bid'";


    $dres = mysqli_query($conn,$dsql);

    if($dres == true){

    //header("location:admin.php?view=listcountry.php");
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
<body>
  <style>
    tr {
    text-align: center;
}
  </style>
<div class="card">
<div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
          <tr>
            <th>Brand ID</th>
            <th>Brand Name</th>
            <th>Brand Logo</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_array($res)){
        ?>
        <tr>
            <td><?=$row[0]; ?></td>
            <td><?=$row[1]; ?></td>
            <td>  <img src="images/<?=$row[2]; ?>"  width="50" height="50"  /></td>
            <td align="center"><a href="admin.php?view=addbrand.php&id=<?=$row[0]; ?>">Edit</a></td>
            <td align="center"><a href="admin.php?view=listbrand.php&id=<?=$row[0]; ?>">Delete</a></td>   
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
</body>
</html>