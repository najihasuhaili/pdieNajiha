<!-- Memanggil fail header -->
<?php include('header.php'); ?>

<?php 
if (!empty($_POST))
{   
    include ('connection.php');
    $dcsCode=$_POST['dcsCode'];
    $dcsSem=$_POST['dcsSem'];
    $bookName=$_POST['bookName'];
    $price=$_POST['price'];

    $arahan_sql_simpan="insert into dcslist 
    (dcsCode,dcsSem,bookName,price)
    values
    ('$dcsCode','$dcsSem','$bookName','$price')";

    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # Jika proses menyimpan berjaya, papar info dan buka laman pelanggan_login.php
        echo "<script>alert('Successful');
        window.location.href='adminDcsBookList.php';</script>";
    }
    else
    {
        # Jika proses menyimpan gagal, kembali ke laman sebelumnya
        echo "<script>alert('Try again');
        window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <title>Add Book Form</title>
    <style>
       ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
    </style>
</head>
<body>
<ul>
  <li><a class="active" href="adminDcsBookOrder.php">DCS Book Order</a></li>
  <li><a href="adminDcsBookList.php">DCS Book List</a></li>
  <li><a href="courseadmin.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>
<div class="container my-5">
    <form method="POST">
        <div class="form-group">
            <label for="dcsCode">Book Code</label>
            <input type="text" class="form-control" id="dcsCode" placeholder="Book Code" name="dcsCode" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="dcsSem">Semester</label>
            <input type="text" class="form-control" id="dcsSem" placeholder="Semester Involved" name="dcsSem" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="bookName">Book Name</label>
            <input type="text" class="form-control" id="bookName" placeholder="Book Name" name="bookName" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" placeholder="Price" name="price" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
</body>
</html>
