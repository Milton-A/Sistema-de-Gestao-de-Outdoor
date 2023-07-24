<?php
include 'header.php';
if (isset($_SESSION['Usuario']))
            $usuario = unserialize($_SESSION['Usuario']);
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $usuario->getTipo() === "Gestor") {
    // Usuário logado
    require_once __DIR__ . '/../../controllers/GestorController.php';
    $gestorController = new GestorController();
    ?>
    <title>Gestor Dashboard</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
            <a class="navbar-brand" href="index.php?op=<?php echo $usuario->getTipo(); ?>">XPTO Gestor Page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-4 ">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (isset($_SESSION['Usuario'])) echo $usuario->getUsername(); ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="index.php?op=logout">Sair</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </nav>
        
        <main class="mx-auto w-75">
            <div class="container">
                <h1>Alterar Nome de Usuário e Senha</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Novo Nome de Usuário</label>
                        <input type="text" class="form-control" name="username" placeholder="Digite o novo nome de usuário">
                    </div>
                    <div class="form-group">
                        <label for="password">Nova Senha</label>
                        <input type="password" class="form-control" name="password" placeholder="Digite a nova senha">
                    </div>
                    <input type="hidden" name="form-alterarD" value="1" />
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </form>
            </div>
        </main>
        <?php
        include 'footer.php';
    } else
        echo '!!!!Pagina não encontrada';
    ?>