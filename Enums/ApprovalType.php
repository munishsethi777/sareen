<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class ApprovalType extends BasicEnum{
	const pudaApproved = "Puda Approved";
	const regularised = "Regularised";
	const unapproved = "UnApproved";
	const agriculturalRegistry = "Agricultural Registry";
	const cityProperty = "City Property";
}