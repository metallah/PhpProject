<?php
session_start();
if(isset($_SESSION['login'])){
  header("location:profile.php");
}
if(!empty($_POST)){
  try {
    $con =new PDO('mysql:host=localhost;dbname=projet','root','');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $type = $_POST['taskOption'];
    $query= "INSERT INTO `compte` (`login`, `motpass`, `type`, `EstActif`)VALUES('$name', '$password','$type','1')";
    $con->exec($query);
    echo "done! saved " . $query;
    header("location:index.php");
}
catch(PDOException $e)
{
echo $query . "<br>" . $e->getMessage();
}
  }else{
    header("location:register.php");
  }
?>
