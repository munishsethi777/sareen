<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class AcquiredType extends BasicEnum{
	const selfCreated = "Self Created";
	const inherited = "Inherited";
}