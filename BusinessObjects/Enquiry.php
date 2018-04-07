<?php
class Enquiry {
	public static $tableName = "enquiries";
	public static $className = "Enquiry";
	private $seq;
	private $purpose;
	private $propertytype;
	private $address;
	private $landmark;
	private $propertyarea;
	private $propertyunit;
	private $dimensionlength;
	private $dimensionbreadth;
	private $facing;
	private $referredby;
	private $contactperson;
	private $contactmobile;
	private $contactaddress;
	private $totalrooms;
	private $isrental;
	private $createdon;
	private $lastmodifiedon;
	private $specifications;
	private $isfullfilled;
	private $expectedamount;
	private $adminseq;
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
	
	public function setAddress($val) {
		$this->address = $val;
	}
	public function getAddress() {
		return $this->address;
	}
	public function setLandmark($val) {
		$this->landmark = $val;
	}
	public function getLandmark() {
		return $this->landmark;
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
	public function setCreatedOn($createdOn_) {
		$this->createdon = $createdOn_;
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
	
	public function setSpecifications($sepcifications_){
		$this->specifications = $sepcifications_;
	}
	public function getSpecifications(){
		return $this->specifications;
	}
	
	public function setExpectedAmount($val) {
		$this->expectedamount = $val;
	}
	public function getExpectedAmount() {
		return $this->expectedamount;
	}
	
	public function setIsFullfilled($isfullfilled_) {
		$this->isfullfilled = $isfullfilled_;
	}
	public function getIsFullfilled() {
		return $this->isfullfilled;
	}
	
	public function setPropertyUnit($unit_){
		$this->propertyunit = $unit_;
	}
	
	public function getPropertyUnit(){
		return $this->propertyunit;
	}
	
	public function setAdminSeq($adminSeq_){
		$this->adminseq = $adminSeq_;
	}
	public function getAdminSeq(){
		return $this->adminseq;
	}
	
	function createFromRequest($request){
		if (is_array($request)){
			$this->from_array($request);
		}	
		return $this;
	}
	
	public function from_array($array)
	{
		foreach(get_object_vars($this) as $attrName => $attrValue)
			$this->{$attrName} = $array[$attrName];
	}
	
}


?>
