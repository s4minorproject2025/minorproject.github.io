<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap');

  .box {
    border-radius: 5px;
    background: linear-gradient(to right, #0078FF, #0400CE);
    box-shadow: 0 4px 8px rgba(0, 140, 129, 0.1);
    padding: 50px;
    margin: 50px;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: 'Prompt', sans-serif;
  }

  .box-form {
    border-radius: 5px;
    background: linear-gradient(to left, #DEDEDE, #FFFFFF);
    box-shadow: 0 4px 8px rgba(0, 140, 129, 0.1);
    padding: 20px;
    margin: 20px;
    width: 70%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .user-name,
  .password {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
  }

  .user-name a,
  .password a {
    margin-right: 10px;
  }

  .username-input,
  .password-input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #87ceeb;
    border-radius: 4px;
  }

  .buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
  }

  .submit button {
    padding: 10px 20px;
    border-radius: 20px;
    background-color: #1e90ff;
    border: none;
    color: white;
    cursor: pointer;
  }

  .submit button:hover {
    background-color: #0078ff;
  }
</style>
</head>
<body>
    <div class="box">
        <h1>Login</h1>
        <div class="box-form">
            <form method="post">
                <div class="user-name">
                    <a>Username:</a>
                    <div class="username-input">
                        <input type="text" placeholder="Enter your username" name="username">
                    </div>
                </div>
                <div class="password">
                    <a>Password:</a>
                    <div class="password-input">
                        <input type="password" placeholder="Enter your password" name="password">
                    </div>
                </div>
                <div class="buttons">
                    <div class="submit">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
   
   include('connection.php');
   
   if (isset($_POST['submit'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];
   
       // Hash the provided password (use appropriate hashing algorithm)
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   
       $sql = "SELECT * FROM signup WHERE username = '$username'";
       $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
   
       if ($num > 0) {
           // Fetch the user's data
           $row = mysqli_fetch_assoc($result);
   
           // Verify the provided password against the stored hashed password
           if (password_verify($password, $row['password'])) {
               // Password is correct
   
               // Check if the user is the admin
               if ($username === 'admin' && $password === '7012216022') {
                   // Redirect to the admin panel
                   header("location: admin_panel.php");
               } else {
                   // Regular user login, redirect to welcome.php or wherever you want
                   header("location: welcome.php");
               }
           } else {
               // Password is incorrect
               echo '<script>alert("Username and password not matching...")</script>';
           }
       } else {
           // Username not found
           echo '<script>alert("Username not found...")</script>';
       }
   }
   ?>
   
</body>
</html>
