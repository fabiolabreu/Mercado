<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
	<title>Produtos</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
</head>
<body>
	<div class="container">
	<p class="text-success"><?= $this->session->flashdata("success"); ?></p>
	<p class="text-danger"><?= $this->session->flashdata("danger"); ?></p>
		<h1>Produtos</h1>
		<table class="table table-striped table-bordered table-hover">
			<tbody>
				<tr>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Preço</th>
				</tr>
			</tbody>
			<?php foreach ($produtos as $produto):?>
				<tr>
					<td><?= $produto['nome'] ?></td>
					<td><?= $produto['descricao'] ?></td>
					<td><?= numeroEmReais($produto['preco']) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<?php if($this->session->userdata("usuario_logado")) : ?>
			<?= anchor('login/logout','Logout', array("class" => "btn btn-primary"))?>
		<?php else:?>
		<h1>Login</h1>
		<?php
				echo form_open("login/autenticar");
							
				echo form_label("Email","email");
				echo form_input(array(
					"name" => "email",
					"id" => "email",
					"class" => "form-control",
					"maxlenght" => "255"
				));
				
				echo form_label("Senha","senha");
				echo form_password(array(
					"name" => "senha",
					"id" => "senha",
					"class" => "form-control",
					"maxlenght" => "255"
				));
				
				echo form_button(array(
					"class"=> "btn btn-primary",
					"content"=> "Login",
					"type"=> "submit"
				));
				
				echo  form_close();
			
		?>
		<h1>Cadastro</h1>
		<?php 
				echo form_open("usuarios/novo");
				
				echo form_label("Nome","nome");
				echo form_input(array(
					"name" => "nome",
					"id" => "nome",
					"class" => "form-control",
					"maxlenght" => "255"
				));
				
				echo form_label("Email","email");
				echo form_input(array(
					"name" => "email",
					"id" => "email",
					"class" => "form-control",
					"maxlenght" => "255"
				));
				
				echo form_label("Senha","senha");
				echo form_password(array(
					"name" => "senha",
					"id" => "senha",
					"class" => "form-control",
					"maxlenght" => "255"
				));
				
				echo form_button(array(
					"class"=> "btn btn-primary",
					"content"=> "Cadastrar",
					"type"=> "submit"
				));
				
				echo form_close();
			endif;
			
		?>
	</div>
</body>
</html>