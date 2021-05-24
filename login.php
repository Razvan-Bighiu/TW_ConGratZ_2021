<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/LogIn.css">
  </head>
  <body>
    <div class="antet">
      <header>
        <a href="index.php">
          <img class="logo" src="images/logo.png" alt="Logo">
        </a>
        <a class="signup" href="signup.php">SignUp</a>
      </header>
    </div>
    <div class="continut">
      <div>
        <form action="includes/login.inc.php" method="post">
          <div class="interfata">
            <div class="avatar">
              <img src="images/user.png" alt="Avatar" class="avatar">
            </div>
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Login</button>
          </div>
        </form>
        <?php
          if (isset($_GET['info']) && $_GET['info'] == 'gresit') {
            echo '<p style="text-align: center; color: red; font-size: 20px;">Parola sau Username gresite.</p>';
          }
			  ?>
     </div>
  </div>
  </body>
</html>