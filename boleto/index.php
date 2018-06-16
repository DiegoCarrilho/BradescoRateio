<?
include_once($_SERVER["DOCUMENT_ROOT"].'\static\c.php');


if ($logou == 1)
{
		$msg_erro			=	"";
		$msg_mode			=	"";
		$handler_1			=	0;
		$custom_td_style 	=	"style='height: 5px; overflow:auto; font-size: 10px; vertical-align:middle;'";
		$custom_td_style2 	=	"style='height: 5px; overflow:auto; font-size: 10px; text-align:center; vertical-align:middle;'";
		$custom_td_style3 	=	"style='height: 5px; overflow:auto; font-size: 10px; text-align:right; vertical-align:middle;'";
	
		$custom_td1_style 	=	"style='height: 10px; overflow:auto; font-size: 12px; vertical-align:middle;'";
		$custom_td1_style2 	=	"style='height: 10px; overflow:auto; font-size: 12px; text-align:center; vertical-align:middle;'";
		$custom_td1_style3 	=	"style='height: 10px; overflow:auto; font-size: 12px; text-align:right; vertical-align:middle;'";
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

		<title><? echo $title_header;?></title>
		<link href="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
		<link href="<? echo "http://".$_SERVER["SERVER_NAME"];?>/dist/css/sb-admin-2.css" rel="stylesheet">
		<link href="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
					<script>
			function get_element_info(op,arg1,arg2,element_) 
			{
				if (op == "") 
				{
					document.getElementById(element_).innerHTML = "";
					return;
				} else { 
					if (window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
					} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById(element_).innerHTML = this.responseText;

						}
					};
					xmlhttp.open("GET","http://<?php echo $_SERVER["HTTP_HOST"]; ?>/static/jquery.php?op="+op+"&arg1="+arg1+"&arg2="+arg2,true);
					xmlhttp.send();
				}
			}
</script>

</head>

<body>

    <div id="wrapper">
  <?
include_once($_SERVER["DOCUMENT_ROOT"].'\static\nav.php');
	$db							=	mysql_connect ($host, $login_db, $senha_db);
	$basedados					=	mysql_select_db($database);
	
	$polo_lista	=	mysql_query("SELECT polo_id,polo_cidade,polo_uf,polo_paceiro FROM `polo_lista` WHERE polo_mostra=1 ORDER BY polo_cidade",$db);
 	$turmas_load = '';
?>

	<div id="page-wrapper">	<!--  Inicio Wraper -->
		<div class="row">	<!--  Inicio PageROW -->
			<div class="col-lg-12">	<!--  Inicio Page col lg 12-->
				<h3 class="page-header">Gerar Carnê de Mensalidades</h3>
				<div id="alert_div"></div>
 <!------------------------Início da Área da Página  ------------------------------------>
 

                <?  
	
	function check_post($dados = '')
	{
		return ((!isset($_POST[$dados])  || ($_POST[$dados] == '0')  || $_POST[$dados] == '') ? true:false);
	}

	
 if (check_post('polo_id') || check_post('turma_id_option') || check_post('gera_lista'))
 {
	echo table_header('Selecione o Polo e a Turma');	  
?>
	<form method="POST">
  <div class="form-row">
    <div id="polo_div" class="form-group-sm col-lg-12">
      <label for="polo_id">Selecione um Pólo</label>
      <select name="polo_id" id="polo_id" class="form-control" onchange="get_element_info('turma_by_polo',this.value,'','turma_id_option');" >
                <?
                echo "<option value='0'>Selecione o Polo</option>";
                
                while ($polo_lista_array = mysql_fetch_array($polo_lista))
                {	
					$polo_id_selected = "";
					if ((isset($_POST['polo_id']) && $_POST['polo_id'] == $polo_lista_array['polo_id']))
					{
						$polo_id_selected = "selected";
						$turmas_load	=	$_POST['polo_id'];
					}
                ?>
                
                
                  <option <? echo $polo_id_selected; ?> value="<? echo $polo_lista_array['polo_id']; ?>"><? echo $polo_lista_array['polo_cidade']."-".$polo_lista_array['polo_uf']." - ".$polo_lista_array['polo_paceiro']; ?></option>
                  <?
                }
            
                ?>
      </select>
    </div>

    <div id="turma_div" class="form-group-sm col-lg-12">
      <label for="turma_id_option">Selecione a Turma</label>
      <select name="turma_id_option" id="turma_id_option" class="form-control">
        <option value="">Selecione uma Turma</option>
      </select>
    </div>
    
<?
if ($turmas_load)
	echo "<script>get_element_info('turma_by_polo',".$turmas_load.",'".((isset($_POST['turma_id_option']))? $_POST['turma_id_option'] : "")."','turma_id_option');</script>";


?>

 <div class="form-group-sm col-lg-12" style="height:10px;"></div>
        <div id="polo_div" class="form-group-sm col-lg-12">
         <input type="hidden" name="gera_lista" value="gera_lista">
        <button type="submit" class="btn btn-primary btn-sm">Consultar Alunos</button>
        <button onclick="window.location.href='/';" class="btn btn-primary btn-sm">Cancelar</button>
        </div>

</div>
</form>



<?
	 
	 echo table_footer();
	 
if (!check_post('gera_carne'))	 
{
	 
	 echo table_header('Selecione o Polo e a Turma');
	 echo var_dump($_POST);
	 
					include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\cobranca\boleto\Funcoes.php');
					include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\cobranca\boleto\Montagem.php');
	 
	$turma_id			=	$_POST['turma_id'];
	$cedente_gera		=	$_POST['cedente_id'];
	$gera_remessa		=	((isset($_POST['remessa']) && $_POST['remessa'] == '1')? 1 : 0);
	$rateioDeCredito	=	((isset($_POST['rateio']) && $_POST['rateio'] == '1')? 1 : 0);
	$data_ini_gera		=	 $_POST['data_inicio'];
	$data_fim_gera		=	 $_POST['data_fim'];
	 
	$alunos			=	"SELECT * FROM usuario WHERE turma_id=".$turma_id." ORDER BY nome ASC";
	
	// RETURN ERROR ON SELECT ERROR
	if (!$alunos_query	=	mysql_query($alunos,$db))
		throw new Exception('Error: '.$alunos);

	
		$sql_rateio		=	'
						SELECT `turma`.`id_rateio_1` as id_rateio, `turma`.`porcentagem_1` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario`, `agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_1 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$turma_id.'
						UNION
						SELECT `turma`.`id_rateio_2` as id_rateio, `turma`.`porcentagem_2` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_2 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$turma_id.'
						UNION
						SELECT `turma`.`id_rateio_3` as id_rateio, `turma`.`porcentagem_3` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_3 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$turma_id;
	
	
	// RETURN ERROR ON SELECT ERROR
	if (!$beneficiario	=	mysql_query($sql_rateio,$db))
		throw new Exception('Erro: '.$sql_rateio);
	
		$rateio_dados = array();
		$rateio_quantidade	=	0;
			
			$i = 0;
			for ($i = 0; $i <= 2; $i++) 
			{
				$rateio_dados[$i]['id_rateio']	= '';
				$rateio_dados[$i]['beneficiario'] = '';
				$rateio_dados[$i]['porcentagem'] = '';
				$rateio_dados[$i]['agencia'] = '';
				$rateio_dados[$i]['agencia_digito'] = '';
				$rateio_dados[$i]['cc'] = '';
				$rateio_dados[$i]['cc_digito'] = '';
				$rateio_dados[$i]['rateio_status'] = '0';
			}
									
		while ($info=	mysql_fetch_array($beneficiario))
		{
			$rateio_dados[$rateio_quantidade]['id_rateio']	= $info['id_rateio'];
			$rateio_dados[$rateio_quantidade]['beneficiario'] = $info['beneficiario'];
			$rateio_dados[$rateio_quantidade]['porcentagem'] = $info['porcentagem'];
			$rateio_dados[$rateio_quantidade]['agencia'] = $info['agencia'];
			$rateio_dados[$rateio_quantidade]['agencia_digito'] = $info['agencia_digito'];
			$rateio_dados[$rateio_quantidade]['cc'] = $info['cc'];
			$rateio_dados[$rateio_quantidade]['cc_digito'] = $info['cc_digito'];
			$rateio_dados[$rateio_quantidade]['rateio_status'] = '98';
			$rateio_quantidade++;
		}
	

	
	// GERAÇÃO DO CARNÊ /
	
	$sql_carne	=	"INSERT INTO `cob_carne` (`id`, `turma_id`, `cadastro_id`, `cadastro_data`, `altera_id`, `altera_data`) VALUES (NULL, ".
		"'".$turma_id."', '".$_matricula_id."', '".date('Y-m-d')."', '0', '0000-00-00');";
	// RETURN ERROR ON SELECT ERROR
	if (!$beneficiario	=	mysql_query($sql_carne,$db))
	{
		throw new Exception('Erro: '.$sql_carne);
	}
	else
		$CarneID = mysql_insert_id($db);
	
	
	// FIM DA GERAÇÃ DO CARNÊ 
	
		$dados	=	'';
		$detalhes = array();
		$QUEBRA_LINHA = "\r\n";
	
	while ($a_info	=	mysql_fetch_array($alunos_query))
	{
		$sql_debito	=	mysql_query(
		"SELECT *
		FROM 
		`cob_aluno_debito` 
		WHERE 
		(vencimento >= '".$data_ini_gera."'
		AND vencimento <= '".$data_fim_gera."')
		AND aluno_id='".$a_info['id']."'
		AND NOT EXISTS 
		(SELECT * FROM   `cob_boleto` 
		WHERE  
		`cob_aluno_debito`.id = `cob_boleto`.`debito_id`) ");

		while	($b_info	=	mysql_fetch_array($sql_debito))
		{


		
			$Boleto	=	new BoletoDetalhes();
			$Boleto->setboletoID('0'.$b_info['tipo'].'0'.$b_info['id'].'0'.$b_info['aluno_id'].'0'.$b_info['numero_da_parcela']);
			$Boleto->setValorTitulo($b_info['valor']);
			$Boleto->setValorDesconto1($b_info['desconto_pontualidade']);

			$Boleto->setdataVencimento($b_info['vencimento']);
			$Boleto->setdataDesconto1($b_info['vencimento']);

			$Boleto->setdataOcorrenciaRetorno();
			$Boleto->setdataOcorrenciaBaixa();
			$Boleto->setcarneID($CarneID);
			$Boleto->setcedenteID($cedente_gera);
			$Boleto->setmatriculaID($a_info['id']);
			$Boleto->setrateioID($rateio_quantidade);
			$Boleto->setremessaID();
			$Boleto->setdebitoID($b_info['id']);
			$Boleto->setboletoStatus('98');
			$Boleto->setgeraRemessa($gera_remessa);

			
			//if ($rateio_quantidade > 0){
				
				$Boleto->setbeneficiario_1_id($rateio_dados[0]['id_rateio']);
				$Boleto->setbeneficiario_2_id($rateio_dados[1]['id_rateio']);
				$Boleto->setbeneficiario_3_id($rateio_dados[2]['id_rateio']);
				$Boleto->setbeneficiario_1_porcentagem($rateio_dados[0]['porcentagem']);
				$Boleto->setbeneficiario_2_porcentagem($rateio_dados[1]['porcentagem']);
				$Boleto->setbeneficiario_3_porcentagem($rateio_dados[2]['porcentagem']);
				$Boleto->setbeneficiario_1_status($rateio_dados[0]['rateio_status']);
				$Boleto->setbeneficiario_2_status($rateio_dados[1]['rateio_status']);
				$Boleto->setbeneficiario_3_status($rateio_dados[2]['rateio_status']);
			//}
			
			$detalhes[] =  $Boleto->montaQuery();
		}	
				       
	}
	
	foreach ($detalhes as $detalhe)
			$dados .= $detalhe.$QUEBRA_LINHA.$QUEBRA_LINHA;

		echo '<textarea rows="30" cols="200">'.$dados.'</textarea>';
	 
	 
	 
	 
	 echo table_footer();
}
	 
 }

else
{

	
	
	$sql_turma		=	'SELECT * FROM turma WHERE id='.$_POST['turma_id_option'];
	$turma_query	=	mysql_query($sql_turma,$db);
	$turma_inf		=	mysql_fetch_array($turma_query);
	
	
	$sql_rateio		=	'
						SELECT `turma`.`id_rateio_1` as id_rateio, `turma`.`porcentagem_1` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario`, `agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_1 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'].'
						UNION
						SELECT `turma`.`id_rateio_2` as id_rateio, `turma`.`porcentagem_2` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_2 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'].'
						UNION
						SELECT `turma`.`id_rateio_3` as id_rateio, `turma`.`porcentagem_3` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_3 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'];
	

	$cedente_query				=	mysql_query("SELECT * FROM `cob_cedente` WHERE ativo=1",$db);
	
	$beneficiario	=	mysql_query($sql_rateio,$db);
	
	
$tabelaInfoGeral = '
			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Informações de Gerais. 
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
							<form method="POST">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th '.$custom_td1_style.' width="10%">Polo:</td>
                                            <th '.$custom_td1_style.' width="40%">'.$turma_inf['polo_nome'].'</td>
                                            <th '.$custom_td1_style.' width="10%">Turma:</td>
                                            <th '.$custom_td1_style.' width="10%">'.$turma_inf['nome'].'</td>
                                            <th '.$custom_td1_style.' width="12%"></td>
                                            <th '.$custom_td1_style.' width="18%"></td>
                                        </tr>
                                    </thead>
									<tbody>';
	
$tabelaInfoGeral .=						'<tr>
                                            <td colspan="6" '.$custom_td1_style2.'><strong>Rateio de Crédito</strong></td>
                                        </tr>';
	
							$sql_pos	=	1;

                            if (mysql_num_rows($beneficiario) < 1)    
							{
$tabelaInfoGeral .=						'<tr>
                                            <td colspan="6" '.$custom_td1_style.'><strong>Nenhuma informação de Rateio encontrada.</strong></td>
                                        </tr>';
							}
							else
								while ($info	=	mysql_fetch_array($beneficiario))
									
										
$tabelaInfoGeral .=						'<tr>
                                            <td '.$custom_td1_style.'><strong>Beneficiario '.$sql_pos++.'</strong>:</td>
                                            <td '.$custom_td1_style.'>'.$info['beneficiario'].'</td>
                                            <td '.$custom_td1_style.'><strong>Porcentagem</strong>:</td>
                                            <td '.$custom_td1_style.'>'.number_format(($info['porcentagem']/1000), 2, '.', '').' %</td>
                                            <td '.$custom_td1_style.'><strong>Agencia e Conta</strong>:</td>
                                            <td '.$custom_td1_style.'>'.(int)$info['agencia'].'-'.$info['agencia_digito'].
													' - '.(int)$info['cc'].'-'.$info['cc_digito'].'</td>
                                        </tr>';	


$tabelaInfoGeral .=						'
                                        <tr>
											<td '.$custom_td1_style.'><strong>Cedente</strong>:</td>
                                            <td colspan="5" '.$custom_td1_style.'>
											<div id="cedente_id" class="null '.((!isset($_POST['cedente_id']))? 'has-error': '').'">
											  <select name="cedente_id" class="form-control input-sm">
												<option value="">Selecione um cedente</option>';
													while ($c_array	=	mysql_fetch_array($cedente_query))
														$tabelaInfoGeral .= "<option ".
														((isset($_POST['cedente_id']) && ($_POST['cedente_id'] == $c_array['id']))?"selected":"")." value='".
															$c_array['id']."'>".$c_array['nome_empresa'].' - Agencia: '.(int)$c_array['agencia'].'-'.(int)$c_array['agencia_digito']
															.' - Conta: '.(int)$c_array['conta'].'-'.(int)$c_array['conta_digito'].' - Convênio: '.(int)$c_array['convenio_codigo']."</option>";
	
$tabelaInfoGeral .=						'
											  </select>
											  </div>
											</td>
                                        </tr>';
	
	
$tabelaInfoGeral .=						'<tr>
                                            <td '.$custom_td1_style.' id="remessa"><strong>Remessa</strong>:</td>
											
                                            <td '.$custom_td1_style.'>      
                                            <label class="radio-inline">
                                                <input type="radio" name="remessa" value="1" '.
											( (isset($_POST['remessa']) && $_POST['remessa'] == "1" )? ' checked': '' ).'> Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="remessa" value="2" '.
											( (!isset($_POST['remessa']) || $_POST['remessa'] == "2" )? ' checked': '' ).'> Não
                                            </label>
										</td>
                                            <td '.$custom_td1_style.' id="rateio"><strong>Rateio</strong>:</td>
                                            <td colspan="2" '.$custom_td1_style.'>                                        
                                            <label class="radio-inline">
                                                <input type="radio" name="rateio" value="1" '.
											( (isset($_POST['rateio']) && $_POST['rateio'] == "1" )? ' checked': '' ).'> Sim
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="rateio" value="2" '.
											( (!isset($_POST['rateio']) || $_POST['rateio'] == "2" )? ' checked': '' ).'> Não
                                            </label>
										</td>

                                            <td '.$custom_td1_style.'></td>
                                        </tr>';	
$tabelaInfoGeral .=						'<tr>
                                            <td '.$custom_td1_style.' id="remessa"><strong>Inicio</strong>:</td>
											
                                            <td '.$custom_td1_style.'>     
											<div class="input-group-sm col-lg-6" id="data_inicio">
												<input name="data_inicio" class="form-control" size="16" type="date" value="'.
													((isset($_POST['data_inicio']))? date('Y-m-d', strtotime($_POST['data_inicio'])) : date('Y-m-d')).'">
													</div>
	
										</td>
										
                                            <td '.$custom_td1_style.' id="rateio"><strong>Término</strong>:</td>
                                            <td colspan="3" '.$custom_td1_style.'>    
											<div class="input-group-sm col-lg-6" id="data_inicio">
												<input name="data_fim" class="form-control" size="16" type="date" value="'.
													((isset($_POST['data_fim']))? date('Y-m-d', strtotime($_POST['data_fim'])) : 
													 date('Y-m-d', strtotime("+30 day")) ).'">
													</div>
										</td>

                                       
                                        </tr>';	
	
	
$tabelaInfoGeral .=					'	<tr>
                                            <td colspan="6" '.$custom_td1_style.'>
												<input type="hidden" name="polo_id" value="'.$_POST['polo_id'].'">
												<input type="hidden" name="turma_id_option" value="'.$_POST['turma_id_option'].'">
												<input type="hidden" name="gera_lista" value="'.$_POST['gera_lista'].'">
												<button type="submit" class="btn btn-primary btn-sm">Consultar</button>
													
											</td>
                                        </tr>';

	
$tabelaInfoGeral .=						'
										</form>
                                    </tbody>
                                </table>';


if (!check_post('cedente_id') && !check_post('data_fim') && !check_post('data_fim') && !check_post('remessa') && !check_post('rateio'))
{
	//foreach ($_POST as $key => $value) 
	//echo $key.'->'.$value.'<br>';


$tabelaInfoGeral .='
<h4 align="center"> Carnê </h4>
<hr>
<table class="table">
                                    <thead>
                                        <tr>
                                            <th '.$custom_td1_style2.' width="2%">#</td>
                                            <th '.$custom_td1_style2.' width="30%">Aluno</td>
                                            <th '.$custom_td1_style2.' width="10%">Mensalidades sem boleto no período</td>
                                            <th '.$custom_td1_style2.' width="20%">Período de Geração</td>
                                            <th '.$custom_td1_style2.' width="10%">Mensalidade</td>
                                            <th '.$custom_td1_style2.' width="10%">Desconto</td>
											<th '.$custom_td1_style2.' width="18%">Desconto</td>
                                        </tr>
                                    </thead>
									<tbody>';

				$table_alunos			=	"SELECT * FROM usuario WHERE turma_id=".$_POST['turma_id_option']." ORDER BY nome ASC";
				$table_alunos_query	=	mysql_query($table_alunos,$db);
	
									$sql_pos	=	1;
									$numero_de_boletos_a_gerar = 0;
									while ($a_info	=	mysql_fetch_array($table_alunos_query))
									{

										$sql_debito	=	mysql_query("SELECT count(*) as qnt, MIN(vencimento) as primeiro, MAX(vencimento) as ultimo, max(valor) as valor, max(desconto_pontualidade) as desconto  FROM `cob_aluno_debito` 
										WHERE 
										(vencimento >= '".$_POST['data_inicio']."'
										AND vencimento <= '".$_POST['data_fim']."')
										AND aluno_id='".$a_info['id']."'
										AND NOT EXISTS 
										(SELECT * FROM   `cob_boleto` 
										WHERE  
										`cob_aluno_debito`.id = `cob_boleto`.`debito_id`) ");
										
										$d_info		=	mysql_fetch_array($sql_debito);
										
										$primeiro	=	(($d_info['primeiro'] <> "")? date("d/m/Y",strtotime($d_info['primeiro'])): "");
										$ultimo		=	(($d_info['ultimo'] <> "")? date("d/m/Y",strtotime($d_info['ultimo'])): "");
										$valor		=	(($d_info['valor'] <> "")? 'R$ '.number_format($d_info['valor'], 2, '.', ''): "-");
										$desconto	=	(($d_info['desconto'] <> "")? 'R$ '.number_format($d_info['desconto'], 2, '.', ''): "-");
										
$tabelaInfoGeral .=						'<tr>
                                            <td '.$custom_td_style.'>'.$sql_pos++.'</td>
                                            <td '.$custom_td_style.'>'.$a_info['nome'].'</td>
                                            <td '.$custom_td_style2.'>'.$d_info['qnt'].'</td>
                                            <td '.$custom_td_style2.'>'.$primeiro.' - '.$ultimo.'</td>
                                            <td '.$custom_td_style2.'>'.$valor.'</td>
                                            <td '.$custom_td_style2.'>'.$desconto.'</td>
											<td '.$custom_td_style2.'>'.$desconto.'</td>
                                        </tr>';	
										$numero_de_boletos_a_gerar += $d_info['qnt'];
									}
	

	$tabelaInfoGeral .=						'<tr>
											<td colspan="7" '.$custom_td1_style.'>Total de boletos gerados no carnê: ('.$numero_de_boletos_a_gerar.')</td>

                                        </tr>';	
	
	$tabelaInfoGeral .=						'<tr>
												<td colspan="7" '.$custom_td1_style.'>	
													<form id="form_gera" method="POST">
														<input type="hidden" name="gera_carne" value="sim">
														<input type="hidden" name="turma_id" value="'.$_POST['turma_id_option'].'">
														<input type="hidden" name="cedente_id" value="'.$_POST['cedente_id'].'">
														<input type="hidden" name="remessa" value="'.$_POST['remessa'].'">
														<input type="hidden" name="rateio" value="'.$_POST['rateio'].'">
														<input type="hidden" name="data_inicio" value="'.$_POST['data_inicio'].'">
														<input type="hidden" name="data_fim" value="'.$_POST['data_fim'].'">
														<button type="submit" class="btn btn-primary btn-sm">Gerar Boletos</button>
													</form>
												</td>
                                        	</tr>';	
	echo var_dump($_POST);
	$tabelaInfoGeral .=						'
                                    </tbody>
                                </table>';
	
	/**
		  echo table_header('Selecione o cedente e a data');	
	
					include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\cobranca\boleto\Funcoes.php');
					include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\cobranca\boleto\Montagem.php');
	
	$alunos			=	"SELECT * FROM usuario WHERE turma_id=".$_POST['turma_id_option']." ORDER BY nome ASC";
	
	// RETURN ERROR ON SELECT ERROR
	if (!$alunos_query	=	mysql_query($alunos,$db))
		throw new Exception('Error: '.$alunos);

	
		$sql_rateio		=	'
						SELECT `turma`.`id_rateio_1` as id_rateio, `turma`.`porcentagem_1` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario`, `agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_1 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'].'
						UNION
						SELECT `turma`.`id_rateio_2` as id_rateio, `turma`.`porcentagem_2` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_2 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'].'
						UNION
						SELECT `turma`.`id_rateio_3` as id_rateio, `turma`.`porcentagem_3` as porcentagem, 
						`cob_beneficiario_rateio`.`beneficiario` ,`agencia`,`agencia_digito`,`cc`,`cc_digito`,`floating`
						FROM turma INNER JOIN `cob_beneficiario_rateio` 
						ON turma.id_rateio_3 = `cob_beneficiario_rateio`.id 
						WHERE turma.id ='.$_POST['turma_id_option'];
	
	
	// RETURN ERROR ON SELECT ERROR
	if (!$beneficiario	=	mysql_query($sql_rateio,$db))
		throw new Exception('Erro: '.$sql_rateio);
	
		$rateio_dados = array();
		$rateio_quantidade	=	0;
			
			$i = 0;
			for ($i = 0; $i <= 2; $i++) 
			{
				$rateio_dados[$i]['id_rateio']	= '';
				$rateio_dados[$i]['beneficiario'] = '';
				$rateio_dados[$i]['porcentagem'] = '';
				$rateio_dados[$i]['agencia'] = '';
				$rateio_dados[$i]['agencia_digito'] = '';
				$rateio_dados[$i]['cc'] = '';
				$rateio_dados[$i]['cc_digito'] = '';
				$rateio_dados[$i]['rateio_status'] = '0';
			}
									
		while ($info=	mysql_fetch_array($beneficiario))
		{
			$rateio_dados[$rateio_quantidade]['id_rateio']	= $info['id_rateio'];
			$rateio_dados[$rateio_quantidade]['beneficiario'] = $info['beneficiario'];
			$rateio_dados[$rateio_quantidade]['porcentagem'] = $info['porcentagem'];
			$rateio_dados[$rateio_quantidade]['agencia'] = $info['agencia'];
			$rateio_dados[$rateio_quantidade]['agencia_digito'] = $info['agencia_digito'];
			$rateio_dados[$rateio_quantidade]['cc'] = $info['cc'];
			$rateio_dados[$rateio_quantidade]['cc_digito'] = $info['cc_digito'];
			$rateio_dados[$rateio_quantidade]['rateio_status'] = '98';
			$rateio_quantidade++;
		}
	
	$gera_remessa		=	((isset($_POST['remessa']) && $_POST['remessa'] == '1')? 1 : 0);
	$rateioDeCredito	=	((isset($_POST['rateio']) && $_POST['rateio'] == '1')? 1 : 0);
	
	// GERAÇÃO DO CARNÊ /
	
	$sql_carne	=	"INSERT INTO `cob_carne` (`id`, `turma_id`, `cadastro_id`, `cadastro_data`, `altera_id`, `altera_data`) VALUES (NULL, ".
		"'".$_POST['turma_id_option']."', '".$_matricula_id."', '".date('Y-m-d')."', '0', '0000-00-00');";
	// RETURN ERROR ON SELECT ERROR
	if (!$beneficiario	=	mysql_query($sql_carne,$db))
	{
		throw new Exception('Erro: '.$sql_carne);
	}
	else
		$CarneID = mysql_insert_id($db);
	
	
	// FIM DA GERAÇÃ DO CARNÊ 
	
		$dados	=	'';
		$detalhes = array();
		$QUEBRA_LINHA = "\r\n";
	
	while ($a_info	=	mysql_fetch_array($alunos_query))
	{
		$sql_debito	=	mysql_query(
		"SELECT *
		FROM 
		`cob_aluno_debito` 
		WHERE 
		(vencimento >= '".$_POST['data_inicio']."'
		AND vencimento <= '".$_POST['data_fim']."')
		AND aluno_id='".$a_info['id']."'
		AND NOT EXISTS 
		(SELECT * FROM   `cob_boleto` 
		WHERE  
		`cob_aluno_debito`.id = `cob_boleto`.`debito_id`) ");

		while	($b_info	=	mysql_fetch_array($sql_debito))
		{


		
			$Boleto	=	new BoletoDetalhes();
			$Boleto->setboletoID('0'.$b_info['tipo'].'0'.$b_info['id'].'0'.$b_info['aluno_id'].'0'.$b_info['numero_da_parcela']);
			$Boleto->setValorTitulo($b_info['valor']);
			$Boleto->setValorDesconto1($b_info['desconto_pontualidade']);

			$Boleto->setdataVencimento($b_info['vencimento']);
			$Boleto->setdataDesconto1($b_info['vencimento']);

			$Boleto->setdataOcorrenciaRetorno();
			$Boleto->setdataOcorrenciaBaixa();
			$Boleto->setcarneID($CarneID);
			$Boleto->setcedenteID($_POST['cedente_id']);
			$Boleto->setmatriculaID($a_info['id']);
			$Boleto->setrateioID($rateio_quantidade);
			$Boleto->setremessaID();
			$Boleto->setdebitoID($b_info['id']);
			$Boleto->setboletoStatus('98');
			$Boleto->setgeraRemessa($gera_remessa);

			
			//if ($rateio_quantidade > 0){
				
				$Boleto->setbeneficiario_1_id($rateio_dados[0]['id_rateio']);
				$Boleto->setbeneficiario_2_id($rateio_dados[1]['id_rateio']);
				$Boleto->setbeneficiario_3_id($rateio_dados[2]['id_rateio']);
				$Boleto->setbeneficiario_1_porcentagem($rateio_dados[0]['porcentagem']);
				$Boleto->setbeneficiario_2_porcentagem($rateio_dados[1]['porcentagem']);
				$Boleto->setbeneficiario_3_porcentagem($rateio_dados[2]['porcentagem']);
				$Boleto->setbeneficiario_1_status($rateio_dados[0]['rateio_status']);
				$Boleto->setbeneficiario_2_status($rateio_dados[1]['rateio_status']);
				$Boleto->setbeneficiario_3_status($rateio_dados[2]['rateio_status']);
			//}
			
			$detalhes[] =  $Boleto->montaQuery();
		}	
				       
	}
	
	foreach ($detalhes as $detalhe)
			$dados .= $detalhe.$QUEBRA_LINHA.$QUEBRA_LINHA;

		echo '<textarea rows="30" cols="200">'.$dados.'</textarea>';
				 echo table_footer(); 

	
	**/
}
	
	
	

$tabelaInfoGeral .=	'		
                            </div>
                        </div>
                    </div>
                </div>
			</div>';
	echo $tabelaInfoGeral;
	
}
			
?>



<!------------------------Fim da Área da Página  ------------------------------------>

			</div>
		</div>
	</div>
  </div>
    
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" id="aluno_modal">
                                    </div>
                                </div>
                            </div>

    <script src="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/jquery/jquery.min.js"></script>
    <script src="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<? echo "http://".$_SERVER["SERVER_NAME"];?>/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<? echo "http://".$_SERVER["SERVER_NAME"];?>/dist/js/sb-admin-2.js"></script>
	
<?
 
      echo "<script>";

	$_erro	=	0;
	foreach ($_POST as $key => $value) 
		if ($value == "" || $value == "0")
		{
			echo 'var x = document.getElementById("'.$key.'").getAttribute("class");
				document.getElementById("'.$key.'").setAttribute("class",x+" has-error");';
			$_erro++;
		}
	
 	if ($_erro)
	{
		$msg_erro = 'Preencha todos os campos.';
		$msg_mode	=	'danger';
	}
 
 	if ($msg_erro <> ""){
		if ($msg_mode <> ""){
			echo 'document.getElementById("alert_div").setAttribute("class","alert alert-'.$msg_mode.'");';
		}
		else
			if ($msg_mode == "")
				echo 'document.getElementById("alert_div").setAttribute("class","alert alert-info");';	
	}

	echo  'document.getElementById("alert_div").innerHTML = "'.(($msg_erro == "")? "": $msg_erro).'";';
	
	echo "</script>";
include_once($_SERVER["DOCUMENT_ROOT"].'\static\footer.php');
?>

</body>
</html>
<?
}
?>