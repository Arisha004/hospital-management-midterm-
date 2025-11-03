
<!DOCTYPE html>
<html>
  <head>
  <title>Signup</title>
  <link rel="stylesheet" href="style.css">
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
  <?php
include "db.php";
//Checks if the form was submitted using POST method.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm = $_POST["confirm"];
  $phone = $_POST["phone"];

  if ($password != $confirm) {
    echo "<p class='error'>Passwords do not match!</p>";
  } else {
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql="SELECT * FROM users WHERE email='$email'";
    $result=$conn->query($sql);

   if ($result->num_rows > 0) {
     
      echo "<p class='error'>Email already registered!</p>";
    } else {
      $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')";
      if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Signup successful! You can now login.</p>";
      } else {
        echo "<p class='error'>Error while saving data.</p>";
      }
    }
  }
}
?>

  <div class="form1-container">
    <h2>Signup</h2>
    <form method="POST">
      <label>Full Name:</label>
      <input type="text" name="username" required minlength="3" pattern="^[A-Za-z]{3,}( [A-Za-z]+)?$" title="Only letters allowed">

      <label>Email:</label>
        <input type="email"  
       name="email" required title="enter a valid email address">

      <label>Phone Number:</label>
      <input type="text" name="phone" required pattern="[0-9]{10,12}" title="Enter 10 to 12 digits only">

      <label>Password:</label>
      <input type="password" name="password" required minlength="6" maxlength="20">

      <label>Confirm Password:</label>
      <input type="password" name="confirm" required minlength="6" maxlength="20">

      <button type="submit">Signup</button>

      <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
  </div>
  
 <footer>
    <p>© 2025 Appointment Management System , Made by Arisha Mumtaz(2312358)</p>
  </footer>
</body>
</html>
