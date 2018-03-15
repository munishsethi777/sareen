<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class PropertyType extends BasicEnum{
	const building = "Building";
	const house = "House";
	const plot = "Plot";
	const bank = "Bank";
	const floor = "Floor";
	const sco = "SCO";
	const mallShop = "Mall Shop";
	const godown = "Godown";
	const parking = "Parking";
	const foodLounge = "Food Launge";
	
}