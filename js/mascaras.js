$(document).ready(function () {
	$('#telefone').mask('(00) 00000-0000');
	$('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#cnpj').mask('00.000.000/0000-00');

    $('#telefone_perfil').mask('(00) 00000-0000');
    $('#cpf_perfil').mask('000.000.000-00');
    $('#whatsapp_sistema').mask('(00) 00000-0000');
    $('#telefone_fixo').mask('(00) 0000-0000');
    $('#telefone_sistema').mask('(00) 00000-0000');

     $('#telefone_rodape').mask('(00) 00000-0000');
     $('#troco').mask('#.##0,00', {reverse: true});
});

