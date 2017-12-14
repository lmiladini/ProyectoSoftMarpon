<?php require ("verificarSession.php") ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from backend.themesadmin.com/backend/admin_left_top_menu/default/admin_default/login_v1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2017 22:14:51 GMT -->
<head>
<meta charset="utf-8">
<meta name="description" content="bootstrap default admin template">
<meta name="viewport" content="width=device-width">
<title>Login </title>

<link rel="shortcut icon" href="http://backend.themesadmin.com/backend/assets/favicon/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="assets/favicon/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon-180x180.png" />

<link rel="stylesheet" href="assets/global/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/icons_fonts/elegant_font/elegant.min.css" />
<link rel="stylesheet" href="assets/pages/global/css/global.css" />


<link rel="stylesheet" href="assets/global/css/components.min.css" />


<link rel="stylesheet" href="assets/layouts/layout-left-top-menu/css/layout.css" />
<link rel="stylesheet" href="assets/pages/login/login-v1/css/login.css" />

</head>
<body>
<div class="login-background">

<div class="login-page">
<div class="main-login-contain">
<div class="login-circul text-xs-center">
<i class="icon_lock_alt login-icon-circul"></i>
</div>
<div class="login-form">
<form id="frmLogin" method="post"  name="frmLogin"  action="verificarSession.php" >
<div class="login_input">
<input type="text" class="login-form-border" id='Documento' name='Documento' maxlength="15" placeholder="Documento" required>
<span class="login-right-icon"><i class="icon icon_profile"></i></span>
</div>
<div class="login_input">
<input type="password" class="login-form-border" id='Password' name='Password' placeholder="Password" required>
<span class="login-right-icon"><i class="icon icon_key"></i></span>
</div>

<button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary btn-login">Ingresar</button>
<div class="goto-login">

<div class="forgot-password-login">
<a href="forgot_password_v1.php">
Olvido la Contraseña?
</a>
</div>
</div>
</form>
    <div id="resultado" name="resultado"></div>
</div>
</div>
</div>

</div>
<script src="js/jquery.min.js"></script>

<<script>
    $(document).ready(function(){
        $("#frmLogin").submit(function(e) {
            e.preventDefault();
            var Documento = $("#Documento").val();
            var Password = $("#Password").val();

            $.ajax({
                method: "POST",
                url: "../../Controller/UsuarioController.php?action=Login",
                data: { Documento: Documento, Password: Password}
            })
                .done(function( msg) {
                    if(msg == 1){
                        window.location.href = $("#frmLogin").attr('action');
                    }else{
                        $("#resultado").html(msg);
                    }
                });
        });
    });
</script>

<script type="text/javascript" src="assets/global/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/pages/global/js/global.min.js"></script>


<script type="text/javascript" src="assets/global/plugins/jquery-validation/dist/jquery.validate.min.js"></script>


<script type="text/javascript" src="assets/global/js/global/global_validation.js"></script>

</body>

<!-- Mirrored from backend.themesadmin.com/backend/admin_left_top_menu/default/admin_default/login_v1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Nov 2017 22:14:51 GMT -->
</html>