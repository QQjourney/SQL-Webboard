<?php
    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.2/components/blogs/blog-4/assets/css/blog-4.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap JavaScript dependencies (Popper.js and jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-rwSj8r4GGUnW1C2DVIg7S8TszI9D6DI1e8tTOQ+sbj5EgOp4LJr9/Sl7txvb0rV5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e758b5ba04.js" crossorigin="anonymous"></script>
    <style>

        .textarea-container {
        position: relative;
    }

    .placeholder {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    .custom-placeholder {
    color: #212529; /* Dark color */
    font-size: 1.25rem; /* Adjust the size as needed */
}

    </style>
    <script>
        $("#category").on("mousedown", function () {
            $(this).css({
                "max-height": "100px",
                "overflow-y": "scroll"
            });
        });
        function setPlaceholder(textarea) {
            const placeholder = textarea.nextElementSibling;
            placeholder.style.display = "none";
        }

        $(document).ready(function () {
        $(".dropdown-item").click(function () {
            var selectedText = $(this).text();
            $("#dropdownButton").text(selectedText);
        });
    });

        function clearPlaceholder(textarea) {
            const placeholder = textarea.nextElementSibling;
            if (!textarea.value) {
                placeholder.style.display = "block";
            }
        }

        
    </script>

</head>
<body style="background-color: #20c997;">
    <nav class="navbar navbar-dark bg-success">
        <div class="container-fluid">
            <div class="row">
                <div class="col mt-1">
                    <a class="navbar-brand text-border p-2" href="index.php?<?php echo "uid={$_SESSION['user_id']}&pid={$_SESSION['pid']}"?>">Ultimate Xongmiao</a>
                </div>

            </div>
    
            <form class="d-flex">
                <a  href="profile.php?pid=<?php echo $_SESSION['pid']?>" class="mx-3 mt-2 text-light fw-bold">My Account</a>
                <a href="login_page.php" class="btn btn-outline-success" style="background-color: red; color: white;">Logout</a>
            </form>
        </div>
    </nav>
    
        <form  method="POST">
                    <div class="jumbotron">
                    <div class="container text-center mt-3">
                    <?php foreach($query as $q){ ?>
                        <input type="text" placeholder="Blog Title" class="form-control my-3 bg-primary text-white text-center" name="title" value="<?php echo $q['title'];?> " required>
                    <?php }?>
                    </div>
                </div>
            

                
                <div class="col-12 col-lg-12 mt-3 my-3">
                    <div class="textarea-container">
                    <?php foreach($query as $q){ ?>
                        <textarea name="content" class="form-control my-3 bg-light text-dark" cols="30" rows="10" required><?php echo $q['content']; ?></textarea>
                    <?php }?>
                    </div>
                </div>
                
                
                
            
                <div class="d-flex justify-content-between mx-3">
                <select id="category" name="category" class="btn btn-warning dropdown-toggle btn-lg">
                    <?php foreach ($categoryData as $data_cate) {
                        echo '<option value="' . $data_cate['category_name'] . '">' . $data_cate['category_name'] . '</option>';
                    } ?>
                </select>
                    
                    <div>
                        <button class="btn btn-outline-success btn-lg" style="background-color: #555ca0; color: white;" name = "update" id = "update">Update</button>
                    </div>
                </div>
        </form>
    
    
    <div class="cat">
        <div class="ear ear--left"></div>
        <div class="ear ear--right"></div>
        <div class="face">
          <div class="eye eye--left">
            <div class="eye-pupil"></div>
          </div>
          <div class="eye eye--right">
            <div class="eye-pupil"></div>
          </div>
          <div class="muzzle"></div>
        </div>
      </div>

      <div class="text-center mt-2">
        <video class="mx-auto" width="640" height="360" controls autoplay>
            <source src="asset/song.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    

          

</>
    

</body>
</html>