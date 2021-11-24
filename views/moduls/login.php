<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" method="POST">
                    <div class="text-center">
                        <img src="views/images/logo.png" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">MATRIZ ADMON</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label"></label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label"></label>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" class="form-control" value="1" name="accion" checked>
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Ventas</span>
                                        </label>
                                    </div>
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" class="form-control" value="2" name="accion">
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Inventarios</span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info btn-md btn-block waves-effect waves-light text-center m-b-20">ACCEDER</button>
                                </div>
                            </div>
                            <hr />

                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<?php

$login = new ControllerAdmon();
$login->ctrAccesoUser();

?>
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>