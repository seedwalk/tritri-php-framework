<?php

Class Common
{
	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Formatea la fecha
	 * @param String $sDateTime
	 * @param String $sSeparator
	 * @param Boolean $bWithTime
	 * @return string 
	 */



	public static function checkPerm($userType, $perms) {
		$toreturn = false;
		foreach ($perms as $key => $value) {
			if ($userType == $value) { $toreturn = true; }
		}
		return $toreturn;

	}

	public static function return404($msg = "Error:404") {
		echo $msg;
		exit;
	}

	public static function DebugThis($val) {
		echo "<pre>";
		echo var_dump($val);
		echo "</pre>";
	}

	public static function redondear_dos_decimal($valor) { 
		$float_redondeado=round($valor * 100) / 100; 
		return $float_redondeado; 
	}

	public static function dbDateEndDay($dbdate) {
		$date = explode(' ', $dbdate );
		$toreturn = $date[0]." 23:59:59" ;
		return $toreturn;
	}

	public static function dbDateStartDay($dbdate) {
		$date = explode(' ', $dbdate );
		$toreturn = $date[0]." 00:00:00" ;
		return $toreturn;
	}
	
	public static function listYears($cant){
		$anios = array();
		for($i = date("Y") + $cant; $i >= date("Y")+1; $i--){
			$anios[] = array($i);
		}
		for($i = date("Y"); $i >= date("Y") - $cant; $i--){
			$anios[] = array($i);
		}
		return $anios;
	}

	public static function returnMargen($ingresos, $egresos) {

		if ($ingresos == 0 && $egresos == 0) {
			return 0;
		}
		if ($ingresos == 0 && $egresos > $ingresos) {
			return -100;
		}
		if ($ingresos > $egresos && $egresos == 0) {
			return 100;
		}
		$total = $ingresos - $egresos;
		$margen = ((float)$total / $ingresos ) * 100;
		$margenString = (string)$margen;
		$margenArray = explode(".", $margenString);
		$decimal = substr($margenArray[1], 0, 2);
		return $margenArray[0].".".$decimal;
	}

	public static function returnPercentage($gastosFacturables, $gastosTotales) {
		if ($gastosFacturables == 0 && $gastosTotales == 0) {
			return 0;
		}
		if ($gastosFacturables == 0 && $gastosTotales > $gastosFacturables) {
			return -100;
		}
		if ($gastosFacturables > $gastosTotales && $gastosTotales == 0) {
			return 100;
		}
		$porcentaje = ((float)$gastosFacturables / $gastosTotales ) * 100;
		$porcentajeString = (string)$porcentaje;
		$porcentajeArray = explode(".", $porcentajeString);
		return $porcentajeArray[0];
	}


	public static function dbDateToHtml($dbdate) {
		$toreturn = explode(' ', $dbdate );
		$date = explode('-', $toreturn[0]);

		return $date[1].'/'.$date[2].'/'.$date[0];
	}

	public static function htmlDateToDb($htmldate) {
		$date = explode('/', $htmldate );
		if (array_key_exists(0, $date) && array_key_exists(1, $date) && array_key_exists(2, $date)) {
			return $date[2]."-".$date[0]."-".$date[1]." 00:00:00";
		} else {
			return "9999-01-01 12:34:56";
		}
	}

	public static function stFormatDate( $sDateTime = '' , $sSeparator = '/', $bWithTime = false)
	{
		$aDateTime = explode( " " , $sDateTime );

		$aDate = explode( "-" , $aDateTime[0] );
		
		$sDate = $aDate[2] . $sSeparator . $aDate[1] . $sSeparator . $aDate[0];

		if($bWithTime && $aDateTime[1])
			$sDate = $sDate . ' ' . substr( $aDateTime[1], 0, -3 );

		return $sDate;
	}

	public static function stCutText( $sText = '' , $iLength = 150){
		$sNewText = '';
		$sText = strip_tags($sText);
		if ( strlen($sText) > $iLength) {
			
			$aText = explode(' ', $sText);
			$iCounter = 0;
			$sFinal = (strlen($sText) > $iLength) ? '...' : '';

			while ($iLength >= strlen($sNewText) + strlen($aText[$iCounter])) {
				$sNewText .= ' '.$aText[$iCounter];
				++$iCounter;
			}
			$sNewText .= $sFinal;

			return $sNewText;
		} else {
			return $sText;
		}
	}

	public static function urlOptimize($text, $excludeChars = 'a-zA-Z0-9_')
	{
		//$text = self::optimize($text);
		$text = self::noAccents($text);
		$text = preg_replace("/[^$excludeChars ]/", '', $text);
		$text = str_replace(' ', '-', $text);
		$text = strtolower($text);
		return $text;
	}

	public static function noAccents($text)
	{
		$text = str_replace('á', 'a',  $text);
		$text = str_replace('é', 'e',  $text);
		$text = str_replace('í', 'i',  $text);
		$text = str_replace('ó', 'o',  $text);
		$text = str_replace('ú', 'u',  $text);
		$text = str_replace('Á', 'A',  $text);
		$text = str_replace('É', 'E',  $text);
		$text = str_replace('Í', 'I',  $text);
		$text = str_replace('Ó', 'O',  $text);
		$text = str_replace('Ú', 'U',  $text);
		$text = str_replace('ñ', 'n',  $text);
		$text = str_replace('Ñ', 'N',  $text);
		return $text;
	}
	
	public static function replaceTildesBD($field)
	{	
		$string = 'REPLACE(
			REPLACE(
				REPLACE(
					REPLACE(
						REPLACE(' . $field . ', 
							"á", "a"), 
"é", "e"), 
"í", "i"), 
"ó", "o"), 
"ú", "u") AS ' . $field;
return $string;
}
}