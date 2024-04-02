<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
# ⚠⚠⚠ LEA CON CUIDADO ⚠⚠⚠

// PAGINA PRINCIPAL PARA EMAIL NO MODIFIQUE A MENOS QUE SEPA LO QUE ESTA HACIENDO.

// © ANGELUS INFERNUS - FOR SAORI CODER

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../email/constantes.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

$id = $_POST['txtuserid'];              //Capturando user para enviar por correo
$name = $_POST['txtname'];              //Capturando nombre del destinatario
$pass = $_POST['txtpass'];                 //Capturando pass para enviar por correo
$address = $email;             //Capturando email del destinatario
$mensaje = '
<!DOCTYPE html>

<html
  lang="en"
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <meta name="x-apple-disable-message-reformatting" />

    <title></title>

    <!--[if mso]>
      <noscript>
        <xml>
          <o:OfficeDocumentSettings>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
      </noscript>
    <![endif]-->

    <style>
      table,
      td,
      div,
      h1,
      p {
        font-family: Arial, sans-serif;
      }

      table,
      td {
        border: 0;
      }
    </style>
    <body style="margin: 0; padding: 0">
      <table
        role="presentation"
        style="
          width: 100%;
          border-collapse: collapse;
          border: 0;
          border-spacing: 0;
          background: #ffffff;
        "
      >
        <tr>
          <td align="center" style="padding: 0">
            <table
              role="presentation"
              style="
                width: 602px;
                border-collapse: collapse;
                border: 0 0 1px 0 solid #cccccc;
                border-spacing: 0;
                text-align: left;
              "
            >
              <tr>
                <td
                  align="center"
                  style="padding: 40px 0 30px 0; background: #022b3b"
                >
                  <img
                    src="https://github.com/MHerrera94/AluraChallengerPortafolio/blob/master/assets/logo.png?raw=true"
                    alt="Prowessec"
                    width="300"
                    style="height: auto; display: block"
                  />
                  <h1 style="color: #ffffff">
                    Informacion.<span>prowessec.</span>com
                  </h1>
                </td>
              </tr>

              <tr>
                <td
                  style="
                    padding: 36px 30px 42px 30px;
                    background-color: #dadceb;
                  "
                >
                  <table
                    role="presentation"
                    style="
                      width: 100%;
                      border-collapse: collapse;
                      border: 0;
                      border-spacing: 0;
                    "
                  >
                    <tr>
                        <td align="center" style="padding: 0">
                            <h3>Usuario registrado correctamente</h3>
                            <h1 style="font-weight: lighter">
                                !Hola <span style="font-weight: bold">' . $name . '</span>¡
                            </h1>
                            <p>
                                A continuacion te enviamos las credenciales
                                registradas para el ingreso al sistema guardalas en un
                                lugar seguro y no la compartas con
                                <span style="font-weight: bold">nadie.</span>
                            </p>
                            <p>
                            <a
                                style="
                                 color: #022b3b;
                                text-decoration: none;
                                font-weight: bold;
                                "
                                href="https://informacion.prowessec.com"
                                >Informacion.prowessec.com</a
                          >
                        </p>
                        </td>
                    </tr>

                    <tr>
                      <td style="padding: 0">
                        <table
                          role="presentation"
                          style="
                            width: 100%;
                            border-collapse: collapse;
                            border: 0;
                            border-spacing: 0;
                          "
                        >
                          <tr>
                            <td
                              style="
                                width: 260px;
                                padding: 0;
                                vertical-align: top;
                              "
                            >
                              <table
                                role="presentation"
                                style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  border: 0;
                                  border-spacing: 0;
                                "
                              >
                                <tr>
                                  <td
                                    style="padding: 0; width: 50%"
                                    align="right"
                                  >
                                    <p>Usuario:</p>
                                  </td>

                                  <td
                                    style="padding: 0; width: 50%"
                                    align="left"
                                  >
                                    <p
                                      style="color: #022b3b; font-weight: bold"
                                    >
                                      ' . $id . '
                                    </p>
                                  </td>
                                </tr>
                              </table>
                            </td>

                            <td
                              style="
                                width: 20px;
                                padding: 0;
                                font-size: 0;
                                line-height: 0;
                              "
                            >
                              &nbsp;
                            </td>

                            <td
                              style="
                                width: 260px;
                                padding: 0;
                                vertical-align: top;
                              "
                            >
                              <table
                                role="presentation"
                                style="
                                  width: 100%;
                                  border-collapse: collapse;
                                  border: 0;
                                  border-spacing: 0;
                                "
                              >
                                <tr>
                                  <td
                                    style="padding: 0; width: 50%"
                                    align="right"
                                  >
                                    <p>Contraseña:</p>
                                  </td>

                                  <td
                                    style="padding: 0; width: 50%"
                                    align="left"
                                  >
                                    <p
                                      style="color: #022b3b; font-weight: bold"
                                    >
                                     ' . $pass . '
                                    </p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <tr>
                <td align="center" style="padding: 0; background: #ffffff">
                  <table
                    role="presentation"
                    style="
                      width: 100%;
                      border-collapse: collapse;
                      border: 1px solid #dadceb;
                      border-spacing: 0;
                    "
                  >
                    <tr>
                      <td align="center" style="padding: 0">
                        <p style="font-size: 0.7rem; margin: 1px 0 0">
                          Mensaje de envio automatico, no responda a este
                          mensaje.
                        </p>
                      </td>
                    </tr>

                    <tr>
                      <td align="center" style="padding: 0">
                        <p style="font-size: 0.8rem; margin: 2px 0">
                        © Informacion.<span>prowessec.</span>com
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </body>
  </head>
</html>
';
// Instancio un objeto de la clase PHPMailer: passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Enviar mediante SMTP
  $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Activar SMTP autenticador
  $mail->Username   = EMAIL_NAME;                     //Nombre de usuario SMTP
  $mail->Password   = EMAIL_PASS;                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom(EMAIL_NAME, SITE_NAME);      //Email y nombre del remitente del mensaje
  $mail->addAddress($address, $name);     //Direccion de correo y nombre del destinatario/nombre es opcional
  $mail->addReplyTo(EMAIL_NAME, 'Information'); //Direccion para recibir correos: se recomienda sea el mismo del from para evitar llegar a la carpeta spam

  //Archivo adjunto al mensaje
  $mail->CharSet = "UTF-8";                             //Caracteres UTF8
  $mail->Encoding = "quoted-printable";
 

  //Contenido
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Prowessinfo Registro con exito';               //Asunto al mensaje

  //Defino el cuerpo del mensaje en una variable $body
  
  //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->MsgHTML($mensaje);                      //Texto del mensaje en formato HTML
  

  $mail->send();                          //Envío el mensaje.
  echo 'Mensaje enviado!!';
  $address = '';
} catch (Exception $e) {
  echo $address;
  echo "Error al enviar el mensaje: {$mail->ErrorInfo}" .  $address;
}
