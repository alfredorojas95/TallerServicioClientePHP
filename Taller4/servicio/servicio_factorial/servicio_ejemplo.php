<?php
	
	class Servicio_ejemplo {

		/**
		*Entrega el factorial de un número
		*@param int número
		*@return int factorial del número
		*/
		function factorial($numero){
			$factorial = 1;
			for ($i=1; $i<=$numero; $i++){
				$factorial *= $i;
			}
			return $factorial; 
		}

	}
?>