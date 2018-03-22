<?php
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/MediumType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PurposeType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/FacingType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/DocumentType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/PropertyNumberType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/FurnishingType.php");
require_once ($ConstantsArray ['dbServerUrl'] . "Enums/AcquiredType.php");
class DropDownUtils {
	
   public static function getDropDown($values, $selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$str = "<select required class='form-control m-b' name='" . $selectName . "' id='" . $selectName . "' onchange='" . $onChangeMethod . "'>";
		if($isAll){
			$str .= "<option value='all'>All</option>";
		}
		foreach ( $values as $key => $value ) {
			$select = $selectedValue == $key ? 'selected' : null;
			$str .= "<option value='" . $key . "' " . $select . ">" . $value . "</option>";
		}
		
		$str .= "</select>";
		return $str;
	}
	
	public static function getPropertyTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getMediumTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = MediumType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getPurposeTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PurposeType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getFacingTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = FacingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getDocumentTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = DocumentType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getFurnishingDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = FurnishingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getPropertyNumberTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = PropertyNumberType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	public static function getAcquiredTypeDD($selectName, $onChangeMethod, $selectedValue,$isAll = false) {
		$types = AcquiredType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue,$isAll);
	}
	
	
	
	
}