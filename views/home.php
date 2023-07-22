<?php
include 'header.php';
if (isset($_SESSION['Usuario']))
    $usuario = unserialize($_SESSION['Usuario']);
?>
<title>XPTO Solutions</title>
</head>
<body>
    <header id="header" class="navbar navbar-expand-lg bg-warning" style="height: 60px;">
        <div class="container-fluid">
            <div class="d-flex align-items-center ">
                <a href="index.php" class="logo d-flex align-items-center">
                    <span class="d-none d-lg-block">XPTO Solution</span>
                </a>
            </div>
            <div>
                <?php if ($logado) { ?>
                    <nav class="header-nav ms-auto">
                        <ul class="d-flex align-items-center navbar-nav me-auto mb-2 mb-lg-0">
                            <li  class="nav-item">
                                <form class="d-flex ms-auto me-1 nav-item">
                                    <button class="btn btn-outline-dark" type="submit" id="mostrarListaBtn">
                                        <i class="bi-cart-fill me-1"></i>
                                        Aluger
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item px-4 ">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php if (isset($_SESSION['Usuario'])) echo $usuario->getUsername(); ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="index.php?op=Cliente&&request=alterarDados">Alterar</a>
                                        <a class="dropdown-item" href="index.php?op=logout">Sair</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                <?php } else { ?>
                    <nav class="header-nav ms-auto">
                        <ul class="d-flex align-items-center navbar-nav me-auto mb-2 mb-lg-0">
                            <li  class="nav-item">
                                <a href="index.php?op=Usuario&&request=login" class="d-flex btn btn-outline-dark">
                                    Entrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href ="index.php?op=Cliente&&request=registro" class="d-flex btn btn-outline-dark m-3">
                                    Registrar-se
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php } ?>
            </div>
        </div>
    </header>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">O melhor da Publicidade</h1>
                <p class="lead fw-normal text-white-50 mb-0">Encontre o que procura</p>
            </div>
        </div>
    </header>
    
    <?php
    $this->OutdoorController->showOutdoors();
    include 'footer.php';
    