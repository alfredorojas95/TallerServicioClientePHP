<?php
	
	class Servicio_ejemplo {

		/**
		*Calcula la serie de fibonacci hasta cierto valor límite
		*@param int con un límite hasta donde calcular
		@return String
		*/
		function fibonacci($limite){
			$cadena = "";
			$num1=0;
			$num2=1;
			$aux = 0;

			echo $num1."<br/>";
			echo $num2."<br/>";

			while($num1 + $num2 <= $limite){
				$aux = $num1;
				$num1 = $num2;
				$num2 = $aux + $num1;
				$cadena .= $num2." -";
				//echo $num2."<br/>";

			}
			return $cadena;
		}

	}
?>