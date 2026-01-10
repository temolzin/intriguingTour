<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Si usas Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Normaliza nombres de campo para que funcionen varios formularios
    $name = '';
    if (isset($_POST['name'])) $name = $_POST['name'];
    if ($name === '' && isset($_POST['firstName'])) $name = $_POST['firstName'];
    if ($name === '' && isset($_POST['full_name'])) $name = $_POST['full_name'];

    $lastName = '';
    if (isset($_POST['lastName'])) $lastName = $_POST['lastName'];
    if ($lastName === '' && isset($_POST['lastname'])) $lastName = $_POST['lastname'];
    if ($lastName === '' && isset($_POST['surname'])) $lastName = $_POST['surname'];

    $email = '';
    if (isset($_POST['email'])) $email = $_POST['email'];
    if ($email === '' && isset($_POST['user_email'])) $email = $_POST['user_email'];

    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $guests = isset($_POST['guests']) ? $_POST['guests'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';

    $message = '';
    if (isset($_POST['message'])) $message = $_POST['message'];
    if ($message === '' && isset($_POST['comments'])) $message = $_POST['comments'];
    if ($message === '' && isset($_POST['msg'])) $message = $_POST['msg'];

    // Limpia y escapa; si falta algún campo, se deja vacío sin bloquear
    $name = htmlspecialchars(trim($name));
    $lastName = htmlspecialchars(trim($lastName));
    $email = htmlspecialchars(trim($email));
    $phone = htmlspecialchars(trim($phone));
    $guests = htmlspecialchars(trim($guests));
    $company = htmlspecialchars(trim($company));
    $website = htmlspecialchars(trim($website));
    $message = htmlspecialchars(trim($message));

    if ($message === '') {
        $message = 'Sin mensaje';
    }

    // Validar campos obligatorios
    if (empty($name) || empty($email)) {
        echo "Error: Por favor completa tu nombre y correo electrónico.";
        exit;
    }

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: El correo electrónico no es válido.";
        exit;
    }

    // Verificar reCAPTCHA v3
    $recaptcha_response = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
    if ($recaptcha_response !== '') {
        $recaptcha_secret = '6LeIjDwsAAAAAPtJCP-doT3zGLygEcakfySdwVAn'; // Clave secreta de producción de Google reCAPTCHA v3
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $recaptcha_secret, 'response' => $recaptcha_response);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        // v3 retorna un score de 0.0 a 1.0 (1.0 = muy probable humano, 0.0 = muy probable bot)
        if (!$resultJson || !$resultJson->success || $resultJson->score < 0.5) {
            echo "Error: Verificación de seguridad fallida. Por favor intenta nuevamente.";
            exit;
        }
    } else {
        echo "Error: Falta verificación de seguridad.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'intriguingtours@gmail.com'; // Tu correo
        $mail->Password = 'fzdn flfp ociq dvvl'; // Usa una contraseña de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';

        // Remitente y destinatario
        $mail->setFrom('intriguingtours@gmail.com', 'Intriguing Tours Teotihuacan');
        $mail->addAddress('intriguingtours@gmail.com', 'Admin');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de contacto desde el sitio web https://www.intriguingtours.com/';
        $fullName = trim($name . ' ' . $lastName);
        $mail->Body = "
            <div style='text-align: center;'>
                <img src='https://intriguingtours.com/assets/images/logo/logo.png' alt='Logo Intriguing Tours' style='max-width: 200px;'>
            </div>
            <h3>Nuevo mensaje de contacto</h3>
               <p><strong>Nombre completo:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Teléfono:</strong> $phone</p>
            <p><strong>Número de personas:</strong> $guests</p>
            <p><strong>Empresa:</strong> $company</p>
            <p><strong>Sitio web:</strong> $website</p>
            <p><strong>Mensaje:</strong></p>
            <p>$message</p>
        ";

        $mail->send();

        // Enviar email de confirmación al cliente
        $mail->clearAddresses();
        $mail->clearCCs();
        $mail->clearBCCs();
        $mail->addAddress($email, $fullName ?: $name);
        $mail->Subject = 'Gracias por contactarnos - Intriguing Tours Teotihuacan';
        $mail->Body = "
            <div style='text-align: center;'>
                <img src='https://intriguingtours.com/assets/images/logo/logo.png' alt='Logo Intriguing Tours' style='max-width: 200px;'>
            </div>
            <h3>¡Gracias por tu mensaje!</h3>
            <p>Hola $fullName,</p>
            <p>Hemos recibido tu consulta sobre nuestros tours en Teotihuacan. Nuestro equipo te responderá pronto.</p>
            <p>Detalles de tu mensaje:</p>
               <p><strong>Nombre completo:</strong> $fullName</p>
            <p><strong>Teléfono:</strong> $phone</p>
            <p><strong>Número de personas:</strong> $guests</p>
            <p><strong>Empresa:</strong> $company</p>
            <p><strong>Sitio web:</strong> $website</p>
            <p><strong>Mensaje:</strong></p>
            <p>$message</p>
            <p>Saludos,<br>Equipo de Intriguing Tours Teotihuacan</p>
        ";

        $mail->send();
        echo 'Mensaje enviado exitosamente. Revisa tu correo para la confirmación.';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo 'Método no permitido.';
}
?>