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
	
  public static function getDropDown($values, $selectName, $onChangeMethod, $selectedValue) {
		$str = "<select required class='form-control m-b' name='" . $selectName . "' id='" . $selectName . "' onchange='" . $onChangeMethod . "'>";
		
		foreach ( $values as $key => $value ) {
			$select = $selectedValue == $key ? 'selected' : null;
			$str .= "<option value='" . $key . "' " . $select . ">" . $value . "</option>";
		}
		
		$str .= "</select>";
		return $str;
	}
	
	public static function getPropertyTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = PropertyType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getMediumTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = MediumType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getPurposeTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = PurposeType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getFacingTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = FacingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getDocumentTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = DocumentType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getFurnishingDD($selectName, $onChangeMethod, $selectedValue) {
		$types = FurnishingType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getPropertyNumberTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = PropertyNumberType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	public static function getAcquiredTypeDD($selectName, $onChangeMethod, $selectedValue) {
		$types = AcquiredType::getAll();
		return self::getDropDown ($types, $selectName, $onChangeMethod, $selectedValue);
	}
	
	
	
	
}