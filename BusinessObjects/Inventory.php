<?php
class Inventory {
	public static $tableName = "inventory";
	private $seq;
	private $purpose;
	private $medium;
	private $plotnumber;
	private $address1;
	private $address2;
	private $landmark;
	private $city;
	private $propertyarea;
	private $propertyunit;
	private $dimensionlength;
	private $dimensionbreadth;
	private $facing;
	private $referredby;
	private $contactperson;
	private $contactmobile;
	private $contactaddress;
	private $rate;
	private $expectedamount;
	private $documentation;
	private $time;
	private $furnishing;
	private $furnishingdetails;
	private $stories;
	private $constructionyears;
	private $totalsellers;
	private $propertynumbers;
	private $acquired;
	private $propertytype;
	private $totalrooms;
	private $isrental;
	private $createdon;
	private $lastmodifiedon;
	private $isavailable;
	public function setSeq($seq_) {
		$this->seq = $seq_;
	}
	public function getSeq() {
		return $this->seq;
	}
	public function setPurpose($purpose_) {
		$this->purpose = $purpose_;
	}
	public function getPurpose() {
		return $this->purpose;
	}
	public function setMedium($val) {
		$this->medium = $val;
	}
	public function getMedium() {
		return $this->medium;
	}
	public function setPlotNumber($val) {
		$this->plotnumber = $val;
	}
	public function getPlotNumber() {
		return $this->plotnumber;
	}
	public function setAddress1($val) {
		$this->address1 = $val;
	}
	public function getAddress1() {
		return $this->address1;
	}
	public function setAddress2($val) {
		$this->address2 = $val;
	}
	public function getAddress2() {
		return $this->address2;
	}
	public function setLandmark($val) {
		$this->landmark = $val;
	}
	public function getLandmark() {
		return $this->landmark;
	}
	public function setCity($val) {
		$this->city = $val;
	}
	public function getCity() {
		return $this->city;
	}
	public function setPropertyArea($val) {
		$this->propertyarea = $val;
	}
	public function getPropertyArea() {
		return $this->propertyarea;
	}
	public function setDimensionLength($val) {
		$this->dimensionlength = $val;
	}
	public function getDimensionLength() {
		return $this->dimensionlength;
	}
	public function setDimensionBreadth($val) {
		$this->dimensionbreadth = $val;
	}
	public function getDimensionBreadth() {
		return $this->dimensionbreadth;
	}
	public function setFacing($val) {
		$this->facing = $val;
	}
	public function getFacing() {
		return $this->facing;
	}
	public function setReferredby($val) {
		$this->referredby = $val;
	}
	public function getReferredby() {
		return $this->referredby;
	}
	public function setContactPerson($val) {
		$this->contactperson = $val;
	}
	public function getContactPerson() {
		return $this->contactperson;
	}
	public function setContactMobile($val) {
		$this->contactmobile = $val;
	}
	public function getContactMobile() {
		return $this->contactmobile;
	}
	public function setContactAddress($val) {
		$this->contactaddress = $val;
	}
	public function getContactAddress() {
		return $this->contactaddress;
	}
	public function setRate($val) {
		$this->rate = $val;
	}
	public function getRate() {
		return $this->rate;
	}
	public function setExpectedAmount($val) {
		$this->expectedamount = $val;
	}
	public function getExpectedAmount() {
		return $this->expectedamount;
	}
	public function setDocumentation($val) {
		$this->documentation = $val;
	}
	public function getDocumentation() {
		return $this->documentation;
	}
	public function setTime($val) {
		$this->time = $val;
	}
	public function getTime() {
		return $this->time;
	}
	public function setFurnishing($val) {
		$this->furnishing = $val;
	}
	public function getFurnishing() {
		return $this->furnishing;
	}
	public function setFurnishingDetails($val) {
		$this->furnishingdetails = $val;
	}
	public function getFurnishingDetails() {
		return $this->furnishingdetails;
	}
	public function setStories($val) {
		$this->stories = $val;
	}
	public function getStories() {
		return $this->stories;
	}
	public function setConstructionYears($val) {
		$this->constructionyears = $val;
	}
	public function getConstructionYears() {
		return $this->constructionyears;
	}
	public function setTotalSellers($val) {
		$this->totalsellers = $val;
	}
	public function getTotalSellers() {
		return $this->totalsellers;
	}
	public function setPropertyNumbers($val) {
		$this->propertynumbers = $val;
	}
	public function getPropertyNumbers() {
		return $this->propertynumbers;
	}
	public function setAcquired($val) {
		$this->acquired = $val;
	}
	public function getAcquired() {
		return $this->acquired;
	}
	public function setPropertyType($val) {
		$this->propertytype = $val;
	}
	public function getPropertyType() {
		return $this->propertytype;
	}
	public function setTotalRooms($val) {
		$this->totalrooms = $val;
	}
	public function getTotalRooms() {
		return $this->totalrooms;
	}
	public function setIsRental($val) {
		$this->isrental = $val;
	}
	public function getIsRental() {
		return $this->isrental;
	}
	public function setCreatedOn($val) {
		$this->createdon = $val;
	}
	public function getCreatedOn() {
		return $this->createdon;
	}
	public function setLastmodifiedon($val) {
		$this->lastmodifiedon = $val;
	}
	public function getLastmodifiedon() {
		return $this->lastmodifiedon;
	}
	public function setIsAvailable($val) {
		$this->isavailable = $val;
	}
	public function getIsAvailable() {
		return $this->isavailable;
	}
}
?>
