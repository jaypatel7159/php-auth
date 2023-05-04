<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

$sql = "select sub_category.scat_id,sub_category.scat_name,sub_category.scat_logo,category.cat_name from sub_category join category on sub_category.cat_id=category.cat_id;";

$res = mysqli_query($conn,$sql);

//delete

if(isset($_REQUEST['id'])){

    $sid = $_REQUEST['id'];

    $dsql = "delete from sub_category where scat_id = '$sid'";


    $dres = mysqli_query($conn,$dsql);

    if($dres == true){

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




?>
<html>
<body>
<div class="card">
<div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
          <tr>
            <th>Sub-Category ID</th>
            <th>Sub-Category Name</th>
            <th>Sub-Category Logo</th>
            <th>Category Name</th>
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
            <td><img src="images/<?=$row[2]; ?>"  width="50" height="50"  /></td>
            <td><?=$row[3]; ?></td>
            <td align="center"><a href="admin.php?view=addsubcategory.php&id=<?=$row[0]; ?>">Edit</a></td>
            <td align="center"><a href="admin.php?view=listsubcategory.php&id=<?=$row[0]; ?>">Delete</a></td>   
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>