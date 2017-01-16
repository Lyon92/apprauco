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


		return (date("H:i:s", strtotime("00:00:00") + strtotime($horaFin) - strtotime($horaIni) ));
 	} 
			/*llamamos la función e imprimimos 
			echo calcular_tiempo_trasnc(date('H:i'),'16:12'); */


	

}