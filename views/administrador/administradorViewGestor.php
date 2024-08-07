<?php
include 'header.php';
if (isset($_SESSION['Usuario']))
    $usuario = unserialize($_SESSION['Usuario']);
?>
<title>Adm Dashboard</title>     
</head>
<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $usuario->getTipo() == "Administrador") {
        $admController = new AdministradorController();
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand" href="index.php?op=<?php echo $usuario->getTipo(); ?>">XPTO ADM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="menu">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?op=Administrador">Ver Clientes</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="index.php?op=Administrador&&request=verGestores">Ver Gestor</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="index.php?op=Administrador&&request=verOutdoors&&estado=all">Ver Outdoors</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="index.php?op=Administrador&&request=verSolicitacoes">Ver Solicitacoes</a>
                    </li>
                </ul>
            </div>
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-4 ">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['Usuario'])) echo $usuario->getUsername(); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item alterar-email" href="#">Alterar</a>
                                <a class="dropdown-item" href="index.php?op=logout">Sair</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="modal fade" id="alterarEmailModal" tabindex="-1" aria-labelledby="alterarEmailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="alterarEmailModalLabel">Alterar Email</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="novoEmail">Novo Email</label>
                                    <input type="email" class="form-control" id="novoEmail" name="novoEmail" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="savarEmail">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <main>
            <div class="container align-items-center justify-content-between">
                <div class="container text-center mb-2 mt-4">
                    <div class="row">
                        <div class="col border border-primary card">
                            <div class="card-title">Clientes</div>
                            <p class="card-footer"> total:
                                <?php echo $admController->verTotalClientes(); ?>
                            </p>
                        </div>
                        <div class="col border border-primary ml-2 card">
                            <div class="card-title">Gestores:
                            </div>
                            <p class="card-footer"> total:
                                <?php echo $admController->verTotalGestores(); ?>
                            </p>
                        </div>
                        <div class="col border border-primary ml-2 card">
                            <div class="card-title">Outdoors</div>
                            <p class="card-footer"> total:
                                <?php echo $admController->verTotalOutdoors(); ?>
                            </p>
                        </div>

                        <div class="col border border-primary ml-2 card">
                            <div class="card-title">Administradores</div>
                            <p class="card-footer"> total:
                                <?php echo $admController->verTotalAdministradores(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $admController->verGestores(); ?>
            </div>
        </main>
        <?php
        include 'footer.php';
    } else {
        include 'footer.php';
        echo '!!!!Pagina não encontrada';
    }
    ?>