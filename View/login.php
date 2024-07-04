
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
        .form-link-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            margin-top: 15px;
        }
        .form-link-container img {
            margin-right: 10px;
        }
        .form-link-container:hover {
            background-color: #f0f0f0;
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
    <button type="submit" name="submit" class="btn btn-primary btn-block mt-3" id="loginbtn" value="login" onclick="return validateForm()">Đăng nhập</button>
    <a href="index.php?googlelogin" class="form-link form-link-container">
  <img src="./img/images (3).png" alt="Google" style="width:20px; height:20px; vertical-align:middle;">
  Đăng nhập bằng Google
</a>
    <a href="index.php?register" class="form-link">Bạn chưa có tài khoản? Đăng ký</a>
    <a href="index.php?forgot" class="form-link">Quên mật khẩu</a>
    <a href="admin/" class="form-link">Đăng nhập trang quản lý</a>
  </form>
</div>

</body>
<script>
    // Hàm kiểm tra biểu mẫu đăng nhập trước khi gửi
    function validateForm() {
        var username = document.getElementById("loginUsername").value;
        var password = document.getElementById("loginPassword").value;
        var usernameRegex = /^[a-zA-Z0-9]*$/; // Regex cho tên người dùng
        var passwordRegex = /^[a-zA-Z0-9!@#$%^&*()_+]*$/; // Regex cho mật khẩu
        
        // Kiểm tra xem tên người dùng đã được nhập vào hay không
        if (username === "") {
            alert("Vui lòng nhập tên người dùng");
            return false;
        }
        // Kiểm tra xem tên người dùng có chứa ký tự đặc biệt không
        if (!usernameRegex.test(username)) {
            alert("Chỉ được phép sử dụng chữ cái và số cho tên người dùng");
            return false;
        }
        // Kiểm tra xem mật khẩu đã được nhập vào hay không
        if (password === "") {
            alert("Vui lòng nhập mật khẩu");
            return false;
        }
        // Kiểm tra xem mật khẩu có chứa ký tự đặc biệt không
        if (!passwordRegex.test(password)) {
            alert("Chỉ được phép sử dụng chữ cái, số và các ký tự đặc biệt cho mật khẩu");
            return false;
        }
        return true;
    }
</script>



