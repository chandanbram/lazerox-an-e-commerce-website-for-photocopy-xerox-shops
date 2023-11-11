<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lazerox</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS FILES -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    

</head>
<body class="index-page sidebar-collapse">
    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>All Product List</h2>
                      <a class="btn btn-primary btn-round" href="user_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
                      <hr color="orange"> 
                
                <div class="col-md-12">
                <br>
            
                <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">

                            <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM products ORDER BY prod_id ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                 
                                
                                <table id="" class="table table-condensed ">
                                    <tr>
                                    <th>Prod ID</th>
                                      <th>SEM</th>
                                      <th>Branch</th>
                                      <th>Sub Code</th>
                                      <th>Description</th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>
                                        <?php
                                        
                                          if($result){
                                            
                                            while($res = mysqli_fetch_array($result)) {   
                                              if($res['category']=='PHY') { 
                                              echo "<tr>";
                                              echo "<td>".$res['prod_id']."</td>";
                                              echo "<td>".$res['sem']."</td>";
                                              echo "<td>".$res['category']."</td>";
                                              echo "<td>".$res['sub_code']."</td>";
                                              echo "<td>".$res['prod_desc']."<td>";  
                                              echo "<td><a href=\"$res[prod_file]\">View</a></td>";
                                              echo "<td><button class='btn btn-success btn-round pull-righ' data-toggle='modal' data-target='#myModal'>
                                              <i class='now-ui-icons shopping_cart-simple'></i>Add To Cart</button><td>";
                                            }
                                          }
                                          }?>
                                          
                                </table><br><br><br><br>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
<br><br><br><br>
<?php
include('../config/dbconn.php');


$result = mysqli_query($dbconn,$query);
while($res = mysqli_fetch_array($result)){

  $prod_id=$res['prod_id'];
  $prod_desc=$res['prod_desc'];
  $user_id = $_SESSION['id'];

            if (isset($_POST['submit'])){

                $prod_id=$prod_id;
                $prod_desc=$prod_desc;
                $prod_qty = $_POST['prod_qty'];                                                
                $user_id = $user_id;

                $date=date("Y-m-d");


                if(empty($prod_qty)){    

                    if(empty($prod_qty)) {
                    echo "<br><center><h4><font color='red'><b>Error!</b> Enter Product Quantity.</font></h4></center>";
                }

                } else {

                mysqli_query($dbconn,"INSERT INTO order_details (prod_id, prod_desc, prod_qty,user_id) 
                        VALUES ('$prod_id','$prod_desc','$prod_qty','$user_id')") or die(mysql_error());
                    ?>
                 
                    <script type="text/javascript">
                        alert("Product Added To Cart!");
                        window.location = "user_cart.php";
                    </script>

                    <?php 
                }
                }
                    } ?>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>


   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

     

            <!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Enter Quantity:</h4>
                  </div>
                  <div class="modal-body">

                    <div class="input-append">
                        <?php
                            echo "<select class='btn btn-warning btn-round dropdown-toggle' size='1' name='prod_qty' id='prod_qty'>";
                            $i=1; $prod_qty=$prod_qty;
                            while ($i <= 200 ){
                                echo "<option value=".$i.">".$i."</option>";
                                $i++;
                            }
                            echo "</select>";
                        ?>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Close</button>
                    <a><button type="submit" name="submit" class="btn btn-success btn-round">Order</button></a>
                  </div>
                </div>
                </form>

              </div>
            </div>
            </div>

            
   </div>
</div>

</html>