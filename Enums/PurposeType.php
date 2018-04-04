<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class PurposeType extends BasicEnum{
	const residential = "Residential";
	const commercial = "Commercial";
	const industrial = "Industrial";
	const agricultural = "Agricultural";
}