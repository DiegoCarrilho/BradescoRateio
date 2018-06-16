<?

include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\Funcoes.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\Detalhes.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\HeaderLabel.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\Trailler.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\Arquivo.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\remessas\utils.php');
include_once($_SERVER["DOCUMENT_ROOT"].'\static\static.php');

	$db							=	mysql_connect ($host, $login_db, $senha_db);
    $basedados					=	mysql_select_db($database);
	$func	= new Utilidades();

	$cedente_id					=	'1';
	$test_mode					=	true;

	$sql_cedente		=	mysql_query('SELECT * FROM `cob_cedente` WHERE `id` = '.$cedente_id,$db);
	$cedente			=	mysql_fetch_array($sql_cedente);

	$sql_sequencia		=	mysql_query('SELECT MAX(`sequencial`) as proximo FROM `cob_remessa` WHERE `cedente` ='.$cedente_id,$db);
	$sequencial			=	mysql_fetch_array($sql_sequencia);

	$sql_gavado_dia		=	mysql_query("SELECT COUNT(*) as qnt FROM cob_remessa WHERE `data_gravacao` ='".date('Y-m-d')."'",$db);
	$sequencial_dia		=	mysql_fetch_array($sql_gavado_dia);


	$dados['codigo_empresa'] 							=	$cedente['convenio_codigo'];
	$dados['razao_social'] 								=	utf8_decode($cedente['nome_empresa']);
	$dados['numero_remessa'] 							=	$sequencial['proximo']	+1 ;
	$dados['data_gravacao'] 							=	date('dmy');

/**
Grava o nome do arquivo de remessa **/

	$save_remessa = "INSERT INTO `cob_remessa` (`id`, `cedente`, `sequencia`, `data_gravacao`, `qnt_boletos`) VALUES ".
	"(NULL, '".$cedente_id."', '".$dados['numero_remessa']."', '".date('Y-m-d')."', '0')";

	if (!$test_mode)
	$sql_remessa		=	mysql_query($save_remessa,$db);

	if ($test_mode || $sql_remessa)
	{
		$remessa_id = mysql_insert_id();
		
		$arquivos	=	new Arquivo();
		$arquivos->config($dados);

	/** VAR VINDAS DO POST OU LOOP **/

		$sql_boleto		=	'SELECT * FROM `cob_boleto` WHERE gera_remessa=1 AND remessa_id=0 AND cedente_id='.$cedente_id;
		$boleto_query	=	mysql_query($sql_boleto,$db);

		if (mysql_num_rows($boleto_query) > 0)
		{
			while ($boleto_array = mysql_fetch_array($boleto_query))
			{

				$sql	=	'SELECT * FROM pessoa WHERE pessoa.cpf = (SELECT cpf FROM `usuario` WHERE `id`= '.$boleto_array['aluno_id'].')';
				$info_pagador		=	mysql_query($sql,$db);
				$pagador			=	mysql_fetch_array($info_pagador);

				$boleto['valor']									=	$func->removeFormatacaoMoeda($boleto_array['valor_titulo']);
				$boleto['vencimento']								=	$func->formataData($boleto_array['vencimento']);
				$boleto['valor_desconto']							=	$func->removeFormatacaoMoeda($boleto_array['valor_desconto1']);
				$boleto['data_limite_desconto']						=	$func->formataData($boleto_array['data_limite_desconto1']);


				$boleto['data_emissao_titulo']						=	$func->formataData($boleto_array['data_emissao']);

				$boleto['num_controle_participante'] 				=	$boleto_array['id'];
				$boleto['nosso_numero']								=	$boleto_array['nosso_numero'];

				$boleto['numero_documento']							=	substr($boleto_array['nosso_numero'],0,10);


				/** MONTA A LINHA DETALHES**/

				$boleto['carteira']									=	$cedente['carteira'];
				$boleto['agencia_beneficiario']						=	$cedente['agencia'];
				$boleto['agencia_dv']								=	$cedente['agencia_digito'];
				$boleto['conta_beneficiario']						=	$cedente['conta'];
				$boleto['conta_digito_beneficiario']				=	$cedente['conta_digito'];
				$boleto['habilitar_debito_compensacao']				=	$cedente['banco_id'];
				$boleto['habilitar_multa']							=	$cedente['multa_vencimento'];
				$boleto['percentual_multa']							=	$cedente['multa_vencimento_valor'];
				$boleto['valor_dia_atraso']							=	$func->juros_vencido($boleto['valor'],$cedente['juro_dia']);


				$boleto['valor_iof']								=	'0';
				$boleto['valor_abatimento_concedido']				=	'0';
				$boleto['tipo_inscricao_pagador']					=	'CPF';

				$boleto['numero_inscricao']							=	$pagador['cpf'];
				$boleto['nome_pagador']								=	$pagador['nome'];
				$boleto['endereco_pagador']							=	$pagador['logradouro'].' '.$pagador['numero'];
				$boleto['primeira_mensagem']						=	'';
				$boleto['cep_pagador']								=	$func->cep_valida($pagador['cep']);
				$boleto['sufixo_cep_pagador']						=	$func->cep_sufixo($pagador['cep']);
				$boleto['sacador_segunda_mensagem']					=	'';

				$boleto['rateio']									=	$boleto_array['rateio_id'];


				if ($boleto['rateio'] == "0")		
				{
					$arquivos->addBoleto($boleto);
				}
				else
				{


					$LinhaRateio['nosso_numero']					=	$boleto['nosso_numero'];
					$LinhaRateio['carteira']						=	$cedente['carteira'];
					$LinhaRateio['agencia_beneficiario']			=	$cedente['agencia'];
					$LinhaRateio['agencia_dv']						=	$cedente['agencia_digito'];
					$LinhaRateio['conta_beneficiario']				=	$cedente['conta'];
					$LinhaRateio['conta_digito_beneficiario']		=	$cedente['conta_digito'];
					
					$rateio_linha	= mysql_query('SELECT * FROM cob_rateio WHERE id='.$boleto['rateio'],$db);
					
					$rateio_found	=	mysql_num_rows($rateio_linha);
					
					$r_array		=	mysql_fetch_array($rateio_linha);

					
					$b1												=	((isset($r_array['beneficicario1_id'])) ?	$r_array['beneficicario1_id']	:	'0');
					if ($b1 <> 0)
					$b1_info	=	mysql_fetch_array(mysql_query('SELECT * FROM `cob_beneficiario_rateio` WHERE `id` = '.$b1,$db));	
					
					$LinhaRateio['beneficiario_1_codigo_banco']		=	((isset($b1_info['codigo_banco'])) ?	$b1_info['codigo_banco']	:	'');
					$LinhaRateio['beneficiario_1_agencia']			=	((isset($b1_info['agencia'])) ?	$b1_info['agencia']	:	'');
					$LinhaRateio['beneficiario_1_agencia_digito']	=	((isset($b1_info['agencia_digito'])) ?	$b1_info['agencia_digito']	:	'');
					$LinhaRateio['beneficiario_1_cc']				=	((isset($b1_info['cc'])) ?	$b1_info['cc']	:	'');
					$LinhaRateio['beneficiario_1_cc_digito']		=	((isset($b1_info['cc_digito'])) ?	$b1_info['cc_digito']	:	'');
					$LinhaRateio['beneficiario_1_valor_percent']	=	(($b1 <> 0) ?	$func->removeFormatacaoMoeda($r_array['beneficicario1_porcentagem'])	:	'');
					$LinhaRateio['beneficiario_1_nome']				=	((isset($b1_info['beneficiario'])) ?	$b1_info['beneficiario']	:	'');
					$LinhaRateio['beneficiario_1_parcela_id']		=	"1";
					$LinhaRateio['beneficiario_1_floating']			=	((isset($b1_info['floating'])) ?	$b1_info['floating']	:	'');
					
					
					$b2												=	((isset($r_array['beneficicario2_id'])) ?	$r_array['beneficicario2_id']	:	'0');
					if ($b2 <> 0)
					$b2_info	=	mysql_fetch_array(mysql_query('SELECT * FROM `cob_beneficiario_rateio` WHERE `id` = '.$b2,$db));
					
					$LinhaRateio['beneficiario_2_codigo_banco']		=	((isset($b2_info['codigo_banco'])) ?	$b2_info['codigo_banco']	:	'');
					$LinhaRateio['beneficiario_2_agencia']			=	((isset($b2_info['agencia'])) ?	$b2_info['agencia']	:	'');
					$LinhaRateio['beneficiario_2_agencia_digito']	=	((isset($b2_info['agencia_digito'])) ?	$b2_info['agencia_digito']	:	'');
					$LinhaRateio['beneficiario_2_cc']				=	((isset($b2_info['cc'])) ?	$b2_info['cc']	:	'');
					$LinhaRateio['beneficiario_2_cc_digito']		=	((isset($b2_info['cc_digito'])) ?	$b2_info['cc_digito']	:	'');
					$LinhaRateio['beneficiario_2_valor_percent']	=	(($b2 <> 0) ?	$func->removeFormatacaoMoeda($r_array['beneficicario2_porcentagem'])	:	'');
					$LinhaRateio['beneficiario_2_nome']				=	((isset($b2_info['beneficiario'])) ?	$b2_info['beneficiario']	:	'');
					$LinhaRateio['beneficiario_2_parcela_id']		=	((($b1 <> 0) && ($b2 <> 0) && ($b1 == $b2))? '2': '1');
					$LinhaRateio['beneficiario_2_floating']			=	((isset($b2_info['floating'])) ?	$b2_info['floating']	:	'');

					
					$b3												=	((isset($r_array['beneficicario3_id'])) ?	$r_array['beneficicario3_id']	:	'0');
					if ($b3 <> 0)
					$b3_info	=	mysql_fetch_array(mysql_query('SELECT * FROM `cob_beneficiario_rateio` WHERE `id` = '.$b3,$db));
					
					$LinhaRateio['beneficiario_3_codigo_banco']		=	((isset($b3_info['codigo_banco'])) ?	$b3_info['codigo_banco']	:	'');
					$LinhaRateio['beneficiario_3_agencia']			=	((isset($b3_info['agencia'])) ?	$b3_info['agencia']	:	'');
					$LinhaRateio['beneficiario_3_agencia_digito']	=	((isset($b3_info['agencia_digito'])) ?	$b3_info['agencia_digito']	:	'');
					$LinhaRateio['beneficiario_3_cc']				=	((isset($b3_info['cc'])) ?	$b3_info['cc']	:	'');
					$LinhaRateio['beneficiario_3_cc_digito']		=	((isset($b3_info['cc_digito'])) ?	$b3_info['cc_digito']	:	'');
					$LinhaRateio['beneficiario_3_valor_percent']	=	(($b3 <> 0) ?	$func->removeFormatacaoMoeda($r_array['beneficicario3_porcentagem'])	:	'');
					$LinhaRateio['beneficiario_3_nome']				=	((isset($b3_info['beneficiario'])) ?	$b3_info['beneficiario']	:	'');
					$LinhaRateio['beneficiario_3_parcela_id']		=	(($b3 <> $b2) && ($b3 <> $b1)) ? 1 : ((($b3 == $b2) && ($b3 == $b1)) ? 3 : 2);;
					$LinhaRateio['beneficiario_3_floating']			=	((isset($b3_info['floating'])) ?	$b3_info['floating']	:	'');

					
					if ($rateio_found > 0)
					{
						$arquivos->addBoleto($boleto);
						$arquivos->addRateio($LinhaRateio);
					}
					else
					{
						mysql_query("UPDATE `cob_boleto` SET `remessa_id` = '0' WHERE `cob_boleto`.`remessa_id` = ".$remessa_id,$db);
						mysql_query("DELETE FROM `cob_remessa` WHERE `cob_remessa`.`id` = ".$remessa_id,$db);
						die('Error: Rateio do boleto Nosso Número: '.$boleto['nosso_numero'].' não encontrada. A geração foi cancelada');
					}
						

				}
				
				if (!$test_mode)
				if (!$update_boleto_id	=	mysql_query("UPDATE `cob_boleto` SET `remessa_id` = '".$remessa_id."' WHERE `cob_boleto`.`id` = ".$boleto_array['id'],$db))
				{
					mysql_query("UPDATE `cob_boleto` SET `remessa_id` = '0' WHERE `cob_boleto`.`remessa_id` = ".$remessa_id,$db);
					die('Erro no set remessa_id ='."UPDATE `cob_boleto` SET `remessa_id` = '".$remessa_id."' WHERE `cob_boleto`.`id` = ".$boleto_array['id']);
					mysql_query("DELETE FROM `cob_remessa` WHERE `cob_remessa`.`id` = ".$remessa_id,$db);
				}


			}
			
				if ($test_mode)
			echo $arquivos->print_ret();
			
			$arquivos->setFilename('CB' . date('dm') . 'A'.($sequencial_dia['qnt']+1));
			
			if (!$test_mode)
				$arquivos->save();

		}
		else
		{
			mysql_query("DELETE FROM `cob_remessa` WHERE `cob_remessa`.`id` = ".$remessa_id,$db);
		}
	}


?>