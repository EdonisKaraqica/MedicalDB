<?php
session_start();
?>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='style.css' />
</head>

<div class="alignment">
    <img src="raportet/limak_logo.png" alt="Mountain View" style="width:400px;height:100px;">
</div>

<p class="alignment" style="color:#336699;font-weight:bold;">LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C</p>
<p class="alignment">Sherbimi Mjekesor/Medical Service</p>
<div class="wrapper">
    <form method="post" action="resetpassword.php" class="form-signin">
        <h2 class="form-signin-heading">Reset Password</h2>
        Password <input type="password" class="form-control" name="password" placeholder="Password">
        <br>

        Password Confirmation <input type="password" class="form-control" name="password-conf"
                                     placeholder="Password Confirmation">
        <br>
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="token" value="<?php echo $token; ?>">


        <input type="submit" class="btn btn-primary btn-block" name="resetPass" value="Reset your Password">
    </form>
</div>