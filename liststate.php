<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

$sql = "select state.s_id,state.s_name,state.s_desc,country.c_name from state join country on state.c_id=country.c_id;";

$res = mysqli_query($conn,$sql);

//delete

if(isset($_REQUEST['id'])){

    $sid = $_REQUEST['id'];

    $dsql = "delete from state where s_id = '$sid'";


    $dres = mysqli_query($conn,$dsql);

    if($dres == true){

    //header("location:admin.php?view=liststate.php");
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




?>
<html>
<body>
<div class="card">
<div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
          <tr>
            <th>State ID</th>
            <th>State Name</th>
            <th>State Details</th>
            <th>Country Name</th>
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
            <td><?=$row[2]; ?></td>
            <td><?=$row[3]; ?></td>
            <td align="center"><a href="admin.php?view=addstate.php&id=<?=$row[0]; ?>">Edit</a></td>
            <td align="center"><a href="admin.php?view=liststate.php&id=<?=$row[0]; ?>">Delete</a></td>   
        </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
</div>
</body>
</html>