<?php
function drive($ruc, $nombrepadre, $nombrehijo)
{

    include 'api-google/vendor/autoload.php';
    $ruc = $ruc;
    $nombrepadre = $nombrepadre;
    $nombrehijo = $nombrehijo;

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
    return 0;

}
