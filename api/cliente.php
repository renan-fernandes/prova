<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function excluir_tarefa(id)
	{
		id = parseInt(id, 10);
		$.ajax({
			type: "post",
			url: "curl_5.php", // consumindo o webservice para excluir
			data: "id="+id,
			success: function(result)
			{
				window.location="cliente.php";
			},
			error: function(result)
			{
				alert("Nao foi possivel excluir!");
			}
		}) 
	}
	
	function editar_tarefa(id)
	{
		$('#update').css("display", "block");
		novo_titulo = $('#ti_'+id).text();
		novo_descricao = $('#de_'+id).text();
		novo_prioridade = $('#pr_'+id).text();
		
		$("#titulo_edit").val(novo_titulo);
		$("#descricao_edit").val(novo_descricao);
		$("#prioridade_edit").val(novo_prioridade);
		$("#id_edit").val(id);	
	}
	
	function cancelar_edicao()
	{
		$("#titulo_edit").val('');
		$("#descricao_edit").val('');
		$("#prioridade_edit").val('');
		$("#id_edit").val('');	
		$('#update').css("display", "none");
	}

</script>
<title>Controle de Tarefas</title>
<style type="text/css">
	h1
	{
		font-family:calibri;
	}
	input
	{
		border-style:groove;
	}
	#table
	{
		line-height:25px;
		border-collapse: collapse;
		width: 100%;
	}
	#inserir
	{
		line-height:25px;
		border: none;
		width: 100%;
	}
	#inserir td, th
	{
		text-align: left;
		font-family:sans-serif;
		border: none;
	}
	td, th
	{
		text-align: center;
		font-family:sans-serif;
		border: 1px solid #ddd;
	}	
	.excluir
	{
		background-color:#FF6347;
		color:#FFF;
	}
	.editar
	{
		background-color:#1E90FF;
		color:#FFF;
	}
	label
	{
		color:#FF6347;
	}
	#cabecalho
	{
		width:100%;
		height:100px;
		padding-top:1px;
		text-align:center;
		background-color:#aed3e4;
		color:white;
		text-shadow: 0 0 6px black;
	}
		
</style>
</head>
<body>
<div style="display:flex;">
	<div style="width:10%;">
	</div>
	<div style="width:80%;">
		<div id="cabecalho">
		<h1>Sistema para controle de tarefas</h1>
		</div>
		<br>

		<table id="table" name="table">
		<tr>
			<th style="width:30px;">Id</th>
			<th style="width:100px;">Prioridade</th>
			<th>T&iacute;tulo</th>
			<th>Descri&ccedil;&atilde;o</th>
			<th>A&ccedil;&otilde;es</th>
		</tr>
		<?php
			// consumindo o webservice para consultar
			$url = 'localhost/api/tarefas';
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HTTPGET, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response_json = curl_exec($ch);
			curl_close($ch);
			$response = json_decode($response_json, true);
			
		?>
		<form id="dados" name="dados">
		<?php
			
		foreach($response as $res)
		{
			?>
			<tr rowspan="10">
				<td id="id_<?php echo $res["id"]?>"><?php echo $res["id"]?></td>
				<td id="pr_<?php echo $res["id"]?>"><?php echo $res["prioridade"]?></td>
				<td id="ti_<?php echo $res["id"]?>"><?php echo utf8_encode($res["titulo"])?></td>
				<td id="de_<?php echo $res["id"]?>"><?php echo utf8_encode($res["descricao"])?></td>
				<td style="width:120px;"><input type="button" class="excluir" value="Excluir" onclick="excluir_tarefa(<?php echo $res["id"]?>)"></input>
					<input type="button" class="editar" value="Editar" onclick="editar_tarefa(<?php echo $res["id"]?>)"></input></td>
			</tr>			
		<?php
		} 
		?> 
		</form>
		</table>
		
		<br>
		<br>
		
		<div id="update" style="display:none;">
		<h1>Editar tarefa:</h1>
		<table id="inserir" name="inserir">
			<form id="form_edit" name="form_edit" action="curl_4.php" method="post"> <!-- consumindo o webservice para editar -->
			<tr style="vertical-align:top;">
			<td>T&iacute;tulo:</td>
			<td><textarea id="titulo_edit" name="titulo_edit" style="resize:none;width:400px;height:40px;"></textarea></td>
			</tr>		
			<td>Descri&ccedil;&atilde;o:</td>
			<td><textarea id="descricao_edit" name="descricao_edit" style="resize:none;width:400px;height:120px;"></textarea></td>
			</tr>	
			<tr style="vertical-align:top;">
			<td>Prioridade (deve ser num&eacute;rico entre 1 e 5):</td>
			<td><textarea id="prioridade_edit" name="prioridade_edit" style="resize:none;width:400px;height:40px;"></textarea></td>
			</tr><tr style="vertical-align:top;">
			<td></td>
			<input type="hidden" id="id_edit" name="id_edit"></input>
			<td><input id="cancel" name="cancel" type="button" style="" class="excluir" value="Cancelar Edi&ccedil&atilde;o" onclick="cancelar_edicao()"></input>
				<input id="submit" name="submit" type="submit" style=""></input></td>
			</tr>	
			</form>
		</table>
		</div>
		
		<br>
		<br>
		
		<h1>Inserir tarefa:</h1>
		<table id="inserir" name="inserir">
			<form id="form" name="form" action="curl_3.php" method="post"> <!-- consumindo o webservice para inserir -->
			<tr style="vertical-align:top;">
			<td>T&iacute;tulo:</td>
			<td><textarea id="titulo" name="titulo" style="resize:none;width:400px;height:40px;"></textarea></td>
			</tr>		
			<td>Descri&ccedil;&atilde;o:</td>
			<td><textarea id="descricao" name="descricao" style="resize:none;width:400px;height:120px;"></textarea></td>
			</tr>	
			<tr style="vertical-align:top;">
			<td>Prioridade (deve ser num&eacute;rico entre 1 e 5):</td>
			<td><textarea id="prioridade" name="prioridade" style="resize:none;width:400px;height:40px;"></textarea></td>
			</tr><tr style="vertical-align:top;">
			<td></td>
			<td><input id="submit" name="submit" type="submit" style=""></input></td>
			</tr>	
			</form>
		</table>
	
	</div>
	<div style="width:10%;">
	</div>	
</div>
</body>
</html>