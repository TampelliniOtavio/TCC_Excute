<?php
/*
* Criando e exportando planilhas do Excel
* /
*/
// Definimos o nome do arquivo que ser� exportado
if(isset($_GET['q']) && isset($_GET['a'])){
	$query = $_GET['q'];
	$arquivo = $_GET['a'];
	// Criamos uma tabela HTML com o formato da planilha
	$html = '';
	$html .= '<table style="border: solid 1px black">';
	$html .= '<tr>';
	require_once("conf_db.php");
	$conex = new PDO("mysql:host=$servidor;dbname=$basedados", $usuario, $senha);
	$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$comando = $conex->prepare($query); 
	//$params = array(':pemail' => $email);
	$comando->execute();
	$results = $comando->fetchAll(PDO::FETCH_ASSOC);
	if($result = $results[0]){
	    //loop over each $result (row), setting $key to the column name and $value to the value in the column.
	    foreach($result as $key=>$value){
	        //echo the key.
	        $html .= '<td style="border: solid 1px black"><b>'.$key.'</b></td>';
	    }
	}
	$html .= '</tr>';
	foreach($results as $result){
	    //loop over each $result (row), setting $key to the column name and $value to the value in the column.
	    $html .= '<tr>';
	    foreach($result as $key=>$value){
	        //echo the key and value.
	        //echo "{$key} = {$value}<br>";
	        
	        $html .= '<td style="border: solid 1px black">'.$value.'</td>';
	    }
	    $html .= '</tr>';
	}
	$html .= '</table>';
	// Configura�es header para for�ar o download

	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );

	// Envia o conte�do do arquivo
	echo $html;
	exit;
}