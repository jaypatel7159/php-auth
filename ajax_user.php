<?php
ini_set("display_errors","ON");


$conn = mysqli_connect("localhost","root","","online_dukan");

$srh = $_REQUEST['srh'];



 $show_sql = "SELECT user.u_id, user.f_name, user.l_name, user.u_name, user.email, user.pass, user.gender, user.hobby, country.c_name, state.s_name, user.city, user.d_id, user.img 
 from user 
 INNER JOIN country ON user.c_id=country.c_id 
 INNER JOIN state ON user.s_id=state.s_id 
 where user.f_name  like '%$srh%'  OR user.l_name  like '%$srh%' OR user.u_name  like '%$srh%' OR user.email  like '%$srh%' ";
 

 $show_res = mysqli_query($conn,$show_sql);

?>

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
            <td><a href="admin.php?view=user.php&id=<?=$row[0]; ?>">Update</a></td>
            <td><a href="admin.php?view=listuser.php&id=<?=$row[0]; ?>">Delete</a> <input type="checkbox" name="del" value="<?=$row[0]; ?>" ></td>

          </tr>
          <?php  } ?>
          

        </tbody>
      </table>