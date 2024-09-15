<?php
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.2/components/blogs/blog-4/assets/css/blog-4.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e758b5ba04.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript dependencies (Popper.js and jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    

</head>
<body style="background-color: #20c997;">
    
    <nav class="navbar navbar-dark bg-success"  >
        <div class="container-fluid">
            <div class="row">
                <div class="col mt-1">
                    <a class="navbar-brand text-border p-2 " href="index.php">Ultimate Xongmiao</a>
                </div>
                
                
                <div class="col">
                    <div class="dropdown ">
                        <button class="btn btn-success dropdown-toggle text-light fw-medium" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu" style="max-height:200px;overflow-y:scroll;" aria-labelledby="dropdownMenuButton1">
                            <?php foreach ($categoryData as $data_cate) { ?>
                                <li><a class="dropdown-item" href="index_each_category.php<?php echo"?uid={$_SESSION['user_id']}&pid={$_SESSION['pid']}&cid={$data_cate['category_id']}";?>"><?php echo $data_cate['category_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <form  class="d-flex">
                <a href="profile.php?pid=<?php echo $_SESSION['pid']?>" class="mx-3 mt-2 text-light fw-bold">My Account</a>
                <a href="login_page.php" class="btn btn-outline-success  " style="background-color: red; color: white;">Logout</a>
            </form>
        </div>
    </nav>

    <div class="text-center">
        <a href="add.php?<?php echo "&uid={$_SESSION['user_id']}&pid={$_SESSION['pid']}"?>" class="btn btn-outline-dark mt-3">+ Create a new post</a>
    </div>

    <!-- Blog 4 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5 py-xl-8">
    
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-lg-0">

                <!-- crete blog -->
                <?php 
                foreach($query as $q){ ?>
                    <div class="col-12 col-lg-12 mt-2">
                        <article class="d-flex flex-column h-100">
                            <div class="card border-0 flex-grow-1">
                                <div class="card-body border bg-white p-4">
                                    <div class="entry-header mb-3">
                                        <h2 class="card-title entry-title h4 mb-0">
                                        <a class="link-dark text-decoration-none" href="#!"><?php echo $q['title'];?></a>
                                        </h2>
                                    </div>
                                    <p class="card-text entry-summary text-secondary mb-3">
                                        <?php echo substr($q['content'], 0, 500);?>
                                    </p>
                                    <!-- Write something here  -->

                                    <a href="view.php<?php echo "?bid={$q['blog_id']}&pid={$_SESSION['pid']}"; ?>" class="btn btn-primary m-0 text-nowrap entry-more" >Read More</a>
                                </div>
                                <div class="card-footer border border-top-0 bg-light p-4">
                                    <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                        <li>
                                            <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center" href="#!">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg>
                                                <span   span class="ms-2 fs-7"><?php echo $q['released_date'];?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="px-3">&bull;</span>
                                            <?php
                                                $cmd = "SELECT category_name from category where category_id = '".$q['category_id']."'";
                                                $result = mysqli_query($conn,$cmd);
                                                $q1 = mysqli_fetch_array($result);
                                                $cname= $q1['category_name'];
                                            ?>
                                            <span   span class="ms-2 fs-10"><?php echo $cname;?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
</body>

</html>