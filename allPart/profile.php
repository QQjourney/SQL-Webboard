<?php
  include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
        .gradient-custom {
        /* fallback for old browsers */
        background: #f6d365;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }

        .img-fluid {
            width: 80px;
        }
        .edit-input,
        #okButton {
            display: none;
        }

    </style>

</head>
<body style="background-color: #20c997;">
    <nav class="navbar navbar-dark bg-success"  >
        <div class="container-fluid">
            <div class="row">
                <div class="col mt-1">
                    <a class="navbar-brand text-border p-2 " href="index.php">Ultimate Xongmiao</a>
                </div>                
                <div class="col">
                    
                </div>
            </div>

            <form class="d-flex">
                <a href="index.php" class="mx-3 mt-2 text-light fw-bold">Back</a>
                <a href="login_page.php" class="btn btn-outline-success " style="background-color: red; color: white;">Logout</a>
            </form>
        </div>
    </nav>

    <div>
        <section class="vh-100 " style="background-color: #20c997;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                <?php foreach($query_pid as $q){ ?>
                  <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                alt="Avatar" class="img-fluid my-5" />
                            <h2 id="userName"><?php echo $q['name']; ?></h2>
                        </div>
                      <div class="col-md-8">
                        <div class="card-body p-4">
                          <h6>Information</h6>
                          <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-8 mb-3">
                              <h6>Email</h6>
                              <p class="text-muted"><?php echo $q['email']; ?></p>
                            </div>
                          </div>
                          <hr class="mt-0 mb-4">
                          <div class="row pt-1">
                            <div class="col-6 mb-3">
                              <h6>Be member since</h6>
                              <p class="text-muted"><?php echo $q['register_date']; ?></p>
                            </div>
                            <div class="col-6 mb-3">
                              <h6>Date of Birth</h6>
                              <p class="text-muted"><?php echo $q['dob']; ?></p>
                            </div>
                          </div>
                          <div class="d-flex justify-content-start">
                            <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                            <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                            <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }?>
                </div>
              </div>
            </div>
          </section>
    </div>

</body>
</html>