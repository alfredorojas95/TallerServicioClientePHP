<?php
	
	class Servicio_ejemplo {

		/**
		*valida que el rut recibido por parámetros sea válido
		*@param  int rut.- sin punto ni guion
		*@return boolean si el rut es correcto: False si es incorrecto
		*/
		function validarRut($r){
		//página de donde se sacó el método
		//http://v3.juque.cl/weblog//2004/06/16/validador-de-rut-en-php.html
		//validar rut sin puntos ni guion.-
			$r=strtoupper(ereg_replace('\.|,|-','',$r));
			$sub_rut=substr($r,0,strlen($r)-1);
			$sub_dv=substr($r,-1);
			$x=2;
			$s=0;
			for ( $i=strlen($sub_rut)-1;$i>=0;$i--){
				if ( $x >7 ){
				$x=2;
				}
				$s += $sub_rut[$i]*$x;
				$x++;
			}
			$dv=11-($s%11);
			if ( $dv==10 ){
				$dv='K';
			}
			if ( $dv==11 ){
				$dv='0';
			}
			if ( $dv==$sub_dv ){
			return true;
			} else {
			return false;
			}
		}

	}
?>