<!-- Modal razón tenencia-->
<div class="modal fade" id="otrosRazonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese razón de tenencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/registroRazon.php" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese razón de tenencia</label>
                        <input type="text" class="form-control" id="razon" name="razon"
                            placeholder="Ingrese razón de tenencia">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button> </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal obtención-->
<div class="modal fade" id="otrosObtencionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese modo de obtención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/registroObtencion.php" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese el método de obtención</label>
                        <input type="text" class="form-control" id="obtencion" name="obtencion"
                            placeholder="Ingrese el método de obtención">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button> </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal colores-->
<div class="modal fade" id="otrosColorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar colores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/registroColor.php" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese el color</label>
                        <input type="text" class="form-control" id="color" name="color"
                            placeholder="Color">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button> </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal patron-->
<div class="modal fade" id="otrosPatronModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar patron</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controllers/registroPatron.php" method="post">

                    <div class="form-group">
                        <label for="formGroupExampleInput">Ingrese el patron</label>
                        <input type="text" class="form-control" id="patron" name="patron"
                            placeholder="Patron de color">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button> </form>
            </div>
        </div>
    </div>
</div>