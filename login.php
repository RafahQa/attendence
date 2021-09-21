<?php
    $title = 'User Login';

    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    
    //if logged in

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username=strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $newPassword = md5($password.$username);

        $result = $user->getUser($username,$newPassword);
        if (!$result) 
        {
            echo '<div class="alert alert-danger">Username or Password is incorrect. Please try again. </div>';
        }
        else {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $result['id'];
            header("Location: viewrecords.php");

        }
    }
?>

<h1 class="text-center"><?php echo $title;?></h1>
<br>
<br>
<div class="d-grid gap-2 col-6 mx-auto">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <table class="table table-sm">
        <tr>
            <td><label for="username">Username: *</label></td>
            <td><input required type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {echo $_POST['username'];} ?>"></td>
        </tr>
        <tr>
            <td><label for="password">Password: *</label></td>
            <td><input required type="password" name="password" class="form-control" id="password">
            <?php if (empty($password) && isset($password_error)) {echo"<p class='text-danger'>$password_error";} ?>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <div class="d-grid gap-2 col-6 mx-auto">
    <input type="submit" value="Login" class="btn btn-success btn-block">
    <a href="#" class="link-success">forgot password?</a>
    </div>
    <br>
</form>
</div>
<?php include_once 'includes/footer.php';?>