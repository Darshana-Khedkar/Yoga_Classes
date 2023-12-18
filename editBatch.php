<?php
session_start();
include "header.php";
include "connection.php";
if (!isset($_SESSION["admin"])) {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}

$res = mysqli_query($link, "select * from user_table where email='$_SESSION[admin]'");
while ($row = mysqli_fetch_array($res)) {
    $start = $row['start_date'];
    $batch = $row['batch_id'];
}
?>
<div id="right-panel" class="right-panel">

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Batch Timing</h1>
                </div>
            </div>
        </div>

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form name="form1" action="" method="post">
                            <div class="card-body">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit Batch Timing</strong></div>
                                        <div class="card-body card-block">
                                            <div class="column">
                                                <div class="select-box">
                                                    <label>Batch Timing</label>
                                                    <select name="batch_id">
                                                        <option hidden></option>
                                                        <option value="1">6 - 7 AM</option>
                                                        <option value="2">7 - 8 AM</option>
                                                        <option value="3">8 - 9 AM</option>
                                                        <option value="4">5 - 6 PM</option>
                                                    </select>
                                                </div>
                                                <label>Start Date</label>
                                                <input type="date" placeholder="From When did you want to start" name="start_date" required />
                                                <br>
                                                <div class="form-group">
                                                    <input type="submit" value="Update Exam" name="submit" class="btn btn-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </form>
                    </div>

                </div> <!-- .card -->
            </div>
            <!--/.col-->

        </div><!-- .animated -->
    </div><!-- .content -->

    <?php
    $result = mysqli_query($link, "select * from user_table where email='$_SESSION[admin]' ");
    $rows = mysqli_fetch_array($result);
    $string_date = $rows['start_date'];
    // echo $string_date."<br>";
    $curr_date = date('d/m/Y', time());
    // $curr_date = "6/12/2022";

    // echo $curr_date;
    $j = 0;
    $count = 0;
    $curr_dd = "";
    $curr_mm = "";
    $curr_yy = "";
    for ($i = 0; $i < strlen($curr_date); $i++) {
        if ($j == 0) {
            if ($curr_date[$i] != '/') {
                $count++;
            } else {
                if ($count == 1)
                    $curr_dd = "0" . $curr_date[$i - 1];
                else
                    $curr_dd = $curr_dd . $curr_date[$i - 2] . $curr_date[$i - 1];
                $count = 0;
                $j++;
            }
        } else if ($j == 1) {
            if ($curr_date[$i] != '/') {
                $count++;
            } else {
                if ($count == 1)
                    $curr_mm = "0" . $curr_date[$i - 1];
                else
                    $curr_mm = $curr_mm . $curr_date[$i - 2] . $curr_date[$i - 1];
                $count = 0;
                $j++;
            }
        }
        else if ($curr_date[$i] != '/') {
            $curr_yy = $curr_yy . $curr_date[$i];
        }
    }
    // echo $curr_dd;
    // echo "-";
    // echo $curr_mm;
    // echo "-";
    // $curr_yy = substr($curr_yy,0,4);
    // echo $curr_yy;
    // echo"<br>";
    $start_dd = substr($string_date, 8, 10);
    $start_mm = substr($string_date, 5,2);
    $start_yy = substr($string_date, 0,4);
    // echo $start_dd."-";
    // echo $start_mm."-";
    // echo $start_yy;
    $monthDays = array(
        31, 59, 90, 120, 151, 181, 212, 243,
        273, 304, 334, 365
    );
    $d1 = array($curr_dd, $curr_mm, $curr_yy);
    $d2 = array($start_dd, $start_mm, $start_yy);
    function countLeapYearDays($d)
    {
        $years = $d[2];
        if ($d[1] <= 2)
            $years--;
        return (($years / 4) - ($years / 100) + ($years / 400));
    }
    $dayCount1 = ($d1[2] * 365);
    $dayCount1 += $monthDays[$d1[1] - 1];
    $dayCount1 += $d1[0];
    $dayCount1 += countLeapYearDays($d1);
    $dayCount2 = ($d2[2] * 365);
    $dayCount2 += $monthDays[$d2[1] - 1];
    $dayCount2 += $d2[0];
    $dayCount2 += countLeapYearDays($d2);
    // echo"<br>";
    $no_of_days = ($dayCount1 - $dayCount2);



    if ($no_of_days > 30 && isset($_POST["submit"])) {
        mysqli_query($link, "update user_table set batch_id='$_POST[batch_id]' , start_date = '$curr_date' where email='$_SESSION[admin]' ") or die(mysqli_error($link));

    ?>
        <script type="text/javascript">
            alert("Redirecting to Payment Gateway");
            window.location.href = "gatewayp/payment.php";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            // alert("You cant change your batch in current month");
        </script>
    <?php
    }
    ?>
    <?php
    include "footer.php";
    ?>