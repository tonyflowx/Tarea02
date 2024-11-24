<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Loginsito</title>
</head>
<body>
    <section class="contenedor_formumalio">
        <form method="post" action="login_process.php" class="formulario">
            <figure class="contenedor_img">
                <img class="img_logo" src="img/logo.png" alt="Helado">
            </figure>
            <div class="contenedor_input_label">
                <div class="contenedor_inputs">
                    <label class="label">Correo: 
                        <div>
                            <input required placeholder="example@example.com" class="input" type="email" name="correo">
                        </div>
                    </label>
                </div>
            
                <div class="contenedor_inputs">
                    <label class="label">Contraseña: 
                        <div>   
                            <input required placeholder="********" class="input" type="password" name="contraseña">
                        </div>
                    </label>
                </div>
                <div class="contenedor_create_account">
                    <span>¿No tienes cuenta?<a href="createLogin.php"> Crea una cuenta</a></span>
                </div>
                <div class="contenedor_btn">
                    <button class="btn" type="submit">Ingresar</button>
                </div>

                <div class="contenedor_btn">
                    <a class="btn" href="./../pages/index.html">Regresar</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
