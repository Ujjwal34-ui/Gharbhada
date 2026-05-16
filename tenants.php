<?php
include 'db.php';

$tenants=mysqli_query($conn,

"SELECT tenants.name,
        tenants.phone,
        flats.flat_no

 FROM tenants

 JOIN flats
 ON tenants.flat_id=flats.id");
?>

<!DOCTYPE html>
<html>
<head>
<title>Tenants</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>All Tenants</h2>

<table>

<tr>
<th>Name</th>
<th>Phone</th>
<th>Flat</th>
</tr>

<?php while($row=mysqli_fetch_assoc($tenants)){ ?>

<tr>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['flat_no']; ?></td>

</tr>

<?php } ?>

</table>

<a class="back-btn" href="index.php">
Back
</a>

</div>

</body>
</html>