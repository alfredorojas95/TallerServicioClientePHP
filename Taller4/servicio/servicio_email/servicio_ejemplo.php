<?php
	
	class Servicio_ejemplo {

		/**
		*valida que el correo recibido por parámetros sea válido
		*@param String correo
		*@return String
		*/
		function validarCorreo($email){
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    		return "CORRECTO";
			}else {
				return "INCORRECTO";
			}
			return "";
		}
	}
?>