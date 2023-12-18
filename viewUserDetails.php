<?php
session_start();
include "header.php";
include "connection.php";
if (!isset($_SESSION["admin"])) {
?>
    <script>
        window.location = "traineePageLogin.php";
    </script>
<?php
}

?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>Details</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Batch Timings</th>
                <th>Start Date</th>
                <!-- <th>End Date</th> -->
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            // LOOP TILL END OF DATA
            $result = mysqli_query($link, "select * from user_table where email='$_SESSION[admin]' ");
            while ($rows = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                    <td><?php echo $rows["name"]; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td><?php echo $rows['age']; ?></td>
                    <td><?php echo $rows['number']; ?></td>
                    <?php 
                    if($rows['batch_id']==1){
                        ?><td><?php echo "6-7 AM"; ?></td> <?php
                    }
                    else if($rows['batch_id']==2){
                        ?><td><?php echo "7-8 AM"; ?></td> <?php
                    }
                    else if($rows['batch_id']==3){
                        ?><td><?php echo "8-9 AM"; ?></td> <?php
                    }
                    else if($rows['batch_id']==4){
                        ?><td><?php echo "5-6 PM"; ?></td> <?php
                    }
                    ?>
                    <td><?php echo $rows['start_date']; ?></td>
                    <!-- <td><?php echo $rows['articles']; ?></td> -->
                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>
<?php
include "footer.php";
?>