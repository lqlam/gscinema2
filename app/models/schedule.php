<?php
    class schedule
    {
        public function GetList()
        {
            $cond = array("date" => array(
                '$in' => array(new MongoDate(strtotime("2015-06-11T00:00:00.000Z")), new MongoDate(strtotime("2015-06-12T00:00:00.000Z")), new MongoDate(strtotime("2015-06-15T00:00:00.000Z")))
                )
            );
            $filter = array(
                "date" => 1,
                "schedules.schedule._id" => 1,
                "schedules.schedule.start" => 1,
                "schedules.room" => 1);
            $m = new dataservice_mongodb();       
            return $m->Select($cond,$filter,'schedules');
        }
    }
?>