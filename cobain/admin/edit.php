<?php
// include database connection file
include_once("../koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $usern=$_POST['username'];
    $pass=$_POST['password'];
    $options = [
    'cost' => 10,
    ];
 
    $hash = password_hash($pass, PASSWORD_DEFAULT, $options);
    // update user data
    $result = mysqli_query($db, "UPDATE admin SET username='$usern',password='$hash' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index2.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($db, "SELECT * FROM admin WHERE admin_id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['admin_id'];
    $usern = $user_data['username'];
    $pass = $user_data['password'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>username</td>
                <td><input type="text" name="username" value=<?php echo $usern;?>></td>
            </tr>
            <tr> 
                <td>password</td>
                <td><input type="text" name="password" value=<?php echo $pass;?>></td>
            </tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>