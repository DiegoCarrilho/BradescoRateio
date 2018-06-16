<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<HTML>
<head>
<TITLE><?php echo $dadosboleto["identificacao"]; ?></TITLE>
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
			<td class="cpt" width="58" valign="bottom"><div align="center"><font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"]?></font></div></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="ld" width="453" valign="bottom" align="right"><span class="ld"><span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"];?></span></span></td>
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
			<td class="cp" width="298" valign="top" height="12"><span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="126" valign="top" height="12"><span class="campo"><?php echo $dadosboleto["agencia_codigo_cedente"]?></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="87" valign="top" height="12"><span class="campo"><?php echo $dadosboleto["data_vencimento"]?></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="126" valign="top" height="12" align="right"><span class="campo"><?php echo $dadosboleto["nosso_numero_com_digito"]?></span></td>
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
			<td class="cp" width="80" valign="top" height="12" align="left"><span class="campo"><?php echo $dadosboleto["valor_boleto"]?></span></td>
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
			<td class="ct" width="552" valign="top" height="13">Sacado: <b>MATRIC.:</b>18080812 - <?php echo $dadosboleto["sacado"]?>. CPF: <? echo $dadosboleto["cpf"];?>. </td>
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
			<td class="cpt" width="58" valign="bottom"><div align="center"><font class="bc"><?php echo $dadosboleto["codigo_banco_com_dv"]?></font></div></td>
			<td width="3" valign="bottom"><img src="imagens/3.png" width="2" height="22" border="0"></td>
			<td class="ld" width="453" valign="bottom" align="right"><span class="ld"><span class="campotitulo"><?php echo $dadosboleto["linha_digitavel"]?></span></span></td>
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
		<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo"><?php echo $dadosboleto["data_vencimento"]?></span></td>
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
			<td class="cp" width="472" valign="top" height="12"><span class="campo"><?php echo $dadosboleto["cedente"]."-&nbsp;CNPJ: ".$dadosboleto["cpf_cnpj"]?></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo"> <?php echo $dadosboleto["agencia_codigo_cedente"]?></span></td>
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
			<td class="cp" width="113" valign="top" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["data_documento"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="153" valign="top" height="12"><span class="campo"><?php echo $dadosboleto["numero_documento"]?></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="62" valign="top" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["especie_doc"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="34" valign="top" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["aceite"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="82" valign="top" height="12"><div align="left"><span class="campo"><?php echo $dadosboleto["data_processamento"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo"><?php echo $dadosboleto["nosso_numero_com_digito"]?></span></td>
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
			<td class="cp" width="83" valign="top"><div align="left"> <span class="campo"><?php echo $dadosboleto["carteira"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="53" valign="top"><div align="left"><span class="campo"><?php echo $dadosboleto["especie"]?></span></div></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="123" valign="top"><span class="campo"></span></td>
			<td class="cp" width="7" valign="top" height="12"><img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="72" valign="top"><span class="campo"></span></td>
			<td class="cp" width="7" valign="top" height="12"> <img src="imagens/1.png" width="1" height="12" border="0"></td>
			<td class="cp" width="180" valign="top" height="12" align="right"><span class="campo"><?php echo $dadosboleto["valor_boleto"]?></span></td>
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
					<? echo $dadosboleto["instrucoes0"];?><br>
					<? echo $dadosboleto["instrucoes1"];?><br>	
					<? echo $dadosboleto["instrucoes2"];?><br>	
					<? echo $dadosboleto["instrucoes3"];?><br>	
					<? echo $dadosboleto["instrucoes4"];?><br>	
					<? echo $dadosboleto["instrucoes5"];?><br>	
					<? echo $dadosboleto["instrucoes6"];?><br>	
					<? echo $dadosboleto["instrucoes7"];?><br>	
					<? echo $dadosboleto["instrucoes8"];?><br>			
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
						<?php echo $GeraBoleto->fbarcode($dadosboleto["codigo_barras"]); ?> 
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
</html>
