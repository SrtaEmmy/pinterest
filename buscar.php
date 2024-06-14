<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['busqueda'])) {

    $busqueda = urlencode($_GET['busqueda']);

    // configurar solicitud API
    $access_key = "qWD2wg-WqcMpnyidsafDGb0PpvxmNxlM8XX1LwW7bPc";
    $url = "https://api.unsplash.com/search/photos?query=$busqueda";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: Client-ID $access_key"));

    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_status === 200) {
        $data = json_decode($response, true);
    } else {
        // $message = "error llamando API: $http_status";   //PENDIENTE DE ARREGLAR
        // echo json_encode($message);
    }

    echo json_encode($data['results']);
}


?>


