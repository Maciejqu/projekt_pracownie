<html>
  <head>
    <title>Pizza Delivery - Login</title>
    <link rel="stylesheet" href="../css/css_login.css">
  </head>
  <body>
    <div class="login">
      <h1>Login</h1>
    </div>
    <div class="container">
      <form method="post" action="login.php">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="pass_word">Password:</label><br>
        <input type="password" id="pass_word" name="pass_word"><br>
        <input type="submit" value="Submit"><br><br><br>
        <button type="button" id="button">
          <a href="signup.php" target="_blank">Dont have an account yet? Click Here!</a>
        </button>

      </form> 
      <?php
        // Check if the form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          require_once "../database/connect.php";
          
          $email = $_POST["email"];
          $pass_word = $_POST["pass_word"];

          // Get the user from the database
          $sql = "SELECT id, email, pass_word, first_name, admin FROM users WHERE email = '$email'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

          // Check if the email matches a user in the database
          if(mysqli_num_rows($result) > 0){
            if ($pass_word == $row["pass_word"]) {
              // Store the user's ID, name, and admin status in the session variable
              session_start();
              $_SESSION["user_id"] = $row["id"];
              $_SESSION["username"] = $row["first_name"];
              $_SESSION["is_admin"] = $row["admin"];

              // Redirect to the appropriate page based on the admin status
              if ($row["admin"] == "yes") {
                header("Location: admin.php");
              } else {
                header("Location: main.php");
              }
              exit();
            } else {

              echo "<p class='error'>Invalid email or password</p>";
            }
          } else {

            echo "<p class='error'>Invalid email or password</p>";
          }

          mysqli_close($conn);
        }
      ?>
    </div>
    <div class="article">
    </div>
  </body>
</html>