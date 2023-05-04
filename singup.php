<?php

$conn = mysqli_connect("localhost","root","","online_dukan");

if(isset($_POST['singup'])){

    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $number = $_POST['number'];

    $sql = "insert into user (uname, email, pass, lname, fname, gender, country, state, city, number) values
     ('$uname','$email','$pass','$lname','$fname','$gender','$country','$state','$city','$number')";

    $res = mysqli_query($conn,$sql);

    if($res == true){
        header("location:login.php");
    }
    else{
        echo mysqli_error($conn);
    }

}


?>
<html>
<body>
    <form method="post">
        <table border="1" align="center" width="50%">
            <tr >
            <th colspan=2  align="center">Singup</th>
            </tr>
            
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname" value=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value=""></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" value=""></td>
            </tr>
            
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" value=""></td>
            </tr>
            <tr>
                <td>First name:</td>
                <td><input type="text" name="fname" value=""></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><input type="text" name="country" value=""></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" value=""></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" value=""></td>
            </tr>
            <tr>
                <td>Number:</td>
                <td><input type="number" name="number" value=""></td>
            </tr>
            <tr>
                <td colspan=2  align="center"><input type="submit" name="singup" value="Singup"></td>
                
            </tr>
        </table>
    </form>
</body>
</html>