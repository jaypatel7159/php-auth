<?php
ini_set("display_errors","ON");


$conn = mysqli_connect("localhost","root","","online_dukan");

$srh = $_REQUEST['srh'];



 $sql = "select * from country where c_name like '$srh%'";


$res = mysqli_query($conn,$sql);

?>

<table class="table table-striped table-valign-middle">
  <thead>
    <tr>
      <th>Country ID</th>
      <th>Country Name</th>
      <th>Country Details</th>
      <th>Country Flag</th>
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
      <td> <img src="images/<?=$row[3]; ?>" width="50" height="50" /></td>
      <td align="center"><a href="admin.php?view=addcountry.php&id=<?=$row[0]; ?>">Edit</a></td>
      <td align="center"><a href="admin.php?view=listcountry.php&id=<?=$row[0]; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
