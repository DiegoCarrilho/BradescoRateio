<?

class Utilidades {
	
	
    public function formataNumero($valor, $numCasasDecimais = 2) {
        if ($valor == "") 
            return 0;
        $casas = $numCasasDecimais;
        if ($casas > 0) {
            $valor = substr($valor, 0, strlen($valor) - $casas) . "." . substr($valor, strlen($valor) - $casas, $casas);
            return (float)$valor;
        }
        
        return (int)$valor;
    }

    public function removeFormatacaoMoeda($valor)
    {
        if (is_numeric($valor)) {
            $return = str_replace(".", "", $valor);
            $return = str_replace(",", "", $return);

            return $return;
        } else 
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');
    }
	
    public function juros_vencido($valor,$juro)
    {
        if (is_numeric($valor)) {
		$juro_dia_floated		=	self::formataNumero($juro);
		$valor_do_titulo_floated	=	self::formataNumero($valor);
		return	self::removeFormatacaoMoeda((number_format($valor_do_titulo_floated* ($juro_dia_floated / 100),2)));

        } else
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');
    }
	
    public function cep_valida($valor)
    {
	$return = preg_replace( '/[^0-9]/is', '', $valor );
		
        if (is_numeric($return)) {
            return substr($return,0,5);
        } else 
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');
    }

    public function cep_sufixo($valor)
    {
	$return = preg_replace( '/[^0-9]/is', '', $valor );
		
        if (is_numeric($return)) {
            return substr($return,5);
        } else 
            throw new Exception('Error - O valor ' . $valor . ' nao eh um numero.');
    }
	
    public function formataData($data) {
		   
        if ($data == "") 
            throw new Exception('Error - O valor ' . $data . ' nao é uma data válida.');
		  
	if ($data == "0000-00-00") {
            return '000000';
        }else
       	 return date("dmy", strtotime($data));
    }	
}


?>
