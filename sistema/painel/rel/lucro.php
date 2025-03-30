<?php
include('../../conexao.php');
include('data_formatada.php');

$token_rel = @$_GET['token'];
if ($token_rel != 'M543664') {
	echo '<script>window.location="../../"</script>';
	exit();
}

$dataInicial = $_GET['dataInicial'];
$dataFinal = $_GET['dataFinal'];

$dataInicialF = implode('/', array_reverse(@explode('-', $dataInicial)));
$dataFinalF = implode('/', array_reverse(@explode('-', $dataFinal)));

$datas = "";
if ($dataInicial == $dataFinal) {
	$datas = $dataInicialF;
} else {
	$datas = $dataInicialF . ' à ' . $dataFinalF;
}

$texto_filtro = "PERÍODO DA APURAÇÃO : " . $datas;



?>
<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	<style>
		@import url('https://fonts.cdnfonts.com/css/tw-cen-mt-condensed');

		@page {
			margin: 145px 20px 25px 20px;
		}

		#header {
			position: fixed;
			left: 0px;
			top: -110px;
			bottom: 100px;
			right: 0px;
			height: 35px;
			text-align: center;
			padding-bottom: 100px;
		}

		#content {
			margin-top: 0px;
		}

		#footer {
			position: fixed;
			left: 0px;
			bottom: -60px;
			right: 0px;
			height: 80px;
		}

		#footer .page:after {
			content: counter(page, my-sec-counter);
		}

		body {
			font-family: 'Tw Cen MT', sans-serif;
		}

		.marca {
			position: fixed;
			left: 50;
			top: 100;
			width: 80%;
			opacity: 10%;
		}

		.titulo_cab {
			color: #0340a3;
			font-size: 20px;
		}



		.titulo {
			margin: 0;
			font-size: 28px;
			font-family: TimesNewRoman, Geneva, sans-serif;
			color: #6e6d6d;

		}

		.subtitulo {
			margin: 0;
			font-size: 12px;
			font-family: TimesNewRoman, Geneva, sans-serif;
			color: #6e6d6d;
		}



		hr {
			margin: 8px;
			padding: 0px;
		}



		.area-cab {

			display: block;
			width: 100%;
			height: 10px;

		}


		.coluna {
			margin: 0px;
			float: left;
			height: 30px;
		}

		.area-tab {

			display: block;
			width: 100%;
			height: 30px;

		}


		.imagem {
			width: 150px;
			position: absolute;
			right: 20px;
			top: 10px;
		}

		.titulo_img {
			position: absolute;
			margin-top: 10px;
			margin-left: 10px;

		}

		.data_img {
			position: absolute;
			margin-top: 40px;
			margin-left: 10px;
			border-bottom: 1px solid #000;
			font-size: 10px;
		}

		.endereco {
			position: absolute;
			margin-top: 50px;
			margin-left: 10px;
			border-bottom: 1px solid #000;
			font-size: 10px;
		}

		.verde {
			color: green;
		}



		table.borda {
			border-collapse: collapse;
			/* CSS2 */
			background: #FFF;
			font-size: 12px;
			vertical-align: middle;
		}

		table.borda td {
			border: 1px solid #dbdbdb;
		}

		table.borda th {
			border: 1px solid #dbdbdb;
			background: #ededed;
			font-size: 13px;
		}
	</style>

</head>

<body>
	<?php
	if ($marca_dagua == 'Sim' and $tipo_rel != 'HTML') { ?>
		<img class="marca" src="<?php echo $url_sistema ?>sistema/img/logo.jpg">
	<?php } ?>


	<div id="header">

		<div style="border-style: solid; font-size: 10px; height: 65px;">
			<table style="width: 100%; border: 0px solid #ccc;">
				<tr>
					<td style="border: 1px; solid #000; width: 25%; text-align: left;">
						<img style="margin-top: 0px; margin-left: 7px;" id="imag"
							src="<?php echo $url_sistema ?>sistema/img/logo.jpg" width="60%">
					</td>

					<td style="text-align: center; font-size: 10px; width: 40%;">

						<b><?php echo mb_strtoupper($nome_sistema) ?></b><br>
						<b>CNPJ: </b><?php echo mb_strtoupper($cnpj_sistema) ?><br>
						<b>INSTAGRAM:</b> <?php echo mb_strtoupper($instagram_sistema) ?><br>
						<?php echo mb_strtoupper($endereco_sistema) ?>

					</td>
					<td style="width: 38%; text-align: right; font-size: 9px;padding-right: 10px;">
						<b><big>DEMONSTRATIVO DE LUCRO</big></b><br> <?php echo mb_strtoupper($texto_filtro) ?> <br> <?php echo mb_strtoupper($data_hoje) ?>
					</td>
				</tr>
			</table>
		</div>

		<br>



	</div>

	<div id="footer" class="row">
		<hr style="margin-bottom: 0;">
		<table style="width:100%;">
			<tr style="width:100%;">
				<td style="width:60%; font-size: 10px; text-align: left;"><?php echo $nome_sistema ?> Telefone: <?php echo $telefone_sistema ?></td>
				<td style="width:40%; font-size: 10px; text-align: right;">
					<p class="page">Página </p>
				</td>
			</tr>
		</table>
	</div>

	<?php


	$total_receber = 0;
	$total_pagar = 0;
	$total_compras = 0;

	$total_entradas = 0;
	$total_saidas = 0;

	$saldo_total = 0;

	?>

	<div id="content" style="margin-top: 0;">

		<table class="table table-striped borda" cellpadding="6">
			<thead>
				<tr align="center" style="text-align: center">


					<th scope="col" colspan="2">Recebimentos</th>
					<th scope="col">Despesas</th>
					<th scope="col">Compras</th>


				</tr>
			</thead>
			<tbody>

				<?php






				//totalizar contas recebidas
				$query = $pdo->query("SELECT * FROM receber where data_pgto >= '$dataInicial' and data_pgto <= '$dataFinal' and pago = 'Sim' ORDER BY data_pgto asc");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				$total_reg = @count($res);
				for ($i = 0; $i < $total_reg; $i++) {
					foreach ($res[$i] as $key => $value) {
					}

					$total_receber += $res[$i]['valor'];
				}





				//totalizar contas despesas
				$query = $pdo->query("SELECT * FROM pagar where data_pgto >= '$dataInicial' and data_pgto <= '$dataFinal' and referencia = 'Conta' and pago = 'Sim' ORDER BY data_pgto asc");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				$total_reg = @count($res);
				for ($i = 0; $i < $total_reg; $i++) {
					foreach ($res[$i] as $key => $value) {
					}

					$total_pagar += $res[$i]['valor'];
				}




				//totalizar contas compras
				$query = $pdo->query("SELECT * FROM pagar where data_pgto >= '$dataInicial' and data_pgto <= '$dataFinal' and referencia = 'Compra' and pago = 'Sim' ORDER BY data_pgto asc");
				$res = $query->fetchAll(PDO::FETCH_ASSOC);
				$total_reg = @count($res);
				for ($i = 0; $i < $total_reg; $i++) {
					foreach ($res[$i] as $key => $value) {
					}

					$total_compras += $res[$i]['valor'];
				}




				$total_receberF = number_format($total_receber, 2, ',', '.');
				$total_pagarF = number_format($total_pagar, 2, ',', '.');
				$total_comprasF = number_format($total_compras, 2, ',', '.');


				$total_entradas =  $total_receber;
				$total_saidas = $total_pagar + $total_compras;

				$total_entradasF = number_format($total_entradas, 2, ',', '.');
				$total_saidasF = number_format($total_saidas, 2, ',', '.');

				$saldo_total = $total_entradas - $total_saidas;

				$saldo_totalF = number_format($saldo_total, 2, ',', '.');

				if ($saldo_total < 0) {
					$classe_saldo = 'text-danger';
					$classe_img = 'negativo.jpg';
				} else {
					$classe_saldo = 'text-success';
					$classe_img = 'positivo.jpg';
				}

				?>

				<tr align="center" class="">



					<td class="text-success" colspan="2">R$ <?php echo $total_receberF ?></td>
					<td class="text-danger">R$ <?php echo $total_pagarF ?></td>
					<td class="text-danger">R$ <?php echo $total_comprasF ?></td>

				</tr>


				<tr align="center" class="">
					<td style="background: #e6ffe8" colspan="2" scope="col">Total de Entradas / Ganhos</td>
					<td style="background: #ffe7e6" colspan="2" scope="col">Total de Saídas / Despesas</td>
				</tr>

				<tr align="center" class="">
					<td colspan="2" class="text-success"> R$ <?php echo $total_entradasF ?></td>
					<td colspan="2" class="text-danger"> R$ <?php echo $total_saidasF ?></td>
				</tr>

			</tbody>
		</table>
	</div>



	<div class="col-md-12 p-2">
		<div class="" align="center" style="margin-right: 20px">

			<img src="<?php echo $url_sistema ?>/img/<?php echo $classe_img ?>" width="100px">
			<span class="<?php echo $classe_saldo ?>">R$ <?php echo $saldo_totalF ?></span>


		</div>
	</div>



	</div>


</body>

</html>