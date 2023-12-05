<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: paleturquoise;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .main-heading {
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            width: 100%;
            margin-top: 10px;
        }

        .signup-loginpage {
            text-align: center;
            margin-top: 20px;
        }

        .signup-loginpage p {
            margin-bottom: 0;
        }

        .text-primary:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="a2" method="POST">
                        <h2 class="display-4 main-heading m-4 pt-4 text-primary">Login</h2>
                        <div class="mb-3">
                            <i class="fa fa-user"></i>
                            <!-- <label for="inputEmail" class="form-label">Username</label> -->
                            <input type="text" class="form-control" name="inputEmail" id="email" placeholder="Username"/>
                        </div>
                        <div class="mb-3">
                            <i class="fa fa-lock"></i>
                            <!-- <label for="inputPassword" class="form-label">Password</label> -->
                            <input type="password" class="form-control" name="inputPassword" placeholder="Password" id="password">

                        </div>
                        <button type="submit" class="btn btn-primary" name="b1">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="signup-loginpage">
            <p>Don't have an account? <a class="btn btn-info" href="./Registration.php">Sign Up</a></p>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $(".a2").submit(function(event) {
            event.preventDefault();
            var inputEmail = $("input[name='inputEmail']").val();
            var inputPassword = $("input[name='inputPassword']").val();
            $.ajax({
                type: "POST",
                url: "main.php",
                data: {
                    inputEmail: inputEmail,
                    inputPassword: inputPassword,
                    b1:true

                },
                success: function(response) {
                    console.log(response)
                    if (response.status == 'success') {
                     window.location.href= response .redirect;
                     console.log(response)
                    } else {
                        alert(response.message);
                    }
                },
            });
        });
    });
</script>

</html>