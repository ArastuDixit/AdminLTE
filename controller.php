<?php
require "configuration.php";

if(isset($_REQUEST['process']) && $_REQUEST['process']=="login"){
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
     $sql = "SELECT * FROM register WHERE ((email='$email' && password='$password')||(username='$email' && password='$password'))";
    ///die();
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - username: " . $row["username"]. " - email: " . $row["email"]. " - password: " . $row["password"]. "<br>";
    $_SESSION['email']=$row["email"];
    $_SESSION['password']=$row["password"];
    header("location:/AdminLTE/user-list.php");

  }
} else {
  echo "0 results";
}
    }
elseif(isset($_REQUEST['process']) && $_REQUEST['process']=="register"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $file=time().$_FILES['photo']['name'];

    $target_file='upload/';

    // move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    move_uploaded_file($_FILES['photo']['tmp_name'], "C:/xampp/htdocs/AdminLTE/upload/".$file);


    echo $query="INSERT INTO register(username,email,password,photo) values('$username','$email','$password','$file')";
    $result=$conn->query($query);
    header("location:/AdminLTE/user-list.php");
}
?>

