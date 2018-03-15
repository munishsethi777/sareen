<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class DocumentType extends BasicEnum{
	const registry = "Registry";
	const agreement = "Agreement";
	const attorney = "Attorney";
	const fullFinal = "Full Final";
}