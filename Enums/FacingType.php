<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class FacingType extends BasicEnum{
	const north = "North";
	const east = "East";
	const west = "West";
	const south = "South";
}