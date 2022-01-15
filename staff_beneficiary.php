<?php
session_start();

if(!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Αιτήσεις Αποστολής</title>

        <link rel="stylesheet" href="newcss.css">
        <style>
            .displaystaff_content table,th,td {
                padding:6px;
                border: 1px solid #2E4372;
                border-collapse: collapse;
                text-align: center;
            }

      </style>
      <?php include "boot.php";?>
      <?php include "header.php";?>
    </head>
<body>
       <div class="displaystaff_content">

           <?php include 'staff_navbar.php'?>


    <h3 style="text-align:center;color:#2E4372;"><u>Αιτήσεις Αποστολής</u></h3>
<?php
include '_inc/dbconn.php';
$sql="SELECT * FROM beneficiary1 WHERE status='PENDING'";
$result=  mysqli_query($con, $sql) or die(mysqli_error($con));
?>

           <form action="staff_approve_beneficiery.php" method="POST">
<table align="center">
                        <th>id</th>
                        <th>Αποστολέας</th>
                        <th>Αριθμός Λογ. Αποστ.</th>
                        <th>Παραλήπτης</th>
                        <th>Αριυμός Λογ. Παραλ.</th>
                        <th>Κατάσταση</th>



                        <?php
                        while($rws=  mysqli_fetch_array($result)){
                            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
                            echo ' checked';
                            echo " /></td>";
                            echo "<td>".$rws[2]."</td>";
                            echo "<td>".$rws[1]."</td>";
                            echo "<td>".$rws[4]."</td>";
                            echo "<td>".$rws[3]."</td>";
                            echo "<td>".$rws[5]."</td>";

                            echo "</tr>";
                        } ?>
</table>
                      <table align="center">

                    </table>
                    <input type="submit" name="submit_id" value="Αποδοχή Αίτησης" class='btn btn-primary button_cust2' style="margin-left:330px"/>
               </form>
            </div>
</body>
