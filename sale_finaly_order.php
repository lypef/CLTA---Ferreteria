<?php
    include 'func/header.php';
    CompareFolioOpen($_GET["folio"]);
?>

<?php 
    if ($_GET["folio"])
    {
        echo table_sale_products_finaly_order($_GET["folio"]); 
    }else{
        echo '<script>location.href = "create_order.php?pagina=1"</script>';
    }
?>

<!-- End Of Wishlist Area -->
<script>
if (getUrlVars()["nopay"])
{
    var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
    body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    body +="<span aria-hidden='true'>&times;</span>";
    body +="</button>";
    body +="<strong>ERROR!</strong> La venta no se puede finalizar por que existe adeudo.";
    body +="</div>";
    document.getElementById("message").innerHTML = body;
}

if (getUrlVars()["noabono"])
{
    var body = "<div class='alert alert-danger alert-dismissible show' role='alert'>";
    body +="<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    body +="<span aria-hidden='true'>&times;</span>";
    body +="</button>";
    body +="<strong>ERROR!</strong> El abono no se efectuo.";
    body +="</div>";
    document.getElementById("message").innerHTML = body;
}
</script>

<?php
    include 'func/footer.php';
    if ($_GET["folio"])
    {
        echo table_SalesModal_order($_GET["folio"]);
    }
?>

<div class="modal fade" id="abono_sale" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ABONAR A VENTA ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
      <form action="func/add_abono.php" method="post">	
        <input type="hidden" id="folio_a" name="folio_a" value="<?php echo $_GET["folio"]; ?>">
        
            <div class="col-md-8">
            <input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <label>Ingrese monto a abonar<span class="required">*</span> </label>
            <input type="text" name="abono" id="abono" placeholder="0.0" required>
            </div>
            <br>
            <div class="col-md-8">
            <br><label>Seleccione tipo de pago<span class="required">*</span></label>
            <select id="t_pago" name="t_pago" required>
                <option value="efectivo" selected>Efectivo</option>
                <option value="transferencia">Tranferencia</option>
                <option value="tarjeta">Tarjeta</option>
            </select>
            </div>
            
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-warning">CONFIRMAR</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="success_sale" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FINALIZAR VENTA ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Al finalizar la venta, el sistema disminuira las existencias de cada producto agregado y posteriomente tomara la sumatoria como un ingreso.</p>
      </div>
      <div class="modal-footer">
        <form action="func/product_sale_finaly_order.php" method="post">
            <input type="hidden" id="folio" name="folio" value="<?php echo $_GET["folio"]; ?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
            <button type="submit" class="btn btn-warning">CONFIRMAR</button>
        </form>
      </div>
    </div>
  </div>
</div>