<?php


if (@$cargos == 'ocultar') {
	echo "<script>window.location='index'</script>";
	exit();
}
$pag = 'cargos';
?>

<div class="breadcrumb-header justify-content-between">
	<div class="left-content mt-2">
		<a class="btn ripple btn-primary text-white" onclick="inserir()" type="button"><i class="fe fe-plus me-1"></i>
			Adicionar <?php echo ucfirst($pag); ?></a>



		<a class="btn btn-danger" href="#" onclick="deletarSel()" title="Excluir" id="btn-deletar" style="display:none"><i class="fe fe-trash-2"></i> Deletar</a>

	</div>

</div>


<div class="row row-sm">
	<div class="col-lg-12">
		<div class="card custom-card">
			<div class="card-body" id="listar">

			</div>
		</div>
	</div>
</div>

<input type="hidden" id="ids">

<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h4 class="modal-title" id="exampleModalLabel"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span
						class="text-white" aria-hidden="true">&times;</span></button>
			</div>
			<form id="form">
				<div class="modal-body">



					<div class="row needs-validation was-validated">
						<div class="col-md-8 mb-2">
							<label>Cargo</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Ex. Faxineiro" required>
						</div>

						<div class="col-md-4" style="margin-top: 25px">
							<button id="btn_salvar" type="submit" class="btn btn-primary">Salvar<i
									class="fa fa-check ms-2"></i></button>
						</div>


					</div>


					<input type="hidden" class="form-control" id="id" name="id">

					<br>
					<small>
						<div id="mensagem" align="center"></div>
					</small>
				</div>

			</form>
		</div>
	</div>
</div>





<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>
<script src="js/ajax.js"></script>