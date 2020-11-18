<?php

ob_start();
session_start();
if ($_SESSION['name'] != 'admin') {
    header('location: login.php');
}
include("../config.php");
?>
<?php

if (!isset($_REQUEST['id'])) {
    header('location: view_employee.php');
} else {
    $id = $_REQUEST['id'];
}
?>

<?php


$statement = $db->prepare("DELETE FROM tbl_complain WHERE id=?");
$statement->execute(array($id));
header('location: view_complain.php');
?>
