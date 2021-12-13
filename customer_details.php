<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <style>
            img.background {
                position: absolute;
                left: 0px;
                top: 0px;
                z-index: -1;
                width: 100%;
                height: 100%;
            }

            table, th, td {
                border: 1px solid white;
                border-collapse: collapse;
                text-align: center;
            }

            th, td {
                padding: 15px;
                height: 40px;
            }
        </style>
    </head>
    <body>
        <?php
            include('database.php');
            include('navbar.php');
        ?>
        <img class="background" src="https://swall.teahub.io/photos/small/155-1558403_wallpaper-linear-blue-highlight-gradient-white-light-white.jpg">
        
        <?php
            $id = $_GET['id'];
            $res=mysqli_query($con,"select * from customers where id='$id'");
            $cus_res=mysqli_query($con,"select * from customers where id='$id'");
            $cus=mysqli_fetch_assoc($cus_res);
            echo "<br>";
            echo "<h1 class='text-center' style='color: #003399; font-family:Serif'>Welcome ".$cus['name']."!!!</h1><br>";
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <center>
        <table border="1" align="center" width="50%" >
            <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $date=$row['dob'];
                    $timestamp = strtotime($date);
                    $ndate = date("d-m-Y", $timestamp);
                    echo "<tr>";
                    echo "<th style='text-align:center'>USER ID</th>";
                    echo "<td style='color:#990073'><b>".$row['id']."</td></b>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th style='text-align:center'>NAME</th>";
                    echo "<td style='color:#990073'><b>".$row['name']."</td></b>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th style='text-align:center'>DOB</th>";
                    echo "<td style='color:#990073'><b>".$ndate."</td></b>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th style='text-align:center'>GENDER</th>";
                    echo "<td style='color:#990073'><b>".$row['gender']."</td></b>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th style='text-align:center'>EMAIL</th>";
                    echo "<td style='color:#990073'><b>".$row['email_id']."</td></b>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th style='text-align:center'>MOBILE NUMBER</th>";
                    echo "<td style='color:#990073'><b>".$row['phone_no']."</td></b>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th style='text-align:center'>BALANCE</th>";
                    echo "<td style='color:#990073'><b>".$row['balance']."</td></b>";
                    echo "</tr>";
                }
            }
            ?>       
        </table>
        <a href="customer.php" class="btn btn-primary but1">Back</a>
        <br><br>
        </center>
    </body>
</html>