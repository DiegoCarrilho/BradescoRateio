<?php




class VerificaRemessa
{
    /**
     * metodo para montar uma string com espa�os em branco
     * @param unknown $string
     * @param unknown $tamanho
     * @param string $posicao
     * @return string|boolean
     */
    public function montarBranco($string, $tamanho, $posicao = 'left')
    {
        //contanto tamanho da string
        $qtd_value = (int) strlen($string);
		
		if (($posicao == 'right') && ($qtd_value > $tamanho))
		{
			$string = substr($string,0, $tamanho);
			$qtd_value	=	$tamanho;
		}

        //verificando se existem numeros
        if ($tamanho > 0) {
            $result = '';
            $qtd_zeros = $tamanho - $qtd_value;

            for ($i = 0; $i < $qtd_zeros; $i++) 
                $result .= ' ';

            //verificando posi��o dos zeros
            if ($posicao == 'left') {
                $result = $result . $string;
            } elseif ($posicao == 'right') 
                $result = $string . $result;

            return $result;
        } else
            throw new Exception('Error - tamanho da quantidade de espa�os n�o especificado.');

    }

    /**
     * Preenche com zeros a esqueda da string
     * @param unknown $string
     * @param unknown $tamanho
     * @return string
     */
    public function addZeros($string, $tamanho, $posicao = 'left')
    {
        //contanto tamanho da string
        $qtd_value = (int) strlen($string);

        //verificando se existem numeros
        if ($tamanho > 0 && $qtd_value <= $tamanho) {

            $result = '';
            $qtd_zeros = $tamanho - $qtd_value;

            for ($i = 0; $i < $qtd_zeros; $i++) 
                $result .= '0';
			
            //verificando posi��o dos zeros
            if ($posicao == 'left') {
                $result = $result . $string;
            } elseif ($posicao == 'right')
                $result = $string . $result;
 
            return $result;
        } else 
            return false;

    }

    /**
     * validando linha
     * @param unknown $string
     * @return string
     */
    public function validaLinha($string)
    {
        $return = $this->removeAcentos($string);

        if ($this->validaTamanhoCampo($return, 400)) {
            //convertendo string para mai�scula
            return strtoupper($this->removeAcentos($return));
        } else
			die($string);
            throw new Exception('Erro - Informações de linha invalidas.'.strlen($string));
    }

    /**
     * metodo para remover acentos
     * @param unknown $value
     * @return string
     */
    public function removeAcentos($string, $slug = false)
    {
        // Código ASCII das vogais
        $ascii['a'] = range(224, 230);
        $ascii['e'] = range(232, 235);
        $ascii['i'] = range(236, 239);
        $ascii['o'] = array_merge(range(242, 246), array(240, 248));
        $ascii['u'] = range(249, 252);
        // Código ASCII dos outros caracteres
        $ascii['b'] = array(223);
        $ascii['c'] = array(231);
        $ascii['d'] = array(208);
        $ascii['n'] = array(241);
        $ascii['y'] = array(253, 255);
        foreach ($ascii as $key => $item) {
            $acentos = '';
            foreach ($item as $codigo)
                $acentos .= chr($codigo);

            $troca[$key] = '/[' . $acentos . ']/i';
        }

        $string = preg_replace(array_values($troca), array_keys($troca), $string);
        // Slug?
        if ($slug) {
            // Troca tudo que não for letra ou número por um caractere ($slug)
            $string = preg_replace('/[^a-z0-9]/i', $slug, $string);
            // Tira os caracteres ($slug) repetidos
            $string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
            $string = trim($string, $slug);
        }

        return $string;
    }

    /**
     * valida o tamanho do campo
     * @param unknown $string
     * @param unknown $tamanho
     * @return boolean
     */
    public function validaTamanhoCampo($string, $tamanho, $menor_que = false)
    {
        $length = (int) strlen($string);

        if ($length == $tamanho) {
            return true;
        } elseif ($menor_que) {
            if ($length > 0 && $length <= 40) {
                return true;
            } else 
                return false;
        } else
            return false;
    }

    /**
     * metodo para remover forma��o de moedas: pontos e virgulas
     * @param unknown $valor
     * @return mixed|boolean
     */
    public function removeFormatacaoMoeda($valor)
    {
        if (is_numeric($valor)) {
            $return = str_replace(".", "", $valor);
            $return = str_replace(",", "", $return);

            return $return;
        } else
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');
    }
	
    public function removeFormatacaoCEP($valor)
    {
            $return = str_replace(".", "", $valor);
            $return = str_replace("-", "", $return);
            return $return;
    }

    /**
     * metodo para validar o CPF
     * @param string $cpf
     * @return boolean
     */
    public function validaCPF($cpf = null)
    {

        // Verifica se um n�mero foi informado
        if (empty($cpf))
            return false;

        // Elimina possivel mascara
        $cpf = preg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados � igual a 11
        if (strlen($cpf) != 11) {
            return false;
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        } elseif (
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999'
        ) {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF � v�lido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) 
                    return false;
            }

            return true;
        }
    }

    /**
     * retorna o digito verificador do nosso numero com o numero da carteira
     * @param unknown $nosso_numero
     * @return Ambigous <string, number>
     */
    public function digitoVerificadorNossoNumero($nosso_numero)
    {
        //die($nosso_numero);
        $modulo = self::modulo11($nosso_numero, 7);

        //die(print_r($modulo));

        $digito = 11 - $modulo['resto'];

        if ($digito == 10) {
            $dv = "P";
        } elseif ($digito == 11) {
            $dv = 0;
        } else
            $dv = $digito;
		
        return $dv;
    }

    /**
     * calculo do modulo 11 do digito veirificador
     * @param unknown $num
     * @param number $base
     * @return multitype:number
     */
    public static function modulo11($num, $base = 9)
    {
        $fator = 2;
        $soma = 0;
        // Separacao dos numeros.
        for ($i = strlen($num); $i > 0; $i--) {
            //  Pega cada numero isoladamente.
            $numeros[$i] = substr($num, $i - 1, 1);
            //  Efetua multiplicacao do numero pelo falor.
            $parcial[$i] = $numeros[$i] * $fator;
            //  Soma dos digitos.
            $soma += $parcial[$i];
            if ($fator == $base) {
                //  Restaura fator de multiplicacao para 2.
                $fator = 1;
            }
            $fator++;
        }

        $result = array(
            'digito' => ($soma * 10) % 11,
            // Remainder.
            'resto' => $soma % 11,
        );
        if ($result['digito'] == 10) {
            $result['digito'] = 0;
        }
        return $result;
    }

    /**
     * metodo para resumir o texto
     * ESSA NÃO É UMA FORMA IDEAL
     * @param unknown $string
     * @param unknown $tamanho
     * @return string
     */
    public function resumeTexto($string, $tamanho)
    {
        return substr($string, 0, $tamanho);
    }
	
	public function ValidaCEP($cep)
    {
        if (is_numeric($cep)) 
		{
            if ($this->validaTamanhoCampo($cep, 5)) 
			{
 				true;	
            } else
                return false;
        } else 
            return false;
    }
	
	public function ValidaCEPSufixo($cep)
    {
        if (is_numeric($cep)) 
		{
            if ($this->validaTamanhoCampo($cep, 3)) 
			{
 				true;	
            } else
                return false;
        } else 
            return false;
    }
	
	public function VerificaSacadoErro($cedente_id,$from_date, $to_date)
	{
		extract($GLOBALS);
		
		$tabela_remessa_header	='
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading"><strong>*</strong> Os alunos abaixo não serão incluídos na remessa por falta de um dos seguintes campos: CPF, endereço, rua, bairro, cidade, UF ou CEP. Preencha para que o aluno seja incluído na remessa.</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th width="1%"'.$custom_td_style2.'>#</th>
											<th width="8%"'.$custom_td_style2.'>Matricula</th>
											<th width="20%"'.$custom_td_style2.'>Nome</th>
											<th width="10%"'.$custom_td_style2.'>CPF</th>
											<th width="10%"'.$custom_td_style2.'>Turma</th>
											<th width="20%"'.$custom_td_style2.'>Endereço</th>
											<th width="8%"'.$custom_td_style2.'>Num</th>
											<th width="8%"'.$custom_td_style2.'>CEP</th>
											<th width="2%"'.$custom_td_style2.'>*</th>
										</tr>
									</thead>
									<tbody>';
		
			$tabela_remessa_end =			'</tbody>
									</table>	
								</div>
							</div>
						</div>
					</div>
				</div>';

		$sql_boleto		=	'SELECT aluno_id, COUNT(*) as qnt_boletos  FROM `cob_boleto` 
		WHERE gera_remessa=1 
		AND remessa_id=0 
		AND cedente_id='.$cedente_id.' 
		AND (vencimento >= '.$from_date.' 
		AND vencimento <='.$to_date.') GROUP BY aluno_id';

		$cedente_query				=	mysql_query("SELECT * FROM `cob_cedente` WHERE id=".$cedente_id,$db);
		$cedente_info			=	(($cedente_query)? mysql_fetch_array($cedente_query) : '');
		
	$sql_sequencia		=	mysql_query('SELECT MAX(`sequencia`) as proximo FROM `cob_remessa` WHERE `cedente` ='.$cedente_id,$db);
	$sequencial			=	mysql_fetch_array($sql_sequencia);
		
		$boleto_query		=	mysql_query($sql_boleto,$db);
	 	
		
	 	$invalid_count		=	0;
		$valid_count		=	0;
		$boletos_remessa_ok	=	0;
	 	$matricula_erro		=	0;
	 	$table_invalido		=	'';
		$resultado			=	'';
	
							
	 	while ($b_array = mysql_fetch_array($boleto_query))
		{

			$cep_check 			=	false;
			$cpf_check			=	false;
			
			$sql_matricula		=	'SELECT * FROM `usuario` WHERE `id` = '.$b_array['aluno_id'];
			$matricula_info 	=	mysql_query($sql_matricula,$db);
			$matricula_array	=	((mysql_num_rows($matricula_info) > 0)? mysql_fetch_array($matricula_info) : '');

			$sql_pessoa		=	'SELECT * FROM `pessoa` WHERE `cpf` = '.$matricula_array['cpf'];
			$pessoa_info 	=	mysql_query($sql_pessoa,$db);
			$pessoa_array	=	((mysql_num_rows($pessoa_info) > 0)? mysql_fetch_array($pessoa_info) : '');	
			

			$pessoa_array['cep'] = $this->removeFormatacaoCEP($pessoa_array['cep']);	
			
			
			
			$cep_check = !$this->validaTamanhoCampo($pessoa_array['cep'],8);
			
			$cpf_check = !$this->validaCPF($pessoa_array['cpf']);
		
			
			if ($cep_check || $cpf_check)
			{
				$invalid_count++;
				$table_invalido .= "<tr>";
				$table_invalido .= "<td ".$custom_td_style2.">".$invalid_count."</td>";
				$table_invalido .= "<td ".$custom_td_style2.">".$matricula_array['matricula']."</td>";
				$table_invalido .= "<td ".$custom_td_style.">".$pessoa_array['nome']."</td>";
				$table_invalido .= "<td ".$custom_td_style2.">".$pessoa_array['cpf']."</td>";
				$table_invalido .= "<td ".$custom_td_style2.">".$matricula_array['turma_nome']."</td>";
				$table_invalido .= "<td ".$custom_td_style.">".$pessoa_array['logradouro']."</td>";
				$table_invalido .= "<td ".$custom_td_style2.">".$pessoa_array['numero']."</td>";
				$table_invalido .= "<td ".$custom_td_style2.">".$pessoa_array['cep']."</td>";
				$table_invalido .= "<td".'><a href="" data-toggle="modal" data-target="#myModal" onclick="get_element_info('."'".'aluno_edit'."'".','.$pessoa_array['id'].',0,'."'".'aluno_modal'."'".');">
										<p class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Imprimir"></p>
									</a></td>';
				$table_invalido .= "</tr>";
			}
			else
				$boletos_remessa_ok = $boletos_remessa_ok + $b_array['qnt_boletos'];
			
		}
		

		$tabelaTeste = '
			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Confira os dados antes de gerar a remessa. 
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td '.$custom_td1_style.'><strong>Conta</strong>:</td>
                                            <td '.$custom_td1_style.'>'.$cedente_info['nome_empresa'].' - AG.:'.(int)$cedente_info['agencia'].' - CC.:'.(int)$cedente_info['conta'].
					'-'.(int)$cedente_info['conta_digito'].' - CARTEIRA:'.$cedente_info['carteira'].' - CÓDIGO CEDENTE:'.(int)$cedente_info['convenio_codigo'].'</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td '.$custom_td1_style.'><strong>Número sequencial da remessa</strong>:</td>
                                            <td '.$custom_td1_style.'>'.($sequencial['proximo']	+1).'</td>
                                        </tr>
                                        <tr>
                                            <td '.$custom_td1_style.'><strong>Vencimento dos boletos da remessa</strong>:</td>
                                            <td '.$custom_td1_style.'>'.date('d/m/Y',strtotime($from_date)).' a '.date('d/m/Y',strtotime($to_date)).'</td>
                                        </tr>
                                        <tr>
                                            <td '.$custom_td1_style.'><strong>Total de boletos na remessa</strong>:</td>
                                            <td '.$custom_td1_style.'>'.$boletos_remessa_ok.'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			</div>';
		
					$final_row		=					'<tr>
                                            <td colspan="9" '.$custom_td1_style.'>Total de alunos: '.$invalid_count.'</td>
                                        </tr>';
		$resultado = $tabelaTeste;

		//$resultado = table_header('Boletos a gerar').$boletos_remessa_ok.table_footer();
		
		if ($invalid_count > 0)
		{
			$resultado .= $tabela_remessa_header.$table_invalido.$final_row.$tabela_remessa_end;
		} 
		return $resultado;
		
	}

}
