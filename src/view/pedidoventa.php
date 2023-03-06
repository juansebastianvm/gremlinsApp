<?php
require_once("src/model/Usuario.php");
$user = $_SESSION['user'];
require_once("src/model/Rol.php");
require_once("src/model/Vista.php");
require_once("src/model/Menu.php");
require_once("src/model/SubMenu.php");

require_once("src/view/html/menu_superior.php");
require_once("src/view/html/menu_vertical.php");

$num_reg = 0;

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="mt-4">Pedidos de Venta</h1>
                </div>
                <div class="col">
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Listado
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped display compact table-header" id="dataTableJS" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Pedido</th>
                                    <th>Fecha</th>
                                    <th>Valor Total</th>
                                    <th>Dirección destino</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Pedido</th>
                                    <th>Fecha</th>
                                    <th>Valor Total</th>
                                    <th>Dirección destino</th>
                                    <th>Cliente</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>VE-1285</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>Av. Siempre Viva - Springfield</td> 
                                        <td>Pedro Picapiedra</td>                                    
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>VE-1275</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>Av. Siempre Viva - Springfield</td> 
                                        <td>Pedro Picapiedra</td>                                            
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>VE-1245</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>Av. Siempre Viva - Springfield</td> 
                                        <td>Pedro Picapiedra</td>                                                  
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>VE-1235</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>Av. Siempre Viva - Springfield</td> 
                                        <td>Pedro Picapiedra</td>                                         
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>VE-1255</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>Av. Siempre Viva - Springfield</td> 
                                        <td>Pedro Picapiedra</td>                                        
                                    </tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once("src/view/html/footer.php");
    ?>