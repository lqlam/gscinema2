<?php
    include_once ('../app/models/movies.php');
    include_once ('../app/models/schedule.php');
    
    class homeController
    {
        //Methods
        public function __construct1()
		{
            //lich chieu + phim dang chieu
            if(!IsMD5Same($this->GetScheduleList(),"schedules_tmp.json"))
            {
                ////lich chieu
                WriteJSON($this->GetScheduleList(),"schedules_tmp.json");
                $str = file_get_contents("schedules_tmp.json");
                $arr = json_decode($str, true);
                //////sua lai cau truc array
                $arrChanged = ArrScheduleChangeStyle($arr);
                //////sap xep suat chieu tang dan
                $arrTimeSorted = ArrScheduleSortTimeShowing($arrChanged);
                //////chuyen doi suat chieu sang dang time
                $arrTimeConverted = ArrScheduleConvertTimeShowing($arrTimeSorted);
                //////chuyen doi ngay chieu sang dang chuan
                $arrDateConverted = ArrScheduleConvertDateShowing($arrTimeConverted);
                //////chen thong tin phim vao lich chieu
                $result = $arrDateConverted;
                for($i = 0; $i < sizeof($result); $i++)
                {
                    for($j = 0; $j < sizeof($result[$i]['movies']); $j++)
                    {
                        $v_id = $result[$i]['movies'][$j]['_id'];
                        $result[$i]['movies'][$j]['_id'] = $this->GetMoviesListById($v_id);
                    }
                }
                WriteJSON($result,"schedules.json");
                
                ////phim dang chieu (khi lich chieu thay doi)
                $arrMovieShowing = array();
                $result = $arrDateConverted;                
                for($j = 0; $j < sizeof($result[0]['movies']); $j++)
                {
                    $arrMovieShowing[] = $result[0]['movies'][$j]['_id'];
                }
                WriteJSON($this->GetMoviesListById2($arrMovieShowing),"movies_showing.json");
            }
            //phim sap chieu
            if(!IsMD5Same($this->GetMoviesList2(),"movies_next.json"))
                WriteJSON($this->GetMoviesList2(),"movies_next.json");
            //phim dang chieu
            $str = file_get_contents("schedules.json");
            $arr = json_decode($str, true);
            $arrMovieShowing = array();
            $result = $arr;                
            for($j = 0; $j < sizeof($result[0]['movies']); $j++)
            {
                $arrMovieShowing[] = $result[0]['movies'][$j]['_id'][0]['_id']['$id'];
            }
            ////(khi info film thay doi)
            if(!IsMD5Same($this->GetMoviesListById2($arrMovieShowing),"movies_showing.json"))
                WriteJSON($this->GetMoviesListById2($arrMovieShowing),"movies_showing.json");
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
    	public function GetMoviesListByName()
    	{
    		$movies = new movies();
    		return $movies->GetListByName();
    	}
    	public function GetScheduleList()
    	{
    		$schedule = new schedule();
    		return $schedule->GetList();
    	}
    	public function GetMoviesListById2($arrId)
    	{
    		$movies = new movies();
    		return $movies->GetListById2($arrId);
    	}
    	public function GetMoviesList2()
    	{
    		$movies = new movies();
            return $movies->GetList2();
    	}
    }
    
    $homeController = new homeController();
    if($_SERVER['HTTP_HOST'] != "gs2.com")
        include_once('../app/views/homeM.php');
    else        
        include_once('../app/views/home.php');
    
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
