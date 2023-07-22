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
                <?php $admController->verOutdoorsPedidos(); ?>
            </div>
        </main>
        <?php
        include 'footer.php';
    } else {
        include 'footer.php';
        echo '!!!!Pagina não encontrada';
    }
    ?>