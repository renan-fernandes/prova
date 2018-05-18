<?php

$data = array(
		'titulo' => $_POST["titulo_edit"],
		'descricao' => $_POST["descricao_edit"],
		'prioridade' => $_POST["prioridade_edit"]
);

$url = 'localhost/api/tarefas/'.$_POST["id_edit"];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);

/* echo "<pre>";
var_dump($response);
echo "</pre>";   */ 
 
header('Location: cliente.php');
exit;   