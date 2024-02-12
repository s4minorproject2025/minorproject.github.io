<html>
<head>
<title>Sign Up Page</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

  body {
    font-family: 'Roboto', sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-family: 'Roboto', sans-serif;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label {
    font-weight: bold;
    margin-bottom: 8px;
    color: #555;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
  }

  input[type="submit"] {
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    background-color: #0078FF;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #0400CE;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group:last-child {
    margin-bottom: 0;
  }

  .form-group label.error {
    color: red;
    font-size: 14px;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Sign Up</h1>
    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Sign Up">
      </div>
    </form>
  </div>
  <?php
    include('connection.php');
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $passwor=$_POST['password'];
        $sql="select * from signup where email='$email'";

        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num>0){
            echo '<script>("email already exist")</script>';
        }
        else{
                $insert="insert into signup(email,password)values('$email','$pasword')";
                mysqli_query($conn,$insert);
                header("location:login.php");
        }
    }
?>
    
</body>
</html>
