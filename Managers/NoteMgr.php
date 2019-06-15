<?php
require_once($ConstantsArray['dbServerUrl'] ."BusinessObjects/Note.php");
require_once($ConstantsArray['dbServerUrl'] ."DataStores/BeanDataStore.php");
class NoteMgr{
	private static $noteMgr;
	private static $dataStore;

	public static function getInstance()
	{
		if (!self::$noteMgr)
		{
			self::$noteMgr = new NoteMgr();
			self::$dataStore = new BeanDataStore(Note::$className,Note::$tableName);
		}
		return self::$noteMgr;
	}
	
	public function saveNote($noteObj){
		$id = self::$dataStore->save($noteObj);
		return  $id;
	}
	
	public function deleteNotes($ids){
		$flag = self::$dataStore->deleteInList($ids);
		return $flag;
	}
	
	public function findBySeq($seq){
		return self::$dataStore->findBySeq($seq);
	}
	
	public function getAllForGrid(){
		$arr = self::$dataStore->findAllArr(true);
		$count = self::$dataStore->executeCountQuery(null,true);
		$mainArr["Rows"] = $arr;
		$mainArr["TotalRows"] = $count;
		return $mainArr;
	}
}