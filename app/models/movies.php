<?php
    class movies
	{
        public function GetList()
        {            
            $m = new dataservice_mongodb();
            //$collection = $m->SelectCollection("movies");
            //$title = mb_convert_encoding("Bảo Mẫu Siêu Quậy", 'HTML-ENTITIES', 'utf-8');  
            $cond = array('Title' => array('$ne' => null));
            $filter = array();
            return $m->Select($cond,$filter,'movies');
//            if($cursor->count()>0) {
//                echo $cursor->count();
//            }
//            else {
//                return false;
//            }
        }
        
        
        public function GetListById($v_id)
        {            
            $m = new dataservice_mongodb();  
            $cond = array('_id' => new MongoId($v_id));
            $filter = array();
            return $m->Select($cond,$filter,'movies');
        }
		//public function GetList()
//		{
//			$sql = "SELECT * FROM tbl_phim_xuatchieu WHERE (1)";
//						
//			$data = new dataservice_mysql();
//			return $data->Execute($sql);
//		}
	}
?>