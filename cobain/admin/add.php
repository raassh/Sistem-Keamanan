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
                <td><textarea name="post" rows="5" cols="40">add a post...</textarea></td>
            </tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        //$id = $_POST['id'];
        //$usern = $_POST['username'];
        //$pass = $_POST['password'];
        include_once 'autoincr.php';
        include_once '../koneksi.php';
        $arr = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id ORDER BY terbitan.tanggal DESC");
        $kda = mysqli_fetch_array($arr);
        $ppos = $_POST['post'];
        $kdt= autonumber($kda['kd_terbit'], 3, 4);

        // include database connection file
        $user = $_SESSION['username'];
        $a_id = $_SESSION['admin_id'];

        // Insert user data into table
        //$result = mysqli_query($db, "INSERT INTO admin(id,username,password) VALUES('$id','$usern','$pass')");
        $result = mysqli_query($db, "INSERT INTO terbitan(kd_terbit, post, admin_id, tanggal) VALUES('$kdt','$ppos','$a_id',CURRENT_TIMESTAMP)");
        // Show message when user added
        //echo "User added successfully. <a href='index2.php'>View Users</a>";
        if($result) // will return true if succefull else it will return false
        {
        // code here
        echo "added successfully. <a href='index2.php'>View Users</a>";
        }else{
            echo "Error: " . $result . "<br>" . $db->error;
        }

    }
    ?>
</body>
</html>