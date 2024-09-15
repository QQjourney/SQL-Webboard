<?php
    include "logic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-rwSj8r4GGUnW1C2DVIg7S8TszI9D6DI1e8tTOQ+sbj5EgOp4LJr9/Sl7txvb0rV5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e758b5ba04.js" crossorigin="anonymous"></script>

    <style>
        /* Custom styles for centering the forms */
        .centered-form {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Set the height of the container to 100% of the viewport height */
        }

        .centered-form .btn-floating-group {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Add custom styles for better responsiveness */
        @media (max-width: 768px) {
            .centered-form {
                height: auto;
            }

            .centered-form .row {
                flex-direction: column-reverse;
                align-items: center;
            }

            .centered-form .col-md-9 {
                order: 2;
            }

            .centered-form .col-md-8 {
                order: 1;
                margin-top: 2rem;
            }
        }
    </style>


    <title>Welcome</title>
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="asset/panda1.jpg" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">



                        <form  method="POST">
                            <!-- Your form content here -->


                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fa-brands fa-facebook"></i>
                                </button>
                    
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                                </button>
                    
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                                </button>
                            </div>


                    
                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                            </div>
                    
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example3">Username</label>
                                <input type="text" name = "username" id="username" class="form-control form-control-lg"
                                placeholder="Enter a username" required/>
                            </div>
                    
                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" name = "password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" required/>
                            </div>
                    
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                                </div>
                                <button type="submit" name = "login" id = "login" class="btn btn-primary btn-lg">Login</button>
                            </div>
                    
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <p class="small fw-bold mt-1 pt-1 mb-0">Don't have an account? <a href="register.php"
                                        class="link-danger">Register</a></p>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Optional: Add Bootstrap's JavaScript and Popper.js for certain Bootstrap components to work -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygc3ZRzqW8Mz8l+wzhxhShJS5/KMP54YI7fqM3Ocyok9t3zooXVX1cf2JdBcWb+"
        crossorigin="anonymous"></script>
</body>

</html>
