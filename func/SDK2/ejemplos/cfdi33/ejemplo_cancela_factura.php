<?php
/**
 * @author MultiFacturas.com
 * @copyright 2013
 * 
 * EL array $datos contiene la informaci�n de la factura a generar
 * 
 * GENERACION DEL CERTIFICADO Y LLAVE .PEM
 * ESTOS SE REQUIEREN PARA LA GENERACION DEL SELLO
 * SE RECOMIENDA GENERARLOS UNA SOLA VES Y ALMACENAR SU INFORMACION
 * PARA EVITAR PROCESAMIENTO ADICIONAL
 * 
 * $respuesta=certificado_pem($datos);
 * 
 * GENERA EL XML Y LO TIMBRA EN BASE A LA INFORMACION DEL ARREGLO $datos
 * 
 * VALIDADOR DE ESTRUCTURA DEL XML
 * https://www.consulta.sat.gob.mx/sicofi_web/moduloECFD_plus/ValidadorCFDI/Validador%20cfdi.html
 */
error_reporting(~E_NOTICE);

date_default_timezone_set('America/Mexico_City');

include_once "../../sdk2.php";




/////////////////////////////////////////////////////////////////////////////////
////////////     CREAR ARCHIVOS .PEM
/////////////////////////////////////////////////////////////////////////////////

$datos['cancelar']='NO';
$datos['cfdi']='../../timbrados/cfdi_ejemplo_factura.xml';
$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO'; //   [SI|NO]
$datos['conf']['cer'] = '../../certificados/lan7008173r5.cer';
$datos['conf']['key'] = '../../certificados/lan7008173r5.key';
$datos['conf']['pass'] = '12345678a';


multifacturas_modo_pruebas();
$res= cfdi_cancelar($datos);


///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
 
echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach($res AS $variable=>$valor)
{
    $valor=htmlentities($valor);
    $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
    echo "<b>[$variable]=</b>$valor<hr>";
}

?>
