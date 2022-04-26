<?php


$data = (empty($_FILES['certificado']) && empty($_POST['nombre']) && empty($_POST['asunto']) && empty($_POST['mensaje']) && empty($_POST['email']));


if (!$data) {


    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    $email = $_POST['email'];


    //variables para los datos del archivo
    $nameFile = $_FILES['certificado']['name'];
    $sizeFile = $_FILES['certificado']['size'];
    $typeFile = $_FILES['certificado']['type'];
    $tempFile = $_FILES["certificado"]["tmp_name"];
    $fecha = time();
    $fechaFormato = date("j/n/Y", $fecha);


    //asunto del correo
    $asunto = "Enviado por " . $nombre. "";


    // -> mensaje en formato Multipart MIME
    $cabecera = "MIME-VERSION: 1.0\r\n";
    $cabecera .= "Content-type: multipart/mixed;";
    $cabecera .= "boundary=\"=C=T=E=C=\"\r\n";
    $cabecera .= "From: {$email}";

    //Primera parte del cuerpo del mensaje
    $cuerpo = "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $cuerpo .= "\r\n"; // línea vacía
    $cuerpo .= "Correo enviado por: " . $nombre ;
    $cuerpo .= " con fecha: " . $fechaFormato . "\r\n";
    $cuerpo .= "Email: " . $email . "\r\n";
    $cuerpo .= "Mensaje: " . $mensaje . "\r\n";
    $cuerpo .= "\r\n"; // línea vacía

    // -> segunda parte del mensaje (archivo adjunto)
    //    -> encabezado de la parte
    $cuerpo .= "--=C=T=E=C=\r\n";
    $cuerpo .= "Content-Type: application/octet-stream; ";
    $cuerpo .= "name=" . $nameFile . "\r\n";
    $cuerpo .= "Content-Transfer-Encoding: base64\r\n";
    $cuerpo .= "Content-Disposition: attachment; ";
    $cuerpo .= "filename=" . $nameFile . "\r\n";
    $cuerpo .= "\r\n"; // línea vacía

    $fp = fopen($tempFile, "rb");
    $file = fread($fp, $sizeFile);
    $file = chunk_split(base64_encode($file));

    $cuerpo .= "$file\r\n";
    $cuerpo .= "\r\n"; // línea vacía
    // Delimitador de final del mensaje.
    $cuerpo .= "--=C=T=E=C=--\r\n";

    //Enviar el correo
    if (mail($email, $asunto, $cuerpo, $cabecera)) {
        echo "Correo enviado";
    } else {
        echo "Error de envio";
    }
} else {
    echo "no hay data";
}