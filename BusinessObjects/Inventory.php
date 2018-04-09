<?php
class Inventory {
	public static $tableName = "inventory";
	public static $className = "Inventory";
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
	private $floornumber;
	private $specifications;
	private $approvaltype;
	private $propertysides;
	private $longitude;
	private $latitude;
	private $mediumname;
	private $mediumphone;
	private $mediumaddress;
	private $adminseq;
	private $propertyoffer;
	private $organisation;
	private $ratefactor;
	
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
	public function setPropertyUnit($val) {
		$this->propertyunit = $val;
	}
	public function getPropertyUnit() {
		return $this->propertyunit;
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
	
	public function setFloorNumber($floorNumber_){
		$this->floornumber = $floorNumber_;
	}
	public function getFloorNumber(){
		return $this->floornumber;
	}
	
	public function setSpecifications($sepcifications_){
		$this->specifications = $sepcifications_;
	}
	public function getSpecifications(){
		return $this->specifications;
	}
	
	public function setApprovalType($val){
		$this->approvaltype = $val;
	}
	public function getApprovalType(){
		return $this->approvaltype;
	}
	
	public function setPropertySides($val){
		$this->propertysides = $val;
	}
	public function getPropertySides(){
		return $this->propertysides;
	}
	
	public function setLongitude($val){
		$this->longitude= $val;
	}
	public function getLongitude(){
		return $this->longitude;
	}
	public function setLatitude($val){
		$this->latitude= $val;
	}
	public function getLatitude(){
		return $this->latitude;
	}
	
	public function getMediumName(){
		return $this->mediumname;
	}
	public function setMediumName($mediumName){
		$this->mediumname = $mediumName;
	}
	
	public function getMediumPhone(){
		return $this->mediumphone;
	}
	public function setMediumPhone($mediumPhone_){
		$this->mediumphone = $mediumPhone_;
	}
	
	public function getMediumAddress(){
		return $this->mediumaddress;
	}
	public function setMediumAddress($address_){
		$this->mediumaddress = $address_;
	}
	
	public function setAdminSeq($adminSeq_){
		$this->adminseq = $adminSeq_;
	}
	public function getAdminSeq(){
		return $this->adminseq;
	}
	
	public function setPropertyOffer($val){
		$this->propertyoffer = $val;
	}
	public function getPropertyOffer(){
		return $this->propertyoffer;
	}
	public function setOrganisation($val){
		$this->organisation = $val;
	}
	public function getOrganisation(){
		return $this->organisation;
	}
	
	public function setRateFactor($val){
		$this->ratefactor = $val;
	}
	public function getRateFactor(){
		return $this->ratefactor;
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
