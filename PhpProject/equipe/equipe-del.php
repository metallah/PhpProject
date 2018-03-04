<?php session_start();
if($_SESSION['type']!="Administrateur"){
  header("location:index.php");
}
?>
<?php
$con = new mysqli ('localhost','root','','projet');

if(isset($_GET['id'])){
  $id= $_GET['id'];
$query = "DELETE FROM `equipe` WHERE CodeEquipe ='$id' ";
if ($con->query($query) === TRUE) {
    echo "Record DELETED successfully ".'<br><br><a href="../gerer_equip.php"><input class="btn btn-danger" value="return" type="button"></a>';

} else {
    echo " Error Inserting record: " . $con->error.'<br><br><a href="../gerer_equip.php"><input class="btn btn-danger" value="return" type="button"></a>';
}
}
?>
