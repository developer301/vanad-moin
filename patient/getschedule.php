<?php
session_start();
include_once '../include/conn/dbconnect.php';
$q = $_GET['q'];
$res = mysqli_query($con,"SELECT * FROM doctorschedule WHERE scheduleDate='$q'");
if (!$res) {
// die("Error running $sql: " . mysqli_error());
}

if (mysqli_num_rows($res)==0) {
        echo "<p class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</p>";
        } else {
        echo "   <table class='table'>";
            echo " <thead>";
                echo " <tr>";
                echo " <th style='font-size:10px;'>App Id</th>";
                echo " <th style='font-size:10px;'>Day</th>";
                echo " <th style='font-size:10px;'>Date</th>";
                echo "  <th style='font-size:10px;'>Start Time</th>";
                echo "  <th style='font-size:10px;'>End Time</th>";
                echo " <th style='font-size:10px;'>Availability</th>";
                echo "  <th style='font-size:10px;'>Book Now!</th>";
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <?php
                    // $avail=null;
                    // $btnclick="";
                    if ($row['bookAvail']!='available') {
                    $avail="danger";
                    $btnstate="disabled";
                    $btnclick="danger";
                    } else {
                    $avail="primary";
                    $btnstate="";
                    $btnclick="primary";
                    }

                   
                    // if ($rowapp['bookAvail']!="available") {
                    // $btnstate="disabled";
                    // } else {
                    // $btnstate="";
                    // }
                    
                    echo "<td style='font-size:10px;font-weight:bold;'>" . $row['scheduleId'] . "</td>";
                    echo "<td style='font-size:10px;font-weight:bold;'>" . $row['scheduleDay'] . "</td>";
                    echo "<td style='font-size:10px;font-weight:bold;'>" . $row['scheduleDate'] . "</td>";
                    echo "<td style='font-size:10px;font-weight:bold;'>" . $row['startTime'] . "</td>";
                    echo "<td style='font-size:10px;font-weight:bold;'>" . $row['endTime'] . "</td>";
                    echo "<td style='font-size:10px;font-weight:bold;'> <span class='label label-".$avail."'>". $row['bookAvail'] ."</span></td>";
                    echo "<td style='font-size:10px;font-weight:bold;'><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."' class='btn btn-".$btnclick." btn-xs' role='button' ".$btnstate." style='font-size:10px;font-weight:bold;'>Book Now</a></td>";
                    echo "<td style='font-size:10px;font-weight:bold;'><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."'></a></td>";
                    ?>
                    
                    </script>
                    <!-- ?> -->
                </tr>
                
                <?php
                }
                }
                ?>
            </tbody>
            <!-- modal start -->
        