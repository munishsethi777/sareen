<?php
require_once($ConstantsArray['dbServerUrl'] ."Enums/BasicEnum.php");
class PropertyType extends BasicEnum{
	const group_allResidential = "ALL RESIDENTIAL";
	const residentialHouse = "House/Villa";
	const residentialPlot = "Plot/Land";
	const residentialFlat = "Flat";
	const residentialFloot = "Floor";
	const group_allCommercial = "ALL COMMERCIAL";
	const officeSpace = "Office Space";
	const shopShowroom = "Shop/Showroom";
	const commercialLand = "Commercial Land";
	const warehouse = "Warehouse/Godown";
	const industrialBuilding = "Industrial Building";
	const industrialShed = "Industrial Shed";
	const mallShop = "Mall Shop/Showroom";
	const mallOfficeSpace = "Mall Office Space";
	const sco = "SCO";
	const scf = "SCF";
	const rentedBanks = "Rented Banks";
	const rentedOffices = "Rented Offices";
	const rentedComplexShops = "Rented Complex Shops";
	const rentedFloors = "Rented Floors";
	const rentalCompleteHouse = "Rental Complete House";
	const rentalHouseFloor = "Rental House Floor";
	const rentalFlat = "Rental Flat";
	const rentalResidentialFloor = "Rental Residential Floor";
	const rentalCommercialBuilding = "Rental Commercial Building";
	const rentalCommercialFloor = "Rental Commercial Floor";
	const rentalShop = "Rental Shop/Showroom";
	const rentalShopMall = "Rental Shop/Showroom Mall";
	const rentalPlot = "Rental Plot/Land";
	const group_allAgricultural = "ALL AGRICULTURAL";
	const industrialAgriculturalLand = "Industrial Agricultural Land";
	const residentialAgriculturalLand = "Residential Agricultural Land";
	const commercialAgriculturalLand = "Commercial Agricultural Land";
	const agriculturalLand = "Agricultural Land";
	const farmHouse = "Farm House";
	const marriagePalace = "Marriage Palace/Banquets";
	
}