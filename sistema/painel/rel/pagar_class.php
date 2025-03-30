<?php 
@session_start();
$id_usuario = @$_SESSION['id'];

require_once("../../conexao.php");



$dataInicial = $_POST['dataInicial'];
$dataFinal = $_POST['dataFinal'];
$pago = $_POST['pago'];
$tipo_data = $_POST['tipo_data'];



$html = file_get_contents($url_sistema."painel/rel/pagar.php?dataInicial=$dataInicial&dataFinal=$dataFinal&pago=$pago&tipo_data=$tipo_data&id_usuario=$id_usuario");



//CARREGAR DOMPDF
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

header("Content-Transfer-Encoding: binary");
header("Content-Type: image/png");

//INICIALIZAR A CLASSE DO DOMPDF
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$pdf = new DOMPDF($options);


//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html($html);

//RENDERIZAR O PDF
$pdf->render();
//NOMEAR O PDF GERADO


$pdf->stream(
	'contas_pagar.pdf',
	array("Attachment" => false)
);

