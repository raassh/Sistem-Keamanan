<!DOCTYPE html>
<html>
<head>
	<title>titter</title>
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
	<h2>Login</h2>
	<br/>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<br/>
	<br/>
	<form method="post" action="login.php">
		<table>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" placeholder="Masukkan password"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="LOGIN"></td>
			</tr>
		</table>			
	</form>
<?php
// Create database connection using config file
include_once("koneksi.php");
include_once 'admin/autoincr.php';

// Fetch all users data from database
$result = mysqli_query($db, "SELECT * FROM admin ORDER BY admin_id DESC");
$pstan = mysqli_query($db, "SELECT admin.admin_id, admin.username, terbitan.post, terbitan.tanggal, terbitan.kd_terbit FROM terbitan INNER JOIN admin on terbitan.admin_id=admin.admin_id");
$arr = mysqli_query($db, "SELECT kd_komentar, tanggal FROM komentar ORDER BY tanggal DESC");
$kda = mysqli_fetch_array($arr);
$kdk= autonumber($kda['kd_komentar'], 3, 4);
?>
<div>
<?php while ($pos = mysqli_fetch_array($pstan)) {
    $tanda = $pos['kd_terbit'];
    $comen = mysqli_query($db,"SELECT komentar.comment, admin.username, komentar.kd_terbit FROM komentar INNER JOIN admin ON komentar.admin_id=admin.admin_id WHERE komentar.kd_terbit = '$tanda' ");?>
    <div id="posy">
        <div id="kiri"><?php echo $pos['username']?></div>
        <div id="kanan"><?php echo $pos['tanggal']?></div>
        <div><?php echo $pos['post']?></div>
    </div>
    <div id="posy">
        Komentar
        <?php
            while ($kom = mysqli_fetch_array($comen)) {
        ?>
        <div><?php echo $kom['comment']?></div>
        <?php }?>
    </div>
    <form action="index2.php" method="post" name="addcomment">
        <textarea name="comment" rows="5" cols="40">add a comment...</textarea> 
        <input type="hidden" name="kad" value=<?php echo $tanda; ?>>
      <input type="submit" name="Submit" value="add" />
    </form>
<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        //$id = $_POST['id'];
        //$usern = $_POST['username'];
        //$pass = $_POST['password'];
        include_once '../koneksi.php';
        $cmnt = $_POST['comment'];
        $a_id = $pos['admin_id'];
        $kd = $_POST['kad'];
        // include database connection file
        // Insert user data into table
        //$result = mysqli_query($db, "INSERT INTO admin(id,username,password) VALUES('$id','$usern','$pass')");
        $result = mysqli_query($db, "INSERT INTO komentar(kd_komentar,comment,admin_id,kd_terbit) VALUES('$kdk','$cmnt','$a_id','$kd')");
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
<?php }?>
</div>
</body>
</html>