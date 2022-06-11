<?php
/**
 * Ejemplo 1 para generar códigos QR
 * con PHP
 * @author parzibyte
 */

# Cargar autoload de Composer
require_once "../vendor/autoload.php";

# Indicar que usaremos el namespace de QRCode
use Endroid\QrCode\QrCode;

# El texto que pondremos
$texto = "Generando códigos QR con PHP desde parzibyte.me";
$codigoQR = new QrCode($texto);

header('Content-Type: ' . $codigoQR->getContentType());
echo $codigoQR->writeString();
?>