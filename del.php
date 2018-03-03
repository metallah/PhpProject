<?php session_start();
if($_SESSION['type']!="Administrateur"){
  header("location:index.php");
}
?>
<?php
$con = new mysqli ('localhost','root','root','projet');

if(isset($_GET['ref'])){
  $id= $_GET['ref'];
$query = "DELETE FROM `joueur` WHERE Nlin ='$id' ";
if ($con->query($query) === TRUE) {
    echo "Record DELETED successfully ".'<br><br><a href="Liste_joueurs.php"><input class="btn btn-danger" value="return" type="button"></a>';

} else {
    echo " Error Inserting record: " . $con->error.'<br><br><a href="Liste_joueurs.php"><input class="btn btn-danger" value="return" type="button"></a>';
}
}
?>
