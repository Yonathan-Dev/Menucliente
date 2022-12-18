<?php
$ruc = '10457406784';
$nombrepadre = 'INFORMACIÓN PROYECTADA';
$nombrehijo = 'FLUJO DE CAJA PROYECTADO';

include 'api-google/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=administrararchivos-2e8675ef9e97.json');

$client = new Google_Client();

$client->useApplicationDefaultCredentials();
$client->setScopes(['https://www.googleapis.com/auth/drive']);

$service = new Google_Service_Drive($client);

$optParams = array(
    'q' => "name='$ruc'",
    'pageSize' => 10,
    'fields' => "files(id, name, size)",
);

$resultado = $service->files->listFiles(
    $optParams
);

if(count($resultado)>0){
    $optParams = array(
        'pageSize' => 10,
        'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
        'q' => " '" . $resultado[0]->id . "'  in parents",
    );

    $resultado = $service->files->listFiles(
        $optParams
    );

    foreach ($resultado as $data) {
        if ($data->name == $nombrepadre) {
            $optParams = array(
                'pageSize' => 10,
                'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                'q' => "'" . $data->id . "' in parents",
            );
    
            $resultado = $service->files->listFiles(
                $optParams
            );
    
            foreach ($resultado as $data) {
                if ($data->name == $nombrehijo) {
                    $optParams = array(
                        'pageSize' => 10,
                        'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                        'q' => "'" . $data->id . "' in parents",
                    );
    
                    $resultado = $service->files->listFiles(
                        $optParams
                    );
                    var_dump(count($resultado));
                    return count($resultado);
                }
            }
        }
    }
}
var_dump(0);
return 0;


/*echo "ACa<br>";

$end_time = microtime(true);
$duration = $end_time - $start_time;
$hours = (int) ($duration / 60 / 60);
$minutes = (int) ($duration / 60) - $hours * 60;
$seconds = (int) $duration - $hours * 60 * 60 - $minutes * 60;
echo "Tiempo empleado para cargar esta pagina: <strong>" . $hours . ' horas, ' . $minutes . ' minutos y ' . $seconds . ' segundos.</strong>';*/

//lOgica n° 1
/*$ruc = $ruc;
    $nombrepadre = $nombrepadre;
    $nombrehijo = $nombrehijo;

    include 'api-google/vendor/autoload.php';
    
    putenv('GOOGLE_APPLICATION_CREDENTIALS=administrararchivos-2e8675ef9e97.json');

    $client = new Google_Client();

    $client->useApplicationDefaultCredentials();
    $client->setScopes(['https://www.googleapis.com/auth/drive']);

    $service = new Google_Service_Drive($client);

    $optParams = array(
        'q' => "mimeType='application/vnd.google-apps.folder' ",
    );

    $resultado = $service->files->listFiles(
        $optParams
    );
    
    foreach ($resultado as $file) {
        if ($file->name == $ruc) {
            $optParams = array(
                'pageSize' => 10,
                'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                'q' => "'" . $file->id . "' in parents",
            );

            $resultado = $service->files->listFiles(
                $optParams
            );

            foreach ($resultado as $file) {
                if ($file->name == $nombrepadre) {
                    $optParams = array(
                        'pageSize' => 10,
                        'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                        'q' => "'" . $file->id . "' in parents",
                    );

                    $resultado = $service->files->listFiles(
                        $optParams
                    );

                    foreach ($resultado as $file) {
                        if ($file->name == $nombrehijo) {
                            $optParams = array(
                                'pageSize' => 10,
                                'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                                'q' => "'" . $file->id . "' in parents",
                            );

                            $resultado = $service->files->listFiles(
                                $optParams
                            );

                            return count($resultado);
                        }
                    }
                }
            }
        }
    }
    return 0;*/