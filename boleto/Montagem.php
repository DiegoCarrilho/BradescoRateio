<?

class BoletoDetalhes extends Funcoes
{
	// IDENTIFICAÇÃO DO BOLETO
	private $boletoID				=	'';				//Var com o ID do boleto
	const	boletoSize				=	25;				//Size do BoletoID
	
	private	$nossoNumero			=	'';				//Var com o Nosso Numero do Boleto

	// VALORES QUE DEVEM SER SETADOS PARA SALVAR O BOLETO NA DB
	private	$valorTitulo;
	private	$valorPago				=	0;
	private	$valorDesconto1			=	0;
	private	$valorDesconto2			=	0;
	private	$valorDesconto3			=	0;
	
	// INFORMAÇÕES DE DATAS NO BOLETO	-FORMATO	date('Ymd');	00000000

	private	$dataVencimento;		//Data de Vencimento do Boleto
	private	$dataPagamento			=	'00000000';		//Data de Pagamento do Boleto
	private	$dataDesconto1			=	'00000000';		//Data Limite para Desconto 1
	private	$dataDesconto2			=	'00000000';		//Data Limite para Desconto 2
	private	$dataDesconto3			=	'00000000';		//Data Limite para Desconto 3		
	private	$dataEmissao			=	'00000000';		//Data da Emissão do boleto
	private	$dataOcorrenciaRetorno	=	'00000000';		//Data de confirmação de registro Via Retorno Bancário
	private	$dataOcorrenciaBaixa	=	'00000000';		//Data da Baixa do boleto, Através de Retorno

	// Identificações gerais do boleto
	private	$carneID;
	private	$cedenteID;
	private	$matriculaID;
	private	$rateioID				=	0;
	private	$remessaID				=	0;
	//Débito id vindo da tabela de Débitos do Aluno, o ID faz referencia a qual débito o boleto é responsavél recebimento
	private	$debitoID;
	
	private	$boletoStatus	=	'98';	//98 será considerado boleto gerado e ainda sem remessa
    /**
     * 	Boleto Gerado e Pago Motivos 06 Pago REG 17 Pago sem REG 99 Pago Baixa Manual
	 *	Boleto Gerado Não Pago e Baixado pelo Banco MOTIVOS 10: Baixa por Instrução Bancaria
	 *	Boleto Cancelado ou Desativado
     */
	private	$usuarioOcorrenciaFinal	=	0;
	
	//boolean 0=false	1=true	//Define se o boleto entra na fila para remessa
	private	$geraRemessa			=	0;

	
	//RATEIO
	private $beneficiario_1_id		=	0;
	private $beneficiario_2_id		=	0;
	private $beneficiario_3_id		=	0;
	
	private $beneficiario_1_porcentagem		=	0;
	private $beneficiario_2_porcentagem		=	0;
	private $beneficiario_3_porcentagem		=	0;
	
	private $beneficiario_1_status		=	'0';
	private $beneficiario_2_status		=	'0';
	private $beneficiario_3_status		=	'0';
	
	public function setbeneficiario_1_status($beneficiario_1_status = 0)
	{
		$this->beneficiario_1_status = $beneficiario_1_status;
	}
	public function setbeneficiario_2_status($beneficiario_2_status = 0)
	{
		$this->beneficiario_2_status = $beneficiario_2_status;
	}
	public function setbeneficiario_3_status($beneficiario_3_status = 0)
	{
		$this->beneficiario_3_status = $beneficiario_3_status;
	}
	
	public function setbeneficiario_1_id($beneficiario_1_id = 0)
    {
		$beneficiario_1_id = (($beneficiario_1_id == "")? '0':$beneficiario_1_id);
        if (is_numeric($beneficiario_1_id))
		{
				$this->beneficiario_1_id = $this->removeFormatacaoMoeda($beneficiario_1_id);
        } else
			throw new Exception('Error: O campo beneficiario_1_id  não é um numero.');
    }
	
	public function setbeneficiario_2_id($beneficiario_2_id = 0)
    {
		$beneficiario_2_id = (($beneficiario_2_id == "")? '0':$beneficiario_2_id);
        if (is_numeric($beneficiario_2_id))
		{
				$this->beneficiario_2_id = $this->removeFormatacaoMoeda($beneficiario_2_id);
        } else
			throw new Exception('Error: O campo beneficiario_2_id  não é um numero.');
    }
	
	public function setbeneficiario_3_id($beneficiario_3_id = 0)
    {
		$beneficiario_3_id = (($beneficiario_3_id == "")? '0':$beneficiario_3_id);
        if (is_numeric($beneficiario_3_id))
		{
				$this->beneficiario_3_id = $this->removeFormatacaoMoeda($beneficiario_3_id);
        } else
			throw new Exception('Error: O campo beneficiario_3_id  não é um numero.');
    }
	
	
	
	public function setbeneficiario_1_porcentagem($beneficiario_1_porcentagem = 0)
    {
		$beneficiario_1_porcentagem = (($beneficiario_1_porcentagem == "")? '0':$beneficiario_1_porcentagem);
        if (is_numeric($beneficiario_1_porcentagem))
		{
				$this->beneficiario_1_porcentagem = $this->removeFormatacaoMoeda($beneficiario_1_porcentagem);
        } else
			throw new Exception('Error: O campo beneficiario_1_porcentagem  não é um numero.');
    }
	
	public function setbeneficiario_2_porcentagem($beneficiario_2_porcentagem = 0)
    {
		$beneficiario_2_porcentagem = (($beneficiario_2_porcentagem == "")? '0':$beneficiario_2_porcentagem);
        if (is_numeric($beneficiario_2_porcentagem))
		{
				$this->beneficiario_2_porcentagem = $this->removeFormatacaoMoeda($beneficiario_2_porcentagem);
        } else
			throw new Exception('Error: O campo beneficiario_2_porcentagem  não é um numero.');
    }
	
	public function setbeneficiario_3_porcentagem($beneficiario_3_porcentagem = 0)
    {
		$beneficiario_3_porcentagem = (($beneficiario_3_porcentagem == "")? '0':$beneficiario_3_porcentagem);
        if (is_numeric($beneficiario_3_porcentagem))
		{
				$this->beneficiario_3_porcentagem = $this->removeFormatacaoMoeda($beneficiario_3_porcentagem);
        } else
			throw new Exception('Error: O campo beneficiario_3_porcentagem  não é um numero.');
    }
	

	
	
	
	
	public function getbeneficiario_1_id()				{return $this->beneficiario_1_id;				}
	public function getbeneficiario_2_id()				{return $this->beneficiario_2_id;				}
	public function getbeneficiario_3_id()				{return $this->beneficiario_3_id;				}
	
	public function getbeneficiario_1_porcentagem()				{return $this->beneficiario_1_porcentagem;				}
	public function getbeneficiario_2_porcentagem()				{return $this->beneficiario_2_porcentagem;				}
	public function getbeneficiario_3_porcentagem()				{return $this->beneficiario_3_porcentagem;				}
	
	public function getbeneficiario_1_status()				{return $this->beneficiario_1_status;				}
	public function getbeneficiario_2_status()				{return $this->beneficiario_2_status;				}
	public function getbeneficiario_3_status()				{return $this->beneficiario_3_status;				}
	
    /**
     * @Retorna as variaveis privadas
     */
	public function getboletoID()				
	{
		if (($this->boletoID > 0) || (is_numeric($this->boletoID)))
		{
			return $this->boletoID;
		}
		else
			return $this->addZeros(rand(1000000 , 999999999), self::boletoSize);
	}
	
	public function getvalorTitulo()			{
		if (is_numeric($this->removeFormatacaoMoeda($this->valorTitulo)) && ($this->removeFormatacaoMoeda($this->valorTitulo) > 0)) 
		{
			return $this->valorTitulo;
		}
		else
			throw new Exception('Error: O valor do boleto não foi definido, Matrícula: '.$this->getmatriculaID());
		}
	
	public function getvalorPago()				{return $this->valorPago;				}
	public function getvalorDesconto1()			{return $this->valorDesconto1;			}
	public function getvalorDesconto2()			{return $this->valorDesconto2;			}
	public function getvalorDesconto3()			{return $this->valorDesconto3;			}
	
	public function getdataVencimento()			
	{
		if ($this->validateDate($this->dataVencimento, 'Ymd')){
			return $this->dataVencimento;
		}
		else
			throw new Exception('Error: O campo boletoID não é um número.');	
	}
	public function getdataPagamento()			{return $this->dataPagamento;			}
	public function getdataDesconto1()			{return $this->dataDesconto1;			}
	public function getdataDesconto2()			{return $this->dataDesconto2;			}
	public function getdataDesconto3()			{return $this->dataDesconto3;			}
	public function getdataEmissao()			{return (($this->dataEmissao == "" || $this->dataEmissao == '00000000')? date('Ymd'):$this->dataEmissao);}
	public function getdataOcorrenciaRetorno()	{return $this->dataOcorrenciaRetorno;	}
	public function getdataOcorrenciaBaixa()	{return $this->dataOcorrenciaBaixa;		}
	
	public function getcarneID()				
	{
		if (is_numeric($this->carneID))
		{
		return $this->carneID;	
		}
		else throw new Exception('Error: O campo Carnê ID não é numérico.');
	}
	public function getcedenteID()				
	{	
		if (is_numeric($this->cedenteID))
		{
		return $this->cedenteID;	
		}
		else throw new Exception('Error: O campo Cedente ID não é numérico.');
				
	}
	public function getmatriculaID()			
	{
		if (is_numeric($this->matriculaID))
		{
		return $this->matriculaID;	
		}
		else throw new Exception('Error: O campo Matrícula ID não é numérico.');				
	}
	public function getrateioID()				{return $this->rateioID;				}
	public function getremessaID()				{return $this->remessaID;				}
	public function getdebitoID()				{return $this->debitoID;				}
	public function getboletoStatus()			{return $this->boletoStatus;			}
	public function getusuarioOcorrenciaFinal()	{return $this->usuarioOcorrenciaFinal;	}
	public function getgeraRemessa()			{return $this->geraRemessa;				}
 



	
	public function setboletoID($boleto_id = 0)
    {
		$boleto_id = (($boleto_id == "" || $boleto_id == '0')? rand ( 1000000 , 999999999): $boleto_id);
		
        if (is_numeric($boleto_id)) 
		{
            $boleto_id = $this->addZeros($boleto_id, self::boletoSize);
			
            if ($this->validaTamanhoCampo($boleto_id, self::boletoSize)) 
			{
                $this->boletoID = $boleto_id;
            } 
			else
				throw new Exception('Error: Quantidade de caracteres do campo BoletoID inválido.');
        } 
		else
			throw new Exception('Error: O campo boletoID não é um número.');
    }

	public function setValorTitulo($valor_titulo = 0)
    {
        if (is_numeric($valor_titulo))
		{
            if ($valor_titulo > 0)
			{
				$this->valorTitulo = $this->removeFormatacaoMoeda($valor_titulo);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Valor Titulo invalidos.');
        } else
			throw new Exception('Error: O campo Valor Titulo não é um numero.');
    }
	
	public function setValorPago($valor_pago = 0)
    {
		$valor_pago = (($valor_pago == "")? '0':$valor_pago);
        if (is_numeric($valor_pago))
		{
            if ($valor_pago > -1)
			{
				$this->valorPago = $this->removeFormatacaoMoeda($valor_pago);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Valor Pago invalidos.');
        } else
			throw new Exception('Error: O campo Valor Pago não é um numero.');
    }	
	
	
	public function setValorDesconto1($valor_desconto_1 = '0')
    {
		$valor_desconto_1 = (($valor_desconto_1 == "")? '0':$valor_desconto_1);
        if (is_numeric($valor_desconto_1))
		{
            if ($valor_desconto_1 > -1)
			{
				$this->valorDesconto1 = $this->removeFormatacaoMoeda($valor_desconto_1);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto 1 invalidos.');
        } else
			throw new Exception('Error: O campo Valor Desconto 1 não é um numero.');
    }		
	
	public function setValorDesconto2($valor_desconto_2 = '0')
    {
		$valor_desconto_2 = (($valor_desconto_2 == "")? '0':$valor_desconto_2);
        if (is_numeric($valor_desconto_2))
		{
            if ($valor_desconto_2 > -1)
			{
				$this->valorDesconto2 = $this->removeFormatacaoMoeda($valor_desconto_2);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto 2 invalidos.');
        } else
			throw new Exception('Error: O campo Valor Desconto 2 não é um numero.');
    }
	
	public function setValorDesconto3($valor_desconto_3 = '0')
    {
		$valor_desconto_3 = (($valor_desconto_3 == "")? '0':$valor_desconto_3);
        if (is_numeric($valor_desconto_3))
		{
            if ($valor_desconto_3 > -1)
			{
				$this->valorDesconto3 = $this->removeFormatacaoMoeda($valor_desconto_3);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Valor Desconto 3 invalidos.');
        } else
			throw new Exception('Error: O campo Valor Desconto 3 não é um numero.');
    }

	
    public function setdataVencimento($data_venciment)
    {
		$data_venciment = str_replace("-", "", $data_venciment);
		
        if (is_numeric($data_venciment)) 
		{
            $data_venciment = $this->addZeros($data_venciment, 8);

            if ($this->validaTamanhoCampo($data_venciment, 8))
			{
                $this->dataVencimento = $data_venciment;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Vencimento invalidos.');
        } else
            throw new Exception('Error: O campo Data Vencimento Titulo não é um numero.');
    }
	
    public function setdataPagamento($data_pagamento = '00000000')
    {
		$data_pagamento = (($data_pagamento == "")? '00000000':str_replace("-", "",$data_pagamento));
		
        if (is_numeric($data_pagamento)) 
		{
            $data_pagamento = $this->addZeros($data_pagamento, 8);

            if ($this->validaTamanhoCampo($data_pagamento, 8))
			{
                $this->dataPagamento = $data_pagamento;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Pagamento invalidos.');
        } else
            throw new Exception('Error: O campo Data Pagamento não é um numero.');
    }

    public function setdataDesconto1($data_desconto1 = '00000000')
    {
		$data_desconto1 = (($data_desconto1 == "")? '00000000':str_replace("-", "",$data_desconto1));
        if (is_numeric($data_desconto1)) 
		{
            $data_desconto1 = $this->addZeros($data_desconto1, 8);

            if ($this->validaTamanhoCampo($data_desconto1, 8))
			{
                $this->dataDesconto1 = $data_desconto1;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Desconto 1 invalidos.');
        } else
            throw new Exception('Error: O campo Data Desconto 1 não é um numero.');
    }

    public function setdataDesconto2($data_desconto2 = '00000000')
    {
		$data_desconto2 = (($data_desconto2 == "")? '00000000':str_replace("-", "",$data_desconto2));
        if (is_numeric($data_desconto2)) 
		{
            $data_desconto2 = $this->addZeros($data_desconto2, 8);

            if ($this->validaTamanhoCampo($data_desconto2, 8))
			{
                $this->dataDesconto2 = $data_desconto2;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Desconto 2 invalidos.');
        } else
            throw new Exception('Error: O campo Data Desconto 2 não é um numero.');
    }

	public function setdataDesconto3($data_desconto3 = '00000000')
    {
		$data_desconto3 = (($data_desconto3 == "")? '00000000':str_replace("-", "",$data_desconto3));
        if (is_numeric($data_desconto3)) 
		{
            $data_desconto3 = $this->addZeros($data_desconto3, 8);

            if ($this->validaTamanhoCampo($data_desconto3, 8))
			{
                $this->dataDesconto3 = $data_desconto3;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Desconto 3 invalidos.');
        } else
            throw new Exception('Error: O campo Data Desconto 3 não é um numero.');
    }

    public function setdataEmissao($data_emissao = '00000000')
    {		
		$data_emissao = str_replace("-", "", $data_emissao);
		
		if ($this->validateDate($data_emissao, 'Ymd'))
		{
			
		}else
			$data_emissao = date('Ymd');

			
        if (is_numeric($data_emissao)) 
		{
            $data_emissao = $this->addZeros($data_emissao, 8);

            if ($this->validaTamanhoCampo($data_emissao, 8))
			{
                $this->dataEmissao = $data_emissao;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Emissão invalidos.');
        } else
            throw new Exception('Error: O campo Data Emissão não é um numero.');
    }

    public function setdataOcorrenciaRetorno($data_ocorrencia_retorno = '00000000')
    {
		$data_ocorrencia_retorno = str_replace("-", "", $data_ocorrencia_retorno);
		
        if (is_numeric($data_ocorrencia_retorno)) 
		{
            $data_ocorrencia_retorno = $this->addZeros($data_ocorrencia_retorno, 8);

            if ($this->validaTamanhoCampo($data_ocorrencia_retorno, 8))
			{
                $this->dataOcorrenciaRetorno = $data_ocorrencia_retorno;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Ocorrencia Retorno invalidos.');
        } else
            throw new Exception('Error: O campo Data Ocorrencia Retorno não é um numero.');
    }

    public function setdataOcorrenciaBaixa($data_ocorrencia_baixa = '00000000')
    {
		$data_ocorrencia_baixa = str_replace("-", "", $data_ocorrencia_baixa);
        if (is_numeric($data_ocorrencia_baixa)) 
		{
            $data_ocorrencia_baixa = $this->addZeros($data_ocorrencia_baixa, 8);

            if ($this->validaTamanhoCampo($data_ocorrencia_baixa, 8))
			{
                $this->dataOcorrenciaBaixa = $data_ocorrencia_baixa;
            } else
                throw new Exception('Error: Quantidade de caracteres do campo Data Ocorrencia Retorno invalidos.');
        } else
            throw new Exception('Error: O campo Data Ocorrencia Retorno não é um numero.');
    }
	
	
	public function setcarneID($carne_id = 0)
    {
        if (is_numeric($carne_id))
		{
            if ($carne_id > 0)
			{
				$this->carneID = $this->removeFormatacaoMoeda($carne_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Carnê ID invalidos.: '.$carne_id);
        } else
			throw new Exception('Error: O campo Valor Carnê ID  não é um numero.');
    }
	


	public function setcedenteID($cedente_id = 0)
    {
        if (is_numeric($cedente_id))
		{
            if ($cedente_id > 0)
			{
				$this->cedenteID = $this->removeFormatacaoMoeda($cedente_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo CedenteID invalidos.: '.$cedente_id);
        } else
			throw new Exception('Error: O campo Valor CedenteID  não é um numero.');
    }

	public function setmatriculaID($matricula_id = 0)
    {
        if (is_numeric($matricula_id))
		{
            if ($matricula_id > 0)
			{
				$this->matriculaID = $this->removeFormatacaoMoeda($matricula_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo MaticulaID invalidos.: '.$matricula_id);
        } else
			throw new Exception('Error: O campo Valor MatriculaID não é um numero.');
    }

	public function setrateioID($rateio_id = 0)
    {
		$rateio_id	=	(($rateio_id == "")? 0 : $rateio_id);
        if (is_numeric($rateio_id))
		{
            if ($rateio_id > -1)
			{
				$this->rateioID = $this->removeFormatacaoMoeda($rateio_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo rateioID invalidos.');
        } else
			throw new Exception('Error: O campo Valor rateioID não é um numero.');
    }

	public function setremessaID($remessa_id = 0)
    {
		$remessa_id = (($remessa_id == "")? '0':$remessa_id);
        if (is_numeric($remessa_id))
		{
            if ($remessa_id > -1)
			{
				$this->remessaID = $this->removeFormatacaoMoeda($remessa_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo remessaID invalidos.');
        } else
			throw new Exception('Error: O campo Valor remessaID não é um numero.');
    }
	
	public function setdebitoID($debito_id = 0)
    {
        if (is_numeric($debito_id))
		{
            if ($debito_id > 0)
			{
				$this->debitoID = $this->removeFormatacaoMoeda($debito_id);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo debitoID invalidos.: '.$debito_id);
        } else
			throw new Exception('Error: O campo Valor debitoID não é um numero.');
    }

	public function setboletoStatus($boleto_ocorrencia_atual = '98')
    {
        if (is_numeric($boleto_ocorrencia_atual))
		{
            if ($boleto_ocorrencia_atual > -1)
			{
				$this->boletoStatus = $this->removeFormatacaoMoeda($boleto_ocorrencia_atual);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Boleto Ocorrencia Atual invalidos.');
        } else
			throw new Exception('Error: O campo Valor Boleto Ocorrencia Atual não é um numero.');
    }
	
	public function setusuarioOcorrenciaFinal($usuario_ocorrencia_final = 0)
    {
        if (is_numeric($usuario_ocorrencia_final))
		{
            if ($usuario_ocorrencia_final > -1)
			{
				$this->usuarioOcorrenciaFinal = $this->removeFormatacaoMoeda($usuario_ocorrencia_final);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Usuário Ocorrencia Final invalidos.');
        } else
			throw new Exception('Error: O campo Valor Usuário Ocorrencia Final não é um numero.');
    }

	public function setgeraRemessa($gera_remessa = 0)
    {
		$gera_remessa = (($gera_remessa == "")? '0':$gera_remessa);
        if (is_numeric($gera_remessa))
		{
            if ($gera_remessa > -1)
			{
				$this->geraRemessa = $this->removeFormatacaoMoeda($gera_remessa);
            }
			else
				throw new Exception('Error: Quantidade de caracteres do campo Gera Remessa invalidos.');
        } else
			throw new Exception('Error: O campo Gera Remessa não é um numero.');
    }
	


	
	public function montaQuery()
    {
		$linha = 
		"INSERT INTO `cob_boleto` (`id`, `nosso_numero`, `valor_titulo`, `valor_pago`, `valor_desconto1`, `valor_desconto2`, `valor_desconto3`, `vencimento`, `data_pago`, `data_limite_desconto1`, `data_limite_desconto2`, `data_limite_desconto3`, `data_ocorrencia_retorno`, `data_ocorrencia_baixa`, `data_emissao`, `carne_id`, `cedente_id`, `aluno_id`, `rateio_id`, `remessa_id`, `debito_id`, `boleto_status`, `usuario_ocorrencia_final`, `gera_remessa`, `rateio_b1_id`, `rateio_b1_porc`, `rateio_b1_status`, `rateio_b2_id`, `rateio_b2_porc`, `rateio_b2_status`, `rateio_b3_id`, `rateio_b3_porc`, `rateio_b3_status`, `rateio_b1_valor_pago`, `rateio_b1_data_pago`, `rateio_b2_valor_pago`, `rateio_b2_data_pago`, `rateio_b3_valor_pago`, `rateio_b3_data_pago`) VALUES ".
		"('".$this->getboletoID().
		"', NULL , '".
		$this->getValorTitulo()."', '".
		$this->getValorPago()."', '".
		$this->getValorDesconto1()."', '".
		$this->getValorDesconto2()."', '".
		$this->getValorDesconto3()."', '".
		$this->getdataVencimento()."', '".
		$this->getdataPagamento()."', '".
		$this->getdataDesconto1()."', '".
		$this->getdataDesconto2()."', '".
		$this->getdataDesconto3()."', '".
		$this->getdataOcorrenciaRetorno()."', '".
		$this->getdataOcorrenciaBaixa()."', '".
		$this->getdataEmissao()."', '".
		$this->getcarneID()."', '".
		$this->getcedenteID()."', '".
		$this->getmatriculaID()."', '".
		$this->getrateioID()."', '".
		$this->getremessaID()."', '".
		$this->getdebitoID()."', '".
		$this->getboletoStatus()."', '".
		$this->getusuarioOcorrenciaFinal()."', '".
		$this->getgeraRemessa()."', '".
			
		$this->getbeneficiario_1_id()."', '".
		$this->getbeneficiario_1_porcentagem()."', '".
		$this->getbeneficiario_1_status()."', '".
			

		$this->getbeneficiario_2_id()."', '".
		$this->getbeneficiario_2_porcentagem()."', '".
		$this->getbeneficiario_2_status()."', '".
			
		$this->getbeneficiario_3_id()."', '".
		$this->getbeneficiario_3_porcentagem()."', '".
		$this->getbeneficiario_3_status()."','0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00');";
		return $linha;
	}

}


?>