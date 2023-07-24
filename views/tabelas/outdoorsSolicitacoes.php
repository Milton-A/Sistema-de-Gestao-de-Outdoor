<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2>Outdoors Solicitações</h2>
        </div>
        <table id="listarDados" class="table border border-primary">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data Inicio</th>
                <th scope="col">Data Fim</th>
                <th scope="col">Total</th>
                <th scope="col">Gestor</th>
                <th scope="col">Estado Pedido</th>
                <th scope="col">Estado Outdoor</th>
                <th scope="col"></th>
            </tr>
            <?php
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
                    <td><span class="status ativo"><i class="fas fa-circle"></i> <?php echo $cada->getEstadoOutdoor(); ?></span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" id="alterarGestor">Alterar Gestor</button>
                    </td>
                </tr>
                <tr>
                <?php } ?>
        </table>
        <button type="button" class="btn btn-primary mt-1" id="nextButton">Ver mais...</button>
    </div>
</div>
<div class="modal fade" id="alterarGestorModal" tabindex="-1" aria-labelledby="alterarEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alterarEmailModalLabel">Gestor</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="novoEmail">Novo Id Gestor</label>
                        <input type="hidden" id='mostrarId' name="mostrarId"/>
                        <input type="number" class="form-control" id="novoId" name="novoId" placeholder="Insira o id do Gestor" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="enviarId" name="enviarId">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>