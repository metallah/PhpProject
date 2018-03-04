<?php
session_start();
if(isset($_SESSION['id'])){
  header("location:welcome.php");
}
if(!empty($_POST)){
  try {
    $con = new mysqli("localhost", "root", "", "projet");
    $login=$_POST['login'];
    $password=$_POST['pass'];
    $query = "Select * FROM `compte` WHERE login='$login' AND motpass='$password' ";
    $result = $con->query($query);
    $row=$result->fetch_row();
    //print_r($row);
     if(isset($row)) {

        $_SESSION['id'] = $row[0];
        //echo "Welcom ";
        $_SESSION['type'] = $row[2];
        echo " $row[0] $row[1] $row[2] $row[3] ";
        if($row[2]=="Administrateur"){
          echo "adminlte";
       }else if($row[2]=="Auteur"){
           echo "auteur";
       }else if($row[2]=="Joueur"){
           echo "jouer";
       }else if($row[2]=="Membre"){
          echo "member";
       }
       echo "<a href='welcome.php'>Redirect</a>";
        header("welcome.php");
     }else {
        echo "Your Login Name or Password is invalid";
     }
}
catch(PDOException $e)
{
echo $query . "<br>" . $e->getMessage();
}
  }else{
    header("location:register.php");
  }






?>
