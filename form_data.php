<?php
include 'libreria.php';

$ruc = $_GET['ruc'];
$nombrepadre = ucfirst(mb_strtolower(trim($_GET['nombrepadre']), 'UTF-8'));
$idpadre = $_GET['idpadre'];
$nombrehijo = ucfirst(mb_strtolower(trim($_GET['nombrehijo']), 'UTF-8'));
$idhijo = $_GET['idhijo'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos generales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<div class="row">
    <div class="col-12 col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="validar.php" method="post">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="card-title bg-muted text-warning" align="center">
                                <th colspan="2">DATOS GENERALES</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th style="width: 60%">RUC</th>
                                <th><?=$ruc?></th>
                            </tr>
                            <tr>
                                <th>Nombre de la carpeta opcion</th>
                                <th><?=$nombrepadre?></th>
                            </tr>
                            <tr>
                                <th>ID de la carpeta opcion</th>
                                <th><?=$idpadre?></th>
                            </tr>

                            <tr>
                                <th>Nombre de la carpeta hijo</th>
                                <th><?=$nombrehijo?></th>
                            </tr>

                            <tr>
                                <th>ID de la carpeta hijo</th>
                                <th><?=$idhijo?></th>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


</html>