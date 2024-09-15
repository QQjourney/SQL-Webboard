<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@700&display=swap" rel="stylesheet">
    
    <style>  
        button {
            border-radius: 50px;
            padding: 10px 20px;
            border: none;
            cursor: pointer; /* Add cursor pointer for better user interaction */
        }
        
        button p {
            margin: 0;
            justify-content: center;
        }

        img {
            width: 100%; /* Make the image fill its container */
            height: auto; /* Maintain the aspect ratio of the image */
            display: block; /* Remove extra space below the image */
        }

        /* Media query for screens less than 1430px */
        @media (max-width: 1430px) {
            img {
                content: url('asset/jojo.png'); /* Replace 'new-image.jpg' with the path to your new image */
                height: 100vh; /* Set the height to 100% of the viewport height */
                object-fit: cover; /* Maintain the aspect ratio and cover the entire container */
            }
        }
        .button-container button {
            margin-right: 10px; /* Add some margin between buttons if needed */
        }
    </style>
    
    <title>Welcome</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-light bg-success" style="font-family: Inika;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand" style="color: #B8FF21" href="#">Ultimate Xongmiao Blog</a>


            <div class="button-container">
                <a href="register.php">
                    <button class="bg-primary" > <!-- Change 'bg-primary' to the class for a blue button -->
                        <p>Sign in</p>
                    </button>
                </a>
                
                <a href="login_page.php"> 
                    <button class="bg-danger">
                        <p>Log in</p>
                    </button>
                </a>
              
            </div>
            
            
        </div>
    </nav>
    <div>
        <img src="asset/panda1.jpg" alt="" class="img-fluid"> <!-- Add Bootstrap's img-fluid class for responsiveness -->
    </div>

    <!-- Optional: Add Bootstrap's JavaScript and Popper.js for certain Bootstrap components to work -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygc3ZRzqW8Mz8l+wzhxhShJS5/KMP54YI7fqM3Ocyok9t3zooXVX1cf2JdBcWb+"
        crossorigin="anonymous"></script>
</body>
</html>