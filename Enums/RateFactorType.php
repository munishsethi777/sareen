<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class RateFactorType extends BasicEnum{
	const negotiable = "Negotiable";
	const nonNegotiable = "Non Negotiable";
}