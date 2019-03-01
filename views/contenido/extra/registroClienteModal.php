<!-- Modal de registro de cliente-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos del cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRegistroCliente">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingrese su nombre" required>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            placeholder="Ingrese sus apellidos" required>
                    </div>

                    <div class="form-group">
                        <label>Rut</label>
                        <input type="text" class="form-control" id="run" name="run"
                            placeholder="Ingrese su Rut (ej: 12.345.678-k)" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su e-mail"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Dirección</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="2"
                            placeholder="Ingrese su dirección de habitación" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="btn-guardarCliente" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de ver más del cliente-->
<div class="modal fade" id="m_verMas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información detallada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="formEdit" method="post" action="controllers/registroClienteEditar.php">

                    <label>Nombre:</label>
                    <input type="text" name="rNombre" id="rNombre" class="form-control">
                    <input type="hidden" id="id_usuario" name="id_usuario">

                    <label>Apellidos:</label>
                    <input type="text" name="rApellidos" id="rApellidos" class="form-control">

                    <label>Run:</label>
                    <input type="text" name="rRun" id="rRun" class="form-control">

                    <label>Correo:</label>
                    <input type="text" name="rCorreo" id="rCorreo" class="form-control">

                    <label>Dirección:</label>
                    <textarea name="rDireccion" id="rDireccion" rows="2" class="form-control"></textarea>

                    <p id="rUsuario"></p>
                    <p id="rFecha"></p>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="editar">Editar</button>
                <button type="submit" class="btn btn-success" id="guardar">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>