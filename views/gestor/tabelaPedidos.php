<div class="card">
    <div class="card-body">
        <div class="card-title text-center m-3">
            <h2>Outdoors Solicitações</h2>
        </div>
        <a href="index.php?op=Gestor&&request=verPedidos&&estado=all" class="btn btn-primary btn-sm mt-1 mb-2"  role="button">Todos</a>
        <a href="index.php?op=Gestor&&request=verPedidos&&estado=A aguardar pagamento" class="btn btn-primary btn-sm mt-1 mb-2"  role="button">A aguardar pagamento</a>
        <a href="index.php?op=Gestor&&request=verPedidos&&estado=Por Validar Pagamento" class="btn btn-primary btn-sm mt-1 mb-2"  role="button">Por Validar Pagamento</a>
        <table id="listarDados" class="table border border-primary ">
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
            if (isset($_SESSION['Usuario'])) {
                $usuario = unserialize($_SESSION['Usuario']);
            }
            foreach ($outdoors as $cada) {
                if ($usuario->getUsername() != $cada->getIdGestor()) {
                    if ($action2 == $cada->getEstadoOutdoor()) {
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
                                <?php
                                if ($cada->getEstadoOutdoor() == "Por Validar Pagamento") {
                                    echo '<input type="hidden" name="pdf" id="pdf" value="' . $cada->getRecibo() . '" />
                                          <input type="hidden" name="idSelecionadoPedidoOutdoor" id="idSelecionadoPedidoOutdoor" value="' . $cada->getId() . '" />
                                          <button id="verRecibo" class="btn btn-secondary btn-sm verRecibo">Ver</button>
                                    ';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    } else if ($action2 == "all") {
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
                                <?php
                                if ($cada->getEstadoOutdoor() == "Por Validar Pagamento") {
                                    echo '<input type="hidden" name="pdf" id="pdf" value="' . $cada->getRecibo() . '" />
                                          <input type="hidden" name="idSelecionadoPedidoOutdoor" id="idSelecionadoPedidoOutdoor" value="' . $cada->getId() . '" />
                                          <button id="verRecibo" class="btn btn-secondary btn-sm verRecibo">Ver</button>
                                    ';
                                }
                                ?>
                            </td>
                        </tr> <?php
                    }
                }
            }
            ?>
        </table>
        <button type="button" class="btn btn-primary mt-1" id="nextButton">Ver mais...</button>
    </div>
</div>
<?php
?>
<div class="modal fade" id="modalRecibo" tabindex="-1" aria-labelledby="modalReciboLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg h-100">
        <div class="modal-content">
            <div class="modal-body text-center " id="iframeReciboVer">
                <input type="hidden" id='mostrarId' name="mostrarId"/>
                <iframe id="iframeRecibo" width="100%" height="500px" frameborder="0"></iframe>
                <button id = "aprovar" class = "btn btn-primary btn-sm">Aprovar Pedido</button>
                <button id = "reprovar" class = "btn btn-danger btn-sm">Reprovar Pedido</button>
            </div>
        </div>
    </div>
</div>

