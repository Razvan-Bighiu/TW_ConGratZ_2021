<!DOCTYPE html>
<html lang="ro">
  <head>
    <title>SignUp</title>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/SignUp.css">
  </head>
  <body>
    <div class="antet">
      <header>
        <a href="index.php">
          <img class="logo" src="images/logo.png" alt="Logo">
        </a>
        <a class="login" href="login.php">LogIn</a>
      </header>
    </div>
    <div class="continut">
      <div>
        <form action="includes/signup.inc.php" method="post">
          <div class="interfata">
            <input type="email" placeholder="Email" name="email" required>
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit">Register</button>
          </div>
        </form>
        <?php
            if (isset($_GET['info']) && $_GET['info'] == 'inregistrare_efectuata') {
              echo '<p style="text-align: center; color: green; font-size: 20px;">Contul a fost creat cu succes.</p>';
            } else if (isset($_GET['info']) && $_GET['info'] == 'utilizatorul_exista') {
              echo '<p style="text-align: center; color: red; font-size: 20px;">Usernameul exista deja.</p>';
            }
          ?>
      </div>
    </div>
  </body>
</html>