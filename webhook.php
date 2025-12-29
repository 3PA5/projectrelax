<?php
$payload = file_get_contents("php://input");
$data = json_decode($payload, true);

$logs = json_decode(file_get_contents("logs.json"), true);

$logs[] = [
    "repo" => $data["repository"]["name"],
    "message" => $data["head_commit"]["message"],
    "date" => date("Y-m-d H:i:s")
];

file_put_contents("logs.json", json_encode($logs, JSON_PRETTY_PRINT));

echo "OK";
?>
