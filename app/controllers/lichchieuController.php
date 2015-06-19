<?php
    include ('../app/models/lichchieu.php');
    include ('../app/models/movies.php');
    
    class lichchieuController
    {
        //Methods
        public $out;
        public function __construct()
		{
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
            
            $str = file_get_contents("../public/schedules.json");
            $arr = json_decode($str, true);
            for($i=0; $i<sizeof($arr); $i++)
            {
                $date = date('d', strtotime($arr[$i]['date']));
                $month = date('m', strtotime($arr[$i]['date']));
                $dayOfWeek = date('N', strtotime($arr[$i]['date']))+1;
                switch($dayOfWeek){
                    case 8: $dayOfWeek = "CHỦ NHẬT"; break;
                    case 3: $dayOfWeek = "THỨ ".$dayOfWeek; $whichDay="HAPPY DAY"; $bg="bgBlue"; break;
                    case 5: $dayOfWeek = "THỨ ".$dayOfWeek; $whichDay="CANDY DAY"; $bg="bgBlue"; break;
                    default: $dayOfWeek = "THỨ ".$dayOfWeek; $whichDay=""; $bg="bgGrey"; break;
                }
                $this->out .= "<div class=\"thumb-tray-content-items-image\" data-id=\"".$i."\" >" .
                    "<div class=\"t-t-c-i-up\">" .
                        "<div class=\"t-t-c-i-up-right\">" .
                            "<span class=\"dayofmonth\">".$date."</span>" .
                            "<span class=\"month\">THÁNG ".$month."</span>" .
                        "</div>" .
                        "<div class=\"t-t-c-i-up-left\">" .
                            "<span class=\"day\">".$dayOfWeek."</span>" .
                            "<span class=\"event\"></span>" .
                            "<span class=\"event\"></span>" .
                        "</div>" .
                    "</div>" .
                    "<div class=\"t-t-c-i-down ".$bg."\">" .
                        "<span>".$whichDay."</span>" .
                    "</div>" .
                "</div>";
            }
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
    $lichchieuController = new lichchieuController();
    $resultDateOfSchedule = $lichchieuController->out;
    
    include ('../app/views/lichchieu.php');
?>