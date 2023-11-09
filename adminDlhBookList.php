<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
</head>
<style>
        /* Custom CSS for button width */
        .custom-button {
            width: 200px; /* Set your desired width here */
        } 
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
<body>
<ul>
  <li><a class="active" href="adminDlhBookOrder.php">DLH Book Order</a></li>
  <li><a href="adminDlhBookList.php">DLH Book List</a></li>
  <li><a href="courseadmin.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="adminDlhAddBook.php" class="text-light">Add Book</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Num</th>
                    <th scope="col">Code</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include('connection.php');
            $arahan_sql = "SELECT * FROM dlhlist";
            $laksana_arahan = mysqli_query($condb, $arahan_sql);
            $bil = 0;

            if ($laksana_arahan) {
                while ($rekod = mysqli_fetch_array($laksana_arahan)) {
                    $dlhCode = $rekod['dlhCode'];
                    $dlhSem = $rekod['dlhSem'];
                    $bookName = $rekod['bookName'];
                    $price = $rekod['price'];
                    echo "
                    <tr>
                        <td>".++$bil."</td>
                        <td>".$dlhCode."</td>
                        <td>".$dlhSem."</td>
                        <td>".$bookName."</td>
                        <td>".$price."</td>
                        <td>
                            <a class='btn btn-primary' href='updateDlh.php?dlhCode=$dlhCode' class='text-light'>Update</a>
                            <a class='btn btn-danger' href='deleteDlh.php?table=dlhlist&medan_code=dlhCode&code=".$rekod['dlhCode']."' class='text-light'>Delete</a>
                        </td>
                    </tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
