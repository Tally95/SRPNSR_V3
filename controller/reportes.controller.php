<?php

include_once 'model/administracionReservacionModel.php';
include_once 'model/reportesModel.php';
use PHPMailer\PHPMailer\PHPMailer;
//include_once 'Assets/EnvioCorreo/vendor/phpmailer/phpmailer/src/PHPMailer.php';

class reportesController{
    private $modelReporte;

    public function __CONSTRUCT() {
        $this->modelReporte = new Reporte();
    }
    public function Index(){
        require_once 'view/Administrador/header.php';
        require_once 'view/Administrador/reportes.php';
        require_once 'view/Administrador/footer.php';
    }

    public function Descargar() {
        $parque = $_REQUEST['parque'];
        $sector = $_REQUEST['sector'];
        $mes = $_REQUEST['mes'];
        $anno = $_REQUEST['anno'];
        $nombreExcel = $mes."_".$anno;
        $this->modelReporte->ExcelDescarga($parque, $sector, $mes, $anno, $nombreExcel);
       
    }

    public function Enviar() {
//        require_once 'view/Administrador/envioCorreo.php';

       
        $mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
        $mail->Username = "marcotally95@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
        $mail->Password = "marco290395tally"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
        $mail->Port = 587; // Puerto de conexión al servidor de envio. 
        $mail->From = "marcotally95@gmail.com"; // A RELLENARDesde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
        $mail->FromName = "Marco"; //A RELLENAR Nombre a mostrar del remitente. 
        $mail->AddAddress("marcogaray15@hotmail.com"); // Esta es la dirección a donde enviamos 
        $mail->IsHTML(true); // El correo se envía como HTML 
        $mail->Subject = "Asunto Tally"; // Este es el titulo del email. 
        $body = "Hola mundo. Esta es la primer línea ";
        $body .= "Aquí continuamos el mensaje";
        $mail->Body = $body; // Mensaje a enviar. 
        $exito = $mail->Send(); // Envía el correo.
        if ($exito) {
            echo 'El correo fue enviado correctamente.';
        } else {
            echo 'Hubo un problema. Contacta a un administrador.';
        }
    }

}
