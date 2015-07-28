<?php
    include ('../app/models/schedule.php');
    include ('../app/models/movies.php');
    
    class scheduleController
    {
        //Methods
        public $out;
        public function __construct()
		{            
            $str = file_get_contents("schedules.json");
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
                $this->out .= "<div class=\"thumb-tray-content-items\" data-id=\"".$i."\" >" .
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
    		$schedule = new schedule();
    		return $schedule->GetList();
    	}
    }
    $scheduleController = new scheduleController();
    $resultDateOfSchedule = $scheduleController->out;    

    if($_SERVER['HTTP_HOST'] != "gs2.com")
		include_once ('../app/views/scheduleM.php');
    else        
		include_once ('../app/views/schedule.php');
?>