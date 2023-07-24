<?php
include_once 'header.php';
if ($logado) {
    if (isset($_SESSION['Cliente']))
        $cliente = unserialize($_SESSION['Cliente']);
    if (isset($_SESSION['Usuario']))
        $usuario = unserialize($_SESSION['Usuario']);
}
?>
<title>Registro</title>
</head>
<body>
    <main>
        <div class="container mt-5 " >
            <div class="row">
                <div class="row">
                    <a href="<?php
                    if ($logado && $usuario->getTipo() == "Administrador") {
                        echo "index.php?op=Administrador&&request=verGestores";
                    } else
                        echo "index.php";
                    ?>"
                       class="col-12 p-4">
                        <span class="material-symbols-outlined">
                            close
                        </span>
                    </a>
                </div>
                <div class="col row justify-content-center">
                    <div class="row p-4">
                        <a href="index.php" class="logo d-flex align-items-center w-auto">
                            <span class="d-none d-lg-block">XPTO Solutions</span>
                        </a>
                    </div>
                    <div class=" row container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="card card-register mb-3 " style="width: 700px; height: 100%;">
                                    <div class="card-body ">
                                        <h5 class="card-title text-center fs-4 mb-3">Criar uma conta</h5>
                                        <p class="card-text text-center small">Insira os dados pessoais</p>
                                        <form method="post" class="d-flex flex-column mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Nome</label>
                                                <input type="text" class="form-control" name="nome" placeholder="Nome" <?php
                                                if ($logado && $usuario->getTipo() != "Administrador") {
                                                    echo ' value="'. $cliente->getNomeCompleto().'"';
                                                }
                                                ?>>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email" value="<?php if ($logado && $usuario->getTipo() != "Administrador")  echo $cliente->getEmail(); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirmar Email</label>
                                                <input type="email" class="form-control" name="confirmarEmail" id="confirmarEmailInput" placeholder="Confirmar Email" value="<?php if ($logado && $usuario->getTipo() != "Administrador")  echo $cliente->getEmail(); ?>">
                                                <small id="emailMismatchMessage" class="text-danger d-none">Os endereços de email não correspondem</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Telefone</label>
                                                <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php if ($logado && $usuario->getTipo() != "Administrador")  echo $cliente->getTelemovel(); ?>">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="form-label">Morada</label>
                                                <input type="text" class="form-control" name="morada" placeholder="rua 5, casa S Nº 25, maianga" value="<?php if ($logado && $usuario->getTipo() != "Administrador")  echo $cliente->getMorada(); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nacionalidade</label>
                                                <input type="text" class="form-control" name="nacionalidade" placeholder="Nacionalidade" value="<?php if ($logado && $usuario->getTipo() != "Administrador")  echo $cliente->getNacionalidade(); ?>">
                                            </div>
                                            <div class="form-group d-flex justify-content-between">
                                                <?php
                                                $provincia = new ProvinciaController();
                                                $provincia->showProvincias();
                                                ?>
                                                <div class="form-group">
                                                    <label class="form-label">Municipio</label>
                                                    <select class="form-control" name="Municipio" id="Municipio">
                                                        <option>Selecione um Municipio</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Comuna</label>
                                                    <select class="form-control" name="Comuna" id="Comuna">
                                                        <option>Selecione uma Comuna</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <hr>
                                            <?php
                                            if ($logado) {
                                                if ($usuario->getTipo() == "Gestor") {
                                                    ?>
                                                    <div class="form-group d-flex justify-content-between">
                                                        <div class="form-group w-50">
                                                            <label for="inputState" class="form-label">Tipo Cliente</label>
                                                            <select class="form-control" name="tipoCliente" id="tipoClienteSelect">
                                                                <option>Particular</option>
                                                                <option>Empresa</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group w-50 px-4" id="divAtividadeEmpresa">
                                                            <label class="form-label">Actividade Empresa</label>
                                                            <input type="text" class="form-control" name="atividadeEmpresa">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="form-group d-flex justify-content-between">
                                                    <div class="form-group w-50">
                                                        <label for="inputState" class="form-label">Tipo Cliente</label>
                                                        <select class="form-control" name="tipoCliente" id="tipoClienteSelect">
                                                            <option>Particular</option>
                                                            <option>Empresa</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group w-50 px-4" id="divAtividadeEmpresa">
                                                        <label class="form-label">Actividade Empresa</label>
                                                        <input type="text" class="form-control" name="atividadeEmpresa">
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php }
                                            ?>
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="userName" placeholder="Username" value="<?php if ($logado && $usuario->getTipo() != "Administrador") echo $usuario->getUsername(); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Senha</label>
                                                <input type="password" class="form-control" name="senha" id="senhaInput" placeholder="Senha">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirmar Senha</label>
                                                <input type="password" class="form-control" name="confirmarSenha" id="confirmarSenhaInput" placeholder="Confirmar Senha">
                                                <small id="senhaMismatchMessage" class="text-danger d-none">As senhas não correspondem</small>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary" name="btn-save">
                                                    <?php
                                                    if ($logado) {
                                                        if ($usuario->getTipo() == "Administrador") {
                                                            echo "Registrar Gestor";
                                                        } else {
                                                            echo "AlterarDados";
                                                        }
                                                    } else {
                                                        echo "Criar Conta";
                                                    }
                                                    ?>
                                                </button>
                                                <?php
                                                if ($logado) {
                                                    if ($usuario->getTipo() == "Administrador") {
                                                        echo '<input type="hidden" name="form-criarGestor-submitted" value="1" />';
                                                    } else {
                                                        echo '<input type="hidden" name="form-alterar-submitted" value="1" />';
                                                    }
                                                } else
                                                    echo '<input type="hidden" name="form-criar-submitted" value="1" />';
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/custom/js/scritpProvincia.js"></script>
    <script src="scripts/custom/js/register.js"></script>
    <?php
    include_once 'footer.php';
    