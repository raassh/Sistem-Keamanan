<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../cobain.php?pesan=belum_login");
    }
    ?>
<html>
<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index2.php">Go to Home</a>
    <br/><br/>
<div>
    <h1>halo 
    <?php
        echo $_SESSION['username']; 
    ?>
    </h1>
</div>
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Post</td>
                <td><input type="text" name="post"></td>
            </tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        //$id = $_POST['id'];
        //$usern = $_POST['username'];
        //$pass = $_POST['password'];
        $ppos = $_POST['post'];


        // include database connection file
        include_once("../koneksi.php");
        $user = $_SESSION['username'];
        // Insert user data into table
        //$result = mysqli_query($db, "INSERT INTO admin(id,username,password) VALUES('$id','$usern','$pass')");
        $result = mysqli_query($db, "INSERT INTO beranda(username,post,comment,date) VALUES('$user','$ppos','',CURRENT_TIMESTAMP)");
        // Show message when user added
        //echo "User added successfully. <a href='index2.php'>View Users</a>";
        echo "added successfully. <a href='index2.php'>View Users</a>";
        echo $user;
    }
    ?>
</body>
</html>