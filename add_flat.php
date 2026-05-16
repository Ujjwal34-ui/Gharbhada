<?php
include 'db.php';

$message="";

if(isset($_POST['submit'])){

    $flat=$_POST['flat'];
    $floor=$_POST['floor'];
    $rent=$_POST['rent'];

    $sql="INSERT INTO flats(flat_no,floor,rent,status)
          VALUES('$flat','$floor','$rent','Available')";

    if(mysqli_query($conn,$sql)){
        $message="<div class='success'>
                  Flat Added Successfully!
                  </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Flat</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add Flat</h2>

<?php echo $message; ?>

<form method="POST">

<input type="text" name="flat"
placeholder="Flat Number" required>

<input type="text" name="floor"
placeholder="Floor" required>

<input type="number" name="rent"
placeholder="Monthly Rent" required>

<button type="submit" name="submit">
Add Flat
</button>

</form>

<a class="back-btn" href="index.php">Back</a>

</div>

</body>
</html>