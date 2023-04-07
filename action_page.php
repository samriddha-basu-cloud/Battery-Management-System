<?php session_start(); 
if($_SESSION['username'] == 'admin' && $_SESSION['password'] == 'admin123') { ?>
<?php include('head.php'); ?>
<?php include('db.php'); ?>
<body class="fixed-left">

  <!-- Loader -->
  <div id="preloader">
    <div id="status">
      <div class="spinner"></div>
    </div>
  </div>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
      <?php include('sidebar.php'); ?>
    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
      <!-- Start content -->
      <div class="content">

        <!-- Top Bar Start -->
        <div class="topbar">
        <?php include('top-bar.php'); ?>

        </div>
        <!-- Top Bar End -->

        <div class="page-content-
        wrapper ">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                  <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                      <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                  </div>
                  <h4 class="page-title">Dashboard</h4>
                </div>
              </div>
            </div>
            <!-- end page title end breadcrumb -->

            <?php if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              } else { ?>
             <?php $query = "SELECT * FROM circle"; 
             $result = $conn->query($query);
             if ($result->num_rows > 0) {?>
              <?php $count = 0;
                              $count1 = 0;
                              $count2 = 0;
                              $count3 = 0;
                              $count4 = 0;
                              $count5 = 0;   ?>           
            <div class="row">
              <div class="col-md-12  align-self-center">
                <div class="card bg-white m-b-30">
                  <div class="card-body new-user">
                    <div class="table-responsive">
                      <table class="table table-hover" id="citydata">
                        <thead>
                          <tr>
                            <th class="border-top-0" style="width:60px;">S.No</th>
                            <th class="border-top-0">Cities</th>
                            <th class="border-top-0">Mains Fail</th>
                            <th class="border-top-0">Sites Of Battery</th>
                            <th class="border-top-0">Rectifier Fail</th>
                            <th class="border-top-0">Door Open</th>
                            <th class="border-top-0">Fire Alarm</th>
                            <!--th class="border-top-0">Fire</th-->
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i=1;// output data of each row
                        while($row = $result->fetch_assoc()) {
                         //print_r($row); 
                          $circleid = $row['id']; 
                          $circlename = $row['circle_name']; ?>
                        
                        <?php $sitename = "SELECT * FROM sites WHERE circle_id = '".$circleid."'"; 
                        $sitename_result = $conn->query($sitename);
                        if ($sitename_result->num_rows > 0) { 
                          while($sitenames_result = $sitename_result->fetch_assoc()) {
                          $api_key = $sitenames_result['api_key']; ?>

                        <?php $query_new="SELECT * FROM sensor_data getLastRecord WHERE circle_id = '". $circleid ."' AND site_key = '".$api_key."'  ORDER BY id DESC LIMIT 1"; ?>
                        <?php $result1 = $conn->query($query_new);
                        if ($result1->num_rows > 0) { ?>
                        
                            <?php  while($row_new = $result1->fetch_assoc()) {
                             // echo '<pre>';
                              //print_r($row_new);?>
                                <?php if($row_new['value1'] != 0){ ?>
                                  <?php //echo $row_new['value1']; ?>

                                <?php } else{ 
                                  $count++;?>
                                  
                                <?php } ?>
                                <?php if($row_new['value2'] != 0){ ?>

                                <?php } else{ 
                                  $count1++;?>
                                  <?php //echo $count1; ?>
                                <?php } ?>
                                <?php if($row_new['value3'] != 0){ ?>
                                
                                <?php } else{
                                  $count2++; ?>
                                  
                                <?php } ?>
                                <?php if($row_new['value4'] != 0){ ?>
                                
                                <?php } else{ 
                                  $count3++;?>
                                  
                                <?php } ?>
                                <?php if($row_new['value5'] != 0){ ?>
                                
                                <?php } else{ 
                                  $count4++;?>
                                  
                                <?php } ?>
                                <?php// if($row_new['value6'] != 0){
                                    ?>
                                <?php //} else{ 
                                 // $count5++;?>
                                <?php //} ?>
                                

                                <?php
                                } 
                                } 
                              }
                            }?>
                                <tr>
                                  <td><?php echo $i++; ?></td>
                                  <td><a href="view.php?circle_id=<?php echo $circleid; ?>&&cityname=<?php echo $circlename; ?>"><?php echo $circlename; ?></a></td> 
                                  <td><a href="mains_fail.php?circle_id=<?php echo $circleid; ?>"><?php echo $count; ?></a></td>
                                  <td><a href="sites_of_battery.php?circle_id=<?php echo $circleid; ?>"><?php echo $count1; ?></a></td>
                                  <td><a href="rectifier_fail.php?circle_id=<?php echo $circleid; ?>"><?php echo $count2; ?></a></td>
                                  <td><a href="door_open.php?circle_id=<?php echo $circleid; ?>"><?php echo $count3; ?></a></td>
                                  <td><a href="fire_alarm.php?circle_id=<?php echo $circleid; ?>"><?php echo $count4; ?></a></td>
                                  <!--td><a href="fire.php?circle_id=<?php echo $circleid; ?>"><?php echo $count5; ?></a></td-->
                                </tr>
               <?php 
               }
               }
                ?>           
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <?php } ?>

            
          </div><!-- container -->


        </div> <!-- Page content Wrapper -->

      </div> <!-- content -->

      <footer class="footer">
       <img src="assets/images/ardom.jpg" style="width:4%;"> © Copyright.
      </footer>

    </div>
    <!-- End Right content here -->

  </div>
  <!-- END wrapper -->


  <!-- jQuery  -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/modernizr.min.js"></script>
  <script src="assets/js/detect.js"></script>
  <script src="assets/js/fastclick.js"></script>
  <script src="assets/js/jquery.slimscroll.js"></script>
  <script src="assets/js/jquery.blockUI.js"></script>
  <script src="assets/js/waves.js"></script>
  <script src="assets/js/jquery.nicescroll.js"></script>
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/skycons/skycons.min.js"></script>
  <script src="assets/plugins/raphael/raphael-min.js"></script>
  <script src="assets/plugins/morris/morris.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

  <script src="assets/pages/dashborad.js"></script>

  <!-- App js -->
  <script src="assets/js/app.js"></script>
  <script>
    /* BEGIN SVG WEATHER ICON */
    if (typeof Skycons !== 'undefined') {
      var icons = new Skycons({
          "color": "#fff"
        }, {
          "resizeClear": true
        }),
        list = [
          "clear-day", "clear-night", "partly-cloudy-day",
          "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
          "fog"
        ],
        i;

      for (i = list.length; i--;)
        icons.set(list[i], list[i]);
      icons.play();
    };

    // scroll

    $(document).ready(function () {

      $("#boxscroll").niceScroll({
        cursorborder: "",
        cursorcolor: "#cecece",
        boxzoom: true
      });
      $("#boxscroll2").niceScroll({
        cursorborder: "",
        cursorcolor: "#cecece",
        boxzoom: true
      });

    });

  </script>
  <script>
    $(document).ready( function () {
      $('#citydata').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel'
      ]
        });
    } );
  </script>

</body>

</html>
<?php } else {
  header('location: index.php');
} ?>
