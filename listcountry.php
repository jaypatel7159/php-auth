<?php

ini_set("display_errors","OFF");

$conn = mysqli_connect("localhost","root","","online_dukan");

  $sql = "select * from country";

$res = mysqli_query($conn,$sql);

//delete

if(isset($_REQUEST['delete'])){
 
    $del_check = $_POST['del'];

    if($del_check){
      foreach($del_check as $delcheck){
        $dsql = "delete from country where c_id =".$delcheck;
       
        mysqli_query($conn,$dsql);
        ?>
          <script language="JavaScript">
              location.href = "admin.php?view=listcountry.php";

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
  <script language="JavaScript">
    function test(srh) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        document.getElementById("demo").innerHTML =
          this.responseText;
      }
      xhttp.open("GET", "ajax_country.php?srh=" + srh);
      xhttp.send();


    }

  </script>

</head>

<body>
  <div class="card">
    <div class="card-body table-responsive p-0">

      <form method="post">
        <div class="input-group">
        <table class="table table-striped table-valign-middle">
        <tr>
              <td colspan="6" align="right">
          <input type="search" onkeyup="test(this.value)" name="country_search"></td>
        </tr>
        </table>

        </div>
      </form>

      <div id="demo">
      <form method="post">
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
              <td align="center"><input type="checkbox" name="del[]" value="<?=$row[0]; ?>"></td>
            </tr>
            <?php } ?>
            
            <tr>
              <td colspan="6" align="right"><input type="submit" value="Delete" name="delete"></td>
            </tr>
           
          </tbody>
        </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
