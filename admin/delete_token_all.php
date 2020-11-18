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
    header('location: view_dining.php');
} else {
    $id = $_REQUEST['id'];
}
?>

<?php

$statement = $db->prepare("DELETE FROM tbl_token_buy ORDER BY id");
$statement->execute();
header('location: view_dining.php');
?>