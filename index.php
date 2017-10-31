<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Universidad del Norte - Inventario de hardware.</title>
		<LINK href="css/estilo_usuarios.css" type="text/css" rel="stylesheet">
		<p style="text-align: center; overflow: hidden; ">
        <img style="width: 303px; height: 146px margin: -55px -216px -112px -140px;" src="images/jpg/logo.jpg" alt="Logo Universidad del Norte."/>
        </p>
		<h1 align="center" > <strong>Inventario de Equipos y Telefonia</strong></h1>
        <script src="js/funciones.js"></script>
    </head>

    <div id="wrapper" style="position: relative;">
        <fieldset style="width: 17em;" class="loginField"><legend align="right">Entrada al sistema</legend>
            <form action="acceso-php_validar_usuario.php" method="post">
                <table cellspacing="0" cellpadding="0" class="loginVerticalPanel" style="height: auto;">
                    <tbody>

                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <div class="gwt-Label" style="height: auto; width: 100%;">Usuario:</div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <input type="text" id="usuario" name="usuario" class="gwt-TextBox" required="required" style="height: auto; font-size:12px; font-weight:bold; width: 100%;" autofocus>
                            </td>
                        </tr>

                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <div class="gwt-Label" style="height: auto; width: 100%;">Contraseña:</div>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <input type="password" id="contrasena" name="contrasena" required="required" class="gwt-PasswordTextBox" style="height: auto; font-size:12px; font-weight:bold; width: 100%;">
                            </td>
                        </tr>

                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <input type="hidden" id="ubicacion_foto" name="ubicacion_foto" class="gwt-TextBox" required="required" style="height: auto; font-size:12px; font-weight:bold; width: 100%;">
                            </td>
                        </tr>

                        <tr>
                            <td align="left" style="vertical-align: top;">
                                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td align="left" style="vertical-align: top;">
                                              <!--  <img class="gwt-Image" title="Loading" style="display: none;" alt="Loading" src="assets/square_circles.gif"> -->
                                            </td>
                                            <td align="right" style="vertical-align: top;">
                                              <!--  <button type="button" class="loginButton" style="height: 25px;">&gt;&gt;&nbsp;&nbsp;&nbsp;Enviar</button>  -->
                                                <td colspan="2"><input name="iniciar" class="loginButton" type="submit" value="Iniciar Sesión" /></td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </fieldset>
    </div>
</html>