<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2>Outdoors Registrados</h2>
        </div>
        <table id="listarDados" class="table border border-primary">
            <tr>
                <th scope="col">Cod</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data Inicio</th>
                <th scope="col">Data Fim</th>
                <th scope="col">Total</th>
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