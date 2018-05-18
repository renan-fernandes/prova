<?php

$connection = mysqli_connect('localhost', 'root', '', 'prova');

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method)
{
	case 'GET':
		if(!empty($_GET["id"]))
		{
			$id = intval($_GET["id"]);
			get_tarefas($id);
		}
		else
		{
			get_tarefas();
		}
		break;
	case 'POST':
		set_tarefa();
		break;
	case 'PUT':
		$id = intval($_GET["id"]);
		atualiza_tarefa($id);
		break;
	case 'DELETE':
		$id = intval($_GET["id"]);
		exclui_tarefa($id);
		break;
	default:
		header("HTTP/1.0 405 Method Not Allowed");
		break;
}

function get_tarefas($id = 0)
{
	global $connection;
	$query = "SELECT * FROM tarefas";
	if($id != 0)
	{
		$query .= " WHERE id=".$id." LIMIT 1";
	} else {
		$query .= " ORDER BY prioridade DESC";
	}
	$response = array();
	$result = mysqli_query($connection, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$response[] = $row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function set_tarefa()
{
	global $connection;
	$titulo = $_POST["titulo"];
	$descricao = $_POST["descricao"];
	$prioridade = $_POST["prioridade"];
	$query = "INSERT INTO tarefas SET titulo='{$titulo}', descricao='{$descricao}', prioridade={$prioridade}";
	if (mysqli_query($connection, $query))
	{
		$response = array(
			'status' => 1,
			'status_message' =>'Tarefa adicionada com sucesso.'
		);
	}
	else
	{
		$response = array(
			'status' => 0,
			'status_message' =>'Adição de tarefa falhou.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function atualiza_tarefa($id)
{
	global $connection;
	parse_str(html_entity_decode(file_get_contents("php://input")), $post_vars);
    $titulo = $post_vars["titulo"];
	$descricao = $post_vars["descricao"];
	$prioridade = $post_vars["prioridade"];
	$query = "UPDATE tarefas SET titulo='{$titulo}', descricao='{$descricao}', prioridade={$prioridade} WHERE id=".$id;
	
    if (mysqli_query($connection, $query))
	{
		$response = array(
			'status' => 1,
			'status_message' =>'Tarefa atualizada com sucesso.'
		);
	}
	else
	{
		$response = array(
			'status' => 0,
			'status_message' =>'Falha na atualização de tarefa.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response); 
}

function exclui_tarefa($id)
{
	global $connection;
	$query = "DELETE FROM tarefas WHERE id=".$id;
	if (mysqli_query($connection, $query))
	{
		$response = array(
			'status' => 1,
			'status_message' =>'Tarefa excluída com sucesso.'
		);
	}
	else
	{
		$response = array(
			'status' => 0,
			'status_message' =>'Falha na exclusão da tarefa.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}
