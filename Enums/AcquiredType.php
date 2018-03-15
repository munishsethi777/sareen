<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class AcquiredType extends BasicEnum{
	const selfPurchased = "Self Purchased";
	const Ancestral = "Ancestral";
}