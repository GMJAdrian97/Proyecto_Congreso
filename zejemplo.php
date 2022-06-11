<?php
    print_r($_GET);
?>



<?php
    require_once('D:/Programas/xampp/htdocs/vendor/autoload.php');
    use Spipu\Html2Pdf\Html2Pdf;
    use Spipu\Html2Pdf\Exception\Html2PdfException;
    use Spipu\Html2Pdf\Exception\ExceptionFormatter;

    require_once('mdlReporte.class.php');
    //$sistema -> validarRol('Administrador');
    $id_evento = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_evento = isset($_GET['id_evento']) ? $_GET['id_evento'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'lista':
           $reporte -> lista($id_evento);
           $content = $reporte;
        break;

        default:
        $content = 'nada';
    }

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content);
    $html2pdf->output('example00.pdf');
?>