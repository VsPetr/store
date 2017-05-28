<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login page</title>
</head>
<body>
<?php if(!isset($this->session->admin)): ?>
<form action="<?php echo base_url('admin/admin/login') ?>" method="<?php echo 'post' ?>">
    <p>Login</p>
    <p><input type="text" name="login" placeholder="login"></p>
    <p>Password</p>
    <p><input type="text" name="password" placeholder="password"></p>
    <p><input type="submit" name="enter" value="Enter"></p>
</form>
<?php else: redirect('admin/home')?>
<?php endif; ?>
</body>
</html>
