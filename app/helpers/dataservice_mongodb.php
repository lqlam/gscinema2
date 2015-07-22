<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
	class dataservice_mongodb
	{
		private $server		= 'ds043022.mongolab.com:43022';
		private $username	= 'nguyenhuuhanhlam';
		private $password	= 'password';
		private $database	= 'gsdb';
		private $m_link		= false;
        
        public function __construct()
		{
			
		}
        public function Mongo_connect() {
            try {
                $m = new MongoClient("mongodb://".$this->username.":".$this->password."@".$this->server.":43022/".$this->database);
                return $db = $m->selectDB($this->database);
                //return $collection = new MongoCollection($db, $collection);
            }
            catch (MongoConnectionException $e){
                die('Failed to connect to MongoDB: '.$e->getMessage());
            }
        }
        public function SelectCollection($collection) {            
            return $collection = $this->Mongo_connect()->selectCollection($collection);
        }
        public function Select($cond, $filter, $collection, $sort) {
            $collection = $this->SelectCollection($collection);
            $cursor = $collection->find($cond,$filter)->sort($sort);
            // iterate cursor to display title of documents
            $rows = array();
            foreach ($cursor as $item) {
                //echo $item[$key] ."<br />";
                $rows[] = $item;
            }
            return $rows;
        }
    }
?>