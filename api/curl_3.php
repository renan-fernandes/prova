<?php

$data = array(
		'titulo' => $_POST["titulo"],
		'descricao' => $_POST["descricao"],
		'prioridade' => $_POST["prioridade"],
);

$url = 'localhost/api/tarefas';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

/* echo "<pre>";
var_dump($response);
echo "</pre>"; */

header('Location: cliente.php');
exit;