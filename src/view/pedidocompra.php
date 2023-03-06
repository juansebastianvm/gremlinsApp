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
                    <h1 class="mt-4">Pedidos de Compra</h1>
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
                                    <th>Fecha de entrega</th>
                                    <th>Proveedor</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Pedido</th>
                                    <th>Fecha</th>
                                    <th>Valor Total</th>
                                    <th>Fecha de entrega</th>
                                    <th>Proveedor</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>CO-1285</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>03/03/2023</td>
                                        <td>Oliver Atom</td>                                    
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>CO-1299</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>03/03/2023</td>
                                        <td>Oliver Atom</td>                                             
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>CO-1235</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>03/03/2023</td>
                                        <td>Oliver Atom</td>                                                  
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>CO-12855</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>03/03/2023</td>
                                        <td>Oliver Atom</td>                                        
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>CO-1245</td>
                                        <td>03/03/2023</td>
                                        <td>$ 1.500.000</td> 
                                        <td>03/03/2023</td>
                                        <td>Oliver Atom</td>                                         
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