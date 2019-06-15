<?php
class Note{
	private $seq,$detail,$adminseq,$lastmodifiedon,$createdon;
	public static $className = "Note";
	public static $tableName = "notes";
	public function setSeq($seq_){
		$this->seq = $seq_;
	}
	public function getSeq(){
		return $this->seq;
	}
	
	public function setDetail($detail_){
		$this->detail = $detail_;
	}
	public function getDetail(){
		return $this->detail;
	}
	
	public function setAdminSeq($adminSeq_){
		$this->adminseq = $adminSeq_;
	}
	public function getAdminSeq(){
		return $this->adminseq;
	}
	
	public function setLastModifiedOn($lastModifiendOn_){
		$this->lastmodifiedon = $lastModifiendOn_;
	}
	public function getLastModifiedOn(){
		return $this->lastmodifiedon;
	}
	
	public function setCreatedOn($createdOn_) {
		$this->createdon = $createdOn_;
	}
	public function getCreatedOn() {
		return $this->createdon;
	}
	
	function createFromRequest($request){
		if (is_array($request)){
			$this->from_array($request);
		}
		return $this;
	}
	
	public function from_array($array){
		foreach(get_object_vars($this) as $attrName => $attrValue){
			$flag = property_exists(self::$className, $attrName);
			if($flag && array_key_exists($attrName, $array)){
				$this->{$attrName} = $array[$attrName];
			}
		}
	}
	
}