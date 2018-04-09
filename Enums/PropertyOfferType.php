<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class PropertyOfferType extends BasicEnum{
	const sale = "Sale";
	const rental = "Rental";
	const tolet = "To-Let";
}