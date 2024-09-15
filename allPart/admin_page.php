<?php 
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.2/components/blogs/blog-4/assets/css/blog-4.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e758b5ba04.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript dependencies (Popper.js and jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <style>
    html,
    body,
    .intro {
      height: auto;
    }

    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to top, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to top, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }

    table td,
    table th {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
    }

    thead th,
    tbody th {
      color: #fff;
    }

    tbody td {
      font-weight: 500;
      color: rgba(255,255,255,.65);
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-success"  >
            <div class="container-fluid">
                <form  class="d-flex">
                    <a href="login_page.php" class="btn btn-outline-success  " style="background-color: red; color: white;">Logout</a>
                </form>
            </div>
        </nav>

    <?php
          $x = "SELECT user_id FROM profile WHERE status = 1";
          $a_result = mysqli_query($conn, $x);

          // Check for errors
          if (!$a_result) {
              echo "Error in query: " . mysqli_error($conn);
              exit();
          }

          // Fetch the data from the result set
          $a_data = mysqli_fetch_assoc($a_result);

          // Use the fetched user_id in the next query
          $user_id_to_exclude = $a_data['user_id'];

          $cmd = "SELECT * FROM user_login WHERE user_id != $user_id_to_exclude";
          $query = mysqli_query($conn, $cmd);
    ?>

    <section class="intro">
        <div class="gradient-custom-2 h-100">
        <div class="text-center mb-0" >
            <h1> Admin </h1>
        </div>
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">

                <h3 class="mt-5">User_view</h3>
                <div class="table-responsive mt-2" >
                    <table class="table table-dark table-bordered mb-0">
                    <thead>
                        <tr>
                        <th scope="col">user_id</th>
                        <th scope="col">username</th>
                        <th scope="col">profile_id</th>
                        <th scope="col">register_date</th>
                        <th scope="col">email</th>
                        <th scope="col">dob</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $q) { ?>
                        <tr>
                            <td><?php echo $q['user_id'];?></td>
                            <td><?php echo $q['username'];?></td>
                            <?php
                            // connect user_login with profile by using user_Id
                              $cmd2 = "SELECT * FROM profile WHERE user_id = {$q['user_id']}";
                              $query3 = mysqli_query($conn, $cmd2);

                              // Fetch the result as an associative array
                              $profileData = mysqli_fetch_assoc($query3);
                            ?>
                          <form action="" method="POST">
                          <td><?php echo ($profileData) ? $profileData['profile_id'] : 'N/A';?></td>
                            <td><?php echo ($profileData) ? $profileData['register_date'] : 'N/A';?></td>
                            <td><?php echo ($profileData) ? $profileData['email'] : 'N/A';?></td>
                            <td><?php echo ($profileData) ? $profileData['dob'] : 'N/A';?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-success" href="admin_page.php?DUID=<?php echo $q['user_id']; ?>">
                                    Delete
                                </a>
                            </td>

                          </form>     
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                <?php
                    $cmdX = "SELECT * FROM category";
                    $query2= mysqli_query($conn, $cmdX);
                ?>
                    <h3 class="mt-5">Category Table</h3>
                <div class="table-responsive mt-2" >
                    <table class="table table-dark table-bordered mb-0">
                    <thead>
                        <tr>
                        <th scope="col">category_ID</th>
                        <th scope="col">category_name</th>
                        <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query2 as $q) { ?>
                        <tr>
                          <form action="" method = "POST">
                            <td><?php echo $q['category_id'];?></td>
                            <td><?php echo $q['category_name'];?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-success" href="admin_page.php?DCAID=<?php echo $q['category_id']; ?>">
                                    Delete
                                </a>
                            </td>
                          </form>
                        </tr>
                        <?php } ?>
                        <tr>

                        <form action="admin_page.php" method="POST">
                            <td></td>
                            <td><input type="text" name="caname" id="caname" required></td>
                            <td class="text-center">
                                <button type="submit" name="addCa" value="added" class="btn btn-outline-success">
                                    Add
                                </button>
                            </td>
                        </form>
                          
                        </tr>
                    </tbody>
                    </table>
                </div>
                
                <?php
                    $cmd3 = "select * from comment";
                    $query4= mysqli_query($conn, $cmd3);
                ?>
                <h3 class="mt-5">Comment Table</h3>
                <div class="table-responsive mt-2" >
                    <table class="table table-dark table-bordered mb-0">
                    <thead>
                        <tr>
                        <th scope="col">Comment_id</th>
                        <th scope="col">blog_id</th>
                        <th scope="col">comment_title</th>
                        <th scope="col">user_id</th>
                        <th scope="col">comment_time</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query4 as $q) { ?>
                        <tr>
                          <form action="" method="POST">
                            <td><?php echo $q['comment_id'];?></td>
                            <td><?php echo $q['blog_id'];?></td>
                            <td><?php echo $q['comment_describe'];?></td>
                            <td><?php echo $q['user_id'];?></td>
                            <td><?php echo $q['comment_time'];?></td>
                            <td class="text-center ">       
                                <a class="btn btn-outline-success" href="admin_page.php?DCOID=<?php echo $q['comment_id']; ?>">
                                    Delete
                                </a>
                            </td>
                          </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
     


                <?php
                    $cmd4 = "select * from blog";
                    $query5= mysqli_query($conn, $cmd4);
                ?>

                <h3 class="mt-5">Blog Table</h3>
                <div class="table-responsive mt-2" >
                    <table class="table table-dark table-bordered mb-0">
                    <thead>
                        <tr>
                        <th scope="col">blog_id</th>
                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th scope="col">profile_id</th>
                        <th scope="col">category_id</th>
                        <th scope="col">released_date</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query5 as $q) { ?>
                        <tr>
                          <form action="" method = "POST">
                            <td><?php echo $q['blog_id'];?></td>
                            <td><?php echo substr($q['title'], 0, 20);?></td>
                            <td><?php echo substr($q['content'], 0, 20);?></td>
                            <td><?php echo $q['profile_id'];?></td>
                            <td><?php echo $q['category_id'];?></td>
                            <td><?php echo $q['released_date'];?></td>
                            <td class="text-center ">       
                                <a class="btn btn-outline-success" href="admin_page.php?DBID=<?php echo $q['blog_id']; ?>">
                                    Delete
                                </a>
                            </td>
                          </form>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>

                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

</body>
</html>