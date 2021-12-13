<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transaction History</title>
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
                height: 120%;
            }

            table, th, td {
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
        <h1 class='text-center'>Transaction History</h1><br>
        <?php
            $res=mysqli_query($con,"select * from transaction");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <center>
        <div class="table1">
        <table align="center" width="50%" class="table table-striped">
        <tr>
            <th style="text-align:center">SENDER</th>
            <th style="text-align:center">RECEIVER</th>
            <th style="text-align:center">AMOUNT</th>
        </tr>
        
        <?php
                while($row=mysqli_fetch_assoc($res))
                {
                    echo "<tr>";
                    echo "<td>".$row['sender']."</td>";
                    echo "<td>".$row['receiver']."</td>";
                    echo "<td>".$row['amount']."</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        <a href="index.php" class="btn btn-primary">Back</a>
        <br><br>
        </center>
    </body>
</html>