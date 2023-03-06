<?php
session_destroy();
?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Vuelve pronto</h3>
                                </div>
                                <div class="card-body">
                                    <h4>Ha salido exitosamente del Sistema.</h4>
                                    <p>Para volver a ingresar, por favor, de clic en el boton a continuación.</p>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="btn btn-primary btn-lg" role="button" aria-disabled="true" href="?pid=login">Ir a página de inicio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; JSVM 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>