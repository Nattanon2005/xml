<?php
header("Content-Type: application/json; charset=UTF-8");

$resource_id = "585e5552-8ecf-445c-be16-a97140018169";
$api_key = "LYe0UNFr8mzyF9QW3IoPvPFYtcrSEn56";

$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;

$url = "https://opendata.data.go.th/get-ckan/datastore_search?resource_id=$resource_id&limit=$limit";

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTPHEADER => [
        "api-key: $api_key"
    ]
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
    echo json_encode(["error"=>$error]);
} else {
    echo $response;
}
?>