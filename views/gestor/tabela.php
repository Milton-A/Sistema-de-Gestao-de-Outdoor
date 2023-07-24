<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2>Outdoors Registrados</h2>
        </div>
        <a href="index.php?op=Gestor&&request&&estado=all" class="btn btn-primary mt-1 mb-2"  role="button">Todos</a>
        <a href="index.php?op=Gestor&&request&&estado=Disponivel" class="btn btn-primary mt-1 mb-2"  role="button">Disponível</a>
        <a href="index.php?op=Gestor&&request&&estado=A aguardar pagamento" class="btn btn-primary mt-1 mb-2"  role="button">A aguardar pagamento</a>
        <a href="index.php?op=Gestor&&request&&estado=Por Validar Pagamento" class="btn btn-primary mt-1 mb-2"  role="button">Por Validar Pagamento</a>
        <a href="index.php?op=Gestor&&request&&estado=Ocupado" class="btn btn-primary mt-1 mb-2"  role="button">Ocupado</a>
        <table id="listarDados" class="table border border-primary">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Tipo</th>
                <th scope="col">Comuna</th>
                <th scope="col">Estado</th>
                <th scope="col">Preco</th>
                <th scope="col">Gestor</th>
            </tr>
            <?php
            if (isset($_SESSION['Usuario'])) {
                $usuario = unserialize($_SESSION['Usuario']);
            }
            foreach ($outdoors as $cada) {
                if ($usuario->getUsername() == $cada->getIdGestor()) {
                    $apresentar = '<tr>
                    <td>' . $cada->getId() . '</td>
                    <td>' . $cada->getTipo() . '</td>
                    <td>' . $cada->getComuna() . '</td>
                    <td><span class="status ativo"><i class="fas fa-circle"></i>' . $cada->getEstado() . '</span></td>
                    <td>' . $cada->getPreco() . '</td>
                    <td>' . $cada->getIdGestor() . '</td>
                    <td>
                        <button class="btn btn-danger btn-sm" id="eliminar">Eliminar</button>
                        <a class="btn btn-primary btn-sm" href="index.php?op=Gestor&&request=addOutdoor&&idO=' . $cada->getId() . '&&tipo=' . $cada->getTipo() . '&&preco=' . $cada->getPreco() . '">Alterar</a>
                    </td>
                </tr>
                <tr>';
                    if ($action2 == $cada->getEstado()) {
                        echo $apresentar;
                    } else if ($action2 == "all") {
                        echo $apresentar;
                    }
                }
            }
            ?>
        </table>
        <button type="button" class="btn btn-primary mt-1" id="nextButton">Ver mais...</button>
    </div>

</div>