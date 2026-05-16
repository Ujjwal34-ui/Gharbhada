<?php
include 'db.php';

$payments=mysqli_query($conn,

"SELECT tenants.name,
        flats.flat_no,
        monthly_bills.month_name,
        monthly_bills.electricity_units,
        monthly_bills.electricity_bill,
        monthly_bills.water_bill,
        monthly_bills.rent_amount,
        monthly_bills.total_bill,
        monthly_bills.payment_date

 FROM monthly_bills

 JOIN tenants
 ON monthly_bills.tenant_id=tenants.id

 JOIN flats
 ON tenants.flat_id=flats.id");
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment History</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Payment History</h2>

<table>

<tr>
<th>Tenant</th>
<th>Flat</th>
<th>Month</th>
<th>Units</th>
<th>Electricity</th>
<th>Water</th>
<th>Rent</th>
<th>Total</th>
<th>Date</th>
</tr>

<?php

$total_paid=0;

while($row=mysqli_fetch_assoc($payments)){

$total_paid += $row['total_bill'];
?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['flat_no']; ?></td>

<td><?php echo $row['month_name']; ?></td>

<td><?php echo $row['electricity_units']; ?></td>

<td><?php echo $row['electricity_bill']; ?></td>

<td><?php echo $row['water_bill']; ?></td>

<td><?php echo $row['rent_amount']; ?></td>

<td><?php echo $row['total_bill']; ?></td>

<td><?php echo $row['payment_date']; ?></td>

</tr>

<?php } ?>

</table>

<div class="summary">

<h3>
Total Amount Collected:
Rs. <?php echo $total_paid; ?>
</h3>

</div>

<a class="back-btn" href="index.php">
Back
</a>

</div>

</body>
</html>