<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    $row=$result->fetch_assoc();
 
    if (password_verify($password, $row["password"])) { //database mei jo password hai $row[password] woh match karraha hai $password jo user ne form mein dia hai aur humne usko variable $password mein dala hai uper password verify function use karke built-in php ka
    header("Location: index.php");
  //Immediately stops the execution of the PHP script.
  
  exit();
  //can also use this approach:
/*header("Location: landingpage.html");
Immediately sends the browser to the new page.
No delay — the user doesn’t see any message on the current page.*/

    } else {
      echo "<p class='error'>Incorrect password!</p>";
    }
  } else {
    echo "<p class='error'>Email not found!</p>";
  }
}
?>

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <style>
    footer{
        background-color:#869CA3;
        color: black;
    }
  </style>
</head>
<body>
          <header class="navbar">
    <div class="logo">Hospital Appointment Management System</div>
    <nav>
      <ul>
        <li><a href="landingpage.html">Home</a></li>
        
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
          <li><a href="signup.php">Signup</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>
  <div class="form1-container">
    <h2>Login</h2>
    <form method="POST">
      <label>Email:</label>
      <input type="email"  
   name="email" required title="enter a valid email address">

      <label>Password:</label>
      <input type="password" name="password" required minlength="6" maxlength="20">

      <button type="submit">Login</button>

      <p>Donot have an account? <a href="signup.php">Sign up here</a></p>
       <a href="signup.php">Logout</a>

</div>
</div>

      </form>
       <div class="form1-container">
     
    <form action="listsusers.php" method="get">
    <button type="submit">View Users</button>
    </form>
    </div>
      
  </div>
  
  
 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
</body>
</html>
