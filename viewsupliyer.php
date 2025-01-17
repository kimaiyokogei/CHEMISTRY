<?php
require_once "header.php";
require_once "MySql.php";

$mydb=new MySql();

if (isset($_POST['search'])) $search = $_POST['search'];
else $search="";

$mydbQuery="Select Supplierid,Name,Email,Phone,Address FROM supplier WHERE Storeid='$sid' AND Name LIKE"."'%".$search."%'";
$mydbSelect=$mydb->select($mydbQuery);
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> View Suppliers</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-laptop"></i>View Supplier</li>
                </ol>
            </div>
        </div>
        <!--END-->
        <!-- project team & activity end -->
        <!--Main Table starts here-->
        <div class="row">
            <section class="panel">
                <form class="navbar-form" action="" method="post">
                    <input name="search" class="form-control" placeholder="Search" type="text" value="<?php if (isset($_POST['search'])) {echo($_POST['search']);} ?>">
                    <button class="btn btn-danger" type="submit">Go!</button>
                </form>
                <header class="panel-heading">
                    All Suppliers
                </header>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Supplierid</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php
                        if(count($mydbSelect)) {
                            foreach ($mydbSelect as $row) {
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $row['Supplierid']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td> <form method="post" action="suppliertotal.php"> <input type="hidden" name="mySupplierid"  value="<?php echo $row['Supplierid'];?>"> <button id="btn" type="submit" name="btnView" class="btn btn-warning">Total</button> </form> </td>

                                    <td> <form method="post" action="updateSupplier.php"> <input type="hidden" name="mySupplierid"  value="<?php echo $row['Supplierid'];?>"> <button id="btn" type="submit" name="btnView" class="btn btn-success">Update</button> </form> </td>

                                </tr>
                                </tbody>
                            <?php
                            }
                        }
                        else
                        {
                            echo "Oops :( No Data Found";
                        }
                        ?>
                    </table>
                </div>

            </section>
        </div>
        </div>
        <!--Main Table ends here-->

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="assets/jquery-knob/js/jquery.knob.js"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<!-- jQuery full calendar -->
<<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="js/calendar-custom.js"></script>
<script src="js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="js/jquery.customSelect.min.js" ></script>
<script src="assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="js/scripts.js"></script>
<!-- custom script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/xcharts.min.js"></script>
<script src="js/jquery.autosize.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/sparklines.js"></script>
<script src="js/charts.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function(){
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code){
                el.html(el.html()+' (GDP - '+gdpData[code]+')');
            }
        });
    });



</script>

</body>
</html>