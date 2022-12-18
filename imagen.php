<?php
function imagen($nombrepadre)
{

    switch ($nombrepadre) {
        case "INFORMACIÓN BÁSICA":
            $ruta = "imagenes/informacionbasica.ico";
            break;
        case "INFORMACIÓN FINANCIERA":
            $ruta = "imagenes/informacionfinanciera.ico";
            break;
        case "INFORMACIÓN PROYECTADA":
            $ruta = "imagenes/informacionproyectada.ico";
            break;
        case "INFORMACIÓN DE SUSTENTO":
            $ruta = "imagenes/informacionsustento.ico";
            break;
        case "INFORMACIÓN DE DEUDA":
            $ruta = "imagenes/informaciondeuda.png";
            break;
        case "INFORMACIÓN GARANTÍA":
            $ruta = "imagenes/informaciongarantia.ico";
            break;
        case "INFORMACIÓN DE MERCADO":
            $ruta = "imagenes/informacionmercado.ico";
            break;
        case "INFORMES RIESGO PAÍS":
            $ruta = "imagenes/informesriesgopais.ico";
            break;
        case "INFORMACIÓN PFI":
            $ruta = "imagenes/informacionpfi.ico";
            break;
        default:
            $ruta = "";
            break;
    }
    return $ruta;
}
