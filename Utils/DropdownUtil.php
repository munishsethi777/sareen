<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/MediumType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PurposeType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/FacingType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/DocumentType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyNumberType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/FurnishingType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/AcquiredType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyUnit.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/ApprovalType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertySideType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertySideType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyOfferType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/RateFactorType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Managers/AdminMgr.php");
class DropDownUtils {
	
   public static function getDropDown($values, $selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$str = "<select required class='form-control m-b' name='" . $selectName . "' id='" . $selectName . "' onchange='" . $onChangeMethod . "'>";
		if($isAll){
			$str .= "<option value=''>Select Any</option>";
		}
		foreach ( $values as $key => $value ) {
			if( strpos( $key, "group_" ) !== false ) {
				$str .= "<optgroup label='$value'>";
			}else{
				$select = $selectedValue == $key ? 'selected' : null;
				$str .= "<option value='" . $key . "' " . $select . ">" . $value . "</option>";
			}
		}
		$str .= "</select>";
		return $str;
	}
	public static function getPropertyOfferTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyOfferType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	public static function getPropertyTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getMediumTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = MediumType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getPurposeTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PurposeType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getFacingTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = FacingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getDocumentTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = DocumentType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getFurnishingDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = FurnishingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getPropertyNumberTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyNumberType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getAcquiredTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = AcquiredType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getPropertyUnitsDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyUnit::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getApprovalTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = ApprovalType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	public static function getPropertySideTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertySideType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	public static function getRateFactoryTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = RateFactorType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,true);
	}
	
	public static function getAdminsDD($selectName, $onChangeMethod, $selectedValue){
		$admins = AdminMgr::getInstance()->getAllAdmins();
		$str = "<select required class='form-control m-b' name='" . $selectName . "' id='" . $selectName . "' onchange='" . $onChangeMethod . "'>";
		foreach ($admins as $admin){
			$key = $admin->getSeq();
			$value = $admin->getName();
			$select = $selectedValue == $key ? 'selected' : null;
			$str .= "<option value='" . $key . "' " . $select . ">" . $value . "</option>";		
		}
		$str .= "</select>";
		return $str;
	}
	
	
	
	
}