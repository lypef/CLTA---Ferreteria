<?php
    include 'db.php';
    db_sessionValidarNO();
    session_start();
    
    $url = $_POST['url'];
    $url = remove_url_query_args($url,array("okannuity","noannuity","process_yes","sale_noliquid"));

    $addpregunta = false;

    for($i=0;$i<strlen($url);$i++)
    {
        if ($url[$i] == "?")
        {
            $addpregunta = true;
        }
    }

    $monto = $_POST['monto'];
    $concepto = $_POST['concepto'];
    $sucursal = $_POST['sucursal'];
    $fecha = date("Y-m-d H:i:s");
    $folio = $vendedor . date("YmdHis");
    $vendedor = $_SESSION['users_id'];

    $con = db_conectar();  
    mysqli_query($con,"INSERT INTO `folio_venta` (`folio`,`vendedor`, `client`, `descuento`, `fecha`, `open`, `cobrado`,`fecha_venta`,`cut`,`sucursal`,`cut_global`, `iva`, `t_pago`, `pedido`, `folio_venta_ini`, `cotizacion`, `concepto`) VALUES ('$folio', '$vendedor', '1', '0', '$fecha', '0', '$monto', '$fecha', '0', '$sucursal', '0', '0', 'efectivo', '0', '', '0', '$concepto');");

    if (!mysqli_error($con))
    {
        if ($addpregunta)
        {
            echo '<script>location.href = "'.$url.'&process_yes=true"</script>';
        }else{
            echo '<script>location.href = "'.$url.'?process_yes=true"</script>';
        }
    }else
    {
        if ($addpregunta)
        {
            echo '<script>location.href = "'.$url.'&sale_noliquid=true"</script>';
        }else{
            echo '<script>location.href = "'.$url.'?sale_noliquid=true"</script>';
        }
    }
?>