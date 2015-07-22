<?php
    class movies
	{
        public function GetList()
        {
            //$title = mb_convert_encoding("Bảo Mẫu Siêu Quậy", 'HTML-ENTITIES', 'utf-8');  
            $cond = array('Title' => array('$ne' => null));
            $filter = array();
            $sort = array();
            $m = new dataservice_mongodb();
            return $m->Select($cond,$filter,'movies',$sort);
//            if($cursor->count()>0) {
//                echo $cursor->count();
//            }
//            else {
//                return false;
//            }
        }
        //xuat thong tin phim
        public function GetListByName($name)
        {
            //$name = str_replace('-', ' ', $name);
            //$name = str_replace('_', ':', $name);
            //$cond = array('IntTitle' => array('$regex' => 'Quyên'));
            $cond = array('IntTitle' => array('$regex' => new MongoRegex("/^$name/u")));
            //$cond = new MongoRegex("/\\b(" . implode(':', $name) . ").*\\b/i");
            //$cond2 = implode('-', $cond);
            $filter = array();
            $sort = array();
            $m = new dataservice_mongodb();
            return $m->Select($cond,$filter,'movies',$sort);
        }
        //ket hop data phim voi lich chieu
        public function GetListById($id)
        {
            $cond = array('_id' => new MongoId($id));
            $filter = array(
                "_id" => 1,
                "IntTitle" => 1,
                "Title" => 1,
                "Runtime" => 1,
                "Format" => 1,
                "Restricted" => 1
            );
            $sort = array();
            $m = new dataservice_mongodb();
            return $m->Select($cond,$filter,'movies',$sort);
        }
        //tim nhung phim dang chieu
        public function GetListById2($arrId)
        {
            for($i = 0; $i < sizeof($arrId); $i++)
                $arrId[$i] = new MongoId($arrId[$i]);
            $cond = array(
                "_id" => array(
                    '$in' => $arrId
                )
            );
            $filter = array();
            $sort = array();
            $m = new dataservice_mongodb();
            return $m->Select($cond,$filter,'movies',$sort);
        }
        //tim nhung phim sap chieu
        public function GetList2()
        {
            $cond = array(
                "ReleaseDate" => array(
                    '$gt' => new MongoDate(strtotime("2015-06-11T00:00:00.000Z"))
                )
            );
            $filter = array();
            $sort = array();
            $m = new dataservice_mongodb();
            return $m->Select($cond,$filter,'movies',$sort);
        }
        
        //MySQL
		//public function GetList()
//		{
//			$sql = "SELECT * FROM tbl_phim_xuatchieu WHERE (1)";
//						
//			$data = new dataservice_mysql();
//			return $data->Execute($sql);
//		}
	}
?>