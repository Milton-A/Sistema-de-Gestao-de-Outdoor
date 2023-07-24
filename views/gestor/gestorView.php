<?php
include 'header.php';
if (isset($_SESSION['Usuario']))
    $usuario = unserialize($_SESSION['Usuario']);

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $usuario->getTipo() === "Gestor") {
    require_once __DIR__ . '/../../controllers/GestorController.php';
    $gestorController = new GestorController();
    ?>
    <title>Gestor Dashboard</title>
    </head>
    <body class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning justify-content-between">
            <a class="navbar-brand" href="index.php?op=<?php echo $usuario->getTipo(); ?>&&estado=all">XPTO Gestor Page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" id="menu">
                    <li class="nav-item" >
                        <a class="nav-link" href="index.php?op=Gestor&&request=verPedidos&&estado=all">Ver Pedidos</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="index.php?op=Gestor&&request=addOutdoor">Adicionar Outdoor</a>
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
        <main class="mx-auto">
            <div class="container align-items-center justify-content-between">
                <div class="container text-center mb-2 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-5 border border-primary ml-2 card">
                            <p class="card-footer mt-3">Outdoors total:
                                <?php echo $gestorController->totalOutdoors(); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $gestorController->verOutdoors(); ?>
            </div>
        </main>
        <?php
        include 'footer.php';
    } else
        echo '!!!!Pagina não encontrada';
    ?>