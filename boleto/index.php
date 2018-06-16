
<?php

		include_once($_SERVER["DOCUMENT_ROOT"].'\pages\aluno\financeiro\boleto\class.boleto.php');
	
		$boleto	= new GeraBoleto();

		echo $boleto->print_Boleto($dadosboleto);


	}
?>
