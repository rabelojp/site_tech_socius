<?php
// Incluir os arquivos do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['cname'];
    $email = $_POST['cemail'];
    $message = $_POST['cmessage'];

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dacostarabelo.jp@gmail.com'; // Seu endereço de e-mail
        $mail->Password   = 'soulindo3103'; // Sua senha de e-mail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 465;

        // Destinatários
        $mail->setFrom('dacostarabelo.jp@gmail.com', 'João Paulo');
        $mail->addAddress('dacostarabelo.jp@gmail.com', 'Nome do Destinatário'); // Para onde enviar

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Novo Projeto: ' . $name;
        $mail->Body    = "<p>Nome: $name</p><p>Email: $email</p><p>Mensagem: $message</p>";

        // Enviar o e-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Falha ao enviar a mensagem. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>