<?php
//session_start();
unset($_SESSION['estado_cupon']);
$page = 'carta';
require 'class/ProductoClass.php';
require 'class/TiendaClass.php';
$objTienda = new TiendaClass();
$objProducto = new ProductoClass();

include 'class/Cart.php';
$cart = new Cart;

$cartItems = $cart->contents();


if (isset($_GET['idCategoria'])) {
    $idCategoria = $_GET['idCategoria'];
} else {
    $idCategoria = 1;
}

switch ($idCategoria) {
    case 1:
        $nombreCategoria = 'Shawermas';
        break;
    case 2:
        $nombreCategoria = 'Bowls';
        break;
    case 3:
        $nombreCategoria = 'Combos';
        break;
    case 4:
        $nombreCategoria = 'Falafel';
        break;
    case 5:
        $nombreCategoria = 'Complementos';
        break;
    case 6:
        $nombreCategoria = 'Bebidas';
        break;
}


$lista = $objProducto->getTipoProductosAndOrderByPosicionCategoria($idCategoria);
//$lista = $objProducto->getTipoProductosAndOrderByPosicion(2);



if (isset($_GET['code'])) {
    $alerta = $_GET['code'];
} else {
    $alerta = '';
}

$estadoTienda = trim($objTienda->getEstadoTienda()['estado']);

//GENERANDO LOS META TAGS
$nombres = '';
foreach ($lista as $item) {
    $nombres = $nombres . ', ' . $item['nombreProducto'];
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta property="og:image" content="https://elegipcio.pe/assets/img/OpenGraph/ogCarta.png" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta https-equiv="X-UA-Compatible" content="ie=edge">
    <title>El Egipcio - Carta</title>
    <?php include "shared/libraries.php"; ?>
    <link rel="stylesheet" href="assets/css/cards.css">
    <link rel="stylesheet" href="assets/css/seleccion_multiple.css">
    <link rel="stylesheet" href="vendor/swiper/swiper.min.css">
    <style>
        del {

            text-decoration: none;
            position: relative;
        }

        del:before {
            content: " ";
            display: block;
            width: 100%;
            border-top: 3px solid rgba(255, 0, 0, 0.8);
            height: 16px;
            position: absolute;
            bottom: 0;
            left: 0;
            transform: rotate(-16deg);
        }
    </style>
</head>

<body onload="ValidateModalBody(event)">
    <!-- Alerts -->
    <?php if ($alerta == "emailExiste") {
    ?>
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
            <div class="alert alert-danger emailExiste alert-dismissible fade show text-center animated tada slow" role="alert">
                <strong>Error!</strong> El correo ya esta registrado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
        </div>
        <?php
    } ?><?php if ($alerta == "incorrectPass") {
        ?>

        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
            <div class="alert alert-danger emailExiste alert-dismissible fade show text-center animated tada slow" role="alert">
                <strong>Error!</strong> Tu contraseña es incorrecta, intentalo de nuevo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <?php
        } ?><?php if ($alerta == "notExistUser") {
            ?>

        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  text-center animated tada slow">
            <div class="alert alert-danger emailExiste alert-dismissible fade show" role="alert">
                <strong>Error!</strong> El Correo no existe,por favor regístrate.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php
            } ?>
    <?php if ($alerta == "sendResetMail") {
    ?>

        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
            <div class="alert alert-success  alert-dismissible fade show animated tada slow" role="alert">
                <strong>Correcto!</strong> Se ha enviado un link de recuperación a tu correo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php
    } ?>

    <?php if ($alerta == "passChanged") {
    ?>

        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
            <div class="alert alert-success  alert-dismissible fade show animated tada slow" role="alert">
                <strong>Correcto!</strong> Se ha cambiado la contraseña correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php
    } ?>
    <!-- /Alerts -->
    <?php include 'shared/navBar.php' ?>

    <div class="container-fluid main-container animated fadeIn slow mb-5">
        <div class="row">
            <div class="col titulo">CARTA</div>
        </div>
        <div class="row m-2">
        <div class="col-12 col-sm-12 col-md-12 col-xl-1 col-lg-1">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-xl-2 col-lg-2">
                <h3 style="color:#9c0001;">Categorias</h3>
                <div class="row mb-3">
                    <div class="col">
                        <div class="separador"></div>
                    </div>
                </div>
                <div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=1">
                            <h3>Shawermas</h3>
                        </a>
                    </div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=2">
                            <h3>Bowls</h3>
                        </a>
                    </div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=3">
                            <h3>Combos</h3>
                        </a>
                    </div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=4">
                            <h3>Falafel</h3>
                        </a>
                    </div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=5">
                            <h3>Complementos</h3>
                        </a>
                    </div>
                    <div>
                        <a style="color:#7f8c8d" href="/sitios/elegipcio/egipcio-carta-categoria.php?idCategoria=6">
                            <h3>Bebidas</h3>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-12 col-sm-12 col-md-12 col-xl-5 col-lg-5">
                <div class="row">
                    <div class="col contenedor-carrito p-2">


                        <h3 style="color:#9c0001;" class=""><?php echo $nombreCategoria; ?></h3>

                        <div class="row row-cols-1 row-cols-md-3 justify-content-center" id="productsDataContainer">

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-md-12 col-xl-3 col-lg-3 ">
                <div class="row mb-3">
                    <div class="col">
                        <h3 style="color:#9c0001;">Tu orden</h3>
                    </div>
                </div>


                <div class="marco-carrito-categoria">


                    <?php
                    $subtotal = 0;
                    $puntosAacumular = 0;
                    if ($cart->total_items() > 0) {


                        $nAdicionalesCart = 0;
                        foreach ($cartItems as $itemCarrito) {

                            if ($itemCarrito['productoObservaciones'] == 'ADICIONAL') {
                                $nAdicionalesCart = $nAdicionalesCart + 1;
                            }

                            $subtotal = $subtotal + $itemCarrito['subtotal'];


                            $puntosAacumular = $puntosAacumular + $itemCarrito['subtotalPuntos'];


                    ?>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                    <h5><?php echo $itemCarrito['name'] ?></h5>
                                    <small class="text-lowercase d-block text-muted"><?php echo substr($itemCarrito['productoIngredientes'], 0, -2) ?></small>

                                    <?php
                                    if (strlen($itemCarrito['emailGift']) > 0) {
                                    ?>
                                        <small class=" d-block text-muted">Para: <?php echo $itemCarrito['emailGift'] ?></small>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    if (strlen($itemCarrito['dedicatoriaGift']) > 0) {
                                    ?>
                                        <small class=" d-block text-muted">Dedicatoria: <?php echo $itemCarrito['dedicatoriaGift'] ?></small>
                                    <?php
                                    }
                                    ?>

                                    <img class="cart-image img-fluid" src="assets/img/promos/<?php echo $itemCarrito['imagenProducto'] ?>" alt="">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5 class="text-center">Cantidad</h5>
                                        <div class="row mt-1">
                                            <div class="col text-center">
                                                <a onclick="mostrarLoading()" href="script/cartActionCategoria.php?action=updateCartItem&id=<?php echo $itemCarrito['rowid']; ?>&qty=<?php echo $itemCarrito['qty'] - 1; ?>" class="btn btn-sm"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <input readonly class="text-center" style="width: 60px" type="text" value="<?php echo $itemCarrito['qty']; ?>">
                                                <a onclick="mostrarLoading()" href="script/cartActionCategoria.php?action=updateCartItem&id=<?php echo $itemCarrito['rowid']; ?>&qty=<?php echo $itemCarrito['qty'] + 1; ?>" class="btn btn-sm "><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5 class="font-weight-bolder">SubTotal</h5>
                                        <h5 class="font-weight-bolder">S/ <?php echo number_format($itemCarrito['subtotal'], 2, '.', ''); ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1 text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <a onclick="mostrarLoading();" href="script/cartActionCategoria.php?action=removeCartItem&id=<?php echo $itemCarrito['rowid']; ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>
                            <hr class=" d-sm-block d-md-block d-xl-none d-lg-none">


                        <?php
                        }
                        ?>
                        <div class="row mt-3">
                            <div class="col text-center">
                                <a onclick="mostrarLoading();" class="" href="script/cartActionCategoria.php?action=destroyCart">Vaciar
                                    Carrito</a>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col text-center">
                                <a href="egipcio-pago.php" class="comprar-button">Continuar</a>
                            </div>

                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="row mb-3">
                            <div class="col col-12 text-center mt-4">
                                <i style="font-size: 100px;color: #fff000" class="fa fa-shopping-cart"></i>
                                <h5 class="py-3">Tu carrito está vacío</h5>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-xl-1 col-lg-1">
            </div>


        </div>
    </div>




    <?php if ($_GET['valor'] == "ordena") { ?>
        <div class="container main-container animated fadeIn slow mb-5">
            <div class="row mb-3">
                <div class="col">
                    <h2 class="titulo">CARTA</h2>
                </div>
            </div>
        <?php } else { ?>
            <div class="container animated fadeIn slow mb-5">
            <?php } ?>






            <div class="row mb-5">
                <div class="col text-center">
                    <small>▲ FOTOS REFERENCIALES ▲</small>

                </div>
            </div>

            </div>

            <?php include 'shared/footer.php' ?>
            <div class="" id="productsDataContainerModal">

            </div>
            <script src="assets/js/egipcio-carta.js"></script>
            <script>
                $(document).ready(function() {
                    $('#myModal').modal('toggle')
                });
            </script>
            <script>
                const data = <?= json_encode($lista) ?>;
                let dataContainer = document.getElementById('productsDataContainer');

                let dataContainerModal = document.getElementById('productsDataContainerModal');


                if (localStorage.getItem('addressIsSelected')) {
                    if (localStorage.getItem('addressIsSelected') === '1') {
                        renderData(parseInt(localStorage.getItem('store')));
                    }

                }

                function renderData(storeId) {
                    data.filter(value => value.store_id * 1 === storeId).forEach(product => {
                        dataContainer.innerHTML += objectToProductoCard(product);

                    });

                    /* if(storeId == 2){
                        dataContainerModal.innerHTML += objectToModalSurco();
                    } */

                }

                function objectToProductoCard(product) {
                    let card = '<div class="col-md-12 mb-5 animated fadeIn"><div class="card h-100 card-products"><div class="row">' +
                        '<div class="col-md-6"><img src="assets/img/promos/' + product.imagenProducto + '" class="card-img-top" style="height:300px" alt="..."></div>\n' +
                        '                    <div class="col-md-6 pb-3"><div class="card-body p-2 d-flex flex-column">';
                    if (product.esNuevo === 'TRUE') {
                        card += '<h5 class="text-egipcio mt-2">\n' +
                            '                                !NUEVO PRODUCTO!\n' +
                            '                            </h5>'
                    }
                    card += '<h5 class="card-title titulo-cards">' + product.nombreProducto + '</h5>\n' +
                        '                        <p class="card-text">' + isNull(product.descripcionProducto) + '</p>\n' +
                        '                        <p class="card-points-description">';
                    if (product.acumulaNPuntos * 1 > 0) {
                        card += 'Acumula  ' + product.acumulaNPuntos + ' puntos';
                    }
                    card += '</p>'
                    if (product.precioDescuento * 1 > 0) {
                        card += '<h5 class="card-price">\n' +
                            '                                <del>S/. ' + product.precioDescuento + '</del>\n' +
                            '                            </h5>'
                    }
                    /* if (product.store_id === '3') {
                       
                        if (product.idProducto > 372 && product.idProducto < 408) {
                            card += '<p class="card-price">S/ <del>' + Number.parseFloat(product.precioTachado).toFixed(2) + '</del></p>';
                        }
                    } */
                    card += '<p class="card-price">S/ ' + Number.parseFloat(product.precioProducto).toFixed(2) + '</p>';


                    if (product.stock === 'YES') {

                        if (product.productoObservaciones === 'MULTI_BOWL') {
                            card += '<a onclick="buyProductAndValidate(event)"\n' + 'href="egipcio-shawerma-bowl.php?id=' + product.idProducto + '"\n' +
                                'class="comprar-button w-100 align-self-end mt-auto">Arma tu Bowl</a>'
                        } else if (product.productoObservaciones === 'MULTI_SHAWERMA') {
                            card += ' <a onclick="buyProductAndValidate(event)"\n' + ' data-whatever="' + product.idProducto + '"\n' +
                                '                             href="egipcio-shawerma-premium.php?id=' + product.idProducto + '"\n' +
                                '                           class="comprar-button w-100 align-self-end mt-auto">Arma tu Shawerma</a>'
                        } else if (product.productoObservaciones === 'MULTI_FALAFEL') {
                            card += '<a onclick="buyProductAndValidate(event)"\n' +
                                '                                            href="egipcio-falafel-premium.php?id=' + product.idProducto + '"\n' +
                                '                                            class="comprar-button w-100 align-self-end mt-auto">Arma tu Falafel</a>'
                        } else if (product.productoObservaciones === 'MULTI_COMBO_AL_PESO1') {
                            card += ' <a onclick="buyProductAndValidate(event)" href="egipcio-combo-al-peso-pollo.php?id=' + product.idProducto + '" class="comprar-button w-100 align-self-end mt-auto">' +
                                'Arma tu Combo</a>'
                        } else if (product.productoObservaciones === 'MULTI_COMBO_AL_PESO2') {
                            card += '<a onclick="buyProductAndValidate(event)" href="egipcio-combo-al-peso-mixto.php?id=' + product.idProducto + '"\n' +
                                '                                       class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                        } else if (product.productoObservaciones === 'SALSA_ALITAS') {
                            card += '<a onclick="buyProductAndValidate(event)" href="egipcio-salsa-alitas.php?id=' + product.idProducto + '"\n' +
                                '                                       class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                        } else if (product.productoObservaciones === 'COMBO_FAMILIAR') {
                            card += '<a onclick="buyProductAndValidate(event)" href="egipcio-combo-familiar.php?id=' + product.idProducto + '"\n' +
                                '                                       class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                        } else if (product.productoObservaciones === 'COMBO_TENDERS') {
                            card += '<a onclick="buyProductAndValidate(event)" href="egipcio-combo-tenders.php?id=' + product.idProducto + '"\n' +
                                '                                       class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                        } else {

                            card += '<a onclick="buyProductAndValidate(event)"\n' +
                                '                                       href="script/cartActionCategoria.php?action=addToCart&id=' + product.idProducto + '&cantidad=1"\n' +
                                '                                    class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                        }

                    } else {

                        card += '<button type="button" class="comprar-button w-100 align-self-end mt-auto">AGOTADO\n' +
                            '                                </button>'

                    }

                    card += '</div></div>\n' +
                        '                </div>\n' +
                        '           </div> </div>';
                    return card;
                }

                /* function objectToModalSurco() {
                   let modal = '<div id="modal_comunicado" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><img class="img-fluid" src="assets/img/comunicado-surco.jpg" height="600px" width="100%"/></div></div></div></div>'; 
                        
                        return modal;
                } */
            </script>

</body>

</html>