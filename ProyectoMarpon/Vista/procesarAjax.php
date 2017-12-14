<?php 
	$miGrado = $_POST['grado'];

	$arrPrimero = array('Juan', 'Manuela', 'Alejandra', 'Pedro');
	$arrSegundo = array('Miguel', 'Johana', 'Karen', 'Viviana');
	$arrTercero = array('Duber', 'Julian', 'Stiven');
	$arrRecorrer;

	$miSelect = "";
	if($miGrado == 'Primero'){
		$arrRecorrer = $arrPrimero;
	}else if ($miGrado == 'Segundo'){
		$arrRecorrer = $arrSegundo;
	}else if ($miGrado == 'Tercero'){
		$arrRecorrer = $arrTercero;
	}

	foreach ($arrRecorrer as $nombre) {
		$miSelect .= "<option value=".$nombre.">".$nombre."</option>";
	}
	
	echo $miSelect;
 ?>