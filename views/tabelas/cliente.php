
<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2>Usuarios Registrados</h2>
        </div>

        <table id="listarDados" class="table border border-primary">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Nome Completo</th>
                <th scope="col">Email</th>
                <th scope="col">Estado</th>
                <th scope="col">Comuna</th>
                <th scope="col"></th>
            </tr>
            <?php
            foreach ($clientes as $cada) {
                ?>
                <tr>
                    <td><?php echo $cada->getId(); ?></td>
                    <td><?php echo $cada->getNomeCompleto(); ?></td>
                    <td><?php echo $cada->getEmail(); ?></td>
                    <td><?php echo $cada->getComuna(); ?></td>
                    <td><span class="status
                        <?php
                        if ($cada->getEstado() === 'Off') {
                            echo 'off';
                        } else if ($cada->getEstado() === 'bloqueado') {
                            echo 'bloquado';
                        } else if ($cada->getEstado() === 'ativo') {
                            echo 'ativo';
                        }
                        ?>"><i class="fas fa-circle"></i> <?php echo $cada->getEstado(); ?></span>
                    </td>
                    <td>
                        <?php if ($cada->getEstado() === "Off") { ?>
                            <button class="btn btn-success  btn-sm" id="ativar">Ativar</button>
                        <?php } else if ($cada->getEstado() === "ativo") { ?>
                            <button class="btn btn-danger  btn-sm" id="bloquear">Bloquear</button>
                        <?php } else if ($cada->getEstado() === "bloqueado") { ?>
                            <button class="btn btn-warning btn-sm" id="desbloquear">Desbloquear</button>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                <?php } ?>
        </table>
        <button type="button" class="btn btn-primary mt-1" id="nextButton">Ver mais...</button>
    </div>
</div>