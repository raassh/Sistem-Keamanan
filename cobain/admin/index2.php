<?php 
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../cobain.php?pesan=belum_login");
    }
    ?>
<?php
// Create database connection using config file
include_once("../koneksi.php");

// Fetch all users data from database
$result = mysqli_query($db, "SELECT * FROM admin ORDER BY admin_id DESC");
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id");
?>

<html>
<head>    
    <title>Homepage</title>
    <style type="text/css">
        #kiri
            {
            width:20%;
            float:left;
            }
        #kanan
            {
            width:80%;
            float:right;
            }
        #posy {
            border: solid;
        }
    </style>
</head>

<body>
<div>
    <h1>halo 
    <?php
        echo $_SESSION['username']; 
    ?>
    </h1>
</div>
<a href="add.php">POST</a><br/><br/>
<div>
    <table width='80%' border=1>

    <tr>
        <th>Name</th> <th>Mobile</th> <th>Email</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['admin_id']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['password']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[admin_id]'>Edit</a> | <a href='delete.php?id=$user_data[admin_id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</div>
<?php $ulang=0; $i=0;
while ($ulang != 3) { $pos = mysqli_fetch_array($pstan);
    $tanda = $pos['kd_terbit'];
    $comen = mysqli_query($db,"SELECT komentar.comment, admin.username, komentar.kd_terbit FROM komentar INNER JOIN admin ON komentar.admin_id=admin.admin_id WHERE komentar.kd_terbit = $tanda");?>
<div>
    <div class="uname", id="kiri"><?php echo $pos['username']?></div>
    <div id="kanan"><?php echo $pos['tanggal']?></div>
    <div id="posy"><?php echo $pos['post']?></div>
    <?php
        while ($kom = mysqli_fetch_array($comen)) {
    ?>
    <div id="posy"><?php echo $kom['comment']?></div>
    <?php }?>
    <form action="index2.php" method="post" name="addcomment">
        <div><textarea name="comment" rows="5" cols="40"></textarea>
        <div><input type="hidden" name="kdtt" value=<?php $pos['kd_terbit'];?>></div>    
      <input type="submit" name="Submit" value="add" /></div>
    </form>
</div>
<?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        //$id = $_POST['id'];
        //$usern = $_POST['username'];
        //$pass = $_POST['password'];
        $cmnt = $_POST['comment'];
        $kdt = $_POST['kdtt'];
        $a_id = $pos['admin_id'];
        // include database connection file
        include_once("../koneksi.php");
        // Insert user data into table
        //$result = mysqli_query($db, "INSERT INTO admin(id,username,password) VALUES('$id','$usern','$pass')");
        $result = mysqli_query($db, "INSERT INTO komentar(kd_komentar,comment,admin_id,kd_terbit) VALUES('26','$cmnt','$a_id','$kdt')");
        // Show message when user added
        //echo "User added successfully. <a href='index2.php'>View Users</a>";
        echo "added successfully. <a href='index2.php'>View Users</a>";
    }
    ?>
<?php $ulang++; }?>
<a href="logout.php">LOGOUT</a>
</body>
</html>