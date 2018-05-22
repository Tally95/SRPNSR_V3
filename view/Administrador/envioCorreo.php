<?php

use PHPMailer\PHPMailer\PHPMailer;

$msg = null;
if (isset($_POST["phpmailer"])) {
    $email = htmlspecialchars($_POST["email"]);
    $asunto = htmlspecialchars($_POST["asunto"]);
    $mensaje = $_POST["mensaje"];
    $adjunto = $_FILES["adjunto"];
    require 'vendor/autoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->SMTPDebug = 0;

    $mail->Host = 'smtp.gmail.com';

    $mail->Port = 587;

    $mail->SMTPSecure = 'tls';

    $mail->SMTPAuth = true;

    $mail->Username = "marcogaray15@hotmail.com";
    $mail->Password = "marco290395tally";

    $mail->From = "marcogaray15@hotmail.com";

    $mail->FromName = "ACG";

    $mail->Subject = $asunto;

    $mail->addAddress($email, "Email");

    $mail->MsgHTML($mensaje);

    if ($adjunto ["size"] > 0) {
        $mail->addAttachment($adjunto ["tmp_name"], $adjunto ["name"]);
    }

    if ($mail->Send()) {
                echo '<script>alert("Mensaje enviado a "' .  $email . '")</script> ';

                
    } else {
        echo '<script>alert("Error en el mensaje "' . $email->ErrorInfo . '")</script> ';
       
    }
}

function save_mail($mail) {
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}

        ?>
                
<!DOCTYPE HTML>
<html>
<head>
<title>Contacto</title>
<link rel="stylesheet" type="text/css" href="Assets/EnvioCorreo/bootstrap/css/bootstrap.css">
<script src="Assets/EnvioCorreo/bootstrap/jquery-3.1.1.min.js"></script>
<script src="Assets/EnvioCorreo/bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="Assets/EnvioCorreo/Style.css">
</head>
<body>
    
     <!--Button trigger modal--> 
<!--    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#mimodalejemplo">
Enviar Email
</button>-->
    
    <!-- Modal -->
<!--<div class="modal fade" id="mimodalejemplo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="form__titulo">
          <h3 style="font-size: 30px;">Correo Electr&oacute;nico</h3>
      </div>
      <div class="modal-body">-->
    
<strong><?php echo $msg; ?></strong>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" class="form-register">
    <div class="contenedor-inputs">

<table border="0">

<td>Para:</td>
<td><input class="input-100" name="email" type="email" id="email" required=""></td>
</tr>
<tr>
<td>Asunto:</td>
<td><input class="input-100" name="asunto" type="text" id="asunto" required=""></td>
</tr>
<tr>
<td>Archivo adjunto:</td>
<td><input type="file" name="adjunto"></td>
</tr>
<tr>
    <td></td>
    <td><textarea name="mensaje" cols="50" rows="10" id="mensaje" required="" placeholder="Mensaje"></textarea></td>
</tr>

<tr>
    <td colspan="2" style="text-align:center;">
        <input type="submit" class=" btn-enviar" value="Enviar">
        <input type="button" class="btn-enviar" data-dismiss="modal" value="Cerrar">
    </td>
</tr>

</table>
<input type="hidden" name="phpmailer">
    </div>
</form>
<!-- </div>
    </div>
  </div>
</div>-->

</body>
</html>