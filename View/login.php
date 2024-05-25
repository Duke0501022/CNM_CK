
<style>
  body {
    font-family: 'Arial', sans-serif;
    
    background: url(../kindergarten-website-template/img/login.jpg);
  }
  .login-container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #000000;
  }
  .header-text {
    margin-bottom: 30px;
    color: #333333;
    text-align: center;
  }
  .custom-btn {
    background-color: #f8b400;
    color: white;
    border: none;
  }
  .custom-btn:hover {
    background-color: #e5a300;
  }
  .form-link {
    color: #333333;
    text-align: center;
    display: block;
    margin-top: 15px;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2 class="header-text">Đăng nhập</h2>
  <form action='' method="POST"> 
    <div class="form-group">
      <label for="loginUsername">Tài khoản</label>
      <input type="username" class="form-control" name="username" id="loginUsername" placeholder="Tài khoản">
    </div>
    <div class="form-group">
      <label for="loginPassword">Mật khẩu</label>
      <input type="password" class="form-control" name="password" id="loginPassword" placeholder="Mật khẩu">
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-block mt-3" id="loginbtn" value="login">Đăng nhập</button> 
    <a href="index.php?register" class="form-link">Bạn chưa có tài khoản? Đăng ký</a>
    <a href="index.php?forgot" class="form-link">Quên mật khẩu</a>
  </form>
</div>

</body>



