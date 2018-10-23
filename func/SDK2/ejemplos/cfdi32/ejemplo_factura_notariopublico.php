<?php

error_reporting(0); // OPCIONAL DESACTIVA NOTIFICACIONES DE DEBUG

date_default_timezone_set('America/Mexico_City');

include_once "../../sdk2.php";

/////////////////////////////////////////////////////////////////////////////////
////////////     CREAR ARCHIVOS .PEM
/////////////////////////////////////////////////////////////////////////////////


$datos['PAC']['usuario'] = 'DEMO700101XXX';
$datos['PAC']['pass'] = 'DEMO700101XXX';
$datos['PAC']['produccion'] = 'NO'; //   [SI|NO]
$datos['conf']['cer'] = '../../certificados/lan7008173r5.cer.pem';
$datos['conf']['key'] = '../../certificados/lan7008173r5.key.pem';
$datos['conf']['pass'] = '12345678a';



//RUTA DONDE ALMACENARA EL CFDI
$datos['cfdi']='../../timbrados/cfdi_ejemplo_factura_notariopublico.xml';
// OPCIONAL GUARDAR EL XML GENERADO ANTES DE TIMBRARLO
$datos['xml_debug']='../../timbrados/sin_timbrar_ejemplo_factura_notariopublico.xml';

//OPCIONAL, ACTIVAR SOLO EN CASO DE CONFLICTOS
//$datos['remueve_acentos']='SI';

//OPCIONAL, UTILIZAR LA LIBRERIA PHP DE OPENSSL, DEFAULT SI
$datos['php_openssl']='SI';

$datos['factura']['serie'] = 'A'; //opcional
$datos['factura']['folio'] = '100'; //opcional
$datos['factura']['fecha_expedicion'] = date('Y-m-d\TH:i:s',time()-120);// Opcional  "time()-120" para retrasar la hora 2 minutos para evitar falla de error en rango de fecha


$datos['factura']['metodo_pago'] = '01'; // VER DOCUMENTACION :: EFECTIV0, CHEQUE, TARJETA DE CREDITO, TRANSFERENCIA BANCARIA, NO IDENTIFICADO
$datos['factura']['forma_pago'] = 'PAGO EN UNA SOLA EXHIBICION';  //PAGO EN UNA SOLA EXHIBICION, CREDITO 7 DIAS, CREDITO 15 DIAS, CREDITO 30 DIAS, ETC
$datos['factura']['tipocomprobante'] = 'ingreso'; //ingreso, egreso
$datos['factura']['moneda'] = 'MXN'; // MXN USD EUR
$datos['factura']['tipocambio'] = '1.0000'; // OPCIONAL (MXN = 1.00, OTRAS EJ: USD = 13.45; EUR = 16.86)
$datos['factura']['LugarExpedicion'] = 'MONTERREY, NUEVO LEON';
//$datos['factura']['NumCtaPago'] = '0234'; //opcional; 4 DIGITOS pero obligatorio en transferencias y cheques

$datos['factura']['RegimenFiscal'] = 'MI REGIMEN';

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

//SI EX EXPEDIDO EN SUCURSAL CAMBIA EL DOMICILIO
//SI ES EN EL MISMO DOMICILIO REPETIR INFORMACION
$datos['emisor']['ExpedidoEn']['calle'] = 'HIDALGO';
$datos['emisor']['ExpedidoEn']['noExterior'] = '240';
$datos['emisor']['ExpedidoEn']['noInterior'] = ''; //(opcional)
$datos['emisor']['ExpedidoEn']['colonia'] = 'LAS CUMBRES 3 SECTOR';
$datos['emisor']['ExpedidoEn']['localidad'] = 'MONTERREY';
$datos['emisor']['ExpedidoEn']['municipio'] = 'MONTERREY'; // O DELEGACION
$datos['emisor']['ExpedidoEn']['estado'] = 'NUEVO LEON';
$datos['emisor']['ExpedidoEn']['pais'] = 'MEXICO';
$datos['emisor']['ExpedidoEn']['CodigoPostal'] = '64610'; // 5 digitos

// IMPORTANTE PROBAR CON NOMBRE Y RFC REAL O GENERARA ERROR DE XML MAL FORMADO
$datos['receptor']['rfc'] = 'SOHM7509289MA';
$datos['receptor']['nombre'] = 'MIGUEL ANGEL SOSA HERNANDEZ';
//opcional
$datos['receptor']['Domicilio']['calle'] = 'PERIFERICO';
$datos['receptor']['Domicilio']['noExterior'] = '1024';
$datos['receptor']['Domicilio']['noInterior'] = 'B';
$datos['receptor']['Domicilio']['colonia'] = 'SAN ANGEL';
$datos['receptor']['Domicilio']['localidad'] = 'CIUDAD DE M�XICO';
$datos['receptor']['Domicilio']['municipio'] = 'ALVARO OBREGON';
$datos['receptor']['Domicilio']['estado'] = 'DISTRITO FEDERAL';
$datos['receptor']['Domicilio']['pais'] = 'MEXICO';
$datos['receptor']['Domicilio']['CodigoPostal'] = '23010'; // 5 digitos

//AGREGAR CONCEPTO
    unset($concepto);
    $concepto['cantidad'] = 1;
    $concepto['unidad'] = 'SERVICIO';
    $concepto['ID'] = "SERV"; //ID, REF, CODIGO O SKU DEL PRODUCTO
    $concepto['descripcion'] = "DESCRIPCION MI SERVICIO";
    $concepto['valorunitario'] = '1000.00'; // SIN IVA
    $concepto['importe'] = '1000.00';

    $datos['conceptos'][] = $concepto;

$datos['factura']['subtotal'] = 1100.00; // sin impuestos
$datos['factura']['descuento'] = 100.00; // descuento sin impuestos
$datos['factura']['total'] = 1160.00; // total incluyendo impuestos


$translado1['impuesto'] = 'IVA';
$translado1['tasa'] = '16';
$translado1['importe'] = 160.00; // iva de los productos facturados
$datos['impuestos']['translados'][0] = $translado1;




//////////  DATOS NOTARIA  //////////  
// DATOS INMUEBLES
/*
 * $DescInmueble['TipoInmueble']='01';
$DescInmueble['Calle']='Av. Siempre Viva';
$DescInmueble['NoExterior']='123';
$DescInmueble['NoInterior']='B';
$DescInmueble['Colonia']='Bondojito';
$DescInmueble['Localidad']='Oaxaca';
$DescInmueble['Municipio']='Oaxaca';
$DescInmueble['Estado']='14'; // <-- asi es la sintaxis ver documento pdf de codigos
$DescInmueble['Pais']='MEX'; // <-- asi es la sintaxiz
$DescInmueble['CodigoPostal']='12345';
 */ 
$datos['notariospublicos']['DescInmuebles'][0]['Calle'] = 'Av. Siempre Viva';
$datos['notariospublicos']['DescInmuebles'][0]['CodigoPostal'] = '12345';
$datos['notariospublicos']['DescInmuebles'][0]['Colonia'] = 'Bondojito';
$datos['notariospublicos']['DescInmuebles'][0]['Estado'] = '14';
$datos['notariospublicos']['DescInmuebles'][0]['Localidad'] = 'Oaxaca';
$datos['notariospublicos']['DescInmuebles'][0]['Municipio'] = 'Oaxaca';
$datos['notariospublicos']['DescInmuebles'][0]['NoExterior'] = '123';
$datos['notariospublicos']['DescInmuebles'][0]['NoInterior'] = 'B';
$datos['notariospublicos']['DescInmuebles'][0]['Pais'] = 'MEX';
//$datos['notariospublicos']['DescInmuebles'][0]['Referencia'] = '';
$datos['notariospublicos']['DescInmuebles'][0]['TipoInmueble'] = '01';


//DATOS NOTARIO
$datos['notariospublicos']['DatosNotario']['CURP']='AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosNotario']['NumNotaria']='3';
$datos['notariospublicos']['DatosNotario']['EntidadFederativa']='16';
$datos['notariospublicos']['DatosNotario']['Adscripcion']='Guanajuato';


//DATOS OPERACION
$datos['notariospublicos']['DatosOperacion']['NumInstrumentoNotarial']='12345'; 
$datos['notariospublicos']['DatosOperacion']['FechaInstNotarial']='2014-04-22'; 
$datos['notariospublicos']['DatosOperacion']['MontoOperacion']='1234.56';
$datos['notariospublicos']['DatosOperacion']['Subtotal']='1234.56';
$datos['notariospublicos']['DatosOperacion']['IVA']='1234.56';

// Datos un Enajenante
$datos['notariospublicos']['DatosEnajenante']['CoproSocConyugalE'] = 'No';
/*$datos['notariospublicos']['DatosEnajenante']['DatosUnEnajenante']['ApellidoMaterno'] = 'MaternoE';
$datos['notariospublicos']['DatosEnajenante']['DatosUnEnajenante']['ApellidoPaterno'] = 'PaternoE';
$datos['notariospublicos']['DatosEnajenante']['DatosUnEnajenante']['CURP'] = 'AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosEnajenante']['DatosUnEnajenante']['Nombre'] = 'NombreE';
$datos['notariospublicos']['DatosEnajenante']['DatosUnEnajenante']['RFC'] = 'AAA010101AAA';*/

// Datos varios Enajenantes
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['ApellidoMaterno'] = 'Materno_E1';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['ApellidoPaterno'] = 'Paterno_E1';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['CURP'] = 'AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['Nombre'] = 'Enajenante 1';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['RFC'] = 'AAA010101AAA';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][0]['Porcentaje'] = '50';

$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['ApellidoMaterno'] = 'Materno_E2';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['ApellidoPaterno'] = 'Paterno_E2';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['CURP'] = 'AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['Nombre'] = 'Enajenante 2';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['RFC'] = 'AAA010101AAA';
$datos['notariospublicos']['DatosEnajenante']['DatosEnajenantesCopSC'][1]['Porcentaje'] = '50';

// Datos un Adquiriente
$datos['notariospublicos']['DatosAdquiriente']['CoproSocConyugalE'] = 'No';
/*$datos['notariospublicos']['DatosAdquiriente']['DatosUnAdquiriente']['ApellidoMaterno'] = 'Materno';
$datos['notariospublicos']['DatosAdquiriente']['DatosUnAdquiriente']['ApellidoPaterno'] = 'Paterno';
$datos['notariospublicos']['DatosAdquiriente']['DatosUnAdquiriente']['CURP'] = 'AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosAdquiriente']['DatosUnAdquiriente']['Nombre'] = 'Un Adquiriente';
$datos['notariospublicos']['DatosAdquiriente']['DatosUnAdquiriente']['RFC'] = 'AAA010101AAA';*/

// Datos varios Adquirientes
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['ApellidoMaterno'] = 'Materno_A1';
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['ApellidoPaterno'] = 'Paterno_A1';
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['CURP'] = 'AAQM010101HCSMNZ00';
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['Nombre'] = 'Adquiriente 1';
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['RFC'] = 'AAA010101AAA';
$datos['notariospublicos']['DatosAdquiriente']['DatosAdquirientesCopSC'][0]['Porcentaje'] = '50';

////////////////////
/*
unset($DatosEnajenanteCopSC);
$DatosEnajenanteCopSC['Nombre']='Demo';
$DatosEnajenanteCopSC['ApellidoPaterno']='Rodriguez';
$DatosEnajenanteCopSC['ApellidoMaterno']='Guzman';
$DatosEnajenanteCopSC['RFC']='HSJ600903MN0';
$DatosEnajenanteCopSC['CURP']='OAAJ840102HJCVRN00';
$DatosEnajenanteCopSC['Porcentaje']='60.00';
$datos['notariospublicos']['DatosEnajenantesCopSC'][]=$DatosEnajenanteCopSC;


unset($DatosEnajenanteCopSC);
$DatosEnajenanteCopSC['Nombre']='Demitria';
$DatosEnajenanteCopSC['ApellidoPaterno']='Perez';
$DatosEnajenanteCopSC['ApellidoMaterno']='Hernandez';
$DatosEnajenanteCopSC['RFC']='MSB600304KL9';
$DatosEnajenanteCopSC['CURP']='OAAJ840102HJCVRN00';
$DatosEnajenanteCopSC['Porcentaje']='40.00';
$datos['notariospublicos']['DatosEnajenantesCopSC'][]=$DatosEnajenanteCopSC;



////////////////

$datos['notariospublicos']['DatosAdquiriente']['CoproSocConyugalE']='Si'; // no cambiar mayusculas ni minusculas

unset($DatosEnajenanteCopSC);
$DatosAdquirienteCopSC['Nombre']='Mario';
$DatosAdquirienteCopSC['ApellidoPaterno']='Ochoa';
$DatosAdquirienteCopSC['ApellidoMaterno']='Luna';
$DatosAdquirienteCopSC['RFC']='HSJ600903MN0';
$DatosAdquirienteCopSC['CURP']='OAAJ840102HJCVRN00';
$DatosAdquirienteCopSC['Porcentaje']='60.00';
$datos['notariospublicos']['DatosAdquirientesCopSC'][]=$DatosAdquirienteCopSC;

unset($DatosAdquirienteCopSC);
$DatosAdquirienteCopSC['Nombre']='Perla';
$DatosAdquirienteCopSC['ApellidoPaterno']='Garcia';
$DatosAdquirienteCopSC['ApellidoMaterno']='Ruiz';
$DatosAdquirienteCopSC['RFC']='MSB600304KL9';
$DatosAdquirienteCopSC['CURP']='OAAJ840102HJCVRN00';
$DatosAdquirienteCopSC['Porcentaje']='40.00';
$datos['notariospublicos']['DatosAdquirientesCopSC'][]=$DatosAdquirienteCopSC;



//INMUEBLE
unset($DescInmueble);
$DescInmueble['TipoInmueble']='01';
$DescInmueble['Calle']='Av. Siempre Viva';
$DescInmueble['NoExterior']='123';
$DescInmueble['NoInterior']='B';
$DescInmueble['Colonia']='Bondojito';
$DescInmueble['Localidad']='Oaxaca';
$DescInmueble['Municipio']='Oaxaca';
$DescInmueble['Estado']='14'; // <-- asi es la sintaxis ver documento pdf de codigos
$DescInmueble['Pais']='MEX'; // <-- asi es la sintaxiz
$DescInmueble['CodigoPostal']='12345';
$datos['notariospublicos']['DescInmuebles'][]=$DescInmueble;

/ *
//InMueble Adicional
unset($DescInmueble);
$DescInmueble['TipoInmueble']='01';
$DescInmueble['Calle']='Juarez';
$DescInmueble['NoExterior']='23';
$DescInmueble['NoInterior']='B';
$DescInmueble['Colonia']='Valle Dorado';
$DescInmueble['Localidad']='Oaxaca';
$DescInmueble['Municipio']='Oaxaca';
$DescInmueble['Estado']='14';
$DescInmueble['Pais']='MEX';
$DescInmueble['CodigoPostal']='23456';
$datos['notariospublicos']['DescInmuebles'][]=$DescInmueble;
*/

//var_dump(arr2ini($datos));


$res= mf_genera_cfdi($datos);
file_put_contents('ejemplo_factura_notarios.ini', arr2ini($datos));


///////////    MOSTRAR RESULTADOS DEL ARRAY $res   ///////////
 
echo "<h1>Respuesta Generar XML y Timbrado</h1>";
foreach($res AS $variable=>$valor)
{
    $valor=htmlentities($valor, ENT_IGNORE);
    $valor=str_replace('&lt;br/&gt;','<br/>',$valor);
    echo "<b>[$variable]=</b>$valor<hr>";
}



?>
