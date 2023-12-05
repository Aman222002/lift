
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Signup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .body {
      background-color: paleturquoise;
      font-family: Arial, sans-serif;
    }

    .signup-form {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .main-heading {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .input-group-text {
      background-color: #f5f5f5;
    }

    .btn-primary {
      width: 100%;
    }

    .text-primary:hover {
      text-decoration: underline;
    }
    .container {
            margin-top: 50px;
        }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class='body'>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="" method="post" onsubmit="return validateForm();" class="signup-form">
          <h2 class="display-4 main-heading m-4 pt-4 text-primary">Registration</h2>
          <p class="pt-4 m-4 text-dark">Please fill in this form to create an account!</p>
          <hr>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <span class="fa fa-user"></span>
              </span>
              <input type="text" class="form-control" name="name" placeholder="Name" id="fname">
            </div>
            <span id="fname1"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <i class="fa fa-address-book-o" aria-hidden="true"></i>
              </span>
              
              <input type="text" class="form-control" name="number" placeholder="Mobile Number" id="mobileNumber">
            </div>
            <span id="mobileNumber1"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <i class="fa fa-envelope"></i>
              </span>
              <input type="email" class="form-control" name="email" placeholder="Email Address" id="email">
            </div>
            <span id="email1"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
              <input type="password" class="form-control" name="password" placeholder="Password" id="password">
            </div>
            <span id="password1"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <i class="fa fa-lock"></i>
              </span>
              <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword">
            </div>
            <span id="confirmPassword1"></span>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-text">
                <i class="fa fa-home" aria-hidden="true"></i>
              </span>
              <input type="text" class="form-control" name="address" placeholder="Address" id="address">
            </div>
            <span id="address1"></span>
          </div>
          <div class="form-group">
          <a href="./login.php">   <button type="submit" class="btn btn-primary btn-lg" name="submit" value="Sign Up">Sign Up</button></a>
          </div>
        </form>
        <div class="text-center fs-4">Already have an account? <a href="./login.php" class="text-primary">Login here</a></div>
      </div>
    </div>
  </div>
</body>
<script src="signup.js"></script>

<script>
    $(document).ready(function () {
        $(".signup-form").submit(function (event) {
            event.preventDefault();

            var name = $("input[name='name']").val();
            var number = $("input[name='number']").val();
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var confirmPassword = $("input[name='confirmPassword']").val();
            var address = $("input[name='address']").val();
            var dataToSend = {
                name: name,
                number: number,
                email: email,
                password: password,
                confirmPassword: confirmPassword,
                address: address,
                submit: true 
            };
            $.ajax({
                type: "POST",
                url: "main.php", 
                data: dataToSend,
                success: function (response) {
                    if (response.status == "success") 
                    {
                     window.location.href= response .redirect;
                     console.log(response)
                    }
                    else {
                        alert(response.message);
                    }
                },
            });
        });
    });
</script>

</html>



