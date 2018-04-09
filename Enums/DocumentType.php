<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class DocumentType extends BasicEnum{
	const registry = "Registry";
	const agreement = "Agreement";
	const attorney = "Attorney";
	const fullFinal = "Full Final";
	const allotment = "Allotment";
	const leaseHold = "Lease Hold";
	const freeHold = "Free Hold/Registry";
	const individualTransfer = "Individual Transfer";
	const companyTransfer = "Company Transfer";
}