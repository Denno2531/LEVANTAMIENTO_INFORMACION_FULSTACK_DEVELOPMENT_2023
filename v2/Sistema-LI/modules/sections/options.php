<?php
include_once 'security.php';
?>
<div class="form-options">
    <div class="options">
        <form action="" method="POST">
            <button id="btnAddOptions" class="btn btn-add icon" name="btn" value="form_add" type="submit">add</button>
        </form>
        <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
        </form>
        <form action="" method="POST">
    <button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit">print</button>
</form>



        <button id="btnSearchMobile" class="btn btn-search-mobile icon">search</button>
        <form action="/">
            <button id="btnExitOptions" class="btn btn-exit icon" type="submit">exit_to_app</button>
        </form>
    </div>
    <div class="search">
        <form name="form-search" action="" method="POST">
            <p>
                <input type="text" class="text-search" id="txtSearch" name="search" placeholder="Buscar..." autofocus>
                <button id="btnSearch" class="btn-search icon" type="submit">search</button>
            </p>
        </form>
    </div>
</div>
<script src="/js/controls/options.js"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
  // Obtener el botón
  var btnPrint = document.getElementById("btnPrint");

  // Agregar un controlador de eventos para el botón
  btnPrint.addEventListener("click", function() {
    // Crear un objeto jsPDF
    var doc = new jsPDF();

    // Agregar la pantalla actual al documento PDF
    doc.addHTML(document.body, function() {
      // Guardar el documento PDF
      doc.save("documento.pdf");
    });
  });
</script>

<script>
  // Activar el botón
  btnPrint.disabled = false;
</script>