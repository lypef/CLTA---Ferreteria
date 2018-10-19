<?php

//error_reporting(~(E_WARNING));
error_reporting(0);

date_default_timezone_set('America/Mexico_City');

require_once '../../sdk2.php';

$datos['complemento'] = 'nomina12';

$datos['version_cfdi'] = '3.3';
$datos['cfdi']='../../timbrados/ejemplo_cfdi33_nomina12.xml';
$datos['xml_debug']='../../timbrados/debug_ejemplo_cfdi33_nomina12.xml';

$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO';

$datos['conf']['cer'] = '../../certificados/AAA010101AAA.cer.pem';
$datos['conf']['key'] = '../../certificados/AAA010101AAA.key.pem';
$datos['conf']['pass'] = '12345678a';

$datos['factura']['condicionesDePago'] = 'CONDICIONES';
$datos['factura']['descuento'] = '0.00';
$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s', time() - 120);
$datos['factura']['folio'] = '100';
$datos['factura']['forma_pago'] = '01';
$datos['factura']['LugarExpedicion'] = '45079';
$datos['factura']['metodo_pago'] = 'PUE';
$datos['factura']['moneda'] = 'MXN';
$datos['factura']['serie'] = 'A';
$datos['factura']['subtotal'] = '1000.00';
$datos['factura']['tipocambio'] = '1.0';
$datos['factura']['tipocomprobante'] = 'I';
$datos['factura']['total'] = '1000.00';

/*$datos['CfdisRelacionados']['TipoRelacion'] = '01';
$datos['CfdisRelacionados']['UUID'][0]='A39DA66B-52CA-49E3-879B-5C05185B0EF7';*/

//$datos['factura']['Confirmacion'] = '0234';
$datos['factura']['RegimenFiscal'] = '601';

$datos['emisor']['rfc'] = 'AAA010101AAA'; //RFC DE PRUEBA
$datos['emisor']['nombre'] = 'CINDEMEX SA DE CV';  // EMPRESA DE PRUEBA

$datos['receptor']['rfc'] = 'XAXX010101000';
$datos['receptor']['nombre'] = 'Publico en General';
//$datos['receptor']['ResidenciaFiscal'] = 'MEX';
//$datos['receptor']['NumRegIdTrib'] = '1234567890';
$datos['receptor']['UsoCFDI'] = 'G01';

for ($i = 1; $i <= 10; $i++)
{
    $datos['conceptos'][$i]['cantidad'] = '1.00';
    $datos['conceptos'][$i]['unidad'] = 'PZ';
    $datos['conceptos'][$i]['ID'] = "COD$i";
    $datos['conceptos'][$i]['descripcion'] = "PRODUCTO $i";
    $datos['conceptos'][$i]['valorunitario'] = '100.00';
    $datos['conceptos'][$i]['importe'] = '100.00';
    $datos['conceptos'][$i]['ClaveProdServ'] = '01010101';
    $datos['conceptos'][$i]['ClaveUnidad'] = 'C81';
}

/*$datos['impuestos']['translados'][0]['impuesto'] = '001';
$datos['impuestos']['translados'][0]['tasa'] = '0.160000';
$datos['impuestos']['translados'][0]['importe'] = '16';
$datos['impuestos']['translados'][0]['TipoFactor'] = 'Tasa';*/

//$datos['impuestos']['retenciones'][0]['impuesto'] = 'ISR';
//$datos['impuestos']['retenciones'][0]['importe'] = '0.00';

/*$datos['modulo_pre']='quitacantos,mayusculas'
$datos['modulo_inter']
$datos['modulo_post']
$datos['modulo']='cp'*/

// Obligatorios
/*$datos['nomina12']['TipoNomina'] = 'O';
$datos['nomina12']['FechaPago'] = '2016-10-31';
$datos['nomina12']['FechaInicialPago'] = '2016-10-16';
$datos['nomina12']['FechaFinalPago'] = '2016-10-31';
$datos['nomina12']['NumDiasPagados'] = '15';
// Opcionales
$datos['nomina12']['TotalPercepciones'] = '10500.05';
$datos['nomina12']['TotalDeducciones'] = '1234.09';
$datos['nomina12']['TotalOtrosPagos'] = '0.0';

// SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
// Nodo Emisor, OPCIONALES
$datos['nomina12']['Emisor']['RegistroPatronal'] = '5525665412';
$datos['nomina12']['Emisor']['RfcPatronOrigen'] = 'AAA010101AAA';

// SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
// Obligatorios de Receptor
$datos['nomina12']['Receptor']['ClaveEntFed'] = 'JAL';
$datos['nomina12']['Receptor']['Curp'] = 'CACF880922HJCMSR03';
$datos['nomina12']['Receptor']['NumEmpleado'] = '060';
$datos['nomina12']['Receptor']['PeriodicidadPago'] = '04';
$datos['nomina12']['Receptor']['TipoContrato'] = '01';
$datos['nomina12']['Receptor']['TipoRegimen'] = '02';

// Opcionales de Receptor
$datos['nomina12']['Receptor']['Antiguedad'] = 'P21W';
$datos['nomina12']['Receptor']['Banco'] = '021';
$datos['nomina12']['Receptor']['CuentaBancaria'] = '1234567890';
$datos['nomina12']['Receptor']['FechaInicioRelLaboral'] = '2016-06-01';
$datos['nomina12']['Receptor']['NumSeguridadSocial'] = '04078873454';
$datos['nomina12']['Receptor']['Puesto'] = 'Desarrollador';
$datos['nomina12']['Receptor']['RiesgoPuesto'] = '2';
$datos['nomina12']['Receptor']['SalarioBaseCotApor'] = '435.50';
$datos['nomina12']['Receptor']['SalarioDiarioIntegrado'] = '435.50';

// NODO PERCEPCIONES
// Totales Obligatorios
$datos['nomina12']['Percepciones']['TotalGravado'] = '10500.05';
$datos['nomina12']['Percepciones']['TotalExento'] = '0.00';

// Totales Opcionales
$datos['nomina12']['Percepciones']['TotalSueldos'] = '10500.05';

// Agregar Percepciones (Todos obligatorios)
$datos['nomina12']['Percepciones'][0]['TipoPercepcion'] = '001';
$datos['nomina12']['Percepciones'][0]['Clave'] = '001';
$datos['nomina12']['Percepciones'][0]['Concepto'] = 'Sueldos, Salarios Rayas y Jornales';
$datos['nomina12']['Percepciones'][0]['ImporteGravado'] = '6250.05';
$datos['nomina12']['Percepciones'][0]['ImporteExento'] = '0.00';

$datos['nomina12']['Percepciones'][1]['TipoPercepcion'] = '049';
$datos['nomina12']['Percepciones'][1]['Clave'] = '014';
$datos['nomina12']['Percepciones'][1]['Concepto'] = 'Premios de asistencia';
$datos['nomina12']['Percepciones'][1]['ImporteGravado'] = '625.00';
$datos['nomina12']['Percepciones'][1]['ImporteExento'] = '0.00';

$datos['nomina12']['Percepciones'][2]['TipoPercepcion'] = '010';
$datos['nomina12']['Percepciones'][2]['Clave'] = '013';
$datos['nomina12']['Percepciones'][2]['Concepto'] = 'Premios por puntualidad';
$datos['nomina12']['Percepciones'][2]['ImporteGravado'] = '625.00';
$datos['nomina12']['Percepciones'][2]['ImporteExento'] = '0.00';

$datos['nomina12']['Percepciones'][3]['TipoPercepcion'] = '045';
$datos['nomina12']['Percepciones'][3]['Clave'] = '045';
$datos['nomina12']['Percepciones'][3]['Concepto'] = 'Premios por puntualidad';
$datos['nomina12']['Percepciones'][3]['ImporteGravado'] = '3000.00';
$datos['nomina12']['Percepciones'][3]['ImporteExento'] = '0.00';

// Acciones o Titulos en Percepciones (Todos obligatorios)
$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['ValorMercado'] = '1000.00';
$datos['nomina12']['Percepciones'][3]['AccionesOTitulos']['PrecioAlOtorgarse'] = '2000.00';

// NODO DEDUCCIONES
$datos['nomina12']['Deducciones']['TotalOtrasDeducciones'] = '179.34'; // Opcional
$datos['nomina12']['Deducciones']['TotalImpuestosRetenidos'] = '1054.75'; // Opcional

$datos['nomina12']['Deducciones'][0]['TipoDeduccion'] = '002';
$datos['nomina12']['Deducciones'][0]['Clave'] = '001';
$datos['nomina12']['Deducciones'][0]['Concepto'] = 'ISR';
$datos['nomina12']['Deducciones'][0]['Importe'] = '1054.75';

$datos['nomina12']['Deducciones'][1]['TipoDeduccion'] = '001';
$datos['nomina12']['Deducciones'][1]['Clave'] = '012';
$datos['nomina12']['Deducciones'][1]['Concepto'] = 'Seguridad social';
$datos['nomina12']['Deducciones'][1]['Importe'] = '179.34';*/

$res = mf_genera_cfdi($datos);

///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////

echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach($res AS $variable=>$valor)
{
    $valor=htmlentities($valor, ENT_IGNORE);
    $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
    echo "<b>[$variable]=</b>$valor<hr>";
}