<?php
	
	class Servicio_ejemplo {

		/**
		*Convierte un String a mayuscula
		*@param String mensaje o texto a convertir
		*@return String en mayúscula
		*/
		function convertirAMayuscula($texto){
			$texto = strtoupper($texto);
			return $texto;
		}

	}
?>