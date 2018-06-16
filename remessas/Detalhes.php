<?php


//use Exception;

class Detalhes extends Funcoes
{
    
    private $identificacaoRegistro			=	1;		//001 - 001 - 1 -  N CONSTANTE
    private $debito_automatico				=	false;
    private $agenciaDebito				=	'00000';	//002 - 006 - 5 - N
    private $digitoDebito				=	'0';		//007 - 007 - 1 - A
    private $razaoContaCorrente				=	'00000';	//008 - 012 - 5 N
    private $contaCorrente				=	'0000000';	//013 - 019 - 7 - N
    private $digitoContaCorrente			=	'0';		//020 - 020 - 1 - A
    private $identificacaoEmpresaBenificiarioBanco;				//021 - 037 - 17 - A
    private $numeroControleParticipante;					//038 - 062 - 25 - A
    private $codigoBancoDebitoCompensacao;					//063 - 065 - 3 - N
    private $campoMulta;							//066 - 066 - 1 - N
    private $percentualMulta;							//067 - 070 - 4 - N
    private $identificacaoTituloBanco;						//071 - 081 - 11 - N
    private $digitoAutoConsferenciaBancaria;					//082 - 082 - 1 - A
    private $descontoBonificacaoDia			=	'0000000000';	//083 - 092 - 10 - N
    private $condicaoEmissaoPapeletaCobranca		=	2; 		//093 - 093 - 1 - CONSTANTE
    private $identDebitoAutomatico 			=	'S';		//094 - 094 - 1 - A - CONSTANTE
    //PREENCHER ESPAÇOS EM BRANCO						//095 - 104 - 10 - A
    private $indicadorRateioCredito;						//105 - 105 - 1 - A
    private $enderecamentoAvisoDebito 			=	'0';		//106 - 106 - 1 - N - CONSTANTE
    //PREENCHER ESPAÇOS EM BRANCO						//107 - 108 - 2 - A
    private $identificacaoOcorrencia 			=	'01';		//109 - 110 - 2 - N - CONSTANTE
    private $numeroDocumento;							//111 - 120 - 10 - A
    private $dataVencimentoTitulo;						//121 - 126 - 6 - N
    private $valorTitulo;							//127 - 139 - 13 - N
    private $bancoEncarregadoCobranca 			=	"000";		//140 - 142 - 3 - N
    private $agenciaDepositaria				=	'00000'; 	//143 - 147 - 5 - N
    private $especieTitulo				=	'01'; 		//148 - 149 - 2 - N - CONSTRANTE
    private $identificacao				=	"N";		//150 - 150 - 1 - A
    private $dataEmissaoTitulo;							//151 - 156 - 6 - N
    private $instrucao1					=	'00';		//157 -  158 - 2 - N
    private $instrucao2					=	'00'; 		//159 - 160 - 2 - N
    private $valorCobradoDiaAtraso; 						//161 - 173 - 13 - N
    private $dataLimiteDesconto; 						//174 - 179 - 6 - N
    private $valorDesconto;							//180 - 192 - 13 - N
    private $valorIOF;								//192 - 205 - 13 N
    private $valorAbatimentoConcedidoCancelado;					//206 - 218 - 13 - N
    private $identificacaoTipoIncricaoPagador;					//219 - 220 - 2 - N
    private $numeroInscricaoPagador;						//221 - 234 - 14 - N
    private $nomePagador;							//235 - 274 - 40 - A
    private $enderecoPagador;							//275 - 314 - 40 - A
    private $primeiraMensagem;							//315 - 326 - 12 - A
    private $cep;								//327 - 331 - 5 - N
    private $sufixoCep;								//332 - 334 - 3 - N
    private $sacadorSegundaMensagem;						//335 - 394 - 60 - A
    private $numeroSequencialRegistro;						//395 - 400 - 6 - N - AUTOINCREMENTADO E UNICO

    //EXTRA
	private $carteira;
	private $agenciaBeneficiario;						//25 a 29 - códigos da Agência Beneficiários, sem o dígito
	private	$contaBeneficiario;
	private $contaDigitoBeneficiario;
	
	//RATEIO
	private $rateio_codigoParaCalculo			=	'3';

	private $rateio_tipoValorInformado			=	'1';

	private $beneficiario_1_codigo_banco			=	"000";
	private $beneficiario_1_agencia				=	"00000";
	private $beneficiario_1_agencia_digito 			=	"0";
	private $beneficiario_1_cc				=	"000000000000";
	private $beneficiario_1_cc_digito			=	"0";
	private $beneficiario_1_valor_percent			=	"000000000000000";
	private $beneficiario_1_nome				=	"                                        ";
	private $beneficiario_1_parcela_id			=	"";
	private $beneficiario_1_floating			=	"000";

	private $beneficiario_2_codigo_banco			=	"000";
	private $beneficiario_2_agencia				=	"00000";
	private $beneficiario_2_agencia_digito 			=	"0";
	private $beneficiario_2_cc				=	"000000000000";
	private $beneficiario_2_cc_digito			=	"0";
	private $beneficiario_2_valor_percent			=	"000000000000000";
	private $beneficiario_2_nome				=	"                                        ";
	private $beneficiario_2_parcela_id			=	"";
	private $beneficiario_2_floating			=	"000";

	private $beneficiario_3_codigo_banco			=	"000";
	private $beneficiario_3_agencia				=	"00000";
	private $beneficiario_3_agencia_digito 			=	"0";
	private $beneficiario_3_cc					=	"000000000000";
	private $beneficiario_3_cc_digito			=	"0";
	private $beneficiario_3_valor_percent			=	"000000000000000";
	private $beneficiario_3_nome				=	"                                        ";
	private $beneficiario_3_parcela_id			=	"";
	private $beneficiario_3_floating			=	"000";

	
	
	public function getRateio_tipoValorInformado()		{return $this->rateio_tipoValorInformado;}
	public function getRateio_codigoParaCalculo()		{return $this->rateio_codigoParaCalculo;}

	public function getBeneficiario_1_codigo_banco()	{return $this->beneficiario_1_codigo_banco;}
	public function getBeneficiario_1_agencia()			{return $this->beneficiario_1_agencia;}
	public function getBeneficiario_1_agencia_digito()	{return $this->beneficiario_1_agencia_digito;}
	public function getBeneficiario_1_cc()				{return $this->beneficiario_1_cc;}
	public function getBeneficiario_1_cc_digito()		{return $this->beneficiario_1_cc_digito;}
	public function getBeneficiario_1_valor_percent()	{return $this->beneficiario_1_valor_percent;}
	public function getBeneficiario_1_nome()			{return $this->beneficiario_1_nome;}
	public function getBeneficiario_1_parcela_id()		{return $this->beneficiario_1_parcela_id;}
	public function getBeneficiario_1_floating()		{return $this->beneficiario_1_floating;}

	public function getBeneficiario_2_codigo_banco()	{return $this->beneficiario_2_codigo_banco;}
	public function getBeneficiario_2_agencia()			{return $this->beneficiario_2_agencia;}
	public function getBeneficiario_2_agencia_digito()	{return $this->beneficiario_2_agencia_digito;}
	public function getBeneficiario_2_cc()				{return $this->beneficiario_2_cc;}
	public function getBeneficiario_2_cc_digito()		{return $this->beneficiario_2_cc_digito;}
	public function getBeneficiario_2_valor_percent()	{return $this->beneficiario_2_valor_percent;}
	public function getBeneficiario_2_nome()			{return $this->beneficiario_2_nome;}
	public function getBeneficiario_2_parcela_id()		{return $this->beneficiario_2_parcela_id;}
	public function getBeneficiario_2_floating()		{return $this->beneficiario_2_floating;}

	public function getBeneficiario_3_codigo_banco()	{return $this->beneficiario_3_codigo_banco;}
	public function getBeneficiario_3_agencia()			{return $this->beneficiario_3_agencia;}
	public function getBeneficiario_3_agencia_digito()	{return $this->beneficiario_3_agencia_digito;}
	public function getBeneficiario_3_cc()				{return $this->beneficiario_3_cc;}
	public function getBeneficiario_3_cc_digito()		{return $this->beneficiario_3_cc_digito;}
	public function getBeneficiario_3_valor_percent()	{return $this->beneficiario_3_valor_percent;}
	public function getBeneficiario_3_nome()			{return $this->beneficiario_3_nome;}
	public function getBeneficiario_3_parcela_id()		{return $this->beneficiario_3_parcela_id;}
	public function getBeneficiario_3_floating()		{return $this->beneficiario_3_floating;}
	
	
	
	
    public function setBeneficiario_1_agencia($agencia)
    {
            $agencia	= 	(($agencia == '') ? $this->montarBranco($agencia, 5) : $this->addZeros($agencia, 5));
            if ($this->validaTamanhoCampo($agencia, 5)) {
                $this->beneficiario_1_agencia = $agencia;
            } else
                throw new Exception('Error: A quantidade dos digito do numero da agencia beneficiario excedido.');
    }

    public function setBeneficiario_2_agencia($agencia)
    {
            $agencia	= 	(($agencia == '') ? $this->montarBranco($agencia, 5) : $this->addZeros($agencia, 5));
            if ($this->validaTamanhoCampo($agencia, 5)) {
                $this->beneficiario_2_agencia = $agencia;
            } else
                throw new Exception('Error: A quantidade dos digito do numero da agencia beneficiario excedido.');
    }

    public function setBeneficiario_3_agencia($agencia)
    {
		
		$agencia	= 	(($agencia == '') ? $this->montarBranco($agencia, 5) : $this->addZeros($agencia, 5));
		
            if ($this->validaTamanhoCampo($agencia, 5)) {
                $this->beneficiario_3_agencia = $agencia;
            } else
                throw new Exception('Error: A quantidade dos digito do numero da agencia beneficiario excedido.');
    }
	
    public function setBeneficiario_1_agencia_digito($digito)
    {
			$digito	=  (($digito == '') ? $this->montarBranco($digito, 1) : $this->addZeros($digito, 1));
            if ($this->validaTamanhoCampo($digito, 1)) {
                $this->beneficiario_1_agencia_digito = $digito;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
    }
    public function setBeneficiario_2_agencia_digito($digito)
    {
			$digito	=  (($digito == '') ? $this->montarBranco($digito, 1) : $this->addZeros($digito, 1));
            if ($this->validaTamanhoCampo($digito, 1)) {
                $this->beneficiario_2_agencia_digito = $digito;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
    }
    public function setBeneficiario_3_agencia_digito($digito)
    {

			$digito	=  (($digito == '') ? $this->montarBranco($digito, 1) : $this->addZeros($digito, 1));
            if ($this->validaTamanhoCampo($digito, 1)) {
                $this->beneficiario_3_agencia_digito = $digito;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
     }
	
    public function setbeneficiario_1_cc($conta)
    {
           	$conta	=  (($conta == '') ? $this->montarBranco($conta, 12) : $this->addZeros($conta, 12));
            if ($this->validaTamanhoCampo($conta, 12)) {
                $this->beneficiario_1_cc = $conta;
            } else 
                throw new Exception('Error: Quantidade de ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }

    public function setbeneficiario_2_cc($conta)
    {
            $conta	=  (($conta == '') ? $this->montarBranco($conta, 12) : $this->addZeros($conta, 12));
            if ($this->validaTamanhoCampo($conta, 12)) {
                $this->beneficiario_2_cc = $conta;
            } else 
                throw new Exception('Error: Quantidade de ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }

    public function setbeneficiario_3_cc($conta)
    {
			$conta	=  (($conta == '') ? $this->montarBranco($conta, 12) : $this->addZeros($conta, 12));
            if ($this->validaTamanhoCampo($conta, 12)) {
                $this->beneficiario_3_cc = $conta;
            } else 
                throw new Exception('Error: Quantidade de ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
	
    public function setBeneficiario_1_cc_digito($digito_debito)
    {
 		$digito_debito =  (($digito_debito == '')? $this->montarBranco($digito_debito, 1): $this->addZeros($digito_debito, 1));
            if ($this->validaTamanhoCampo($digito_debito, 1)) {
                $this->beneficiario_1_cc_digito = $digito_debito;
            } else 
                throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');
    }

    public function setBeneficiario_2_cc_digito($digito_debito)
    {
 			$digito_debito =  (($digito_debito == '')? $this->montarBranco($digito_debito, 1): $this->addZeros($digito_debito, 1));
            if ($this->validaTamanhoCampo($digito_debito, 1)) {
                $this->beneficiario_2_cc_digito = $digito_debito;
            } else 
                throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');
    }

    public function setBeneficiario_3_cc_digito($digito_debito)
    {
 			$digito_debito =  (($digito_debito == '')? $this->montarBranco($digito_debito, 1): $this->addZeros($digito_debito, 1));
            if ($this->validaTamanhoCampo($digito_debito, 1)) {
                $this->beneficiario_3_cc_digito = $digito_debito;
            } else 
                throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');
    }
	
    public function setbeneficiario_1_codigo_banco($codigo_banco)
    {
        if ($codigo_banco == '237') {
            $this->beneficiario_1_codigo_banco = $codigo_banco;
        } else if ($codigo_banco == '') {
            $this->beneficiario_1_codigo_banco = '   ';
        } else
            $this->beneficiario_1_codigo_banco = '000';
    }
    public function setbeneficiario_2_codigo_banco($codigo_banco)
    {
        if ($codigo_banco == '237') {
            $this->beneficiario_2_codigo_banco = $codigo_banco;
        } else if ($codigo_banco == '') {
            $this->beneficiario_2_codigo_banco = '   ';
        } else
            $this->beneficiario_2_codigo_banco = '000';
    }
    public function setbeneficiario_3_codigo_banco($codigo_banco)
    {
        if ($codigo_banco == '237') {
            $this->beneficiario_3_codigo_banco = $codigo_banco;
        } else if ($codigo_banco == '') {
            $this->beneficiario_3_codigo_banco = '   ';
        } else
            $this->beneficiario_3_codigo_banco = '000';
    }
	
	
    public function setbeneficiario_1_valor_percent($valor)
    {
		
	$valor	=  (($valor == '') ? $this->montarBranco($valor, 15) : $this->addZeros($valor, 15));
            if ($this->validaTamanhoCampo($valor, 15)) {
                $this->beneficiario_1_valor_percent = $valor;
            } else 
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }

    public function setbeneficiario_2_valor_percent($valor)
    {
 	$valor	=  (($valor == '') ? $this->montarBranco($valor, 15) : $this->addZeros($valor, 15));
            if ($this->validaTamanhoCampo($valor, 15)) {
                $this->beneficiario_2_valor_percent = $valor;
            } else 
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }

    public function setbeneficiario_3_valor_percent($valor)
    {
		
	$valor	=  (($valor == '') ? $this->montarBranco($valor, 15) : $this->addZeros($valor, 15));
            if ($this->validaTamanhoCampo($valor, 15)) {
                $this->beneficiario_3_valor_percent = $valor;
            } else 
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
	
	
    public function setbeneficiario_1_nome($nome)
    {
        $nome = $this->montarBranco($nome, 40, 'right');
        if ($this->validaTamanhoCampo($nome, 40)) {
            $this->beneficiario_1_nome = $nome;
        } else throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');
    }
    public function setbeneficiario_2_nome($nome)
    {
        $nome = $this->montarBranco($nome, 40, 'right');
        if ($this->validaTamanhoCampo($nome, 40)) {
            $this->beneficiario_2_nome = $nome;
        } else  throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');
    }
	
    public function setbeneficiario_3_nome($nome)
    {
        $nome = $this->montarBranco($nome, 40, 'right');
        if ($this->validaTamanhoCampo($nome, 40)) {
            $this->beneficiario_3_nome = $nome;
        } else throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');
    }
	
    public function setbeneficiario_1_parcela_id($valor)
    {
	$valor	=  (($valor == '') ? $this->montarBranco($valor, 6) : $this->addZeros($valor, 6));
	if ($this->validaTamanhoCampo($valor, 6)) {
		$this->beneficiario_1_parcela_id = $valor;
	} else  throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
    public function setbeneficiario_2_parcela_id($valor)
    {
		$valor	=  (($valor == '') ? $this->montarBranco($valor, 6) : $this->addZeros($valor, 6));
           if ($this->validaTamanhoCampo($valor, 6)) {
               $this->beneficiario_2_parcela_id = $valor;
           } else 
               throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
    public function setbeneficiario_3_parcela_id($valor)
    {
		$valor	=  (($valor == '') ? $this->montarBranco($valor, 6) : $this->addZeros($valor, 6));
		if ($this->validaTamanhoCampo($valor, 6)) {
				$this->beneficiario_3_parcela_id = $valor;
		} else 
			throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
	
	public function setbeneficiario_1_floating($valor)
    {
		$valor	=  (($valor == '') ? $this->montarBranco($valor, 3) : $this->addZeros($valor, 3));
		if ($this->validaTamanhoCampo($valor, 3)) {
			$this->beneficiario_1_floating = $valor;
		} else 
			throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
    public function setbeneficiario_2_floating($valor)
    {
		$valor	=  (($valor == '') ? $this->montarBranco($valor, 3) : $this->addZeros($valor, 3));
		if ($this->validaTamanhoCampo($valor, 3)) {
			$this->beneficiario_2_floating = $valor;
		} else 
			throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
    public function setbeneficiario_3_floating($valor)
    {
		$valor	=  (($valor == '') ? $this->montarBranco($valor, 3) : $this->addZeros($valor, 3));
		if ($this->validaTamanhoCampo($valor, 3)) {
			$this->beneficiario_3_floating = $valor;
		} else 
			throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
    }
	
	
	
public function getCarteira(){return $this->carteira;}

    /**
     * @return the $agencia_debito
     */
    public function getAgenciaDebito()
    {
        return $this->agenciaDebito;
    }

    /**
     * @return the $digito_debito_debito
     */
    public function getDigitoDebito()
    {
        return $this->digitoDebito;
    }

    /**
     * @return the $razao_conta_corrente
     */
    public function getRazaoContaCorrente()
    {
        return $this->razaoContaCorrente;
    }

    /**
     * @return the $conta_corrente
     */
    public function getContaCorrente()
    {
        return $this->contaCorrente;
    }

    /**
     * @return the $digito_conta_corrente
     */
    public function getDigitoContaCorrente()
    {
        return $this->digitoContaCorrente;
    }

    /**
     * @return the $identificacao_empresa_benificiario_banco
     */
    public function getIdentificacaoEmpresaBenificiarioBanco($inicio = '')
    {
        /*
         * montando numero de identificacao da empresa
         * exemplo: 0|009|01800|0018399|7
			Nas linhas com header 1, Chamamos: getIdentificacaoEmpresaBenificiarioBanco('0');
		 	Nas linhas com header 3 Rateio, Chamamos: getIdentificacaoEmpresaBenificiarioBanco();
         */
        	$identificacao_empresa_benificiario_banco = $inicio .
            $this->getCarteira() .
            $this->getAgenciaBeneficiario() .
            $this->getContaBeneficiario() .
            $this->getContaDigitoBeneficiario();

        return $identificacao_empresa_benificiario_banco;
    }


    /**
     * @return the $numero_controle_participante
     */
    public function getNumeroControleParticipante()
    {
        return $this->numeroControleParticipante;
    }

    /**
     * @return the $codigo_banco_debito_compensacao
     */
    public function getCodigoBancoDebitoCompensacao()
    {
        return $this->codigoBancoDebitoCompensacao;
    }

    /**
     * @return the $campo_multa
     */
    public function getCampoMulta()
    {
        return $this->campoMulta;
    }

    /**
     * @return the $percentual_multa
     */
    public function getPercentualMulta()
    {
        return $this->percentualMulta;
    }

    /**
     * @return the $identificacao_titulo_banco
     */
    public function getIdentificacaoTituloBanco()
    {
        return $this->identificacaoTituloBanco;
    }

    /**
     * @return the $digito_auto_consferencia_bancaria
     */
    public function getDigitoAutoConsferenciaBancaria()
    {
        return $this->digitoVerificadorNossoNumero($this->getCarteira() . $this->getIdentificacaoTituloBanco());
    }

    /**
     * @return the $desconto_bonificacao_dia
     */
    public function getDescontoBonificacaoDia()
    {
        return $this->descontoBonificacaoDia;
    }

    /**
     * @return the $indicador_rateio_credito
     */
    public function getIndicadorRateioCredito()
    {
        return $this->indicadorRateioCredito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoRegistro()
    {
        return $this->identificacaoRegistro;
    }

    /**
     * @return string
     */
    public function getCondicaoEmissaoPapeletaCobranca()
    {
        return $this->condicaoEmissaoPapeletaCobranca;
    }

    /**
     * @return string
     */
    public function getIdentDebitoAutomatico()
    {
        return $this->identDebitoAutomatico;
    }

    /**
     * @return string
     */
    public function getEnderecamentoAvisoDebito()
    {
        return $this->enderecamentoAvisoDebito;
    }

    /**
     * @return int
     */
    public function getIdentificacaoOcorrencia()
    {
        return $this->identificacaoOcorrencia;
    }

    /**
     * @return int
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataVencimentoTitulo()
    {
        return $this->dataVencimentoTitulo;
    }

    /**
     * @return float
     */
    public function getValorTitulo()
    {
        return $this->valorTitulo;
    }

    /**
     * @return int
     */
    public function getBancoEncarregadoCobranca()
    {
        return $this->bancoEncarregadoCobranca;
    }

    /**
     * @return int
     */
    public function getAgenciaDepositaria()
    {
        return $this->agenciaDepositaria;
    }

    /**
     * @return int
     */
    public function getEspecieTitulo()
    {
        return $this->especieTitulo;
    }

    /**
     * @return string
     */
    public function getIdentificacao()
    {
        return $this->identificacao;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataEmissaoTitulo()
    {
        return $this->dataEmissaoTitulo;
    }

    /**
     * @return string
     */
    public function getInstrucao1()
    {
        return $this->instrucao1;
    }

    /**
     * @return string
     */
    public function getInstrucao2()
    {
        return $this->instrucao2;
    }

    /**
     * @return float
     */
    public function getValorCobradoDiaAtraso()
    {
        return $this->valorCobradoDiaAtraso;
    }

    /**
     * @return string ddmmyy
     */
    public function getDataLimiteDesconto()
    {
        return $this->dataLimiteDesconto;
    }

    /**
     * @return float
     */
    public function getValorDesconto()
    {
        return $this->valorDesconto;
    }

    /**
     * @return float
     */
    public function getValorIOF()
    {
        return $this->valorIOF;
    }

    /**
     * @return float
     */
    public function getValorAbatimentoConcedidoCancelado()
    {
        return $this->valorAbatimentoConcedidoCancelado;
    }

    /**
     * @return int
     */
    public function getIdentificacaoTipoIncricaoPagador()
    {
        return $this->identificacaoTipoIncricaoPagador;
    }

    /**
     * @return int
     */
    public function getNumeroInscricaoPagador()
    {
        return $this->numeroInscricaoPagador;
    }

    /**
     * @return string
     */
    public function getNomePagador()
    {
        return $this->nomePagador;
    }

    /**
     * @return string
     */
    public function getEnderecoPagador()
    {
        return $this->enderecoPagador;
    }

    /**
     * @return string
     */
    public function getPrimeiraMensagem()
    {
        return $this->primeiraMensagem;
    }

    /**
     * @return int
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @return int
     */
    public function getSufixoCep()
    {
        return $this->sufixoCep;
    }

    /**
     * @return string
     */
    public function getSacadorSegundaMensagem()
    {
        return $this->sacadorSegundaMensagem;
    }

    /**
     * @return int
     */
    public function getNumeroSequencialRegistro()
    {
        return $this->numeroSequencialRegistro;
    }
	
	public function getAgenciaBeneficiario()
    {
        return $this->agenciaBeneficiario;
    }
	
	public function getContaBeneficiario()
    {
        return $this->contaBeneficiario;
    }
	
	public function getContaDigitoBeneficiario()
    {
        return $this->contaDigitoBeneficiario;
    }
    /**
     * @param field_type $agencia_debito
     */
    public function setAgenciaDebito($agencia_debito)
    {
            $agencia_debito = $this->addZeros($agencia_debito, 5);
			
            if ($this->validaTamanhoCampo($agencia_debito, 5)) {
                $this->agenciaDebito = $agencia_debito;
            } else
                throw new Exception('Error: A quantidade dos digito do numero da agencia excedido.');
    }

    /**
     * @param field_type $digito_debito_debito
     */
    public function setDigitoDebito($digito_debito_debito)
    {

			$digito_debito_debito = $this->addZeros($digito_debito_debito, 1);
            if ($this->validaTamanhoCampo($digito_debito_debito, 1)) {
                $this->digitoDebito = $digito_debito_debito;
            } else {
                throw new Exception('Error: Quantidade de digitos para o campo Digito Agencia Debito invalidos.');
            }

    }

    /**
     * @param field_type $razao_conta_corrente
     */
    public function setRazaoContaCorrente($razao_conta_corrente)
    {

            $razao_conta_corrente = $this->addZeros($razao_conta_corrente, 5);
            if ($this->validaTamanhoCampo($razao_conta_corrente, 5)) {
                $this->razaoContaCorrente = $razao_conta_corrente;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Razão Conta Corrente invalidos.');


    }

    /**
     * @param field_type $conta_corrente
     */
    public function setContaCorrente($conta_corrente)
    {
        //verificando se é um numero
        if (is_numeric($conta_corrente)) {
            $conta_corrente = $this->addZeros($conta_corrente, 7);

            if ($this->validaTamanhoCampo($conta_corrente, 7)) {
                $this->contaCorrente = $conta_corrente;
            } else {
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Conta Corrente não é um numero.');
        }
    }

    /**
     * @param field_type $digito_conta_corrente
     */
    public function setDigitoContaCorrente($digito_conta_corrente)
    {
        //verificando se � numerico
        if (is_numeric($digito_conta_corrente)) {
            if ($this->validaTamanhoCampo($digito_conta_corrente, 1)) {
                $this->digitoContaCorrente = $digito_conta_corrente;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente.');
            }
        } else {
            throw new Exception('Error: O campo Digito Conta Corrente não é um numero.');
        }
    }

    /**
     * semelhante ao numero do documento - pode ser uma chave unica de identificação de cada boleto da remessa
     * @param field_type $numero_controle_participante
     */
    public function setNumeroControleParticipante($numero_controle_participante)
    {
        //verificando e � um numero
        if (is_numeric($numero_controle_participante)) {
            //adicionando caracteres zeros
            $numero_controle_participante = $this->addZeros($numero_controle_participante, 25);
            //verificando tamanho da string
            if ($this->validaTamanhoCampo($numero_controle_participante, 25)) {
                $this->numeroControleParticipante = $numero_controle_participante;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Numero Controle Participante invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Numero Controle Participante não é um numero.');
        }
    }

    /**
     * se existir debito automatico para o beneficiario, dever� ser passado como parametro TRUE
     * @param string $codigo_banco_debito_compensacao
     */
    public function setCodigoBancoDebitoCompensacao($codigo_banco_debito_compensacao)
    {
        if ($codigo_banco_debito_compensacao == '237') {
            $this->codigoBancoDebitoCompensacao = $codigo_banco_debito_compensacao;
        } else {
            $this->codigoBancoDebitoCompensacao = '000';
        }
    }

    /**
     * habilita o campo para receber a porcentagem de multas por atraso de pagamento
     * @param field_type $campo_multa
     */
    public function setCampoMulta($campo_multa = '')
    {
        if ($campo_multa <> '') {
            $this->campoMulta = 2;
        } else {
            $this->campoMulta = '0';
        }
    }

    /**
     * @param field_type $percentual_multa
     */
    public function setPercentualMulta($percentual_multa)
    {
        //verificando e o campo multa foi setado como verdadeiro
        if ($this->getCampoMulta()) {
            //verificando se � um numero
            if (is_numeric($percentual_multa)) {
                //adicionando caracteres zeros na string
                $percentual_multa = $this->addZeros($percentual_multa, 4);
                //verificando o tamnho da string
                if ($this->validaTamanhoCampo($percentual_multa, 4)) {
                    $this->percentualMulta = $percentual_multa;
                } else {
                    throw new Exception('Error: Quantidade de caracteres do campo Percentual Multa invalidos.');
                }
            } else {
                throw new Exception('Error: O campo Percentual Multa não é um numero.');
            }
        } else {
            $this->percentualMulta = '0000';
        }
    }

    /**
     * campo de NOSSO NUMERO, identificador unico para cada boleto gerado
     * @param field_type $identificacao_titulo_banco
     */
    public function setIdentificacaoTituloBanco($identificacao_titulo_banco)
    {
        //verificando se � um numero
        if (is_numeric($identificacao_titulo_banco)) {
            //adicionando zeros na string
            $identificacao_titulo_banco = $this->addZeros($identificacao_titulo_banco, 11);
            //verificando o tamnho da string
            if ($this->validaTamanhoCampo($identificacao_titulo_banco, 11)) {
                $this->identificacaoTituloBanco = $identificacao_titulo_banco;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Identificação Titulo Banco invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Identificação Titulo Banco não é um numero.');
        }
    }

    /**
     * valor de bonifica��o por dia
     * @param field_type $desconto_bonificacao_dia
     */
    public function setDescontoBonificacaoDia($desconto_bonificacao_dia)
    {
        //verificando se � um numero
        if (is_numeric($desconto_bonificacao_dia)) {
            //adicionando zeros na string
            $desconto_bonificacao_dia = $this->addZeros($desconto_bonificacao_dia, 10);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($desconto_bonificacao_dia, 10)) {
                $this->descontoBonificacaoDia = $desconto_bonificacao_dia;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Desconto Bonificação Dia invalidos');
            }
        } else {
            throw new Exception('Error: O campo Desconto Bonificação Dia  não é um numero.');
        }
    }

    /**
     * @param string $indicador_rateio_credito
     */
    public function setIndicadorRateioCredito($indicador_rateio_credito)
    {
        if ($indicador_rateio_credito == '0') {
            $this->indicadorRateioCredito = ' ';
        } else
            $this->indicadorRateioCredito = 'R';
    }

    /**
     * @param field_type $numero_documento
     */
    public function setNumeroDocumento($numero_documento)
    {
        //verificando se � alfanumerico
        if (ctype_alnum($numero_documento)) {
            //adicionando zeros na string
            $numero_documento = $this->addZeros($numero_documento, 10);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($numero_documento, 10)) {
                $this->numeroDocumento = $numero_documento;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Numero Documento invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Numero Documento não é alfanumerico.');
        }
    }

    /**
     * @param field_type $data_vencimento_titulo
     */
    public function setDataVencimentoTitulo($data_vencimento_titulo)
    {
        //verificando se � um numero
        if (is_numeric($data_vencimento_titulo)) {
            //adicionando zeros na string
            $data_vencimento_titulo = $this->addZeros($data_vencimento_titulo, 6);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($data_vencimento_titulo, 6)) {
                $this->dataVencimentoTitulo = $data_vencimento_titulo;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Vencimento Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Vencimento Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $valor_titulo
     */
    public function setValorTitulo($valor_titulo)
    {
        //verificando se � um numero
        if (is_numeric($valor_titulo)) {
            //adicionando zeros na string
            $valor_titulo = $this->addZeros($valor_titulo, 13);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_titulo, 13)) {
                $this->valorTitulo = $this->removeFormatacaoMoeda($valor_titulo);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $data_emissao_titulo
     */
    public function setDataEmissaoTitulo($data_emissao_titulo)
    {
        //verificando se � um numero
        if (is_numeric($data_emissao_titulo)) {
            //adicionando zeros
            $data_emissao_titulo = $this->addZeros($data_emissao_titulo, 6);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($data_emissao_titulo, 6)) {
                $this->dataEmissaoTitulo = $data_emissao_titulo;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Emiss�o Titulo invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Emissao Titulo não é um numero.');
        }
    }

    /**
     * @param field_type $valo_cobrado_dia_atraso
     */
    public function setValorCobradoDiaAtraso($valor_cobrado_dia_atraso)
    {
        //verifica se � um numero
        if (is_numeric($valor_cobrado_dia_atraso)) {
            //adicionando caracteres na string
            $valor_cobrado_dia_atraso = $this->addZeros($valor_cobrado_dia_atraso, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_cobrado_dia_atraso, 13)) {
                $this->valorCobradoDiaAtraso = $this->removeFormatacaoMoeda($valor_cobrado_dia_atraso);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Cobrado Dia Atraso invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Cobrado Dia Atraso não é um numero.');
        }
    }

    /**
     * @param field_type $data_limite_desconto
     */
    public function setDataLimiteDesconto($data_limite_desconto)
    {
        //verificando se � um numero
        if (is_numeric($data_limite_desconto)) {
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($data_limite_desconto, 6)) {
                $this->dataLimiteDesconto = $data_limite_desconto;
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Data Limite Desconto invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Data Limite Desconto não é um numero.');
        }
    }

    /**
     * @param field_type $valor_desconto
     */
    public function setValorDesconto($valor_desconto)
    {
        //verificando se � um numero
        if (is_numeric($valor_desconto)) {
            //adicionando zeros na string
            $valor_desconto = $this->addZeros($valor_desconto, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_desconto, 13)) {
                $this->valorDesconto = $this->removeFormatacaoMoeda($valor_desconto);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Desconto não é um numero.');
        }
    }

    /**
     * @param field_type $valor_iof
     */
    public function setValorIOF($valor_iof = 0)
    {
        //verificando se � um numero
        if (is_numeric($valor_iof)) {
            //adicionando zeros na string
            $valor_iof = $this->addZeros($valor_iof, 13);
            //verificando a quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_iof, 13)) {
                $this->valorIOF = $this->removeFormatacaoMoeda($valor_iof);
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor IOF invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor IOF não é um numero.');
        }
    }

    /**
     * @param field_type $valor_abatimento_concedido_cancelado
     */
    public function setValorAbatimentoConcedidoCancelado($valor_abatimento_concedido_cancelado = 0)
    {
        //verifica se � um numero
        if (is_numeric($valor_abatimento_concedido_cancelado)) {
            //adicionando zeros na string
            $valor_abatimento_concedido_cancelado = $this->addZeros($valor_abatimento_concedido_cancelado, 13);
            //verificando quantidade de caracteres
            if ($this->validaTamanhoCampo($valor_abatimento_concedido_cancelado, 13)) {
                $this->valorAbatimentoConcedidoCancelado = $this->removeFormatacaoMoeda(
                    $valor_abatimento_concedido_cancelado
                );
            } else {
                throw new Exception('Error: Quantidade de caracteres do campo Valor Concedido Cancelado invalidos.');
            }
        } else {
            throw new Exception('Error: O campo Valor Abatimento Concedido Cancelado não é um numero.');
        }
    }

    /**
     * @param field_type $identificacao_tipo_incricao_pagador
     */
    public function setIdentificacaoTipoIncricaoPagador($identificacao_tipo_incricao_pagador)
    {
        if ($identificacao_tipo_incricao_pagador == 'CPF') {

            $this->identificacaoTipoIncricaoPagador = '01';
        } elseif ($identificacao_tipo_incricao_pagador == 'CNPJ') {

            $this->identificacaoTipoIncricaoPagador = '02';
        } elseif ($identificacao_tipo_incricao_pagador == 'PIS') {

            $this->identificacaoTipoIncricaoPagador = '03';
        } elseif ($identificacao_tipo_incricao_pagador == 'NAO_TEM') {

            $this->identificacaoTipoIncricaoPagador = '98';
        } elseif ($identificacao_tipo_incricao_pagador == 'OUTROS') {

            $this->identificacaoTipoIncricaoPagador = '99';
        } else {
            throw new Exception('Error - Valor do tipo de pagador esta incorreto.');
        }
    }

    /**
     * @param field_type $numero_inscricao_pagador
     */
    public function setNumeroInscricaoPagador($numero_inscricao_pagador)
    {
        //verifica se � um numero
        if (is_numeric($numero_inscricao_pagador)) {
            //verificando o tipo de pagador
            if ($this->getIdentificacaoTipoIncricaoPagador() == '01') {
                if ($this->validaTamanhoCampo($numero_inscricao_pagador, 11)) {
                    //completando campo
                    $numero_inscricao_pagador = '000' . $numero_inscricao_pagador;

                    $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                } else {
                    throw new Exception('Error -  CPF do campo Numero Inscrição Pagador Invalido.');
                }
            } elseif ($this->getIdentificacaoTipoIncricaoPagador() == '02') {
                //verificando o tamanho do campo
                if ($this->validaTamanhoCampo($numero_inscricao_pagador, 14)) {
                    $this->numeroInscricaoPagador = $numero_inscricao_pagador;
                } else {
                    throw new Exception('Error -  CNPJ do campo Numero Inscrição Pagador Invalido.');
                }
            } else {
                throw new Exception('Error -  O campo Numero Inscrição é invalido.');
            }
        } else {
            throw new Exception('Error -  O campo Numero Inscrição Pagador não é um numero.');
        }
    }

    /**
     * @param field_type $nome_pagador
     */
    public function setNomePagador($nome_pagador)
    {

        $nome_pagador = $this->montarBranco($nome_pagador, 40, 'right');

        if ($this->validaTamanhoCampo($nome_pagador, 40)) {
            $this->nomePagador = $nome_pagador;
        } else {
            throw new Exception('Error - Nome do pagador invalido, excedido o tamanho maximo de 40 caracteres.');
        }
    }

    /**
     * @param field_type $endereco_pagador
     */
    public function setEnderecoPagador($endereco_pagador)
    {
        //	die($endereco_pagador);
        $tamanho = strlen($endereco_pagador);
        if ($tamanho > 40) {

            $endereco_pagador = $this->resumeTexto($endereco_pagador, 39);

            $endereco_pagador = $this->montarBranco($endereco_pagador, 40, 'right');

            if ($this->validaTamanhoCampo($endereco_pagador, 40)) {
                $this->enderecoPagador = $endereco_pagador;
            } else {
                throw new Exception(
                    'Error - Endereço do pagador invalido, excedido o tamanho maximo de 40 caracteres.'
                );
            }
        } else {

            $endereco_pagador = $this->montarBranco($endereco_pagador, 40, 'right');

            if ($this->validaTamanhoCampo($endereco_pagador, 40)) {
                $this->enderecoPagador = $endereco_pagador;
            } else {
                throw new Exception(
                    'Error - Endereço do pagador invalido, excedido o tamanho maximo de 40 caracteres.'
                );
            }
        }
    }

    /**
     * @param field_type $primeira_mensagem
     */
    public function setPrimeiraMensagem($primeira_mensagem)
    {
        //preenchendo com brancos
        $primeira_mensagem = $this->montarBranco($primeira_mensagem, 12, 'right');

        if ($this->validaTamanhoCampo($primeira_mensagem, 12)) {
            $this->primeiraMensagem = $primeira_mensagem;
        } else {
            throw new Exception('Error - Primeira mensagem invalida, excedido o tamanho maximo de 12 caracteres.');
        }
    }

    /**
     * @param field_type $cep
     */
    public function setCep($cep)
    {
        //verificando se � um numero
        if (is_numeric($cep)) {
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($cep, 5)) {
                $this->cep = $this->addZeros($cep, 5);
            } else {
                throw new Exception('Error - Quantidade de caracteres do compo CEP invalidos.');
            }
        } else {
            throw new Exception('Error - O campos CEP não é um numero.');
        }
    }

    /**
     * @param field_type $sufixo_cep
     */
    public function setSufixoCep($sufixo_cep)
    {
        //verificando se � um numero
        if (is_numeric($sufixo_cep)) {
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($sufixo_cep, 3)) {
                $this->sufixoCep = $this->addZeros($sufixo_cep, 3);
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Sufixo invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Sufixo CEP não é um numero.');
        }
    }

    /**
     * N�o utilizar as express�es 'taxa banc�ria' ou 'tarifa banc�ria' nos boletos de
     * cobran�a, pois essa tarifa refere-se � negociada pelo Banco com seu cliente
     * benefici�rio. Orienta��o da FEBRABAN (Comunicado FB-170/2005).
     *
     * @param field_type $sacador_segunda_mensagem
     */
    public function setSacadorSegundaMensagem($sacador_segunda_mensagem)
    {
        //preenchendo com brancos
        $sacador_segunda_mensagem = $this->montarBranco($sacador_segunda_mensagem, 60);

        if ($this->validaTamanhoCampo($sacador_segunda_mensagem, 60)) {
            $this->sacadorSegundaMensagem = $sacador_segunda_mensagem;
        } else {
            throw new Exception('Error - Dados da segunda mensagem estão invalidos.');
        }
    }

    /**
     * @param field_type $numero_sequencial_registro
     */
    public function setNumeroSequencialRegistro($numero_sequencial_registro)
    {
        //verificando se � um numero
        if (is_numeric($numero_sequencial_registro)) {
            //completando com zeros na string
            $numero_sequencial_registro = $this->addZeros($numero_sequencial_registro, 6);
            //verificando o tamanho da string
            if ($this->validaTamanhoCampo($numero_sequencial_registro, 6)) {
                $this->numeroSequencialRegistro = $numero_sequencial_registro;
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Numero Sequencial Registro invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Numero Sequencial Registro não é um numero.');
        }
    }

    /**
     * @param field_type $carteira
     */
    public function setCarteira($carteira)
    {
        //verificando se � um numero
        if (is_numeric($carteira)) {
            $carteira = $this->addZeros($carteira, 3);
            if ($this->validaTamanhoCampo($carteira, 3)) {
                $this->carteira = $carteira;
            } else {
                throw new Exception('Error - Quantidade de caracteres do campo Carteira estão invalidos.');
            }
        } else {
            throw new Exception('Error - O campos Carteira não é um numero.');
        }
    }
	
    /**
     * @param field_type $agencia_debito
     */
    public function setAgenciaBeneficiario($agencia_beneficiario)
    {
        if (is_numeric($agencia_beneficiario)) {
            $agencia_beneficiario = $this->addZeros($agencia_beneficiario, 5);
            if ($this->validaTamanhoCampo($agencia_beneficiario, 5)) {
                $this->agenciaBeneficiario = $agencia_beneficiario;
            } else
                throw new Exception('Error: A quantidade dos digito do numero da agencia beneficiario excedido.');
        } else 
            throw new Exception('Error: O campo Agencia Beneficiario não é um numero.');
    }
	
    /**
     * @param field_type $conta_corrente
     */
    public function setContaBeneficiario($conta_corrente_beneficiario)
    {
        //verificando se � um numero
        if (is_numeric($conta_corrente_beneficiario)) {
            $conta_corrente_beneficiario = $this->addZeros($conta_corrente_beneficiario, 7);

            if ($this->validaTamanhoCampo($conta_corrente_beneficiario, 7)) {
                $this->contaBeneficiario = $conta_corrente_beneficiario;
            } else 
                throw new Exception('Error: Quantidade d ecaracteres do campo Conta Corrente Beneficiario invalidos.');
        } else 
            throw new Exception('Error: O campo Conta Corrente beneficiario não é um numero.');
        
    }

    /**
     * @param field_type $digito_conta_corrente
     */
    public function setContaDigitoBeneficiario($digito_conta_corrente_beneficiario)
    {
        //verificando se � numerico
        if (is_numeric($digito_conta_corrente_beneficiario)) {
            if ($this->validaTamanhoCampo($digito_conta_corrente_beneficiario, 1)) {
                $this->contaDigitoBeneficiario = $digito_conta_corrente_beneficiario;
            } else 
                throw new Exception('Error: Quantidade de caracteres do campo Digito Conta Conrrente do beneficiario.');
        } else 
            throw new Exception('Error: O campo Digito Conta Corrente beneficiario não é um numero.');
    }

	
    public function setidentificacaoRegistro($value)
    {
        //verificando se � numerico
        if (is_numeric($value)) {
            if ($this->validaTamanhoCampo($value, 1)) {
                $this->identificacaoRegistro = $value;
            } else 
                throw new Exception('Error: identificacaoRegistro.');
        } else 
            throw new Exception('Error: identificacaoRegistro.');
    }
	
	
    public function montaLinha($IdentificaRegistro = '1')
    {
	if ($IdentificaRegistro == "1")
	{
            $linha = $this->getIdentificacaoRegistro().				//001 a 001 Identificação do Registro
            $this->getAgenciaDebito() .						//002 a 006 Agência de Débito (opcional) 
            $this->getDigitoDebito() .						//007 a 007 Dígito da Agência de Débito (opcional) 001
            $this->getRazaoContaCorrente() .					//008 a 012 Razão da Conta Corrente (opcional) 005
            $this->getContaCorrente() .						//013 a 019 Conta Corrente (opcional) 007
            $this->getDigitoContaCorrente() .					//020 a 020 Dígito da Conta Corrente (opcional) 001
            $this->getIdentificacaoEmpresaBenificiarioBanco('0') . 		//021 a 037 Identificação da Empresa Beneficiária no Banco 017
            $this->getNumeroControleParticipante() .				//038 a 062 Nº Controle do Participante		
            $this->getCodigoBancoDebitoCompensacao() .				//063 a 065 Código do Banco 
            $this->getCampoMulta() .						//066 a 066 Campo de Multa
            $this->getPercentualMulta() .					//067 a 070 Percentual de multa
            $this->getIdentificacaoTituloBanco() .				//071 a 081 Identificação do Título no Banco
            $this->getDigitoAutoConsferenciaBancaria() .			//082 a 082 Digito de Auto Conferencia do Número 
            $this->getDescontoBonificacaoDia() .				//083 a 092 Desconto Bonificação por dia
            $this->getCondicaoEmissaoPapeletaCobranca() .			//093 a 093 Condição para Emissão da Papeleta de
            $this->getIdentDebitoAutomatico() .					//094 a 094 Ident. se emite Boleto para Débito
            $this->montarBranco('', 10) .					//095 a 104 Identificação da Operação do Banco 
            $this->getIndicadorRateioCredito() .				//105 a 105 Indicador Rateio Crédito (opcional)
            $this->getEnderecamentoAvisoDebito() .				//106 a 106 Endereçamento para Aviso do Débito 
            $this->montarBranco('', 2) .					//107 a 108 Quantidade possíveis de pagamento 
            $this->getIdentificacaoOcorrencia() .				//109 a 110 Identificação da ocorrência
            $this->getNumeroDocumento() .					//111 a 120 Nº do Documento
            $this->getDataVencimentoTitulo() .					//121 a 126 Data do Vencimento do Título
            $this->getValorTitulo() .						//127 a 139 Valor do Título
            $this->getBancoEncarregadoCobranca() .				//140 a 142 Banco Encarregado da Cobrança 
            $this->getAgenciaDepositaria() .					//143 a 147 Agência Depositária
            $this->getEspecieTitulo() .						//148 a 149 Espécie de Título 
            $this->getIdentificacao() .						//150 a 150 Identificação
            $this->getDataEmissaoTitulo() .					//151 a 156 Data da emissão do Título
            $this->getInstrucao1() .						//157 a 158 1ª instrução
            $this->getInstrucao2() .						//159 a 160 2ª instrução
            $this->getValorCobradoDiaAtraso() .					//161 a 173 Valor a ser cobrado por Dia de Atraso
            $this->getDataLimiteDesconto() .					//174 a 179 Data Limite P/Concessão de Desconto 006
            $this->getValorDesconto() .						//180 a 192 Valor do Desconto 013 
            $this->getValorIOF() .						//193 a 205 Valor do IOF 
            $this->getValorAbatimentoConcedidoCancelado() .			//206 a 218 Valor do Abatimento a ser concedido ou cancelado
            $this->getIdentificacaoTipoIncricaoPagador() .			//219 a 220 Identificação do Tipo de Inscrição do Pagador
            $this->getNumeroInscricaoPagador() .				//221 a 234 Nº Inscrição do Pagador
            $this->getNomePagador() .						//235 a 274 Nome do Pagador
            $this->getEnderecoPagador() .					//275 a 314 Endereço Completo 
            $this->getPrimeiraMensagem() .					//315 a 326 1ª Mensagem
            $this->getCep() .							//327 a 331 CEP 
            $this->getSufixoCep() .						//332 a 334 Sufixo do CEP
            $this->getSacadorSegundaMensagem() .				//335 a 394 Sacador/Avalista ou 2ª Mensagem 
            $this->getNumeroSequencialRegistro();				//395 a 400 Nº Seqüencial do Registro
		}
		else
		if ($IdentificaRegistro == "3")
		{

			$linha = $this->getIdentificacaoRegistro() .			//001 a 001 Identificação do Registro
			$this->getIdentificacaoEmpresaBenificiarioBanco() .		//002 a 017 Identificação da Empresa no Banco
			$this->getIdentificacaoTituloBanco().				//018 a 028 Identificação Título no Banco
			$this->getDigitoAutoConsferenciaBancaria() .			//029 a 029 Identificação Título no Banco
			$this->getRateio_codigoParaCalculo().				//030 a 030 Código Para Cálculo do Rateio 001
			$this->getRateio_tipoValorInformado().				//031 a 031 Tipo de Valor Informado 
			$this->montarBranco('', 12).					//032 a 043 Filler

			$this->getBeneficiario_1_codigo_banco().			//044 a 046 Código do Banco para Crédito do 1º Beneficiário
			$this->getbeneficiario_1_agencia().				//047 a 051 Código da Agência para Crédito do 1º Beneficiário
			$this->getbeneficiario_1_agencia_digito().			//052 a 052 Dígito da Agência para Crédito do 1º Beneficiário 
			$this->getbeneficiario_1_cc().					//053 a 064 Número da Conta Corrente para Crédito do 1º Beneficiário
			$this->getbeneficiario_1_cc_digito().				//065 a 065 Dígito da Conta Corrente para Crédito do 1º Beneficiário 
			$this->getbeneficiario_1_valor_percent().			//066 a 080 Valor, ou Percentual para Rateio
			$this->getbeneficiario_1_nome().				//081 a 120 Nome do 1º Beneficiário
			$this->montarBranco('', 31).					//121 a 151 Filler
			$this->getbeneficiario_1_parcela_id().				//152 a 157 Parcela id
			$this->getbeneficiario_1_floating().				//158 a 160 Floating para o 1º Beneficiário 
				
			$this->getbeneficiario_2_codigo_banco().			//161 a 163 Código do Banco para Credito do 2º Beneficiário
			$this->getbeneficiario_2_agencia().				//164 a 168 Código da Agência para Crédito do 2º Beneficiário 
			$this->getbeneficiario_2_agencia_digito().			//169 a 169 Dígito da Agência para Crédito do 2º Beneficiário 
			$this->getbeneficiario_2_cc().					//170 a 181 Número da Conta Corrente para Crédito do 2º Beneficiário 
			$this->getbeneficiario_2_cc_digito().				//182 a 182 Dígito da Conta Corrente para Crédito do 2º Beneficiário
			$this->getbeneficiario_2_valor_percent().			//183 a 197 Valor, ou Percentual para Rateio 
			$this->getbeneficiario_2_nome().				//198 a 237 Nome do 2º Beneficiário 
			$this->montarBranco('', 31).					//238 a 268 Filler
			$this->getbeneficiario_2_parcela_id().				//269 a 274 Parcela
			$this->getbeneficiario_2_floating().				//275 a 277 Floating para o 2º Beneficiário
				
			$this->getbeneficiario_3_codigo_banco().			//278 a 280 Código do Banco para Crédito do 3º Beneficiário 
			$this->getbeneficiario_3_agencia().				//281 a 285 Código da Agência para Crédito do 3º Beneficiário
			$this->getbeneficiario_3_agencia_digito().			//286 a 286 Dígito da Agência para Crédito do 3º Beneficiário 
			$this->getbeneficiario_3_cc().					//287 a 298 Número da Conta Corrente para Crédito do 3º Beneficiário
			$this->getbeneficiario_3_cc_digito().				//299 a 299 Dígito da Conta Corrente para Crédito do 3º Beneficiário
			$this->getbeneficiario_3_valor_percent().			//300 a 314 Valor ou Percentual para Rateio 
			$this->getbeneficiario_3_nome().				//315 a 354 Nome do 3º Beneficiário
			$this->montarBranco('', 31).					//355 a 385 Filler
			$this->getbeneficiario_3_parcela_id().				//386 a 391 Parcela 
			$this->getbeneficiario_3_floating().				//392 a 394 Floating para 3º Beneficiário	
				
			$this->getNumeroSequencialRegistro();				//395 a 400 Número Seqüencial do Registro
			//die($linha);
		}
			
        return $this->validaLinha($linha);
    }
}



