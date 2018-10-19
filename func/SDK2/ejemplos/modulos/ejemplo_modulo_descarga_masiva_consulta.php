<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
// NO OLVIDAR ESTE INCLUDE
include_once "lib/cfdi32_multifacturas.php";

/*
 * Se indican las credenciales de MultiFacturas
 */
$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO'; //   [SI|NO]

/*
 * Se especifica que se utilizara el modulo 'descargamasiva'
 */
$datos['modulo'] = 'descargamasiva';

/*
 * Se agregan los datos a enviar al modulo 'descargamasiva'
 */
 // PARA SOLICITAR LA DESCARGA
$datos['operacion'] = 'CONSULTA'; // SOLICITUD o CONSULTA;
$datos['licencia'] = 'DEMO';
$datos['identificador'] = '2';

/*
 * Se obtiene la respuesta del modulo
 */
$res = cargar_modulo_multifacturas($datos);

// Se muestran los resultados
print_r($res);