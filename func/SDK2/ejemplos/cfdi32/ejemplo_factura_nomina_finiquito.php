<?php

error_reporting(~(E_WARNING|E_NOTICE)); // OPCIONAL DESACTIVA NOTIFICACIONES DE DEBUG

date_default_timezone_set('America/Mexico_City');

include_once "../../sdk2.php";

/////////////////////////////////////////////////////////////////////////////////
////////////     CREAR ARCHIVOS .PEM
/////////////////////////////////////////////////////////////////////////////////
$datos['modonomina']='SI';
$datos['decimales'] = 2;
$datos['REMUEVE_ACENTOS'] = 'NO';

//RUTA DONDE ALMACENARA EL CFDI
$datos['cfdi']='../../timbrados/cfdi_ejemplo_nomina_finiquito.xml';
// OPCIONAL GUARDAR EL XML GENERADO ANTES DE TIMBRARLO
$datos['xml_debug']='../../timbrados/sin_timbrar_ejemplo_nomina_finiquito.xml';

//OPCIONAL, ACTIVAR SOLO EN CASO DE CONFLICTOS
//$datos['remueve_acentos']='SI';

//OPCIONAL, UTILIZAR LA LIBRERIA PHP DE OPENSSL, DEFAULT SI
$datos['php_openssl']='SI';

$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO'; //   [SI|NO]
$datos['conf']['cer'] = '../../certificados/lan7008173r5.cer.pem';
$datos['conf']['key'] = '../../certificados/lan7008173r5.key.pem';
$datos['conf']['pass'] = '12345678a';

$datos['factura']['serie'] = 'A'; //opcional
$datos['factura']['folio'] = '100'; //opcional
$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s',time()-120);// Opcional  "time()-120" para retrasar la hora 2 minutos para evitar falla de error en rango de fecha



$datos['factura']['metodo_pago'] = 'NA'; // VER DOCUMENTACION :: EFECTIV0, CHEQUE, TARJETA DE CREDITO, TRANSFERENCIA BANCARIA, NO IDENTIFICADO
$datos['factura']['forma_pago'] = 'PAGO EN UNA SOLA EXHIBICION';  //PAGO EN UNA SOLA EXHIBICION, CREDITO 7 DIAS, CREDITO 15 DIAS, CREDITO 30 DIAS, ETC
$datos['factura']['tipocomprobante'] = 'egreso'; 
$datos['factura']['moneda'] = 'MXN'; // MXN USD EUR
$datos['factura']['tipocambio'] = '1'; // OPCIONAL (MXN = 1.00, OTRAS EJ: USD = 13.45; EUR = 16.86)
$datos['factura']['LugarExpedicion'] = '45069';
//$datos['factura']['NumCtaPago'] = '0234'; //opcional; 4 DIGITOS pero obligatorio en transferencias y cheques

$datos['factura']['RegimenFiscal'] = '601';

$datos['emisor']['rfc'] = 'LAN7008173R5'; //RFC DE PRUEBA 
$datos['emisor']['nombre'] = 'ACCEM SERVICIOS EMPRESARIALES SC';  // EMPRESA DE PRUEBA


// IMPORTANTE PROBAR CON NOMBRE Y RFC REAL O GENERARA ERROR DE XML MAL FORMADO
$datos['receptor']['rfc'] = 'SOHM7509289MA';
$datos['receptor']['nombre'] = 'MIGUEL ANGEL SOSA HERNANDEZ';

//AGREGAR 10 CONCEPTOS DE PRUEBA
$concepto['cantidad'] = 1;
$concepto['unidad'] = 'ACT';
$concepto['descripcion'] = "Pago de n�mina";
$concepto['valorunitario'] = '22500.05'; // SIN IVA
$concepto['importe'] = '22500.05';
$datos['conceptos'][] = $concepto;

$datos['factura']['subtotal'] = '22500.05'; // sin impuestos
$datos['factura']['total'] = '21265.96'; // total incluyendo impuestos
$datos['factura']['descuento'] = '1234.09'; // descuento sin impuestos




//////////////////////////////////////////////////////////////
//DATOS GENERALES DE LA NOMINA
//////////////////////////////////////////////////////////////

// Obligatorios
$datos['nomina']['datos']['TipoNomina'] = 'O';
$datos['nomina']['datos']['FechaPago'] = '2016-10-31';
$datos['nomina']['datos']['FechaInicialPago'] = '2016-10-16';
$datos['nomina']['datos']['FechaFinalPago'] = '2016-10-31';
$datos['nomina']['datos']['NumDiasPagados'] = '15';
// Opcionales
$datos['nomina']['datos']['TotalPercepciones'] = '22500.05';
$datos['nomina']['datos']['TotalDeducciones'] = '1234.09';
$datos['nomina']['datos']['TotalOtrosPagos'] = '0.0';

// SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
// Nodo Emisor, OPCIONALES
$datos['nomina']['emisor']['RegistroPatronal'] = '5525665412';

// SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
// Obligatorios de Receptor
$datos['nomina']['receptor']['ClaveEntFed'] = 'JAL';
$datos['nomina']['receptor']['Curp'] = 'AUAC460113HJCMSR01';
$datos['nomina']['receptor']['NumEmpleado'] = '060';
$datos['nomina']['receptor']['PeriodicidadPago'] = '04';
$datos['nomina']['receptor']['TipoContrato'] = '01';
$datos['nomina']['receptor']['TipoRegimen'] = '02';

// Opcionales de Receptor
$datos['nomina']['receptor']['Antig�edad'] = 'P21W';
$datos['nomina']['receptor']['Banco'] = '021';
$datos['nomina']['receptor']['CuentaBancaria'] = '1234567890';
$datos['nomina']['receptor']['FechaInicioRelLaboral'] = '2016-06-01';
$datos['nomina']['receptor']['NumSeguridadSocial'] = '04078873454';
$datos['nomina']['receptor']['Puesto'] = 'Desarrollador';
$datos['nomina']['receptor']['RiesgoPuesto'] = '2';
$datos['nomina']['receptor']['SalarioBaseCotApor'] = '435.50';
$datos['nomina']['receptor']['SalarioDiarioIntegrado'] = '435.50';

// NODO PERCEPCIONES
// Totales Obligatorios
$datos['nomina']['percepciones']['TotalGravado'] = '22500.05';
$datos['nomina']['percepciones']['TotalExento'] = '0.00';

// Totales Opcionales
$datos['nomina']['percepciones']['TotalSueldos'] = '7500.05';
$datos['nomina']['percepciones']['TotalSeparacionIndemnizacion'] = '15000.00';

// Agregar Percepciones (Todos obligatorios)
$datos['nomina']['percepciones'][0]['TipoPercepcion'] = '001';
$datos['nomina']['percepciones'][0]['Clave'] = '001';
$datos['nomina']['percepciones'][0]['Concepto'] = 'Sueldos, Salarios Rayas y Jornales';
$datos['nomina']['percepciones'][0]['ImporteGravado'] = '6250.05';
$datos['nomina']['percepciones'][0]['ImporteExento'] = '0.00';

$datos['nomina']['percepciones'][1]['TipoPercepcion'] = '049';
$datos['nomina']['percepciones'][1]['Clave'] = '014';
$datos['nomina']['percepciones'][1]['Concepto'] = 'Premios de asistencia';
$datos['nomina']['percepciones'][1]['ImporteGravado'] = '625.00';
$datos['nomina']['percepciones'][1]['ImporteExento'] = '0.00';

$datos['nomina']['percepciones'][2]['TipoPercepcion'] = '010';
$datos['nomina']['percepciones'][2]['Clave'] = '013';
$datos['nomina']['percepciones'][2]['Concepto'] = 'Premios por puntualidad';
$datos['nomina']['percepciones'][2]['ImporteGravado'] = '625.00';
$datos['nomina']['percepciones'][2]['ImporteExento'] = '0.00';

$datos['nomina']['percepciones'][3]['TipoPercepcion'] = '025';
$datos['nomina']['percepciones'][3]['Clave'] = '025';
$datos['nomina']['percepciones'][3]['Concepto'] = '025';
$datos['nomina']['percepciones'][3]['ImporteGravado'] = '15000.00';
$datos['nomina']['percepciones'][3]['ImporteExento'] = '0.00';

// Separacion, Indemnizacion (Todos obligatorios)
$datos['nomina']['percepciones']['SeparacionIndemnizacion']['TotalPagado'] = '15000.00';
$datos['nomina']['percepciones']['SeparacionIndemnizacion']['NumA�osServicio'] = '3';
$datos['nomina']['percepciones']['SeparacionIndemnizacion']['UltimoSueldoMensOrd'] = '5000.00';
$datos['nomina']['percepciones']['SeparacionIndemnizacion']['IngresoAcumulable'] = '3000.00';
$datos['nomina']['percepciones']['SeparacionIndemnizacion']['IngresoNoAcumulable'] = '1000.00';

// NODO DEDUCCIONES
$datos['nomina']['deducciones']['TotalOtrasDeducciones'] = '179.34'; // Opcional
$datos['nomina']['deducciones']['TotalImpuestosRetenidos'] = '1054.75'; // Opcional

$datos['nomina']['deducciones'][0]['TipoDeduccion'] = '002';
$datos['nomina']['deducciones'][0]['Clave'] = '001';
$datos['nomina']['deducciones'][0]['Concepto'] = 'ISR';
$datos['nomina']['deducciones'][0]['Importe'] = '1054.75';

$datos['nomina']['deducciones'][1]['TipoDeduccion'] = '001';
$datos['nomina']['deducciones'][1]['Clave'] = '012';
$datos['nomina']['deducciones'][1]['Concepto'] = 'Seguridad social';
$datos['nomina']['deducciones'][1]['Importe'] = '179.34';

$res= mf_genera_cfdi($datos);


///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
 
echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach($res AS $variable=>$valor)
{
    $valor=htmlentities($valor);
    $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
    echo "<b>[$variable]=</b>$valor<hr>";
}
