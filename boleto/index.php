
<?php
/**
include_once($_SERVER["DOCUMENT_ROOT"].'\static\c.php');
	$db							=	mysql_connect ($host, $login_db, $senha_db);
	$basedados					=	mysql_select_db($database);
**/
	if (isset($_POST['boleto_id']))
	{
	
	

/**

		$select_boleto			=	'SELECT * FROM `cob_boleto` WHERE `id` = '."'".$_POST['boleto_id']."'";
		$boleto_info			=	mysql_fetch_array(mysql_query($select_boleto,$db));


		$sql_cedente			=	mysql_query('SELECT * FROM `cob_cedente` WHERE `id` = '.$boleto_info['cedente_id'],$db);
		$cedente				=	mysql_fetch_array($sql_cedente);

		$sql_pessoa				=	mysql_query('SELECT * FROM `pessoa` WHERE `id` = '.$boleto_info['aluno_id'],$db);
		$pessoa					=	mysql_fetch_array($sql_pessoa);
**/
		include_once($_SERVER["DOCUMENT_ROOT"].'\pages\aluno\financeiro\boleto\class.boleto.php');
	
		$boleto	= new GeraBoleto();
		



		echo $boleto->print_Boleto($dadosboleto);
/**
		
		
		$dadosboleto["nosso_numero"] 				=	$boleto_info['nosso_numero'];  // Nosso numero sem o DV - REGRA: Máximo de 11 caracteres!
		$dadosboleto["numero_documento"] 			=	$dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
		$dadosboleto["data_vencimento"] 			=	date('d/m/Y', strtotime($boleto_info['vencimento']));// Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
		$dadosboleto["fator_vencimento"] 			=	$GeraBoleto->fator_vencimento($dadosboleto["data_vencimento"]);
		$dadosboleto["data_documento"] 				=	date("d/m/Y"); // Data de emissão do Boleto
		$dadosboleto["data_processamento"]			=	date("d/m/Y"); // Data de processamento do boleto (opcional)
		$dadosboleto["valor_boleto"] 				=	number_format(($boleto_info['valor_titulo']/100), 2, ',', '');
		$dadosboleto["cpf"] 						=	$pessoa['cpf'];
		$dadosboleto["sacado"] 						=	$pessoa['nome'];
		$dadosboleto["endereco1"] 					=	$pessoa['logradouro'].' - '.$pessoa['numero'];
		$dadosboleto["endereco2"] 					=	$pessoa['cidade'].$pessoa['uf'].$pessoa['cep'];
		$dadosboleto["instrucoes0"]					=	"<b>SR(A) CAIXA,</b>";
		$dadosboleto["instrucoes1"]					=	"- Cobrar multa de R$ 2,00 e juros de R$ 0,83 ao dia após o vencimento.";
		$dadosboleto["instrucoes2"]					=	"- Dar desconto de R$ 50,00 até o vencimento.";
		$dadosboleto["instrucoes3"]					=	"Receber somente dinheiro no pagamento. Não receber 60 dias após o vencimento.";
		$dadosboleto["instrucoes4"]					=	"MATRIC: 18080812. ANTONIO RAPHAEL MENDES RODRIGUES. CPF: 022.668.753-88. Mens JUN/18";
		$dadosboleto["instrucoes5"]					=	"ARARENDA-CE - ENF [T02819] 2018-II.";
		$dadosboleto["instrucoes6"]					=	"SACADO: ANTONIO RAPHAEL MENDES RODRIGUES. CPF: 022.668.753-88.";
		$dadosboleto["instrucoes7"]					=	"RUA ERIVALDO MOURAO FILHO, SN. CENTRO.";
		$dadosboleto["instrucoes8"]					=	"LIVRAMENTO - CE. CEP: 62230-000. FONE: (88) 99422-5890";
		$dadosboleto["quantidade"]					=	"001";
		$dadosboleto["moeda"]						=	"9";
		$dadosboleto["valor_unitario"]				=	$dadosboleto["valor_boleto"];
		$dadosboleto["aceite"]						=	"N";
		$dadosboleto["especie"]						=	"R$";
		$dadosboleto["especie_doc"]					=	"DS";
		$dadosboleto["banco_id"]					=	'237';
		$dadosboleto["codigo_banco_com_dv"] 		=	$GeraBoleto->geraCodigoBanco($dadosboleto["banco_id"]);
		$dadosboleto["agencia"]						=	'1234';
		$dadosboleto["agencia_dv"]					=	'3';
		$dadosboleto["conta_cedente"]				=	'090733';
		$dadosboleto["conta_cedente_dv"] 			=	'2';
		$dadosboleto["carteira"] 					=	'09';
		$dadosboleto["identificacao"] 				=	"ICED";
		$dadosboleto["cpf_cnpj"] 					=	"12.716.813/000161";
		$dadosboleto["endereco"]					=	"Avenida Duque de Caxias - 2125";
		$dadosboleto["cidade_uf"]					=	"Fortaleza - Ceará";
		$dadosboleto["cedente"]						=	"ICED - INSTITUTO CEARENSE DE EDUCAÇÃO";


$dadosboleto["digito_verificador_barra"] = $GeraBoleto->digitoVerificador_barra(
	$dadosboleto["banco_id"].
	$dadosboleto["moeda"].
	$dadosboleto["fator_vencimento"].
	$GeraBoleto->formata_numero($dadosboleto["valor_boleto"],10,0,"valor").
	$dadosboleto["agencia"].
	$GeraBoleto->formata_numero($dadosboleto["carteira"],2,0).$GeraBoleto->formata_numero($dadosboleto["nosso_numero"],11,0).
	$GeraBoleto->formata_numero($dadosboleto["conta_cedente"],7,0).'0', 9, 0);

$dadosboleto["codigo_barras"] = 
	$dadosboleto["banco_id"].
	$dadosboleto["moeda"].
	$dadosboleto["digito_verificador_barra"].
	$dadosboleto["fator_vencimento"].
	$GeraBoleto->formata_numero($dadosboleto["valor_boleto"],10,0,"valor").
	$dadosboleto["agencia"].
	$GeraBoleto->formata_numero($dadosboleto["carteira"],2,0).$GeraBoleto->formata_numero($dadosboleto["nosso_numero"],11,0). //$nnum
	$GeraBoleto->formata_numero($dadosboleto["conta_cedente"],7,0).
	"0";
		
$dadosboleto["linha_digitavel"] = $GeraBoleto->monta_linha_digitavel($dadosboleto["codigo_barras"]);
		
$dadosboleto["agencia_codigo_cedente"] = 
	$dadosboleto["agencia"]."-".
	$dadosboleto["agencia_dv"]." / ".
	$GeraBoleto->formata_numero($dadosboleto["conta_cedente"],7,0)."-". 
	$GeraBoleto->formata_numero($dadosboleto["conta_cedente_dv"],1,0);
		
$dadosboleto["nosso_numero_com_digito"] = 
	$dadosboleto["carteira"].'/'.
	$dadosboleto["nosso_numero"]
	.'-'.$GeraBoleto->digitoVerificador_nossonumero($GeraBoleto->formata_numero($dadosboleto["carteira"],2,0).$GeraBoleto->formata_numero($dadosboleto["nosso_numero"],11,0));

**/
//foreach ($dadosboleto as $key => $value) 
	//echo "private $".$key.' = "'.$value.'";<br>';
		
		//include("include/layout_bradesco.php");

	}
?>
