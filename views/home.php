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
                                <form class="d-flex ms-auto me-1 nav-item" method="post">
                                    <button type="button" class="dro verCarrinho btn btn-outline-dark " data-toggle="modal" data-target="#meuModal">
                                        <span class="material-symbols-outlined">
                                            shopping_cart
                                        </span>
                                        Carrinho 
                                        <span class="badge text-bg-secondary">
                                            <?php
                                            if (isset($_SESSION['carrinho']))
                                                echo count($_SESSION['carrinho']);
                                            ?>
                                        </span>
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item px-4 ">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle px-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php if (isset($_SESSION['Usuario'])) echo $usuario->getUsername(); ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="index.php?op=Cliente&&request=alterarDados">Alterar</a>
                                        <a class="dropdown-item dro verSolicitacao btn btn-outline-dark " data-toggle="modal2" data-target="#meuModal2" >Ver Solicitacoes</a>
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
    <?php if ($logado) { ?>
        <div class="modal fade" id="verCarrinhoModal" tabindex="-1" aria-labelledby="alterarEmailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="mt-3 text-center">

                        <button type="button" class="close px-4" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title text-center" id="alterarEmailModalLabel">Carrinho</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <table id="listarDados" class="table border border-warning">
                                <tr>
                                    <th scope="col">Cod</th>
                                    <th scope="col">Preco</th>
                                    <th scope="col">Data Inicio</th>
                                    <th scope="col">Data Fim</th>
                                    <th scope="col">Preco Total</th>
                                </tr>
                                <?php
                                if (isset($_SESSION['carrinho'])) {
                                    foreach ($_SESSION['carrinho'] as $key => $value) {
                                        $cod = $value['codOutdoor'];
                                        $preco = $value['preco'];
                                        $dataInicio = $value['dataInicio'];
                                        $dataFim = $value['dataFim'];
                                        $dataInicioObj = new DateTime($dataInicio);
                                        $dataFimObj = new DateTime($dataFim);
                                        $intervalo = $dataInicioObj->diff($dataFimObj);
                                        $totalDias = $intervalo->days;
                                        $totalPagar = $totalDias * $preco;
                                        echo ' <tr>
                                                            <td>' . $cod . '</td>
                                                            <td>' . $preco . '</td>
                                                            <td>' . $dataInicio . '</td>
                                                            <td>' . $dataFim . '</td>
                                                            <td>' . $totalPagar . '</td>
                                                        </tr>';
                                    }
                                }
                                ?>
                            </table>
                            <button type="submit" class="btn btn-warning col-12" name="inserirLista">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="verSolicitacaoModal" tabindex="-1" aria-labelledby="verSolicitacaoModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="mt-3 text-center">
                        <button type="button" class="close px-4" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="alterarEmailModalLabel">Solicitações</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <table id="listarDados" class="table border border-primary">
                                <tr>
                                    <th scope="col">Cod</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Data Inicio</th>
                                    <th scope="col">Data Fim</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Gestor</th>
                                    <th scope="col">Estado Pedido</th>
                                </tr>
                                <?php
                                $clienteController = new ClienteController();
                                $outdoors = $clienteController->consultarSolicitacoes($usuario->getId());

                                foreach ($outdoors as $cada) {
                                    ?>
                                    <tr>
                                        <td><?php echo $cada->getId(); ?></td>
                                        <td><?php echo $cada->getIdOutdoor() ?></td>
                                        <td><?php echo $cada->getDatainicio(); ?></td>
                                        <td><?php echo $cada->getDataFim(); ?></td>
                                        <td><?php echo $cada->getTotalPagar(); ?></td>
                                        <td><?php echo $cada->getIdGestor(); ?></td>
                                        <td><span class="status ativo"><i class="fas fa-circle"></i> <?php echo $cada->getEstadoPedido(); ?></span></td>
                                        <td><button class="btn btn-secondary" id="abrirModalSecundario">Abrir Modal Secundário</button></td>
                                    </tr>
                                    <tr>
                                    <?php } ?>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para adicionar recibo -->
        <div class="modal fade" id="modalAddRecibo" tabindex="-1" aria-labelledby="modalAddReciboLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="reciboFile" class="form-label">Selecione o arquivo do recibo:</label>
                                <input type="file" class="form-control" id="reciboFile" accept=".pdf">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" id="btnSalvarRecibo">Salvar</button>
                    </div>
                </div>
            </div>
        </div>



        <?php
    }
    $this->OutdoorController->showOutdoors();
    include 'footer.php';
    