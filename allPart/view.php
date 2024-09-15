<?php
include "logic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-rwSj8r4GGUnW1C2DVIg7S8TszI9D6DI1e8tTOQ+sbj5EgOp4LJr9/Sl7txvb0rV5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e758b5ba04.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #20c997;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        textarea {
            width: 100%;
            box-sizing: border-box;
            margin: 5% 0;
            border-radius: 10px;
        }

        .jumbotron {
            background-color: #20c997;
            color: white;
            margin: 0;
            padding: 2rem 0;
        }

        .navbar {
            padding: 10px;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-dark bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-border p-2" href="index.php">Ultimate Xongmiao</a>


            <form class="d-flex">
                <a  href="profile.php?pid=<?php echo $_SESSION['pid']?>" class="mx-3 mt-2 text-light fw-bold">My Account</a>
                <a href="login_page.php" class="btn btn-outline-success"
                    style="background-color: red; color: white;">Logout</a>
            </form>
        </div>
    </nav>

    <?php foreach ($query as $q) : ?>
        <div class="jumbotron">
            <div class="container text-center mt-3">
                <h1 class="border-bottom pb-2"><?php echo $q['title'] ?></h1>
                <?php
                    $cmd = "SELECT name FROM profile WHERE profile_id = " . $q['profile_id'];
                    $result = mysqli_query($conn, $cmd);

                    if ($result) {

                        $row = mysqli_fetch_assoc($result);
                        $authorName = $row['name'];
                        echo '<span class="badge bg-secondary">Author: ' . $authorName . '</span>';
                    } else {
                        echo '<span class="badge bg-danger">Error fetching author</span>';
                    }
                    mysqli_free_result($result);
                ?>

                <?php
                    $cmd = "SELECT category_name FROM category WHERE category_id = " . $q['category_id'];
                    $result = mysqli_query($conn, $cmd);
                    if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $Cname = $row['category_name'];
                    echo '<span class="badge bg-secondary">Category: ' . $Cname . '</span>';
                    } else {
                        echo '<span class="badge bg-danger">Error fetching author</span>';
                    }
                    mysqli_free_result($result);
                    ?>

                <span class="badge bg-secondary">Released date: <?php echo $q['released_date'] ?></span>
            </div>
        </div>

        <div class="container mt-3 mb-2">
            <article class="d-flex flex-column h-100">
                <div class="card border-0 flex-grow-1" style="background-color: #20c997;">
                    <div class="card-body border bg-white p-4">
                        <p class="card-text entry-summary text-secondary mb-3">
                            <?php echo $q['content'] ?>
                        </p>
                    </div>
                </div>
            </article>
        </div>
        <!-- คนเขียน == คนเข้า ? -->
        <?php if ($q['profile_id'] == $pid) : ?>
            <div class='d-flex justify-content-end align-items-center container mt-2'>
                <a href="update_page.php<?php echo "?bid={$q['blog_id']}&pid={$_SESSION['pid']}"; ?>" class='btn btn-primary me-2'>Update</a>
                <form action="" method="POST">
                    <button class='btn btn-danger' name="delete" id="delete">Delete</button>
                </form>
            </div>
        <?php endif; ?>
        <form action="" method = "POST">
            <div class="container mt-3">
                <textarea name="comment" id="comment" cols="50" placeholder="Comment here" rows="5" class="mb-2" required></textarea>
                <button class="btn bg-primary btn-outline-success btn-lg" style="background-color: red; color: white;" name="post_comment" id="post_comment">Post</button>
            </div>
        </form>
    <?php endforeach; ?>




    <?php foreach ($query as $q) : ?>
    <div class="container mt-3">


                    <?php
                    $cmd = "SELECT * FROM comment WHERE blog_id = {$q['blog_id']}";
                    $result = mysqli_query($conn, $cmd);

                    while ($data = mysqli_fetch_array($result)) :
                        ?>
                        <article class="d-flex flex-column mt-2">
                            <div class="card border-0 flex-grow-1" style="background-color: #20c997;">
                                <div class="card-body border bg-white p-4">
                                    <div class="entry-header mb-3">
                                        <?php
                                            $cmd2 = "select name from profile where user_id = {$data['user_id']}";
                                            $result2 = mysqli_query($conn, $cmd2);
                                            $data2 = mysqli_fetch_array($result2);
                                        ?>
                                        <h2 class="card-title entry-title h5 mb-0">
                                            <a class="link-dark text-decoration-none" href="#!"><?php echo $data2['name']; ?></a>
                                        </h2>
                                    </div>
                                    <p class="card-text entry-summary text-secondary mb-1">
                                    <?php echo "{$data['comment_describe']}"; ?>
                                    </p>

                                        <div class="card-footer border border-top-0 bg-light p-2">
                                        <ul class="entry-meta list-unstyled d-flex align-items-center m-1">
                                            <li>
                                                <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                                    class="bi bi-calendar3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                        <path
                                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg>
                                                <span class="ms-2 fs-7"><?= $data['comment_time'] ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        </div>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>


    </div>
<?php endforeach; ?>

</body>

</html>
