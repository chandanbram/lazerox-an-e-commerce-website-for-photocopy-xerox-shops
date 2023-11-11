<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:database.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>LAZEROX</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
</head>

<bdy class="index-page sidebar-collapse">
    <nav class="navbar navbar-expand-lg bg-dark fixed-top navbar-dark " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a>
                    LAZEROX
                </a>
                
            </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
					 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="database.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>OUR FILES</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Shopping Cart</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar --><br><br><br><br><br>
    <a class="btn btn-primary btn-round" href="user_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
                      

<font size="5" face="times new roman" >
<table table style="border:1px transparent;margin-left:auto;margin-right:auto;">
  <tr><th><center>BRANCH</center></th><th></th></tr>
  <tr><td>Physics Cycle</td><td><a href="branch_phy.php">View</a></td></tr>
  <tr><td>Chemistry Cycle</td><td><a href="branch_che.php">View</a></td></tr>
  <tr><td>Computer Science and Enginnering</td><td><a href="branch_cs.php">View</a></td></tr>
  <tr><td>Information Science and Engineering</td><td><a href="branch_is.php">View</a></td></tr>
  <tr><td>Electronics and communications Enginnering</td><td><a href="branch_ec.php">View</a></td></tr>
  <tr><td>Electrical and Electronics engineering</td><td><a href="branch_eee.php">View</a></td></tr>
  <tr><td>Mechanical Engineering</td><td><a href="branch_me.php">View</a></td></tr>
  <tr><td>Civil Engineering</td><td><a href="branch_civ.php">View</a></td></tr>
  <tr><td>Artificial Intelligence and Data Science</td><td><a href="branch_ad.php">View</a></td></tr>
  <tr><td>Telecommunications Engineering</td><td><a href="branch_te.php">View</a></td></tr>
  <tr><td>Biotechnology</td><td><a href="branch_bt.php">View</a></td></tr>
  <tr><td>Chemical Enginnering</td><td><a href="branch_ce.php">View</a></td></tr>
  

</table>
                                        
                                </table>
</body>
</html>