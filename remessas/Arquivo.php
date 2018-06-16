<?php


class Arquivo
{
    private $header_label;
    private $filename;
    private $trailler;
    const QUEBRA_LINHA = "\r\n";
    private $detalhes = array();

    /**
     * @return the $filename
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param field_type $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return the $detalhes
     */
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * @param multitype: $detalhes
     */
    public function setDetalhes($detalhes)
    {
        $this->detalhes[] = $detalhes;
    }

    /**
     * @return the $header_label
     */
    public function getHeaderLabel()
    {
        return $this->header_label;
    }

    /**
     * @return the $trailler
     */
    public function getTrailler()
    {
        return $this->trailler;
    }

    /**
     * @param field_type $header_label
     */
    public function setHeaderLabel($header_label)
    {
        $this->header_label = $header_label;
    }

    /**
     * @param field_type $trailler
     */
    public function setTrailler($trailler)
    {
        $this->trailler = $trailler;
    }

    /**
     * metodo para adicionar boletos na remessa
     * @param unknown $boleto
     */
    public function addBoleto($boleto)
    {

        $detalhes = new Detalhes();
		$detalhes->setidentificacaoRegistro('1');
		if (isset($boleto['debito_automatico']) && $boleto['debito_automatico'] ==  'S')
		{
        	$detalhes->setAgenciaDebito($boleto['agencia_debito']);								//002 a 006 Agência de Débito (opcional) 005
        	$detalhes->setDigitoDebito($boleto['agencia_dv_debito']);							//007 a 007 Dígito da Agência de Débito (opcional) 001
        	$detalhes->setRazaoContaCorrente($boleto['razao_conta_debito']);					//008 a 012 Razão da Conta Corrente (opcional) 005	
        	$detalhes->setContaCorrente($boleto['conta_debito']);								//013 a 019 Conta Corrente (opcional) 007
        	$detalhes->setDigitoContaCorrente($boleto['conta_dv_debito']);						//020 a 020 Dígito da Conta Corrente (opcional) 001
		}
		
		//ZERO																					//021 a 021 - Zero
        $detalhes->setCarteira($boleto['carteira']);											//022 a 024 - códigos da carteira								
        $detalhes->setAgenciaBeneficiario($boleto['agencia_beneficiario']);						//025 a 029 - códigos da Agência Beneficiários, sem o dígito
        $detalhes->setContaBeneficiario($boleto['conta_beneficiario']);							//030 a 036 - Contas Corrente
        $detalhes->setContaDigitoBeneficiario($boleto['conta_digito_beneficiario']);			//037 a 037 - dígitos da Conta
		$detalhes->setNumeroControleParticipante($boleto['num_controle_participante']);			//038 a 062 - Nº do Controle do Participante
		$detalhes->setCodigoBancoDebitoCompensacao($boleto['habilitar_debito_compensacao']);	//063 a 065 Código do Banco a ser debitado na 
		$detalhes->setCampoMulta($boleto['habilitar_multa']);									//066 a 066 Campo de Multa
        $detalhes->setPercentualMulta($boleto['percentual_multa']);								//067 a 070 Percentual de multa
        $detalhes->setIdentificacaoTituloBanco($boleto['nosso_numero']);						//071 a 081 Identificação do Título no Banco
		//getDigitoAutoConsferenciaBancaria()													//082 a 082 Digito de Auto Conferencia do Número 
																								//083 a 092 Desconto Bonificação por dia
																								//093 a 093 Condição para Emissão da Papeleta de 
																								//094 a 094 Ident. se emite Boleto para Débito
																								//095 a 104 Identificação da Operação do Banco 
		$detalhes->setIndicadorRateioCredito($boleto['rateio']);								//105 a 105 Indicador Rateio Crédito (opcional) 
																								//106 a 106 Endereçamento para Aviso do Débito 
																								//107 a 108 Quantidade possíveis de pagamento
																								//109 a 110 Identificação da ocorrência
		$detalhes->setNumeroDocumento($boleto['numero_documento']);								//111 a 120 Nº do Documento 010
        $detalhes->setDataVencimentoTitulo($boleto['vencimento']);								//121 a 126 Data do Vencimento do Título
		$detalhes->setValorTitulo($boleto['valor']);											//127 a 139 Valor do Título
																								//140 a 142 Banco Encarregado da Cobrança
																								//143 a 147 Agência Depositária
																								//148 a 149 Espécie de Título
																								//150 a 150 Identificação 
																								//151 a 156 Data da emissão do Título 006
																								//157 a 158 1ª instrução
																								//159 a 160 2ª instrução
		$detalhes->setValorCobradoDiaAtraso($boleto['valor_dia_atraso']);						//161 a 173 Valor a ser cobrado por Dia de Atraso 013
		$detalhes->setDataLimiteDesconto($boleto['data_limite_desconto']);						//174 a 179 Data Limite P/Concessão de Desconto 006
        $detalhes->setValorDesconto($boleto['valor_desconto']);									//180 a 192 Valor do Desconto 013 

       // $detalhes->setDescontoBonificacaoDia($boleto['desconto_dia']);     
        $detalhes->setDataEmissaoTitulo($boleto['data_emissao_titulo']);

        $detalhes->setValorDesconto($boleto['valor_desconto']);
        $detalhes->setValorIOF($boleto['valor_iof']);
        $detalhes->setValorAbatimentoConcedidoCancelado($boleto['valor_abatimento_concedido']);

        $detalhes->setIdentificacaoTipoIncricaoPagador($boleto['tipo_inscricao_pagador']);
        $detalhes->setNumeroInscricaoPagador($boleto['numero_inscricao']);
        $detalhes->setNomePagador($boleto['nome_pagador']);
        $detalhes->setEnderecoPagador($boleto['endereco_pagador']);
        $detalhes->setPrimeiraMensagem($boleto['primeira_mensagem']);
        $detalhes->setCep($boleto['cep_pagador']);
        $detalhes->setSufixoCep($boleto['sufixo_cep_pagador']);
        $detalhes->setSacadorSegundaMensagem($boleto['sacador_segunda_mensagem']);

        $this->setDetalhes($detalhes);
    }
	
	
    public function addRateio($boleto)
    {
		$detalhes = new Detalhes();
		$detalhes->setidentificacaoRegistro('3');												//001 a 001 Identificação do Registro
		
		
		$detalhes->setCarteira($boleto['carteira']);											//022 a 024 - códigos da carteira								
        $detalhes->setAgenciaBeneficiario($boleto['agencia_beneficiario']);						//025 a 029 - códigos da Agência Beneficiários, sem o dígito
        $detalhes->setContaBeneficiario($boleto['conta_beneficiario']);							//030 a 036 - Contas Corrente
        $detalhes->setContaDigitoBeneficiario($boleto['conta_digito_beneficiario']);			//037 a 037 - dígitos da Conta
		$detalhes->setIdentificacaoTituloBanco($boleto['nosso_numero']);						//018 a 029 Identificação Título no Banco
		
		
		$detalhes->setbeneficiario_1_codigo_banco($boleto['beneficiario_1_codigo_banco']);		//044 a 046 Código do Banco para Crédito do 1º Beneficiário
		$detalhes->setBeneficiario_1_agencia($boleto['beneficiario_1_agencia']);				//047 a 051 Código da Agência para Crédito do 1º Beneficiário
		$detalhes->setBeneficiario_1_agencia_digito($boleto['beneficiario_1_agencia_digito']);	//047 a 051 Código da Agência para Crédito do 1º Beneficiário
		$detalhes->setbeneficiario_1_cc($boleto['beneficiario_1_cc']);							//053 a 064 Número da Conta Corrente para Crédito do 1º Beneficiário
		$detalhes->setBeneficiario_1_cc_digito($boleto['beneficiario_1_cc_digito']);			//065 a 065 Dígito da Conta Corrente para Crédito do 1º Beneficiário 	
		$detalhes->setbeneficiario_1_valor_percent($boleto['beneficiario_1_valor_percent']);	//066 a 080 Valor, ou Percentual para Rateio
		$detalhes->setbeneficiario_1_nome($boleto['beneficiario_1_nome']);						//081 a 120 Nome do 1º Beneficiário
		$detalhes->setbeneficiario_1_parcela_id($boleto['beneficiario_1_parcela_id']);			//152 a 157 Parcela
		$detalhes->setbeneficiario_1_floating($boleto['beneficiario_1_floating']);				//158 a 160 Floating para o 1º Beneficiário
		
		$detalhes->setbeneficiario_2_codigo_banco($boleto['beneficiario_2_codigo_banco']);		//161 a 163 Código do Banco para Credito do 2º Beneficiário
		$detalhes->setBeneficiario_2_agencia($boleto['beneficiario_2_agencia']);				//164 a 168 Código da Agência para Crédito do 2º Beneficiário
		$detalhes->setBeneficiario_2_agencia_digito($boleto['beneficiario_2_agencia_digito']);	//164 a 168 Código da Agência para Crédito do 2º Beneficiário
		$detalhes->setbeneficiario_2_cc($boleto['beneficiario_2_cc']);							//170 a 181 Número da Conta Corrente para Crédito	do 2º Beneficiário 
		$detalhes->setBeneficiario_2_cc_digito($boleto['beneficiario_2_cc_digito']);			//182 a 182 Dígito da Conta Corrente para Crédito do 2º Beneficiário
		$detalhes->setbeneficiario_2_valor_percent($boleto['beneficiario_2_valor_percent']);	//183 a 197 Valor, ou Percentual para Rateio
		$detalhes->setbeneficiario_2_nome($boleto['beneficiario_2_nome']);						//198 a 237 Nome do 2º Beneficiário
		$detalhes->setbeneficiario_2_parcela_id($boleto['beneficiario_2_parcela_id']);			//269 a 274 Parcela 
		$detalhes->setbeneficiario_2_floating($boleto['beneficiario_2_floating']);				//275 a 277 Floating para o 2º Beneficiário 
		
		$detalhes->setbeneficiario_3_codigo_banco($boleto['beneficiario_3_codigo_banco']);		//278 a 280 Código do Banco para Crédito do 3º Beneficiário
		$detalhes->setBeneficiario_3_agencia($boleto['beneficiario_3_agencia']);				//281 a 285 Código da Agência para Crédito do 3º Beneficiário 
		$detalhes->setBeneficiario_3_agencia_digito($boleto['beneficiario_3_agencia_digito']);	//281 a 285 Código da Agência para Crédito do 3º Beneficiário
		$detalhes->setbeneficiario_3_cc($boleto['beneficiario_3_cc']);							//287 a 298 Número da Conta Corrente para Crédito do 3º Beneficiário 
		$detalhes->setBeneficiario_3_cc_digito($boleto['beneficiario_3_cc_digito']);			//299 a 299 Dígito da Conta Corrente para Crédito do 3º Beneficiário
		$detalhes->setbeneficiario_3_valor_percent($boleto['beneficiario_3_valor_percent']);	//300 a 314 Valor ou Percentual para Rateio
		$detalhes->setbeneficiario_3_nome($boleto['beneficiario_3_nome']);						//315 a 354 Nome do 3º Beneficiário
		$detalhes->setbeneficiario_3_parcela_id($boleto['beneficiario_3_parcela_id']);			//386 a 391 Parcela
		$detalhes->setbeneficiario_3_floating($boleto['beneficiario_3_floating']);				//392 a 394 Floating para 3º Beneficiário 
		
        $this->setDetalhes($detalhes);
    }

    /**
     * metodo para configurar a remessa
     * @param unknown $dados
     */
    public function config($dados)
    {
        $cabecalho = new HeaderLabel();
        //TESTANDO O HEADERLABEL
        $cabecalho->setCodigoEmpresa($dados['codigo_empresa']);
        $cabecalho->setNomeEmpresa($dados['razao_social']);
        $cabecalho->setNumeroSequencialRemessa($dados['numero_remessa']);
        $cabecalho->setDataGravacao($dados['data_gravacao']);

        $this->setHeaderLabel($cabecalho);
    }

    /**
     * metodo para criar o texto inteiro da remessa
     */
    public function getText()
    {

        $dados = $this->getHeaderLabel()->montaLinha() . self::QUEBRA_LINHA;
        $numero_sequencial = 2;

        foreach ($this->getDetalhes() as $detalhe) {
            $detalhe->setNumeroSequencialRegistro($numero_sequencial++);
			$dados .= $detalhe->montaLinha($detalhe->getIdentificacaoRegistro()) . self::QUEBRA_LINHA;
        }

        $trailler = new Trailler();
        $trailler->setNumeroSequencialRegsitro($numero_sequencial++);
		
        $this->setTrailler($trailler);
        $dados .= $this->getTrailler()->montaLinha();

        return $dados;
    }

    /**
     * metodo para fazer download do arquivo de remessa
     */
    public function save()
    {
        $text = $this->getText();

        if ($this->getFilename() == '') 
            $this->setFilename('CB' . date('dm') . 'A1');
 
		if (!is_dir ($_SERVER["DOCUMENT_ROOT"].'/pages/financeiro/cobranca/remessa/'.date('Y')))
		{
			mkdir($_SERVER["DOCUMENT_ROOT"].'/pages/financeiro/cobranca/remessa/'.date('Y'), 0755, true);	
		}
		
		if (file_put_contents($_SERVER["DOCUMENT_ROOT"].'\pages\financeiro\cobranca\remessa\\'.date('Y').'\\'.$this->getFilename() . '.REM', $text)  === strlen($text))
		{
			return true;
		}else
			return false;
        
    }
	
    /**
     * metodo para fazer download do arquivo de remessa
     */
    public function print_ret()
    {//$this->getFilename().
		return '<textarea rows="30" cols="417">'.$this->getText().'</textarea>';
    }

    /**
     * Metodo para retornar a quantida de detalhes inseridos na remessa
     * @return number
     */
	
    public function countDetalhes()
    {
		$count = 0;
		foreach($this->detalhes as $subarray)
		   $count ++;
			return $count;
	
    }
}
