<?php
    session_start();
    include("connection.php");

    // Get data to display on index page
    $cmd = "SELECT * FROM blog";
    $run = mysqli_query($conn, $cmd);

    // Fetch all rows into an associative array
    $blogPosts = mysqli_fetch_all($run, MYSQLI_ASSOC);

    // Reverse the array to display the most recent blog post first
    $query = array_reverse($blogPosts);


    //show category name in drop down
    $cmd_cate = "SELECT * FROM category";
    $result = mysqli_query($conn, $cmd_cate);
    $categoryData = array();
    while ($row = mysqli_fetch_array($result)) {
        $categoryData[] = $row;
    }


    // create new post
    if(isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];

        //new line accept
        $content = nl2br($_REQUEST['content']);
        $category = $_REQUEST['category'];
        $ReleasedDate = date('Y-m-d H:i:s');    

        //to get category_id 
        $sql1 = "SELECT category_id FROM category WHERE category_name = '".$category."'";
        $result = mysqli_query($conn,$sql1);
        $q1 = mysqli_fetch_array($result);
        $cid = $q1['category_id'];


        // to get profile_id
        $sql2 = "SELECT profile_id FROM profile WHERE user_id = '".$_SESSION["user_id"]."'";
        $result2= mysqli_query($conn,$sql2);
        $q2 = mysqli_fetch_array($result2);
        $pid = $q2['profile_id'];

        $sql3 = "INSERT INTO blog(title, content,profile_id,category_id,released_date) VALUES('$title', '$content','$pid','$cid',' $ReleasedDate')";
        mysqli_query($conn, $sql3);

        echo $sql;

        header("Location: index.php?info=added&uid={$_SESSION['user_id']}&pid={$_SESSION['pid']}");
        exit();
    }

    //login session
    if (isset($_REQUEST['login'])) {
        //protect injection website
        $Username = $_POST['username'];
        $Password = $_POST['password'];

        // Use prepared statement to prevent SQL injection
        $encryptedPassword = "AES_ENCRYPT('$Password', SHA1('passoword'))";
        $sql="SELECT * FROM user_login WHERE username='".$Username."' AND password=$encryptedPassword";
        $result = mysqli_query($conn,$sql);
        $q = mysqli_fetch_array($result);

        $sql2 = "SELECT * FROM profile WHERE user_id = '".$q['user_id']."'";
        $result2 = mysqli_query($conn,$sql2);
        $q2 = mysqli_fetch_array($result2);
        $pid = $q2['profile_id'];

        if (!$q) {
            echo "<script>";
            echo "alert(\" Username or  Password is not correct\");";
            echo "window.history.back()";
            echo "</script>";
        } else {
            $_SESSION["user_id"] = $q["user_id"];
            $_SESSION["pid"] = $pid;
            $id = $_SESSION["user_id"];

            //check admin
            if ($q2['status'] == 1) {
                header("Location: admin_page.php?status={$q2['status']}");
            } else {
                header("Location: index.php?uid={$q['user_id']}&pid={$_SESSION['pid']}&status={$q2['status']}");
            }
        }
    }



    // register session
    if(isset($_REQUEST['register'])){
        $Username = $_POST['username'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        $RePassword = $_POST['re-password'];
        $DOB = $_POST['date'];

        // Create a DateTime object from the input date
        $dateObject = new DateTime($DOB);
    
        // Format the date in the desired pattern (YYYY-MM-DD)
        $formattedDate = $dateObject->format('Y-m-d');
        $RegistDate = date('Y-m-d H:i:s');

        //check whether does name and email already use or not 
        $sql_u = "SELECT * FROM user_login WHERE username='$Username'";
        $res_u = mysqli_query($conn, $sql_u);

        $sql_e = "SELECT * FROM profile WHERE email='$Email'";
        $res_e = mysqli_query($conn, $sql_e);
        

        if(mysqli_num_rows($res_u)>0){
            echo "<script>";
            echo "alert('Username already in use. Please choose a different username.');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            if(mysqli_num_rows($res_e)>0){
                echo "<script>";
                echo "alert('Email already in use. Please choose a different email.');";
                echo "window.history.back();";
                echo "</script>";
            }else{
                if (isset($Password) && isset($RePassword) && ($Password == $RePassword)) {
                    // encrypt
                    $encryptedPassword = "AES_ENCRYPT('$Password', SHA1('passoword'))";

                    $min = 1;
                    $max = 99999999;

                    do {
                        $randomNumber = rand($min, $max);

                        $cmd = "SELECT user_id FROM user_login WHERE user_id = $randomNumber";
                        $q_cmd = mysqli_query($conn, $cmd);

                        $randomNumberExists = mysqli_num_rows($q_cmd) > 0;

                    } while ($randomNumberExists);
                    

                    // Insert the data into the database
                    $sql1 = "INSERT INTO user_login (user_id,username, password) VALUES ($randomNumber,'$Username', $encryptedPassword)";
                    $result = mysqli_query($conn, $sql1);

                    //insert to profile table 
                    $sql2 = "SELECT user_id FROM user_login WHERE username = '".$Username."' AND password = $encryptedPassword";
                    $result2 = mysqli_query($conn,$sql2);
                    $q = mysqli_fetch_array($result2);
                    $UID = $q["user_id"];

                    $sql3 = "INSERT INTO profile (user_id,register_date,name,email,dob) VALUES ('".$UID."' ,'".$RegistDate."','".$Username."','".$Email."','".$DOB."')";
                    $result3 = mysqli_query($conn,$sql3);

                    Header("Location: login_page.php");
                } else {
                    echo "<script>";
                    echo "alert('Password Unmatched');";
                    echo "window.history.back();";
                    echo "</script>";
                }
            }
        }

        
    }

    // when click view
    if(isset($_REQUEST['bid'])){
        $bid = $_REQUEST['bid'];
        $_SESSION['bid'] = $bid;
        $sql = "SELECT * FROM blog WHERE blog_id = '".$bid."'";
        $query = mysqli_query($conn, $sql);
    }
    // show button if u created it.
    if(isset($_REQUEST['pid'])){
        $pid = $_REQUEST['pid'];
        $cmd = "select * from profile where profile_id = {$pid}";
        $query_pid = mysqli_query($conn, $cmd);
    }

    //delete blog
    if(isset($_REQUEST['delete'])){
        $bid = $_REQUEST['bid'];
        $sql = "DELETE FROM blog WHERE blog_id = $bid";
        mysqli_query($conn, $sql);

        header("Location: index.php");
    }

    //update blog
    if(isset($_REQUEST['update'])){
        $id = $bid;
        $title = $_REQUEST['title'];
        $content = nl2br($_REQUEST['content']);

        $sql = "UPDATE blog SET title = '$title', content = '$content' WHERE blog_id = $id";
        mysqli_query($conn, $sql);

        header("Location: index.php");

    }

    // comment session
    if(isset($_REQUEST['post_comment'])){
        $comment = $_POST['comment'];
        $timestamp = date('Y-m-d H:i:s');
        //ใครเขียน comment 
        $cmd1 = "SELECT user_id FROM profile WHERE profile_id = {$_SESSION['pid']}";
        $result =  mysqli_query($conn, $cmd1);
        $q = mysqli_fetch_array($result);
        $uid = $q['user_id']; 
        $cmd2 = "INSERT INTO comment (blog_id, comment_describe, user_id, comment_time) VALUES ({$_SESSION['bid']}, '$comment', $uid, '$timestamp')";
        mysqli_query($conn, $cmd2);
        

        header ("location: view.php?bid={$_SESSION['bid']}&pid={$_SESSION['pid']}");
    }

    //specify each category
    if(isset($_REQUEST['cid'])){
        $cid = $_REQUEST['cid'];
        $cmd = "SELECT * FROM blog where category_id = {$cid}";
        $query_cat= mysqli_query($conn, $cmd);
    }

    // delete user
    if(isset($_REQUEST['DUID'])){
        $id = $_REQUEST['DUID'];
        $cmd = "DELETE FROM user_login WHERE user_id = $id";
        $queryt= mysqli_query($conn, $cmd);
    }
    //delete comment 
    if(isset($_REQUEST['DCOID'])){
        $id = $_REQUEST['DCOID'];
        $cmd = "DELETE FROM comment WHERE comment_id = $id";
        $queryt= mysqli_query($conn, $cmd);
    }
    // delete blog 
    if(isset($_REQUEST['DBID'])){
        $id = $_REQUEST['DBID'];
        $cmd = "DELETE FROM blog WHERE blog_id = $id";
        $queryt= mysqli_query($conn, $cmd);
    }
    //add category
    if (isset($_POST['addCa'])){
        $caname = $_POST['caname'];
        $cmd = "INSERT INTO category(category_name) VALUES('$caname')";
        mysqli_query($conn, $cmd);
    }
    // delete category 
    if(isset($_REQUEST['DCAID'])){
        $id = $_REQUEST['DCAID'];
        $cmd = "DELETE FROM category WHERE category_id = $id";
        $queryt= mysqli_query($conn, $cmd);
    }
?>