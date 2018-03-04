
<?php session_start();
if(isset($_SESSION['id'])){
  if($_SESSION['type']=="Administrateur"){
    header("location:dashboard.php");
 }else if($_SESSION['type']=="Auteur"){
    header("location:News.php");
 }else if($_SESSION['type']=="Joueur"){
    header("location:Profilj.php");
 }else if($_SESSION['type']=="Membre"){
    header("location:Profile.php");
 }
}else{
header("location:index.php");
}
?>
