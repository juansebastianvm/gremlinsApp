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
                    <h1 class="mt-4">Distribuidores</h1>
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
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Documento</th>
                                    <th>Tipo de Documento</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Correo Electrónico</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Documento</th>
                                    <th>Tipo de Documento</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Correo Electrónico</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Katerine</td>
                                        <td>Moreno</td>
                                        <td>C.C.</td>
                                        <td>1123456789</td>
                                        <td>2222222222</td>
                                        <td>Calle 12 N15-45</td>
                                        <td>katerine@gmail.com</td>                                        
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