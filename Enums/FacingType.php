<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class FacingType extends BasicEnum{
	const north = "North";
	const northeast = "North East";
	const northwest = "North West";
	const east = "East";
	const west = "West";
	const south = "South";
	const southeast = "South East";
	const southwest = "South West";
}