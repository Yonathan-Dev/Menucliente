<?php
include 'libreria.php';
include 'drive.php';

$ruc = "10457406784";

$query = "SELECT
            iditemsistema,
            nombre
          FROM
            itemsistema
          WHERE
            idpadre = 1";
$data = consultar($query);

$query = "SELECT
            iditemsistema,
            nombre,
            idpadre
          FROM
            itemsistema
          WHERE
            idpadre IN ( SELECT
                            iditemsistema
                         FROM
                            itemsistema
                         WHERE
                            idpadre = 1)";
$data2 = consultar($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card bg-muted text-warning">
                <div class="card-header" align="center">
                    <h3 class="">Menu cliente</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php foreach ($data as $reg) {?>

        <div class="col-12 col-sm-6 mb-3 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= mb_strtoupper($reg['nombre'], 'UTF-8') ?></h5>
                    <table class="table table-striped table-bordered table-light table-hover">
                        <thead>
                            <tr>
                                <th style="width: 55%" class="text-center">Titulo</th>
                                <th class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data2 as $item) {?>

                            <?php if($item['idpadre'] == $reg['iditemsistema']) {?>
                            <tr>
                                <td>
                                    <img src="imagenes/item.png" width="20" height="20">
                                    <a
                                        href="form_data.php?ruc=<?=$ruc?>&nombrepadre=<?=$reg['nombre']?>&idpadre=<?=$reg['iditemsistema']?>&nombrehijo=<?=$item['nombre']?>&idhijo=<?=$item['iditemsistema']?>">
                                        <?= ucfirst(mb_strtolower(strtolower($item['nombre']), 'UTF-8'))  ?>
                                    </a>
                                </td>

                                <?php $cant = drive($ruc, $reg['nombre'], $item['nombre']); ?>
                                <?php if($cant > 0) {?>
                                <td>
                                    <img src="imagenes/contenido.png" width="20" height="20">
                                    Contenido disponible
                                </td>
                                <?php } else {?>
                                <td>
                                    <img src="imagenes/sincontenido.png" width="20" height="20">
                                    Sin contenido
                                </td>
                                <?php } ?>
                            </tr>
                            <?php }?>

                            <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <?php }?>
    </div>
</body>

</html>