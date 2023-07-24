
<section class="py-5" >
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" id="cardOutdoors">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                $logado = true;
            } else {
                $logado = false;
            }
                
            foreach ($listaOutdoors as $cada):
                ?>
                <div class="col mb-5">

                    <div class="card h-100">

                        <div class="card-body p-4">
                            <div class="text-center">
                                <form method="post" enctype="multipart/form-data">
                                    
                                    <h5 class="fw-bolder"><?php echo $cada->getTipo(); ?></h5>
                                    <input type="date" name="dataInicio" id="dataInicio">
                                    <input type="date" name="dataFim" id="dataFim">
                                    <input type="file" name="imagem" id="idA" accept="image/*">
                                    <input type="file" name="recibo" id="recibo">
                                    <input type="hidden" name="idOutdoorSelecionado" value="<?php echo $cada->getId(); ?>">
                                    <input type="hidden" name="preco" value="<?php echo $cada->getPreco(); ?>">
                                    <h3>Preço <?php echo $cada->getPreco(); ?></h3>
                                    <?php if ($logado) { ?>
                                    <button type="button" class="btn btn-dark add">Adicionar a Lista</button>
                                    <?php } ?>
                                </form>

                            </div>
                        </div>
                        <?php if ($logado) { ?>
                        <?php } else { ?>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-warning mt-auto" href ="index.php?op=Cliente&&request=registro">Adicionar a lista</a></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>