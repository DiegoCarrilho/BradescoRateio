<?php




class GeraBoleto
{

	private $nosso_numero				=	"03800000733";
	private $numero_documento			=	"03800000733";
	private $data_vencimento			=	"01/08/2018";
	private $fator_vencimento			=	"7603";
	private $data_documento				=	"11/06/2018";
	private $data_processamento			=	"11/06/2018";
	private $valor_boleto				=	"220,00";
	private $cpf						=	"04488021395";
	private $sacado						=	"MARIA VERLANDIA TORRES ARAUJO";
	private $endereco1					=	"JOAO ALMEIDA FILHO - 30";
	private $endereco2					=	"ARARENDA-CE 662210-000";
	private $instrucoes0				=	"<b>SR(A) CAIXA,</b>";
	private $instrucoes1				=	"- Cobrar multa de R$ 2,00 e juros de R$ 0,83 ao dia após o vencimento.";
	private $instrucoes2				=	"- Dar desconto de R$ 50,00 até o vencimento.";
	private $instrucoes3				=	"Receber somente dinheiro no pagamento. Não receber 60 dias após o vencimento.";
	private $instrucoes4				=	"MATRIC: 18080812. ANTONIO RAPHAEL MENDES RODRIGUES. CPF: 022.668.753-88. Mens JUN/18";
	private $instrucoes5				=	"ARARENDA-CE - ENF [T02819] 2018-II.";
	private $instrucoes6				=	"SACADO: ANTONIO RAPHAEL MENDES RODRIGUES. CPF: 022.668.753-88.";
	private $instrucoes7				=	"RUA ERIVALDO MOURAO FILHO, SN. CENTRO.";
	private $instrucoes8				=	"LIVRAMENTO - CE. CEP: 62230-000. FONE: (88) 99422-5890";
	private $quantidade					=	"001";
	private $moeda						=	"9";
	private $valor_unitario				=	"220,00";
	private $aceite						=	"N";
	private $especie					=	"R$";
	private $especie_doc				=	"DS";
	private $banco_id					=	"237";
	private $codigo_banco_com_dv		=	"237-2";
	private $agencia					=	"1234";
	private $agencia_dv					=	"3";
	private $conta_cedente				=	"090733";
	private $conta_cedente_dv			=	"2";
	private $carteira					=	"09";
	private $identificacao				=	"ICED";
	private $cpf_cnpj					=	"12.716.813/000161";
	private $endereco					=	"Avenida Duque de Caxias - 2125";
	private $cidade_uf					=	"Fortaleza - Ceará";
	private $cedente					=	"ICED - INSTITUTO CEARENSE DE EDUCAÇÃO";
	private $digito_verificador_barra	=	"6";
	private $codigo_barras				=	"23796760300000220001234090380000073300907330";
	private $linha_digitavel			=	"23791.23405 90380.000076 33009.073306 6 76030000022000";
	private $agencia_codigo_cedente		=	"1234-3 / 0090733-2";
	private $nosso_numero_com_digito	=	"09/03800000733-1";
	
	public function get_nosso_numero()				{return $this->nosso_numero;}
	public function get_numero_documento()			{return $this->numero_documento;}
	public function get_data_vencimento()			{return $this->data_vencimento;}
	public function get_fator_vencimento()			{return $this->fator_vencimento;}
	public function get_data_documento()			{return $this->data_documento;}
	public function get_data_processamento()		{return $this->data_processamento;}
	public function get_valor_boleto()				{return $this->valor_boleto;}
	public function get_cpf()						{return $this->cpf;}
	public function get_sacado()					{return $this->sacado;}
	public function get_endereco1()					{return $this->endereco1;}
	public function get_endereco2()					{return $this->endereco2;}
	public function get_instrucoes0()				{return $this->instrucoes0;}
	public function get_instrucoes1()				{return $this->instrucoes1;}
	public function get_instrucoes2()				{return $this->instrucoes2;}
	public function get_instrucoes3()				{return $this->instrucoes3;}
	public function get_instrucoes4()				{return $this->instrucoes4;}
	public function get_instrucoes5()				{return $this->instrucoes5;}
	public function get_instrucoes6()				{return $this->instrucoes6;}
	public function get_instrucoes7()				{return $this->instrucoes7;}
	public function get_instrucoes8()				{return $this->instrucoes8;}
	public function get_quantidade()				{return $this->quantidade;}
	public function get_moeda()						{return $this->moeda;}
	public function get_valor_unitario()			{return $this->valor_unitario;}
	public function get_aceite()					{return $this->aceite;}
	public function get_especie()					{return $this->especie;}
	public function get_especie_doc()				{return $this->especie_doc;}
	public function get_banco_id()					{return $this->banco_id;}
	public function get_codigo_banco_com_dv()		{return $this->codigo_banco_com_dv;}
	public function get_agencia()					{return $this->agencia;}
	public function get_agencia_dv()				{return $this->agencia_dv;}
	public function get_conta_cedente()				{return $this->conta_cedente;}
	public function get_conta_cedente_dv()			{return $this->conta_cedente_dv;}
	public function get_carteira()					{return $this->carteira;}
	public function get_identificacao()				{return $this->identificacao;}
	public function get_cpf_cnpj()					{return $this->cpf_cnpj;}
	public function get_endereco()					{return $this->endereco;}
	public function get_cidade_uf()					{return $this->cidade_uf;}
	public function get_cedente()					{return $this->cedente;}
	public function get_digito_verificador_barra()	{return $this->digito_verificador_barra;}
	public function get_codigo_barras()				{return $this->codigo_barras;}
	public function get_linha_digitavel()			{return $this->linha_digitavel;}
	public function get_agencia_codigo_cedente()	{return $this->agencia_codigo_cedente;}
	public function get_nosso_numero_com_digito()	{return $this->nosso_numero_com_digito;}



	public function modulo_10($num) 
	{ 
		$numtotal10 = 0;
		$fator = 2;
		for ($i = strlen($num); $i > 0; $i--) 
		{
				$numeros[$i] = substr($num,$i-1,1);
				$temp = $numeros[$i] * $fator; 
				$temp0=0;
				foreach (preg_split('//',$temp,-1,PREG_SPLIT_NO_EMPTY) as $k=>$v) 
					$temp0+=$v; 
				$parcial10[$i] = $temp0;
				$numtotal10 += $parcial10[$i];
				if ($fator == 2) 
				{
					$fator = 1;
				} else 
					$fator = 2;
		}
		$resto = $numtotal10 % 10;
		$digito = 10 - $resto;
		if ($resto == 0) 
			$digito = 0;

		return $digito;
	}

	public function modulo_11($num, $base=9, $r=0)  {

		$soma = 0;
		$fator = 2;

		for ($i = strlen($num); $i > 0; $i--) 
		{
			$numeros[$i] = substr($num,$i-1,1);

			$parcial[$i] = $numeros[$i] * $fator;

			$soma += $parcial[$i];
			if ($fator == $base)
				$fator = 1;

			$fator++;
		}

		if ($r == 0) 
		{
			$soma *= 10;
			$digito = $soma % 11;
			if ($digito == 10)
				$digito = 0;

			return $digito;
		} 
		else
			if ($r == 1)
			{
				$resto = $soma % 11;
				return $resto;
			}
	}
	

	public function esquerda($entra,$comp)
	{
		return substr($entra,0,$comp);
	}

	public function direita($entra,$comp)
	{
		return substr($entra,strlen($entra)-$comp,$comp);
	}

	public function fator_vencimento($data) 
	{
		$data = explode("/",$data);
		$ano = $data[2];
		$mes = $data[1];
		$dia = $data[0];
		return(abs(($this->_dateToDays("1997","10","07")) - ($this->_dateToDays($ano, $mes, $dia))));
	}

	public function _dateToDays($year,$month,$day) 
	{
		$century = substr($year, 0, 2);
		$year = substr($year, 2, 2);
		if ($month > 2) {
			$month -= 3;
		} else {
			$month += 9;
			if ($year) {
				$year--;
			} else {
				$year = 99;
				$century --;
			}
		}
		
		return ( floor((  146097 * $century)    /  4 ) +
				floor(( 1461 * $year)        /  4 ) +
				floor(( 153 * $month +  2) /  5 ) +
					$day +  1721119);
	}

	public function formata_numero($numero,$loop,$insert,$tipo = "geral") {
		if ($tipo == "geral") 
		{
			$numero = str_replace(",","",$numero);
			while(strlen($numero)<$loop)
				$numero = $insert . $numero;

		}
		if ($tipo == "valor") 
		{
			/*	retira as virgulas formata o numero preenche com zeros	*/
			$numero = str_replace(",","",$numero);
			while(strlen($numero)<$loop)
				$numero = $insert . $numero;
		}
		if ($tipo == "convenio") 
			while(strlen($numero)<$loop)
				$numero = $numero . $insert;
		return $numero;
	}

	public function digitoVerificador_nossonumero($numero) 
	{
		$resto2 = $this->modulo_11($numero, 7, 1);
		$digito = 11 - $resto2;
		if ($digito == 10) 
		{
			$dv = "P";
		} 
		else
			if($digito == 11) 
			{
				$dv = 0;
			} else
				$dv = $digito;
		return $dv;
	}


	public function digitoVerificador_barra($numero) {
		$resto2 = $this->modulo_11($numero, 9, 1);
		 if ($resto2 == 0 || $resto2 == 1 || $resto2 == 10) {
			$dv = 1;
		 } else
			$dv = 11 - $resto2;
		 return $dv;
	}

	public function monta_linha_digitavel($codigo) 
	{
			$p1 = substr($codigo, 0, 4);							// Numero do banco + Carteira
			$p2 = substr($codigo, 19, 5);						// 5 primeiras posições do campo livre
			$p3 = $this->modulo_10("$p1$p2");						// Digito do campo 1
			$p4 = "$p1$p2$p3";								// União
			$campo1 = substr($p4, 0, 5).'.'.substr($p4, 5);

			$p1 = substr($codigo, 24, 10);						//Posições de 6 a 15 do campo livre
			$p2 = $this->modulo_10($p1);								//Digito do campo 2	
			$p3 = "$p1$p2";
			$campo2 = substr($p3, 0, 5).'.'.substr($p3, 5);

			$p1 = substr($codigo, 34, 10);						//Posições de 16 a 25 do campo livre
			$p2 = $this->modulo_10($p1);								//Digito do Campo 3
			$p3 = "$p1$p2";
			$campo3 = substr($p3, 0, 5).'.'.substr($p3, 5);

			$campo4 = substr($codigo, 4, 1);

			$p1 = substr($codigo, 5, 4);
			$p2 = substr($codigo, 9, 10);
			$campo5 = "$p1$p2";

			return "$campo1 $campo2 $campo3 $campo4 $campo5"; 
	}

	public function geraCodigoBanco($numero) 
	{
		$parte1 = substr($numero, 0, 3);
		$parte2 = $this->modulo_11($parte1);
		return $parte1 . "-" . $parte2;
	}
	
	public function fbarcode($valor)
	{
		$barra		=	'';
		$fino		=	1 ;
		$largo		=	3 ;
		$altura		=	50 ;

		$barcodes[0] = "00110" ;
		$barcodes[1] = "10001" ;
		$barcodes[2] = "01001" ;
		$barcodes[3] = "11000" ;
		$barcodes[4] = "00101" ;
		$barcodes[5] = "10100" ;
		$barcodes[6] = "01100" ;
		$barcodes[7] = "00011" ;
		$barcodes[8] = "10010" ;
		$barcodes[9] = "01010" ;
		for($f1=9;$f1>=0;$f1--)
			for($f2=9;$f2>=0;$f2--)
			{  
				$f = ($f1 * 10) + $f2 ;
				$texto = "" ;
				for($i=1;$i<6;$i++) 
					$texto .=  substr($barcodes[$f1],($i-1),1) . substr($barcodes[$f2],($i-1),1);
					$barcodes[$f] = $texto;
			}


		$barra = 	'<img src="imagens/p.png" width="1" height="50" border="0"><img '.
					'src="imagens/b.png" width="1" height="50" border="0"><img  '.
					'src="imagens/p.png" width="1" height="50" border="0"><img  '.
					'src="imagens/b.png" width="1" height="50" border="0"><img  ';


		$texto = $valor ;

		if((strlen($texto) % 2) <> 0) $texto = "0".$texto;

		// Draw dos dados
		while (strlen($texto) > 0) 
		{
		  $i = round($this->esquerda($texto,2));
		  $texto = $this->direita($texto,strlen($texto)-2);
		  $f = $barcodes[$i];

		  for($i=1;$i<11;$i+=2)
			  $barra	.=	'src="imagens/p.png" width="'.((substr($f,($i-1),1) == "0")? $fino : $largo).'" height="50" border="0"><img '.
							'src="imagens/b.png" width="'.((substr($f,$i,1) 	== "0")? $fino : $largo).'" height="50" border="0"><img ';

		}

		$barra	.=	'src="imagens/p.png" width="3" height="50" border=0><img '.
					'src="imagens/b.png" width="1" height="50" border=0><img '.
					'src="imagens/p.png" width="1" height="50" border=0>';

		return $barra;

	}

	public function print_Boleto($dadosboleto)
	{
		
		$dadosboleto["nosso_numero"]				=$boleto->get_nosso_numero();
		$dadosboleto["numero_documento"]			=$boleto->get_numero_documento();
		$dadosboleto["data_vencimento"]				=$boleto->get_data_vencimento();
		$dadosboleto["fator_vencimento"]			=$boleto->get_fator_vencimento();
		$dadosboleto["data_documento"]				=$boleto->get_data_documento();
		$dadosboleto["data_processamento"]			=$boleto->get_data_processamento();
		$dadosboleto["valor_boleto"]				=$boleto->get_valor_boleto();
		$dadosboleto["cpf"]							=$boleto->get_cpf();
		$dadosboleto["sacado"]						=$boleto->get_sacado();
		$dadosboleto["endereco1"]					=$boleto->get_endereco1();
		$dadosboleto["endereco2"]					=$boleto->get_endereco2();
		$dadosboleto["instrucoes0"]					=$boleto->get_instrucoes0();
		$dadosboleto["instrucoes1"]					=$boleto->get_instrucoes1();
		$dadosboleto["instrucoes2"]					=$boleto->get_instrucoes2();
		$dadosboleto["instrucoes3"]					=$boleto->get_instrucoes3();
		$dadosboleto["instrucoes4"]					=$boleto->get_instrucoes4();
		$dadosboleto["instrucoes5"]					=$boleto->get_instrucoes5();
		$dadosboleto["instrucoes6"]					=$boleto->get_instrucoes6();
		$dadosboleto["instrucoes7"]					=$boleto->get_instrucoes7();
		$dadosboleto["instrucoes8"]					=$boleto->get_instrucoes8();
		$dadosboleto["quantidade"]					=$boleto->get_quantidade();
		$dadosboleto["moeda"]						=$boleto->get_moeda();
		$dadosboleto["valor_unitario"]				=$boleto->get_valor_unitario();
		$dadosboleto["aceite"]						=$boleto->get_aceite();
		$dadosboleto["especie"]						=$boleto->get_especie();
		$dadosboleto["especie_doc"]					=$boleto->get_especie_doc();
		$dadosboleto["banco_id"]					=$boleto->get_banco_id();
		$dadosboleto["codigo_banco_com_dv"]			=$boleto->get_codigo_banco_com_dv();
		$dadosboleto["agencia"]						=$boleto->get_agencia();
		$dadosboleto["agencia_dv"]					=$boleto->get_agencia_dv();
		$dadosboleto["conta_cedente"]				=$boleto->get_conta_cedente();
		$dadosboleto["conta_cedente_dv"]			=$boleto->get_conta_cedente_dv();
		$dadosboleto["carteira"]					=$boleto->get_carteira();
		$dadosboleto["identificacao"]				=$boleto->get_identificacao();
		$dadosboleto["cpf_cnpj"]					=$boleto->get_cpf_cnpj();
		$dadosboleto["endereco"]					=$boleto->get_endereco();
		$dadosboleto["cidade_uf"]					=$boleto->get_cidade_uf();
		$dadosboleto["cedente"]						=$boleto->get_cedente();
		$dadosboleto["digito_verificador_barra"]	=$boleto->get_digito_verificador_barra();
		$dadosboleto["codigo_barras"]				=$boleto->get_codigo_barras();
		$dadosboleto["linha_digitavel"]				=$boleto->get_linha_digitavel();
		$dadosboleto["agencia_codigo_cedente"]		=$boleto->get_agencia_codigo_cedente();		
		$dadosboleto["nosso_numero_com_digito"]		=$boleto->get_nosso_numero_com_digito();
		
	$pagina	=	'
<HTML>
<head>
<TITLE>'.$dadosboleto["identificacao"].'</TITLE>
<META http-equiv=Content-Type content=text/html charset=utf-8>
<meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licença GPL" />
<style type="text/css">
<!--.cp {  font: 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 14px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 10px Arial; COLOR: black }
<!--.bc { font: bold 19px Arial; color: #000000 }
<!--.ld2 { font: bold 11px Arial; color: #000000 }
<!-- h1 {font: 23px Arial, Tahoma, Sans-Serif;}
--></style>

</head>

<body text="#000000" bgColor="#ffffff" topMargin="0">

<table style="margin: 0px;" cellpadding=0 width=666 border=0>
	<tbody>
		<tr>
			<td class="cp" width="150"><span class="campo"><img src="imagens/logobradesco.jpg" width="150" height="40" border="0"></span></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="cpt" width="58" valign="bottom"><div align="center"><font class="bc">'.$dadosboleto["codigo_banco_com_dv"].'</font></div></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="ld" width="453" valign="bottom" align="right"><span class="ld"><span class="campotitulo">'.$dadosboleto["linha_digitavel"].'</span></span></td>
		</tr>
		<tr>
			<td colspan="5"><img height="2" src=imagens/2.png width="666" border="0"></td>
		</tr>
	</tbody>
</table>




<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="298" valign="top" height="13">Cedente</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="126" valign="top" height="13">Agência/Código do Cedente</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="87" valign="top" height="13">Dt. vencimento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="126" valign="top" height="13">Nosso número</td>
		</tr>

		<tr>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="298" valign="top" height="12"><span class="campo">'.$dadosboleto["cedente"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="126" valign="top" height="12"><span class="campo">'.$dadosboleto["agencia_codigo_cedente"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="87" valign="top" height="12"><span class="campo">'.$dadosboleto["data_vencimento"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="126" valign="top" height="12" align="right"><span class="campo">'.$dadosboleto["nosso_numero_com_digito"].'</span></td>
		</tr>

		<tr>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="298" valign="top" height="1"><img src="imagens/2.png" width="298" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="126" valign="top" height="1"><img src="imagens/2.png" width="126" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="34" valign="top" height="1"><img src="imagens/2.png" width="87" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="120" valign="top" height="1"><img src="imagens/2.png" width="126" height="1" border="0"></td>
		</tr>

	</tbody>
</table>




<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>

		<tr>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="80" valign="top" height="13">Valor documento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="140" valign="top" height="13">(-) Desconto / Abatimentos</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="120" valign="top" height="13">(-) Outras deduções</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="80" valign="top" height="13">(+) Mora / Multa</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="100" valign="top" height="13">(+) Outros acréscimos</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="123" valign="top" height="13">(=) Valor cobrado</td>
		</tr>
 
		<tr>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="80" valign="top" height="12" align="left"><span class="campo">'.$dadosboleto["valor_boleto"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="140" valign="top" height="12" align="right"></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="120" valign="top" height="12" align="right"></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="80" valign="top" height="12" align="right"></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="100" valign="top" height="12" align="right"></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="123" valign="top" height="12" align="right"></td>
		</tr>

		<tr>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="80" valign="top" height="1"><img src="imagens/2.png" width="80" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="140" valign="top" height="1"><img src="imagens/2.png" width="140" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="120" valign="top" height="1"><img src="imagens/2.png" width="120" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="80" valign="top" height="1"><img src="imagens/2.png" width="80" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="100" valign="top" height="1"><img src="imagens/2.png" width="100" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="123" valign="top" height="1"><img src="imagens/2.png" width="103" height="1" border="0"></td>
		</tr>

	</tbody>
</table>

<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	 
		<tr>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="552" valign="top" height="13">Sacado: <b>MATRIC.:</b>18080812 - '.$dadosboleto["sacado"].'. CPF: '.$dadosboleto["cpf"].'. </td>
		</tr>
		 
		<tr>
			<td class="cp" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="cp" width="552" valign="top" height="13">ARARENDA-CE - ENF [T02819] 2018-1I. Mens JUN/18</td>
		</tr>

	</tbody>
</table>

<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="ct" width="7" height="12"></td><td class="ct" width="554"></td>
			<td class="ct" width="7" height="12"></td><td class="ct" width="98">Autenticação no verso</td>
		</tr>
	</tbody>
</table>


<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="ct" width="666"><img src="imagens/6.png" width="665" height="1" border="0"></td>
		</tr>
	</tbody>
</table>

<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="ct" width="7" height="12"></td><td class="ct" width="554"></td>
			<td class="ct" width="7" height="12"></td><td class="ct" width="98"></td>
		</tr>
	</tbody>
</table>


<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="cp" width="150"><span class="campo"><img src="imagens/logobradesco.jpg" width="150" height="40" border="0"></span></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="cpt" width="58" valign="bottom"><div align="center"><font class="bc">'.$dadosboleto["codigo_banco_com_dv"].'</font></div></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="ld" width="453" valign="bottom" align="right"><span class="ld"><span class="campotitulo">'.$dadosboleto["linha_digitavel"].'</span></span></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td colspan="5"><img src="imagens/2.png" width="666" height="2" border="0"></td>
		</tr>
	</tbody>
</table>


<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
	<tr>
		<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.pngg" width="1" height="13" border="0"></td>
		<td class="ct" width="472" valign="top" height="13">Local de pagamento</td>
		<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
		<td class="ct" width="180" valign="top" height="13">Vencimento</td>
	</tr>
	<tr>
		<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
		<td class="cp" width="472" valign="top" height="12">Pagável preferencialmente em qualquer agência Bradesco</td>
		<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
		<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo">'.$dadosboleto["data_vencimento"].'</span></td>
	</tr>
	<tr>
		<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
		<td width="472" valign="top" height="1"><img src="imagens/2.png" width="472" height="1" border="0"></td>
		<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
		<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
	</tr>
	</tbody>
</table>



<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">

	<tbody>
		<tr>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="472" valign="top" height="13">Cedente</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="180" valign="top" height="13">Agência/Código cedente</td>
		</tr>
		<tr>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="472" valign="top" height="12"><span class="campo">'.$dadosboleto["cedente"]."-&nbsp;CNPJ: ".$dadosboleto["cpf_cnpj"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo"> '.$dadosboleto["agencia_codigo_cedente"].'</span></td>
		</tr>
		<tr>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="472" valign="top" height="1"><img src="imagens/2.png" width="472" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
		</tr>
	</tbody>
</table>


<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="113" valign="top" height="13">Data do documento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="153" valign="top" height="13">N<u>o</u> documento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="62" valign="top" height="13">Espécie doc.</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="34" valign="top" height="13">Aceite</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="82" valign="top" height="13">Dt. processamento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="180" valign="top" height="13">Nosso número</td>
		</tr>

		<tr>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="113" valign="top" height="12"><div align="left"><span class="campo">'.$dadosboleto["data_documento"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="153" valign="top" height="12"><span class="campo">'.$dadosboleto["numero_documento"].'</span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="62" valign="top" height="12"><div align="left"><span class="campo">'.$dadosboleto["especie_doc"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="34" valign="top" height="12"><div align="left"><span class="campo">'.$dadosboleto["aceite"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="82" valign="top" height="12"><div align="left"><span class="campo">'.$dadosboleto["data_processamento"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo">'.$dadosboleto["nosso_numero_com_digito"].'</span></td>
		</tr>

		<tr>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="113" valign="top" height="1"><img src="imagens/2.png" width="113" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="153" valign="top" height="1"><img src="imagens/2.png" width="153" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="62" valign="top" height="1"><img src="imagens/2.png" width="62" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="34" valign="top" height="1"><img src="imagens/2.png" width="34" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="82" valign="top" height="1"><img src="imagens/2.png" width="82" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
		</tr>
	</tbody>
</table>



<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr> 
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" colspan="3" valign="top" height="13">Uso do banco</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="83" valign="top" height="13">Carteira</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="53" valign="top" height="13">Espécie</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="123" valign="top" height="13">Quantidade</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="72" valign="top" height="13">Valor Documento</td>
			<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
			<td class="ct" width="180" valign="top" height="13">(=)Valor documento</td>
		</tr>
		<tr>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" colspan="3" valign="top" height="12"><div align="left"></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="83" valign="top"><div align="left"> <span class="campo">'.$dadosboleto["carteira"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="53" valign="top"><div align="left"><span class="campo">'.$dadosboleto["especie"].'</span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="123" valign="top"><span class="campo"></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="72" valign="top"><span class="campo"></span></td>
			<td class="cp" width="7" valign="top" height="12"> <img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo">'.$dadosboleto["valor_boleto"].'</span></td>
		</tr>
		<tr>
			<td width="7" valign="top" height="1"> <img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="75" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="31" valign="top" height="1"><img src="imagens/2.png" width="31" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="83" valign="top" height="1"><img src="imagens/2.png" width="83" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="53" valign="top" height="1"><img src="imagens/2.png" width="53" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="123" valign="top" height="1"><img src="imagens/2.png" width="123" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="72" valign="top" height="1"><img src="imagens/2.png" width="72" height="1" border="0"></td>
			<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
			<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
		</tr>
	</tbody> 
</table>

<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td width="10" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody> 
					<tr>
						<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
					</tr>
					<tr> 
						<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
					</tr>
					<tr> 
						<td width="7" valign="top" height="1"><img src="imagens/2.png" width="1" height="1" border="0"></td>
					</tr>
					</tbody>
				</table>
			</td>
			<td rowspan="5" width="468" valign="top">
				<font class="ct">Instruções (Texto de responsabilidade do cedente)<br></font>
				<span class="cp">
					<font class="campo">
					'.$dadosboleto["instrucoes0"].'<br>
					'.$dadosboleto["instrucoes1"].'<br>	
					'.$dadosboleto["instrucoes2"].'<br>	
					'.$dadosboleto["instrucoes3"].'<br>	
					'.$dadosboleto["instrucoes4"].'<br>	
					'.$dadosboleto["instrucoes5"].'<br>	
					'.$dadosboleto["instrucoes6"].'<br>	
					'.$dadosboleto["instrucoes7"].'<br>	
					'.$dadosboleto["instrucoes8"].'<br>			
					</font>
				</span>
		 	</td>

			<td width="188" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
							<td class="ct" width="180" valign="top" height="13">(-)Desconto / Abatimentos</td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
							<td class="cp" width="180" valign="top" height="12" align="right"></td>
						</tr>
						<tr> 
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
							<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td width="10" align="right"> 
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
						</tr>
						<tr>
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="1" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td width="188" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
							<td class="ct" width="180" valign="top" height="13">(-)Outras deduções</td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
							<td class="cp" width="180" valign="top" height="12" align="right"></td>
						</tr>
						<tr>
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
							<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td width="10" align="right"> 
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
						</tr>
						<tr>
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="1" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td width="188" align="right"> 
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
							<td class="ct" width="180" valign="top" height="13">(+)Mora / Multa</td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
							<td class="cp" width="180" valign="top" height="12" align="right"></td>
						</tr>
						<tr> 
							<td width="7" valign="top" height="1"> <img src="imagens/2.png" width="7" height="1" border="0"></td>
							<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td width="10" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
						<tr> 
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
						</tr>
						<tr>
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="1" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td width="188" align="right"> 
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
							<td class="ct" width="180" valign="top" height="13">(+)Outros acréscimos</td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
							<td class="cp" width="180" valign="top" height="12" align="right"></td>
						</tr>
						<tr>
							<td width="7" valign="top" height="1"><img src="imagens/2.png" width="7" height="1" border="0"></td>
							<td width="180" valign="top" height="1"><img src="imagens/2.png" width="180" height="1" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td width="10" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0" align="left">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
						</tr>
					</tbody>
				</table>
			</td>
			<td width="188" align="right">
				<table style="margin: 0px;" cellspacing="0" cellpadding="0" border="0">
					<tbody>
						<tr>
							<td class="ct" width="7" valign="top" height="13"><img src="imagens/1.png" width="1" height="13" border="0"></td>
							<td class="ct" width="180" valign="top" height="13">(=)Valor cobrado</td>
						</tr>
						<tr>
							<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
							<td class="cp" width="180" valign="top" height="12" align="right"></td>
						</tr>
					</tbody> 
				</table>
			</td>
		</tr>
	</tbody>
</table>



		<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td width="666" valign="top" height="1"><img src="imagens/2.png" width="666" height="1" border="0"></td>
				</tr>
			</tbody>
		</table>
	
		<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td class="ct" width="7" height="12"></td>
					<td class="ct" width="409"></td>
					<td class="ct" width="250"><div align="right">Autenticação no verso - <b class="cp">Ficha de Compensação</b></div></td>
				</tr>
				<tr>
					<td class="ct" colspan="3"></td>
				</tr>
			</tbody>
		</table>

		<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td valign="bottom" height="50" align="left">
						'.$this->fbarcode($dadosboleto["codigo_barras"]).' 
					</td>
				</tr>
			</tbody>
		</table>

		<table style="margin: 0px;" width="666" cellspacing="0" cellpadding="0" border="0">
			<tbody>
				<tr>
					<td class="ct" width="666"></td>
				</tr>
			</tbody>
			<tbody>
				<tr>
					<td class="ct" width="755" height="20"></td>
				</tr>
				<tr>
					<td class="ct" width="666"><div align="right"><b></b></div></td>
				</tr>
				<tr>
					<td class="ct" width="666"><img src="imagens/6.png" width="665" height="1" border="0"></td>
				</tr>
			</tbody>
		</table>

	</body>
</html>';
		
		return $pagina;
	}
	
}

?>