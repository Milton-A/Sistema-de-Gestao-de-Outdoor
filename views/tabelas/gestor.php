<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2 class="">Gestores Registrados</h2>
            <a href="index.php?op=Administrador&&request=addGestor">
                <button class="btn btn-primary mt-1 d-flex">
                    <span class="material-symbols-outlined">
                        add_circle
                    </span>
                    <span>
                        Novo Gestor
                    </span>
                </button>
            </a>
        </div>

        <br>
        <table id="listarDados" class="table border border-primary">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Nome Completo</th>
                <th scope="col">Email</th>
                <th scope="col">Usename</th>
                <th scope="col">Estado</th>
            </tr>
            <?php
            foreach ($gestores as $cada) {
                ?><tr>
                    <td><?php echo $cada->getId(); ?></td>
                    <td><?php echo $cada->getNome() ?></td>
                    <td><?php echo $cada->getEmail(); ?></td>
                    <td><?php echo $cada->getIdUsuario(); ?></td>
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
                </tr>
                <tr>
                <?php } ?>
        </table>



        <button type="button" class="btn btn-primary mt-1 d-flex" id="nextButton">Ver mais...</button>
    </div>
</div>