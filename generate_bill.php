<?php
include 'db.php';

$message="";

$tenants=mysqli_query($conn,"SELECT * FROM tenants");

if(isset($_POST['submit'])){

    $tenant_id=$_POST['tenant_id'];
    $month=$_POST['month'];
    $units=$_POST['units'];
    $rate=$_POST['rate'];
    $water=$_POST['water'];
    $date=$_POST['date'];

    $tenant=mysqli_fetch_assoc(mysqli_query($conn,

    "SELECT flats.rent
     FROM tenants
     JOIN flats
     ON tenants.flat_id=flats.id
     WHERE tenants.id='$tenant_id'"));

    $rent=$tenant['rent'];

    $electricity_bill=$units*$rate;

    $total=$rent+$electricity_bill+$water;

    $sql="INSERT INTO monthly_bills
    (tenant_id,month_name,electricity_units,
    electricity_rate,electricity_bill,
    water_bill,rent_amount,total_bill,payment_date)

    VALUES('$tenant_id','$month','$units',
    '$rate','$electricity_bill','$water',
    '$rent','$total','$date')";

    if(mysqli_query($conn,$sql)){

        $message="<div class='success'>
                  Bill Generated Successfully!
                  </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Generate Bill</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Generate Monthly Bill</h2>

<?php echo $message; ?>

<form method="POST">

<select name="tenant_id" required>

<option value="">Select Tenant</option>

<?php while($row=mysqli_fetch_assoc($tenants)){ ?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['name']; ?>

</option>

<?php } ?>

</select>

<input type="text" name="month"
placeholder="Month" required>

<input type="number" name="units"
placeholder="Electricity Units" required>

<input type="number" name="rate"
placeholder="Rate Per Unit" required>

<input type="number" name="water"
placeholder="Water Bill" required>

<input type="date" name="date" required>

<button type="submit" name="submit">
Generate Bill
</button>

</form>

<a class="back-btn" href="index.php">
Back
</a>

</div>

</body>
</html>