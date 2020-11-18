<?php
ob_start();
session_start();
if ($_SESSION['name'] != 'admin') {
    header('location: login.php');
}
?>
<?php
include 'header.php';
?>
<div class="col-sm-9 col-md-9 col-lg-9">
    <div id="content">
        <div class="dashboard_description">
            <h2><span class="glyphicon glyphicon-dashboard" style="color:#FF9800;"></span> &nbsp; &nbsp; Dashboard of Sheikh Fazilatunnesa Mujib Hall</h2><hr />
            <p>Welcome to the dashboard of Sheikh Fazilatunnesa Mujib Hall
                This is the dashboard of your blog. You can manage all of the students, employees account from here.
            </p>
            <a target="_blank" href="../index.php" class="btn btn-info">View Site</a>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
