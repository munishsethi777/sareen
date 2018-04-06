<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class PropertySideType extends BasicEnum{
	const singleSideOpen = "Single Side Open";
	const corner = "Corner";
	const twoSideOpen = "Two Side Open";
	const threeSideOpen = "Three Side Open";
	const fourSideOpen = "Four Side Open";
}