<html>
<head>
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
      <form action="" method="post">
        <div class="user-name">
          <a>Username:</a>
          <div class="username-input">
            <input type="text" placeholder="Enter your username" id="user-name">
          </div>
        </div>
        <div class="password">
          <a>Password:</a>
          <div class="password-input">
            <input type="password" placeholder="Enter your password" id="password">
          </div>
        </div>
        <div class="buttons">
          <div class="submit">
            <button type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
    include('connection.php');
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $passwor=$_POST['password'];
        $sql="select * from signup where email='$email' and password='$password'";

        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num>0){
           header("location:welcome.php");
        }
        else{
               echo'<script>("email & password not matching...")</script>';
        }
    }
?>
</body>
</html>
