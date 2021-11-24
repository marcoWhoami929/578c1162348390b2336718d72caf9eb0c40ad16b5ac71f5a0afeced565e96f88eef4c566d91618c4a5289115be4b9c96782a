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
                                        <h5 class="m-b-10">Mi perfil</h5>

                                        <p class="m-b-0"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Mi perfil</a>
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
                                                                            <h2>Mi perfil</h2>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>

                                                            </div>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                                        <form id="formActualizarPassword" enctype="multipart/form-data">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="inputAddress">Nombre Completo</label>
                                                                                    <input type="hidden" class="form-control" id="userId" value="<?php echo $_SESSION["id"] ?>">
                                                                                    <input type="text" class="form-control" id="nameUser" placeholder="" readonly>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="inputEmail4">Correo</label>
                                                                                    <input type="email" class="form-control" id="emailUser" placeholder="Correo electronico" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-row">

                                                                                <div class="form-group col-md-6">
                                                                                    <label for="inputPassword4">Nueva Contraseña</label>
                                                                                    <input type="password" class="form-control" id="passwordUser" placeholder="Password" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="msg"></div>

                                                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                                                        </form>
                                                                    </div>


                                                                </div>

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