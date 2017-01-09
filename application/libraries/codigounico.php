<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

/**
 * Vistas y Layout
 *
 * Realiza tareas basicas para vistas y layouts
 */
class CodigoUnico
{
	
    public  function generarCodigo($longitud) {
         
         $key = '';
         $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
       
    }


    public function restaHoras($horaIni, $horaFin){

	   /* $separar[1]=explode(':',$hora1); 
	    $separar[2]=explode(':',$hora2); 

		$total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
		$total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
		$total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 
		if($total_minutos_trasncurridos<=59) 
			return($total_minutos_trasncurridos.' Minutos'); 
		
		elseif($total_minutos_trasncurridos>59){ 
			$HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60); 
				if($HORA_TRANSCURRIDA<=9) 
					$HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA; 
					$MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60; 
						if($MINUITOS_TRANSCURRIDOS<=9) 
							$MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS; 

			return ($HORA_TRANSCURRIDA.':'.$MINUITOS_TRANSCURRIDOS.' Horas'); 
		}*/

		return (date("H:i:s", strtotime("00:00:00") + strtotime($horaFin) - strtotime($horaIni) ));
 	} 
			/*llamamos la función e imprimimos 
			echo calcular_tiempo_trasnc(date('H:i'),'16:12'); */


	

}