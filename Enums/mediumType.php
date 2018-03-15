<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class MediumType extends BasicEnum{
	const direct = "Direct";
	const broker = "Broker";
	const Relative = "Relative";
	const relativIncharge = "Relative Incharge";
}