<?php
include 'db.php';
$sql="select * from appointments";
$result=$conn->query($sql);


?>

<?php
include 'db.php';
  if(isset($_GET['search'])){
    $filteredvalues=$_GET['search'];
    $sql = "SELECT * FROM appointments 
        WHERE full_name LIKE '$filteredvalues%'";
    $result=$conn->query($sql);

    }


?>
<html>
<head>
    <title>Document</title>
  <link rel="stylesheet" href="style2.css">
  <style>
    table{
    width: 100%;
    border-collapse: collapse;
    justify-content: center;
    margin-top: 20px;

  }
  h2{
    text-align: left;
    margin-bottom: 10px;
  }
  
  th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid black;
  }
  tr:hover {background-color: #f1f1f1;}
a{
  color: #007bff;
}

  </style>

    
</head>
<body>
  <header class="navbar">
    <div class="logo">Hospital Appointment Management System</div>
    <nav>
      <ul>
           <li><a href="landingpage.html">Home</a></li>
          <li><a href="index.php">Book Appointment</a></li>
          
      
         </ul>
    </nav>
  </header>

   
        <form action="" method="get">
<div class="container1">
    <h1>Search Booking Records </h1> <br>


    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){
    echo $_GET['search'];
}?>" placeholder="Search here">
    <button type="submit">Search</button>

</div>
</form>

      <div class="container1">
    <h2>List of Appointments Booked</h2><br>
    
    <p><a href="index.php"> Go back to booking appointment page</a></p><br>
    
    
   <?php
   
   
if (isset($result) && $result->num_rows > 0){

echo "<table border='1' cellpadding='10'>";
  echo   "<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>

    <th>Action</th>
    
    </tr>";
  while($items = $result->fetch_assoc()) {
  

        echo "<tr>";

    echo "<td>".$items["id"]."</td>";
    echo "<td>".$items["full_name"]."</td>";
    echo "<td>".$items["email"]."</td>";
      echo "<td><a href='detail.php?id=$items[id]'>More Info</a><br><br>
    <a href='update.php?id=$items[id]'>Update</a><br><br>
    <a href='delete.php?id=$items[id]'>Delete</a>
    </td>";

       echo "</tr>";    
         
        }
    
    echo "</table>";
   }
    elseif (isset($_GET['search'])){
      echo "<br>";  
      echo "No Record Found";
    }



    

?>

</div>
 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
</body>
</html>