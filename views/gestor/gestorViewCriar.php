<?php
include 'header.php';
if (isset($_SESSION['Usuario']))
    $usuario = unserialize($_SESSION['Usuario']);

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $usuario->getTipo() === "Gestor") {
    // Usuário logado
    if (isset($_GET['idO']))
        $idO = $_GET['idO'];
    else
        $idO = 0;
    require_once __DIR__ . '/../../controllers/GestorController.php';
    $gestorController = new GestorController();
    ?>

    <title>Gestor Dashboard</title>
    </head>
    <body class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
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
        <form method="POST" class="mt-4  w-auto " enctype="multipart/form-data">
            <div class="container">
                <h2 class="text-center">Inserir Informações do Outdoor</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="text" name="preco" id="preco" class="form-control" required value="<?php if (isset($_GET['preco'])) echo $_GET['preco']; ?>">
                        </div>
                    </div>
                </div>
                <div class="rowr">
                    <div class="">
                        <div class="form-group">
                            <label for="tipo_outdoor">Tipo de Outdoor:</label>
                            <select name="tipo_outdoor" id="tipo_outdoor" class="form-control" required >
                                <option value="<?php if (isset($_GET['tipo'])) echo $_GET['tipo']; ?>"> <?php if (isset($_GET['tipo'])) echo $_GET['tipo']; else echo "Selecione um tipo" ;?> </option>
                                <option value="Paineis Luminosos">Paineis Luminosos</option>
                                <option value="Paineis Nao Luminosos">Paineis Não Luminosos</option>
                                <option value="Faixadas">Faixadas</option>
                                <option value="Placas Indicativas">Placas Indicativas</option>
                                <option value="Lampoles">Lampoles</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <?php
                        $provincia = new ProvinciaController();
                        $provincia->showProvincias();
                        ?>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Município:</label>
                            <select class="form-control" name="Municipio" id="Municipio">
                                <option>Selecione um Município</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Comuna:</label>
                            <select class="form-control" name="Comuna" id="Comuna">
                                <option>Selecione uma Comuna</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary w-100">Inserir</button>
                        <input type="hidden" name="form-register-outdoor" value="<?php
                            echo $idO;
                        ?>" />
                    </div>
                </div>
            </div>
        </form>

        <?php
        include 'footer.php';
    } else
        echo '!!!!Pagina não encontrada';
    ?>
