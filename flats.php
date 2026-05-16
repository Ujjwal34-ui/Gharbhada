<?php
include 'db.php';

$flats=mysqli_query($conn,"SELECT * FROM flats");
?>

<!DOCTYPE html>
<html>
<head>
<title>Flats</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>All Flats</h2>

<table>

<tr>
<th>Flat No</th>
<th>Floor</th>
<th>Rent</th>
<th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($flats)){ ?>

<tr>

<td><?php echo $row['flat_no']; ?></td>
<td><?php echo $row['floor']; ?></td>
<td><?php echo $row['rent']; ?></td>
<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

</table>

<a class="back-btn" href="index.php">
Back
</a>

</div>

</body>
</html>