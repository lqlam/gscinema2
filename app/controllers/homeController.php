<?php
    include ('../app/models/movies.php');
    include ('../app/models/lichchieu.php');
    
    class homeController
    {
        //Methods
        public function __construct()
		{
            if(!IsMD5Same($this->GetMoviesList(),"../public/movies_showing.json"))
                WriteJSON($this->GetMoviesList(),"../public/movies_showing.json");
                
            if(!IsMD5Same($this->GetScheduleList(),"../public/schedules_tmp.json"))
            {
                WriteJSON($this->GetScheduleList(),"../public/schedules_tmp.json");
                $str = file_get_contents("../public/schedules_tmp.json");
                $arr = json_decode($str, true);
                //sua lai cau truc array
                $arrChanged = ArrScheduleChangeStyle($arr);
                //sap xep suat chieu tang dan
                $arrTimeSorted = ArrScheduleSortTimeShowing($arrChanged);
                //chuyen doi suat chieu sang dang time
                $arrTimeConverted = ArrScheduleConvertTimeShowing($arrTimeSorted);
                //chuyen doi ngay chieu sang dang chuan
                $arrDateConverted = ArrScheduleConvertDateShowing($arrTimeConverted);
                //chen thong tin phim vao lich chieu
                $result = $arrDateConverted;
                for($i = 0; $i < sizeof($result); $i++)
                {
                    for($j = 0; $j < sizeof($result[$i]['movies']); $j++)
                    {
                        $v_id = $result[$i]['movies'][$j]['_id'];
                        $result[$i]['movies'][$j]['_id'] = $this->GetMoviesListById($v_id);
                    }
                }
                WriteJSON($result,"../public/schedules.json");
            }
		}
    	public function GetMoviesList()
    	{
    		$movies = new movies();
            return $movies->GetList();
    	}
    	public function GetMoviesListById($v_id)
    	{
    		$movies = new movies();
    		return $movies->GetListById($v_id);
    	}
    	public function GetScheduleList()
    	{
    		$lichchieu = new lichchieu();
    		return $lichchieu->GetList();
    	}
    }
    
    $homeController = new homeController();
    
    include ('../app/views/home.php');
    
    //$to_time = strtotime("2008-12-13 10:42:00");
    //$from_time = strtotime("2008-12-13 10:21:00");
    //echo round(abs($to_time - $from_time) / 60,2). " minute";
    
    //$str = file_get_contents("../public/schedules.json");
//    $arr = json_decode($str, true);
//    //array_filter($arr);
//    foreach ($arr as $key => $value) {
//        if (!is_array($value)) {
//            if(is_null($val) || $val == '')
//                unset($value[$key]);
//        }
//        else 
//        {   
//            foreach ($value as $key => $val) {
//                if(is_null($val) || $val == '')
//                unset($value[$key]);
//            }
//        }
//    }
?>
