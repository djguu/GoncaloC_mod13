<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="images/icon.ico">

    <title>TeixeiraChat Admin</title>

    <!--javascript files-->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>

    <!--css files-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Admin Login</h1><br>
                <form method="post" style="text-align: center">
                    <input type="text" name="username" placeholder="Username" autocomplete="off" id="user" />
                     <input type="password" name="password" placeholder="Password" id="pass" />

                    <input type="submit" class="login loginmodal-submit" value="Login" id="submit" />
                </form>
             </div>
        </div>
    </div>
</body>
<script>
     $(document).ready(function() {
         //Vai verificar se existe o administrador.
         //Se existir vai entrar na configuraçao
         $("#submit").click(function(e) {
            e.preventDefault();

            var user = $('#user').val();
            var pass = $('#pass').val();

             if (user != "" && pass != "") {
                $.ajax({
                    url: "php/login",
                    dataType: 'json',
                    data: {
                        login: user,
                        password: pass
                    },
                    type: "POST",
                    error: function() {
                        console.log('erro')
                    },
                    success: function(data) {
                        if (data) {
                            location.href = "admin";
                        } else {
                            alert("Utilizador ou password erradas!");
                            $('#user').val("");
                            $('#pass').val("");
                            $("#user").focus();
                        }
                    }
                })
            } else {
                alert("Insira um nome e uma password!");
            }
        });
    });
</script>

    </html>