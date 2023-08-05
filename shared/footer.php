<?php
session_start();


include_once 'class/Delivery.php';
include_once 'class/TiendaClass.php';

$objDeliveryFooter = new Delivery();
$objTiendaFooter = new TiendaClass();

$tiendaFooter = null;

if (isset($_SESSION['deliveryZoneId'])) {
    $deliveryZoneFooter = $objDeliveryFooter->getDeliveryZoneById($_SESSION['deliveryZoneId']);

    $tiendaFooter = $objTiendaFooter->getTiendaById($deliveryZoneFooter['idTienda']);
}


?>

<style>
    .btn-primary {
        color: #fff;
        background-color: #000;
        border-color: #000;
    }

    .btn-outline-primary {
        color: #000 important;
        border-color: #fce024;
        background-color: #fff;

    }

    .btn-outline-primary:hover {
        color: #fff important;


    }
</style>
<section id="footer">
    <div class="container">
        <div class="row text-center text-center text-sm-left text-md-left mt-5">

            <div class="col-sm-12 col-sm-4 col-md-4 mt-3">

                <h5>Redes Sociales</h5>
                <ul class="list-unstyled text-center">
                    <li class="mt-3"><a target="_blank" href="https://www.facebook.com/elegipcio.pe"><img class="animated infinite jello slow" width="60px" src="assets/img/footer/icono-fb.png" alt=""><br>Siguenos en Facebook</a>
                    </li>
                    <li class="mt-3"><a target="_blank" href="https://www.instagram.com/elegipcio.pe/"><img class="animated infinite jello slow" width="60px" src="assets/img/footer/icono-instagram.png" alt=""><br>Siguenos en Instagram</a>
                    </li>


                </ul>
            </div>
            <div class="col-sm-12 col-sm-4 col-md-4 mt-3">
                <h5>Contacto</h5>
                <ul class="list-unstyled text-center">
                    <li class="mt-3">
                        <a target="_blank" href="https://g.page/shawarmaelegipcio?share">
                            <i class="fa fa-4x fa-map-marker" aria-hidden="true"></i>
                            <br>Jr. Julio Cesar Tello 872 / 886 Lince, Lima - Perú
                            <br>Av. El Polo 121 Santiago de Surco, Lima - Perú
                            <br>Jr. Instisuyo 187, Urb. Maranga, San Miguel
                        </a>
                    </li>
                    <li class="mt-3">
                        <a target="_blank" href="tel:+017753323">
                            <i class="fa fa-4x fa-phone" aria-hidden="true"></i>
                            <br>Delivery Lince: 981344827 / 01-7753323</a>
                        <a target="_blank" href="tel:+017858536">

                            <br>Delivery Surco: 901236995 / 01-7858536</a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-12 col-sm-4 col-md-4 mt-3">
                <h5>Herramientas</h5>
                <ul class="list-unstyled text-center">
                    <li class="mt-3">
                        <a target="_blank" href="#">
                            <i class="fa fa-4x fa-book" aria-hidden="true"></i><br>Libro de Reclamaciones
                        </a>
                    </li>
                    <li class="mt-3">
                        <a target="_blank" href="#">
                            <img width="60px" src="assets/img/icons/covid-19.png" alt="">
                            <br>
                            Protocolos de Bioseguridad Covid-19
                        </a>
                    </li>


                </ul>
            </div>


        </div>
        <div class="row mt-0 mt-xl-3 mt-lg-3">
            <div class="col mt-2 text-center">
                <h6 class="text-white">Desarrollado por Enfocus Soluciones</h6>
                <img style="width: 150px" src="assets/img/footer/logoEnfocus.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>
                    <a style="font-size: 18px; color: #FFFFFF;" href="cv.php">Bolsa de Trabajo </a>|<a style="font-size: 18px; color: #FFFFFF;" href="blog.php"> BLOG </a>| <a href="terminos.php">
                        Terminos y Condiciones</a>
                </p>
                <p class="h6">&copy Todos los Derechos Reservados.<a class="text-green ml-2" href="https://enfocussoluciones.com" target="_blank">El Egipcio - Enfocus</a></p>
            </div>
            <hr>
        </div>
    </div>
</section>


<!-- Modal -->
<!-- <div id="modal_comunicado" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <img class="img-fluid" src="assets/img/comunicado-surco.jpg" height="600px" width="100%"/>
      </div>
    </div>
  </div>
</div> -->

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="modalStoreSelectorLocal">
    <div class="modal-dialog " role="document">
        <div class="modal-content" style="border-radius:30px">
            <!--  <div class="modal-header text-center">
                <h3 class="text-center m-auto">CAMBIAR DIRECCIÓN <img class="mb-2" src="assets/img/egypt.png" alt="" style="width: 35px"></h3>
            </div> -->
            <div class="modal-header" align="center">
                <img id="img_logo" src="assets/img/navbar/logo.png" width="100">
               
                <button type="button" class="close custom-close-btn" data-dismiss="modal" aria-label="Close" style="color:red;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div>
                <h5 class="text-center">Selecciona el Local de preferencia</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-light btn-lg btn-block"  id="selectStoreSelectorLince" value="1"><strong>Lince</strong></a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-light btn-lg btn-block"  id="selectStoreSelectorSurco" value="2"><strong>Surco</strong></a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-light btn-lg btn-block"  id="selectStoreSelectorSanMiguel" value="3"><strong>San Miguel</strong></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" data-backdrop="static" id="modalStoreSelector">
    <div class="modal-dialog " role="document">
        <div class="modal-content" style="border-radius:30px">
            <!--  <div class="modal-header text-center">
                <h3 class="text-center m-auto">CAMBIAR DIRECCIÓN <img class="mb-2" src="assets/img/egypt.png" alt="" style="width: 35px"></h3>
            </div> -->
            <div class="modal-header" align="center">
                <img id="img_logo" src="assets/img/navbar/logo.png" width="100">
                  <a href="#" class="custom-back-btn" id="selectorArrowBack" value="1">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                 </a>
                <button type="button" class="close custom-close-btn" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div>
                <h5 class="text-center text-warning" id="local_elegido"></h5>
                <h5 class="text-center">Selecciona el Tipo de entrega</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="col" id="formStoreSelector">

                        <input type="hidden" id="hiddenLatInput">
                        <input type="hidden" id="hiddenLngInput">
                        <div class="row justify-content-center">
                            <div class="col-12">

                                <?php
                                if ($tiendaFooter) {
                                ?>


                                    <!--  <div class="row">
                                        <div class="col">
                                            <h5>Tu lugar de despacho es:</h5>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <ul>
                                                <li>
                                                    <h5><?= $tiendaFooter['direccion_tienda'] ?></h5>
                                                </li>
                                            </ul>

                                        </div>
                                    </div> -->
                                <?php
                                }
                                ?>


                                <!--   <div class="row">
                                    <div class="col">
                                        <h5>Tipo de pedido</h5>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col">
                                        <input onclick="selectShippinMethodClick(this)" value="DELIVERY" name="tipoReparto"  class="d-none" type="radio" id="storeSelectorDelivery">
                                        <label for="storeSelectorDelivery" class="ingrediente-button w-100 align-self-end mt-auto text-center">Delivery
                                        </label>
                                    </div>
                                    <div class="col">
                                        <!--  <button id="storeSelectorRecojo" type="submit" class="zona-button w-100 align-self-end mt-auto text-center" value="RECOJO">Recojo
                                        </button> -->
                                        <input onclick="selectShippinMethodClick(this)" value="RECOJO" name="tipoReparto" checked class="d-none" type="radio" id="storeSelectorRecojo">
                                        <label for="storeSelectorRecojo" class="zona-button w-100 align-self-end mt-auto text-center">Recojo
                                        </label>

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row justify-content-center d-none" id="deliveryInputContainer">
                            <div class="col-12">
                                <h5>Tu dirección</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control text-center" id="storeSelectorInput">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center d-none" id="recojoInputContainer">
                            <div class="col-12">
                                <h5>Selecciona un Local</h5>
                                <div class="form-group">
                                    <select name="selectStoreSelector" id="selectStoreSelector" class="form-control text-center">
                                        <option disabled selected>Selecciona un Local</option>
                                        <option value="1">Julio Cesar Tello 886 - Lince</option>
                                        <option value="2">Av. El Polo 121 - Surco</option>
                                        <option value="3">Intisuyo 187 - San Miguel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 id="map-titleStore" class="d-none">Precisa tu ubicación</h5>
                                <div id="mapStoreSelector"></div>
                            </div>
                        </div>


                        <div class="text-center mt-1">
                            <button id="saveAddressInformationBtn" type="submit" class="btn btn-primary btn-block btn-lg">Guardar
                            </button>
                            <a id="btnCloseAddressSelectorModal" data-dismiss="modal" class="btn btn-outline-primary btn-block btn-lg d-none" style="color:black;">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!--Spinner de carga-->
<div style="display: none" id="loading" class="loading">Loading&#8230;</div>

<script src="node_modules/promise-polyfill/dist/polyfill.min.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#modal_comunicado').modal('show')
    });
</script>
<script src="assets/js/loginModal.js"></script>
<script src="assets/js/main.js?v=126593434243921624196297292797929117931929129729"></script>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBR5MNX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->