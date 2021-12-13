<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Transaction</title>
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
        </style>
    </head>
    <body>
        <?php
            include('database.php');
            include('navbar.php');
        ?>
        <?php
            $id = $_GET['id'];
            $res=mysqli_query($con,"select * from customers where id='$id'");
            if(mysqli_num_rows($res)>0)
            {
        ?>
        <img class="background" src="https://swall.teahub.io/photos/small/155-1558403_wallpaper-linear-blue-highlight-gradient-white-light-white.jpg">
        <h1 class='text-center'>Transaction</h1><br>
        <div class="table1">
        <form action="" method="post">
            <table class="table table-striped">
                <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">NAME</th>
                    <th style="text-align:center">BALANCE</th>
                </tr>
                <?php
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $sname=$row['name'];
                        $sbal=$row['balance'];
                        echo "<tr>";
                        echo "<td style='text-align:center'>".$row['id']."</td>";
                        echo "<td style='text-align:center'>".$row['name']."</td>";
                        echo "<td style='text-align:center'>".$row['balance']."</td>";
                        echo "</tr>";
                    }
                }
                ?>    
            </table>
            <br><br>
            <table class="table table-bordered">
                <tr><th>TRANSFER TO</th></tr>
                <tr>
                    <td>
                    <select name="name" class="form-control" required>
                        <option>--select--</option>
                        <?php
                            $res=mysqli_query($con,"select * from customers");
                            if(mysqli_num_rows($res)>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    echo "<option value='".$row['name']."'>".$row['name']." (".$row['balance'].") </option>";
                                }
                            }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr><th>AMOUNT TO BE TRANSFERED</th></tr>
                <tr><td><input type="number" class="form-control" name="amt" required></td></tr>
            </table>
            <input type="submit" class="btn btn-primary btn-block" name="transfer" value="TRANSFER">
            <br>
            <a href="customer.php" class="btn btn-warning btn-block">Back</a>
        </form>
        </div>
        <?php
            extract($_POST);
            if(isset($transfer))
            {
                $query1="insert into transaction values('$sname','$name', '$amt')";
                $res=mysqli_query($con,$query1);
                $val1=$sbal-$amt;
                $query2=mysqli_query($con,"update customers set balance='$val1' where id='$id'");
                $query3=mysqli_query($con,"select * from customers where name='$name'");
                $fres=mysqli_fetch_assoc($query3);
                $val2=$fres['balance'];
                $val3=$val2+$amt;
                $query4=mysqli_query($con,"update customers set balance='$val3' where name='$name'");
                echo "<script>alert('Transfered successfully')</script>";
            }
        ?>
    </body>
</html>