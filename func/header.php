<?php
  include 'db.php';
  db_sessionValidarNO();

    $departamentos = mysqli_query(db_conectar(),"SELECT id, nombre FROM departamentos");
    $departamentos_ = mysqli_query(db_conectar(),"SELECT id, nombre FROM departamentos");
    $almacenes = mysqli_query(db_conectar(),"SELECT id, nombre FROM almacen");
    $sales_open = mysqli_query(db_conectar(),"SELECT f.folio, v.nombre, c.nombre, f.fecha, f.descuento FROM folio_venta f, clients c, users v where f.client = c.id and f.vendedor = v.id and f.open = 1 and v.id = '$_SESSION[users_id]' ");z
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema Ferreteria</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <!-- All css files are included here -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="css/color/skin-default.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <header>
            <div class="header-top-bar white-bg ptb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="header-top">
                                <ul>
                                    <li class="lh-50">
                                        <a href="#" class="pr-20"><i class="zmdi zmdi-search"></i></a>
                                        <div class="header-bottom-search header-top-down header-top-hover lh-35">
                                            <form class="header-search-box" action="products.php">
                                                <div>
                                                    <input type="text" placeholder="Buscar" name="search" autocomplete="off">
                                                    <button class="btn btn-search" type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="lh-50">
                                        <a href="#" class="prl-20 text-uppercase">DEPARTAMENTOS</a>
                                        <div class="header-top-down header-top-hover header-top-down-lang pl-15 lh-35 lh-35">
                                            <ul>
                                                <?php
                                                while($row = mysqli_fetch_array($departamentos))
                                                {
                                                    echo '<li><a href=products.php?department='.$row[0].'>'.$row[1].'</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="lh-50">
                                        <a href="#" class="prl-20 text-uppercase">ALMACENES</a>
                                        <div class="header-top-down header-top-hover header-top-down-lang pl-15 lh-35 lh-35">
                                            <ul>
                                                <?php
                                                while($row = mysqli_fetch_array($almacenes))
                                                {
                                                    echo '<li><a href=products.php?almacen='.$row[0].'>'.$row[1].'</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 hidden-sm hidden-xs">
                            <div class="middle text-center">
                                <ul>
                                    <li class="mr-30 lh-50">
                                    <a href="/products.php?pagina=1">
                                        <strong><i class="zmdi zmdi-store"></i></strong> <?php echo $_SESSION['empresa_nombre'];?>
                                    </a>    
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="header-top header-top-right">
                                <ul>
                                    <li class="lh-50">
                                        <a href="#"  data-toggle="modal" data-target="#profile" class="prl-20 text-uppercase"><i class="zmdi zmdi-account"></i> <?php echo substr($_SESSION['users_nombre'], 0, 23).'...'; ?></a>
                                    </li>
                                    <li class="cart-link lh-50"></li>
                                    <li class="lh-50">
                                        <a href="func/logout.php" class="prl-20 text-uppercase"><i class="zmdi zmdi-run"></i> Salir</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="header-area header-wrapper transparent-header">
                <div class="header-middle-area black-bg">
                    <div class="container">
                        <div class="full-width-mega-dropdown">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav id="primary-menu">
                                        <ul class="main-menu text-center">
                                            <li class="mega-parent"><a href="#"><i class="zmdi zmdi-equalizer"></i> Ofertas</a>
                                                <div class="mega-menu-area header-top-hover p-30">
                                                    <?php
                                                        echo ReturnProductsOferta();
                                                    ?>

                                                </div>
                                            </li>
                                            <li class="mega-parent"><a href="#"><i class="zmdi zmdi-plus"></i> Lo mas nuevo</a>
                                                <div class="mega-menu-area header-top-hover p-30">

                                                <?php
                                                    while($row = mysqli_fetch_array($departamentos_))
                                                    {
                                                        echo '
                                                        <ul class="single-mega-item">
                                                        <li>
                                                        <a href="departamento.php/?id='.$row[0].'"><h2 class="mega-menu-title mb-15">'.$row[1].'</h2></a>
                                                        </li>
                                                        '.returnproducts($row[0]).'
                                                        </ul>';
                                                    }
                                                ?>

                                                </div>
                                            </li>
                                            <li><a href="products.php?pagina=1">Productos</a>
                                                <ul class="dropdown header-top-hover ptb-10">
                                                    <?php 
                                                        if ($_SESSION['product_add'] == 1)
                                                        {
                                                            echo '<li><a href="product_add.php">Agregar</a></li>';
                                                        }
                                                        if ($_SESSION['product_gest'] == 1)
                                                        {
                                                            echo '<li><a href="products.php?pagina=1">Gestionar</a></li>';
                                                        }
                                                        if ($_SESSION['gen_orden_compra'] == 1)
                                                        {
                                                            echo '<li><a href="g_compra.php">G. Orden de compra</a></li>';
                                                        }
                                                        if ($_SESSION['product_gest'] == 1)
                                                        {
                                                            echo '<li><a href="products_pdf.php">Reporte inventario PDF</a></li>';
                                                            echo '<li><a href="products_xls.php">Reporte inventario XLS</a></li>';
                                                        }
                                                    ?>
                                                </ul>
                                            </li>

                                            <li><a href="clients.php?pagina=1">Clientes</a>
                                                <ul class="dropdown header-top-hover ptb-10">
                                                    <?php
                                                    if ($_SESSION['client_add'] == 1)
                                                    {
                                                        echo '<li><a href="client_add.php">Agregar</a></li>';
                                                    }
                                                    if ($_SESSION['client_guest'] == 1)
                                                    {
                                                        echo '<li><a href="clients.php?pagina=1">Gestionar</a></li>';
                                                    }
                                                    ?>
                                                    <li>
                                                      <a href="#" title="Agregar departamento" data-toggle="modal" data-target="#clients_search">
                                                            Buscar
                                                        </a>
                                                      </li>
                                                </ul>
                                            </li>
                                            <?php
                                                if ($_SESSION['sucursal_gest'] == 1)
                                                {
                                                    echo '<li><a href="sucursales.php">Sucursales</a>';
                                                }
                                            ?>
                                            
                                            <?php
                                                if ($_SESSION['usuarios'] == 1)
                                                {
                                                    echo '
                                                        <li><a href="users.php">Usuarios</a>
                                                            <ul class="dropdown header-top-hover ptb-10">
                                                                <li><a href="#" data-toggle="modal" data-target="#user_add">Agregar</a></li>
                                                                <li><a href="users.php">Gestionar</a></li>
                                                            </ul>
                                                        </li>
                                                    ';
                                                }
                                            ?>
                                            
                                            <li><a href="#">Empresa</a>
                                                <div class="mega-menu-area-2 header-top-hover p-30">
                                                  <ul class="single-mega-item">
                                                        <?php
                                                            if ($_SESSION['almacen_add'] == 1 && $_SESSION['almacen_guest'] == 1)
                                                            {
                                                                echo '
                                                                <li><h2 class="mega-menu-title mb-15">Almacen</h2></li>
                                                                <li>
                                                                <a href="#" title="Agregar almacen" data-toggle="modal" data-target="#almacen_add">
                                                                        Agregar
                                                                    </a>
                                                                </li>
                                                                <li><a href="/almacen.php">Gestionar</a></li>';
                                                            }else
                                                            {
                                                                if ($_SESSION['almacen_add'] == 1)
                                                                {
                                                                    echo '
                                                                    <li><h2 class="mega-menu-title mb-15">Almacen</h2></li>
                                                                    <li>
                                                                    <a href="#" title="Agregar almacen" data-toggle="modal" data-target="#almacen_add">
                                                                            Agregar
                                                                        </a>
                                                                    </li>';
                                                                }
                                                                if ($_SESSION['almacen_guest'] == 1)
                                                                {
                                                                    echo '
                                                                    <li><h2 class="mega-menu-title mb-15">Almacen</h2></li>
                                                                    <li>
                                                                    <li><a href="/almacen.php">Gestionar</a></li>';
                                                                }
                                                            }
                                                        ?>
                                                      <li></li>
                                                      <li></li>
                                                      <li></li>
                                                  </ul>
                                                  <ul class="single-mega-item">
                                                  <?php
                                                            if ($_SESSION['depa_add'] == 1 && $_SESSION['depa_guest'] == 1)
                                                            {
                                                                echo '<li><h2 class="mega-menu-title mb-15">Departamentos</h2></li>
                                                                <li>
                                                                <a href="#" title="Agregar departamento" data-toggle="modal" data-target="#departament_add">
                                                                      Agregar
                                                                  </a>
                                                                </li>
                                                                <li><a href="/departments.php">Gestionar</a></li>';
                                                            }else
                                                            {
                                                                if ($_SESSION['depa_add'] == 1)
                                                                {
                                                                    echo '<li><h2 class="mega-menu-title mb-15">Departamentos</h2></li>
                                                                    <li>
                                                                    <a href="#" title="Agregar departamento" data-toggle="modal" data-target="#departament_add">
                                                                        Agregar
                                                                    </a>
                                                                    </li>';
                                                                }
                                                                if ($_SESSION['depa_guest'] == 1)
                                                                {
                                                                    echo '<li><h2 class="mega-menu-title mb-15">Departamentos</h2></li>
                                                                    <li><a href="/departments.php">Gestionar</a></li>';
                                                                }
                                                            }
                                                        ?>
                                                      <li></li>
                                                      <li></li>
                                                      <li></li>
                                                  </ul>
                                                    <?php
                                                        if ($_SESSION['finanzas'] == 1)
                                                        {
                                                            $hoy = date("Y-m-d");
                                                                
                                                            echo '
                                                            <ul class="single-mega-item">
                                                                <li><h2 class="mega-menu-title mb-15">Finanzas</h2></li>
                                                                <li><a href="finance.php?inicio='.$hoy.'&finaliza='.$hoy.'&folio=&usuario=0&sucursal=0">Gestionar</a></li>
                                                            </ul>';
                                                        }
                                                    ?>
                                                    <?php
                                                        if ($_SESSION['propiedades'] == 1)
                                                        {
                                                            echo '
                                                            <ul class="single-mega-item">
                                                                <li><h2 class="mega-menu-title mb-15">Propiedades</h2></li>
                                                                <li>
                                                                <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_datos">
                                                                    Datos
                                                                </a>
                                                                </li>
                                                                <li>
                                                                <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Mision">
                                                                    Mision
                                                                </a>
                                                                </li>
                                                                <li>
                                                                <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Vision">
                                                                    Vision
                                                                </a>
                                                                </li>
                                                                <li>
                                                                <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Contacto">
                                                                    Contacto
                                                                </a>
                                                                </li>
                                                            </ul>
                                                            ';
                                                        }else
                                                        {
                                                            if ($_SESSION['propiedades'] == 1)
                                                            {
                                                                echo '
                                                                <ul class="single-mega-item">
                                                                    <li><h2 class="mega-menu-title mb-15">Propiedades</h2></li>
                                                                    <li>
                                                                    <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_datos">
                                                                        Datos
                                                                    </a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Mision">
                                                                        Mision
                                                                    </a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Vision">
                                                                        Vision
                                                                    </a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="#" title="Ver detalles" data-toggle="modal" data-target="#Empresa_Contacto">
                                                                        Contacto
                                                                    </a>
                                                                    </li>
                                                                </ul>
                                                                ';
                                                            }
                                                            if ($_SESSION['usuarios'] == 1)
                                                            {
                                                                echo '
                                                                <ul class="single-mega-item">
                                                                    <li><h2 class="mega-menu-title mb-15">Propiedades</h2></li>
                                                                    <li>
                                                                    <li><a href="/users.php">usuarios</a></li>
                                                                </ul>
                                                                ';
                                                            }
                                                        }
                                                    ?>
                                                    
                                                </div>
                                            </li>

                                            <li><a href="#">Ventas ▼</a>
                                                <div class="mega-menu-area-2 header-top-hover p-30">
                                                  <ul class="single-mega-item">
                                                      <li><h2 class="mega-menu-title mb-15">Abiertas</h2></li>
                                                      <?php
                                                        $modal_ventas = "";
                                                        while($row = mysqli_fetch_array($sales_open))
                                                        {
                                                            $ventas_movil = $ventas_movil . '<li><a href="sale_finaly.php?folio='.$row[0].'" title="FOLIO: '.$row[0].'" data-toggle="modal" data-target="#'.$row[0].'" >'.$row[2].'</a></li>';
                                                            $ventas_movil_cotizar = $ventas_movil_cotizar . '<li><a href="sale_cotizacion.php?folio='.$row[0].'" title="FOLIO: '.$row[0].'" data-toggle="modal" data-target="#'.$row[0].'" >'.$row[2].'</a></li>';
                                                            $ventas_movil_add_product = $ventas_movil_add_product . '<li><a href="sale.php?folio='.$row[0].'&pagina=1" title="FOLIO: '.$row[0].'" data-toggle="modal" data-target="#'.$row[0].'" >'.$row[2].'</a></li>';

                                                            $modal_ventas = $modal_ventas . '
                                                            <div class="modal fade" id="'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">VENTA ABIERTA</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>FOLIO: '.$row[0].'</p>
                                                                    <p>CLIENTE: '.$row[2].'</p>
                                                                    
                                                                    <div class="col-md-12">
                                                                        <form action="func/product_sale_update_descuento.php" method="post">
                                                                            <input type="hidden" id="folio" name="folio" value="'.$row[0].'">
                                                                            <input type="hidden" id="url" name="url" value="'.$_SERVER['REQUEST_URI'].'">
                                                                            
                                                                            <div class="col-md-3">
                                                                                <p>DESCUENTO:</p>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-3">
                                                                                <input type="number" id="descuento" name="descuento" autocomplete="off" value="'.$row[4].'" min="0" max="100" style="text-align:center;">
                                                                            </div>
                                                                            
                                                                            <div class="col-md-3">
                                                                                <p>%</p>
                                                                            </div>

                                                                            <div class="col-md-3">
                                                                                <button class="submit-btn mt-2" type="submit">Guardar</button>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    <p>VENDEDOR: '.$row[1].'</p>
                                                                    <p>FECHA: '.$row[3].'</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    
                                                                    <form action="func/delete_f_venta.php" autocomplete="off" method="post">
                                                                        <a href="/sale.php?folio='.$row[0].'&pagina=1"><button type="button" class="btn btn-primary">Agregar productos</button></a>
                                                                        <input type="hidden" id="folio" name="folio" value="'.$row[0].'">
                                                                        <input type="hidden" id="url" name="url" value="'.$_SERVER['REQUEST_URI'].'">
                                                                        <button type="sumbit" class="btn btn-danger">Eliminar</button>
                                                                        <a href="/sale_cotizacion.php?folio='.$row[0].'"><button type="button" class="btn btn-warning">Cotizar</button></a>
                                                                        <a href="/sale_finaly.php?folio='.$row[0].'"><button type="button" class="btn btn-success">Finalizar</button></a>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                                                                    </form>
                                                                    
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>';
                                                            echo '<li><a href="#" title="FOLIO: '.$row[0].'" data-toggle="modal" data-target="#'.$row[0].'" >'.$row[2].'</a></li>';
                                                        }
                                                        ?>
                                                  </ul>
                                                  <ul class="single-mega-item">
                                                      <li><h2 class="mega-menu-title mb-15">Opciones</h2></li>
                                                      <li>
                                                      <li><a href="create_sale.php?pagina=1">Crear venta</a></li>
                                                      <li><a href="blog-2.html">Facturas</a></li>
                                                  </ul>
                                                  
                                                </div>
                                            </li>
                                            
                                            <?php 
                                                if ($_SESSION['caja'] == 1)
                                                {
                                                    $items = '
                                                        <li><a href="#" data-toggle="modal" data-target="#profile">Perfil</a></li>
                                                        <li><a href="sale_cut_x.php">Ver movimientos</a></li>
                                                        <li><a href="sale_cut_x.php">Corte x</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#cut_z_yes">Corte Z</a></li>
                                                    ';

                                                    if ($_SESSION['finanzas'] == 1)
                                                    {
                                                        $items .= '
                                                            <li><a href="sale_cut_x.php">Corte x global</a></li>
                                                            <li><a href="#" data-toggle="modal" data-target="#cut_z_yes">Corte Z global</a></li>
                                                        ';
                                                    }

                                                    echo '
                                                        <li><a href="contact.html" data-toggle="modal" data-target="#profile"><img src = "images/'.$_SESSION['users_foto'].'" style="
                                                        height: 50px;
                                                        width: 50px;
                                                        background-repeat: no-repeat;
                                                        background-position: 50%;
                                                        border-radius: 50%;
                                                        background-size: 100% auto;
                                                        "> CAJA ▼ </a><ul class="dropdown header-top-hover ptb-10">
                                                                '.$items.'
                                                            </ul>
                                                        </li>
                                                    ';
                                                }else
                                                {
                                                    echo '
                                                        <li><a href="contact.html" data-toggle="modal" data-target="#profile"><img src = "images/'.$_SESSION['users_foto'].'" style="
                                                        height: 50px;
                                                        width: 50px;
                                                        background-repeat: no-repeat;
                                                        background-position: 50%;
                                                        border-radius: 50%;
                                                        background-size: 100% auto;
                                                        "> '.$_SESSION['users_username'].' ▼ </a><ul class="dropdown header-top-hover ptb-10">
                                                                <li><a href="#" data-toggle="modal" data-target="#profile">Perfil</a></li>
                                                                <li><a href="sale_cut_x.php">Corte x</a></li>
                                                                <li><a href="#" data-toggle="modal" data-target="#cut_z_yes">Corte Z</a></li>
                                                            </ul>
                                                        </li>
                                                    ';
                                                }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="/products.php?pagina=1">Productos</a></li>
                                        <li><a href="/clients.php?pagina=1">Clientes</a>
                                            <ul>
                                            <?php
                                                if ($_SESSION['client_add'] == 1)
                                                {
                                                    echo '<li><a href="client_add.php">Agregar</a></li>';
                                                }
                                                if ($_SESSION['client_guest'] == 1)
                                                {
                                                    echo '<li><a href="clients.php?pagina=1">Gestionar</a></li>';
                                                }
                                            ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ventas abiertas - Agregar producto</a>
                                            <ul>
                                                <?php
                                                    echo $ventas_movil_add_product;
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ventas abiertas - Finalizar</a>
                                            <ul>
                                                <?php
                                                    echo $ventas_movil;
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ventas abiertas - Cotizar</a>
                                            <ul>
                                                <?php
                                                    echo $ventas_movil_cotizar;
                                                ?>
                                            </ul>
                                        </li>
                                        <li><a href="" data-toggle="modal" data-target="#profile"><img src = "images/<?php echo $_SESSION['users_foto']; ?>" style="
                                            height: 50px;
                                            width: 50px;
                                            background-repeat: no-repeat;
                                            background-position: 50%;
                                            border-radius: 50%;
                                            background-size: 100% auto;
                                            "> <?php echo $_SESSION['users_username']; ?> </a>
                                                    <li><a href="sale_cut_x.php">Corte x</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#cut_z_yes">Corte Z</a></li>
                                            </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu End -->
        </header>
        <!-- End of header area -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- Start Banner Area -->
            <div class="banner-area section-padding">
                <div class="container">
                    <div class="row">
                    <div id="message"></div>
        <script>
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value.replace(/%20/g, " ");
            });
            return vars;
          }
        </script>