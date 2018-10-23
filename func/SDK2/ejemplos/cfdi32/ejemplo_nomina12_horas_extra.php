<?php

error_reporting(~(E_WARNING|E_NOTICE)); // OPCIONAL DESACTIVA NOTIFICACIONES DE DEBUG

date_default_timezone_set('America/Mexico_City');

include_once "../../sdk2.php";

/////////////////////////////////////////////////////////////////////////////////
////////////     CREAR ARCHIVOS .PEM
/////////////////////////////////////////////////////////////////////////////////
$datos['modonomina']='SI';
$datos['decimales']=2;
$datos['REMUEVE_ACENTOS'] = 'NO';

//RUTA DONDE ALMACENARA EL CFDI
$datos['cfdi']='../../timbrados/cfdi_ejemplo_nomina_12.xml';
// OPCIONAL GUARDAR EL XML GENERADO ANTES DE TIMBRARLO
$datos['xml_debug']='../../timbrados/sin_timbrar_ejemplo_nomina_horas_extra.xml';

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
$datos['emisor']['DomicilioFiscal']['calle'] = 'JUAREZ';
$datos['emisor']['DomicilioFiscal']['noExterior'] = '100';
$datos['emisor']['DomicilioFiscal']['noInterior'] = ''; //(opcional)
$datos['emisor']['DomicilioFiscal']['colonia'] = 'CENTRO';
$datos['emisor']['DomicilioFiscal']['localidad'] = 'MONTERREY';
$datos['emisor']['DomicilioFiscal']['municipio'] = 'MONTERREY'; // o delegacion
$datos['emisor']['DomicilioFiscal']['estado'] = 'NUEVO LEON';
$datos['emisor']['DomicilioFiscal']['pais'] = 'MEXICO';
$datos['emisor']['DomicilioFiscal']['CodigoPostal'] = '01234'; // 5 digitos
$datos['emisor']['ExpedidoEn']['calle'] = 'JUAREZ';
$datos['emisor']['ExpedidoEn']['noExterior'] = '938';
$datos['emisor']['ExpedidoEn']['noInterior'] = 'B'; //(opcional)
$datos['emisor']['ExpedidoEn']['colonia'] = 'CENTRO';
$datos['emisor']['ExpedidoEn']['localidad'] = 'GUADALAJARA';
$datos['emisor']['ExpedidoEn']['municipio'] = 'GUADALAJARA'; // O DELEGACION
$datos['emisor']['ExpedidoEn']['estado'] = 'JALISCO';
$datos['emisor']['ExpedidoEn']['pais'] = 'MEXICO';
$datos['emisor']['ExpedidoEn']['CodigoPostal'] = '14610'; // 5 digitos

// IMPORTANTE PROBAR CON NOMBRE Y RFC REAL O GENERARA ERROR DE XML MAL FORMADO
$datos['receptor']['rfc'] = 'BAJF541014RB3';
$datos['receptor']['nombre'] = 'MIGUEL ANGEL SOSA HERNANDEZ';
$datos['receptor']['Domicilio']['calle'] = 'PERIFERICO';
$datos['receptor']['Domicilio']['noExterior'] = '1024';
$datos['receptor']['Domicilio']['noInterior'] = 'B';
$datos['receptor']['Domicilio']['colonia'] = 'SAN ANGEL';
$datos['receptor']['Domicilio']['localidad'] = 'CIUDAD DE M�XICO';
$datos['receptor']['Domicilio']['municipio'] = 'ALVARO OBREGON';
$datos['receptor']['Domicilio']['estado'] = 'DISTRITO FEDERAL';
$datos['receptor']['Domicilio']['pais'] = 'MEXICO';
$datos['receptor']['Domicilio']['CodigoPostal'] = '23010'; // 5 digitos

//AGREGAR 10 CONCEPTOS DE PRUEBA
    $concepto['cantidad'] = 1;
    $concepto['unidad'] = 'ACT';
    //$concepto['ID'] = "NOM"; //ID, REF, CODIGO O SKU DEL PRODUCTO
//    $concepto['descripcion'] = "PRODUCTO PRUEBA > '$i'";
    $concepto['descripcion'] = "Pago de n�mina";
    $concepto['valorunitario'] = '8980.75'; // SIN IVA
    $concepto['importe'] = '8980.75';

    $datos['conceptos'][] = $concepto;

$datos['factura']['subtotal'] = '8980.75'; // sin impuestos
$datos['factura']['total'] = '7746.66'; // total incluyendo impuestos
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
$datos['nomina']['datos']['TotalPercepciones'] = '8980.75';
$datos['nomina']['datos']['TotalDeducciones'] = '1234.09';
$datos['nomina']['datos']['TotalOtrosPagos'] = '0.0';

// SUB NODOS OBLIGATORIOS DE NOMINA [Receptor]
// Obligatorios de Receptor
$datos['nomina']['receptor']['ClaveEntFed'] = 'JAL';
$datos['nomina']['receptor']['Curp'] = 'CACF880922HJCMSR03';
$datos['nomina']['receptor']['NumEmpleado'] = '060';
$datos['nomina']['receptor']['PeriodicidadPago'] = '04';
$datos['nomina']['receptor']['TipoContrato'] = '01';
$datos['nomina']['receptor']['TipoRegimen'] = '02';

// Opcionales de Receptor
$datos['nomina']['receptor']['Antig�edad'] = 'P21W';
$datos['nomina']['receptor']['Banco'] = '021';
$datos['nomina']['receptor']['CuentaBancaria'] = '1234567890';
//$datos['nomina']['receptor']['Departamento'] = '';
$datos['nomina']['receptor']['FechaInicioRelLaboral'] = '2016-06-01';
$datos['nomina']['receptor']['NumSeguridadSocial'] = '04078873454';
$datos['nomina']['receptor']['Puesto'] = 'Desarrollador';
$datos['nomina']['receptor']['RiesgoPuesto'] = '2';
$datos['nomina']['receptor']['SalarioBaseCotApor'] = '435.50';
$datos['nomina']['receptor']['SalarioDiarioIntegrado'] = '435.50';

// SUB NODOS OPCIONALES DE NOMINA [Emisor, Percepciones, Deducciones, OtrosPagos, Incapacidades]
// Nodo Emisor, OPCIONALES
$datos['nomina']['emisor']['RegistroPatronal'] = '5525665412';

// NODO PERCEPCIONES
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

$datos['nomina']['percepciones'][2]['TipoPercepcion'] = '019';
$datos['nomina']['percepciones'][2]['Clave'] = '019';
$datos['nomina']['percepciones'][2]['Concepto'] = 'Horas extra';
$datos['nomina']['percepciones'][2]['ImporteGravado'] = '2105.70';
$datos['nomina']['percepciones'][2]['ImporteExento'] = '0.00';

// Totales Obligatorios
$datos['nomina']['percepciones']['TotalGravado'] = '8980.75';
$datos['nomina']['percepciones']['TotalExento'] = '0.00';

// Totales Opcionales
$datos['nomina']['percepciones']['TotalSueldos'] = '8980.75';


// Horas Extra
$datos['nomina']['percepciones'][2]['HorasExtra'][0]['Dias'] = '2';
$datos['nomina']['percepciones'][2]['HorasExtra'][0]['TipoHoras'] = '01';
$datos['nomina']['percepciones'][2]['HorasExtra'][0]['HorasExtra'] = '8';
$datos['nomina']['percepciones'][2]['HorasExtra'][0]['ImportePagado'] = '105.70';

$datos['nomina']['percepciones'][2]['HorasExtra'][1]['Dias'] = '1';
$datos['nomina']['percepciones'][2]['HorasExtra'][1]['TipoHoras'] = '02';
$datos['nomina']['percepciones'][2]['HorasExtra'][1]['HorasExtra'] = '6';
$datos['nomina']['percepciones'][2]['HorasExtra'][1]['ImportePagado'] = '1000.00';

// NODO DEDUCCIONES
$datos['nomina']['deducciones'][0]['TipoDeduccion'] = '002';
$datos['nomina']['deducciones'][0]['Clave'] = '001';
$datos['nomina']['deducciones'][0]['Concepto'] = 'ISR';
$datos['nomina']['deducciones'][0]['Importe'] = '1054.75';

$datos['nomina']['deducciones'][1]['TipoDeduccion'] = '001';
$datos['nomina']['deducciones'][1]['Clave'] = '012';
$datos['nomina']['deducciones'][1]['Concepto'] = 'Seguridad social';
$datos['nomina']['deducciones'][1]['Importe'] = '179.34';

$datos['nomina']['deducciones']['TotalOtrasDeducciones'] = '179.34'; // Opcional
$datos['nomina']['deducciones']['TotalImpuestosRetenidos'] = '1054.75'; // Opcional

$res= mf_genera_cfdi($datos);


///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
 
echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach($res AS $variable=>$valor)
{
    $valor=htmlentities($valor, ENT_IGNORE);
    $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
    echo "<b>[$variable]=</b>$valor<hr>";
}
