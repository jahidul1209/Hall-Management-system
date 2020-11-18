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
    header('location: view_programs.php');
} else {
    $id = $_REQUEST['id'];
}
?>

<?php

$statement1 = $db->prepare("SELECT * FROM tbl_program WHERE id=?");
$statement1->execute(array($id));
$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
foreach ($result1 as $row1) {
    $real_path = "../images/programs/" . $row1['image'];
    unlink($real_path); //Delete the exixting image
}

$statement = $db->prepare("DELETE FROM tbl_program WHERE id=?");
$statement->execute(array($id));
header('location: view_programs.php');
?>
