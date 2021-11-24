<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">USUARIOS</h5>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Usuarios</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">

                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h2>Listado de Usuarios</h2>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>
                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroUsuario"><i class="fa fa-plus"></i> Nuevo</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <table class="table-bordered table-striped dt-responsive tablaUsuarios estilosBordesTablas" width="100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Nombre Usuario</th>
                                                                            <th>Correo</th>
                                                                            <th>Grupo</th>
                                                                            <th>Perfil</th>
                                                                            <th>Fecha</th>
                                                                            <th>Estatus</th>
                                                                            <th>Acciones</th>
                                                                        </tr>
                                                                    </thead>

                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Registro-->
<div class="modal fade" id="registroUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRegistroUsuario" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nameUserCreate" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Electronico</label>
                        <input type="email" class="form-control" id="emailUserCreate" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Grupo</label>
                        <select class="form-control form-control-sm" id="groupUserCreate">
                            <option value="Administracion">Administracion</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Almacen">Almacen</option>
                            <option value="Operaciones">Operaciones</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control form-control-sm" id="perfilUserCreate">
                            <option value="Administrador General">Administrador General</option>
                            <option value="Editor">Editor</option>
                            <option value="Visualizador">Visualizador</option>

                        </select>
                        <div class="msg"></div>
                    </div>

                    <div class="form-group">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Modal Edicion-->
<div class="modal fade" id="edicionUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Edicion de Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formActualizarUsuario" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="hidden" class="form-control" id="idUserEdit">
                        <input type="text" class="form-control" id="nameUserEdit" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Electronico</label>
                        <input type="email" class="form-control" id="emailUserEdit" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Grupo</label>
                        <select class="form-control form-control-sm" id="groupUserEdit">
                            <option value="Administracion">Administracion</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Almacen">Almacen</option>
                            <option value="Operaciones">Operaciones</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Perfil</label>
                        <select class="form-control form-control-sm" id="perfilUserEdit">
                            <option value="Administrador General">Administrador General</option>
                            <option value="Editor">Editor</option>
                            <option value="Visualizador">Visualizador</option>

                        </select>
                        <div class="msg"></div>
                    </div>

                    <div class="form-group">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>