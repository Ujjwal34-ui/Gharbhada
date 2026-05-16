<?php
include 'db.php';

$message="";

$flats=mysqli_query($conn,
"SELECT * FROM flats WHERE status='Available'");

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $flat_id=$_POST['flat_id'];

    $sql="INSERT INTO tenants(name,phone,flat_id)
          VALUES('$name','$phone','$flat_id')";

    if(mysqli_query($conn,$sql)){

        mysqli_query($conn,
        "UPDATE flats SET status='Occupied'
         WHERE id='$flat_id'");

        $message="<div class='success'>
                  Tenant Added Successfully!
                  </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Tenant</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Tenant</h2>

<?php echo $message; ?>

<form method="POST">

<input type="text" name="name"
placeholder="Tenant Name" required>

<input type="text" name="phone"
placeholder="Phone Number" required>

<select name="flat_id" required>

<option value="">Select Flat</option>

<?php while($row=mysqli_fetch_assoc($flats)){ ?>

<option value="<?php echo $row['id']; ?>">

Flat <?php echo $row['flat_no']; ?>

</option>

<?php } ?>

</select>

<button type="submit" name="submit">
Add Tenant
</button>

</form>

<a class="back-btn" href="index.php">
Back
</a>

</div>

</body>
</html>