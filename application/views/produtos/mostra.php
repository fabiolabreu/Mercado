<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produto - <?= $produto['nome']?></title>
    <link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
</head>
<body>
	<div class="container">
	<h1>Nome: <?= $produto['nome']?></h1>
	<p>Descrição: <?= auto_typography(html_escape($produto['descricao']))?></p>
	<p>Preço: <?= $produto['preco']?></p>
	</div>
</body>
</html>