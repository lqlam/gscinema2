<?php
function WriteJSON($arr, $strOutput) {
    $json = json_encode($arr, JSON_UNESCAPED_UNICODE);
    //print "<br />".$json;
    
    //write to json file    
    $handle = fopen($strOutput, "w");
    if(!$handle) {
        //echo "Unable to open file!";
        return false;
    }
    fwrite($handle, $json);
    fclose($handle);
    return true;
}
function IsMD5Same($arr,$path)
{
    if(md5(json_encode($arr, JSON_UNESCAPED_UNICODE))===md5_file($path))
        return true;
}
function ArrScheduleChangeStyle($array)
{
    $result = array();
    for ($i = 0; $i < sizeof($array); $i++)
    {
        $result[$i]['_id'] = $array[$i]['_id']['$id'];
        $result[$i]['date'] = $array[$i]['date'];
        for ($j = 0; $j < sizeof($array[$i]['schedules']); $j++)
        {
            //$result[$i]['movies'][] = $array[$i]['schedules'][$j]['schedule'][1]['_id'];
            for ($k = 0; $k < sizeof($array[$i]['schedules'][$j]['schedule']); $k++)
            {
                if (array_key_exists('_id', $array[$i]['schedules'][$j]['schedule'][$k]))
                {
                    $v_MovieId = $array[$i]['schedules'][$j]['schedule'][$k]['_id'];
                    $v_MovieScheduleStart = $array[$i]['schedules'][$j]['schedule'][$k]['start'];
                    $v_MovieScheduleRoom = $array[$i]['schedules'][$j]['room'];
                    if (array_key_exists('movies', $result[$i]))
                    {
                        $duplicate = 0;
                        for ($m = 0; $m < sizeof($result[$i]['movies']); $m++)
                        {
                            if($result[$i]['movies'][$m]['_id'] == $v_MovieId)   
                            {
                                $duplicate = 1;
                                $result[$i]['movies'][$m]['schedule'][]['start'] = $v_MovieScheduleStart;
                                $result[$i]['movies'][$m]['schedule'][]['room'] = $v_MovieScheduleRoom;
                            }
                            //else if($duplicate = 0 && sizeof($result[$i]['movies'])==1)
//                            {
//                                $result[$i]['movies'][]['_id'] = $v_MovieId;
//                                $result[$i]['movies'][$m]['schedule'][]['start'] = $v_MovieScheduleStart;
//                                break;
//                            }
                        }
                        if($duplicate == 0)
                        {
                            $result[$i]['movies'][]['_id'] = $v_MovieId;
                            $result[$i]['movies'][$m]['schedule'][]['start'] = $v_MovieScheduleStart;
                            $result[$i]['movies'][$m]['schedule'][]['room'] = $v_MovieScheduleRoom;
                        }
                    }
                    else
                    {
                        //them moi
                        $result[$i]['movies'][]['_id'] = $v_MovieId;
                        $result[$i]['movies'][0]['schedule'][]['start'] = $v_MovieScheduleStart;
                        $result[$i]['movies'][0]['schedule'][]['room'] = $v_MovieScheduleRoom;
                    }
                }
            }
        }
    }
    return $result;
}

function ArrScheduleSortTimeShowing($result)
{
    for($i = 0; $i < sizeof($result); $i++)
    {
        for($j = 0; $j < sizeof($result[$i]['movies']); $j++)
        {
            if(sizeof($result[$i]['movies'][$j]['schedule']) > 2)
            {    
                $temp = 0;
                for($k = 0; $k < sizeof($result[$i]['movies'][$j]['schedule']); $k=$k+2)
                {
                    //$v_first = $result[$i]['movies'][$j]['schedule'][$k]['start'];
                    //sap xep tang dan
                    for($m = $k+2; $m < sizeof($result[$i]['movies'][$j]['schedule']); $m=$m+2)
                    {
                        //$v_second = $result[$i]['movies'][$j]['schedule'][$m]['start'];
                        //echo "<h3 style=\"color: #ff0000\">".$m."</h3>";
                        if($result[$i]['movies'][$j]['schedule'][$k]['start'] > $v_second = $result[$i]['movies'][$j]['schedule'][$m]['start'])
                        {
                            $temp_start = $result[$i]['movies'][$j]['schedule'][$k]['start'];
                            $result[$i]['movies'][$j]['schedule'][$k]['start'] = $v_second = $result[$i]['movies'][$j]['schedule'][$m]['start'];
                            $v_second = $result[$i]['movies'][$j]['schedule'][$m]['start'] = $temp_start;
                            
                            $temp_room = $result[$i]['movies'][$j]['schedule'][$k+1]['room'];
                            $result[$i]['movies'][$j]['schedule'][$k+1]['room'] = $v_second = $result[$i]['movies'][$j]['schedule'][$m+1]['room'];
                            $v_second = $result[$i]['movies'][$j]['schedule'][$m+1]['room'] = $temp_room;
                        }
                    }
                }
            }
        }
    }
    return $result;
}

function ArrScheduleConvertTimeShowing($result)
{
    for($i = 0; $i < sizeof($result); $i++)
    {
        for($j = 0; $j < sizeof($result[$i]['movies']); $j++)
        {
            for($k = 0; $k < sizeof($result[$i]['movies'][$j]['schedule']); $k=$k+2)
            {
                $result[$i]['movies'][$j]['schedule'][$k]['start'] = gmdate("i:s", $result[$i]['movies'][$j]['schedule'][$k]['start']);
            }
            
        }
    }
    return $result;
}

function ArrScheduleConvertDateShowing($result)
{
    for($i = 0; $i < sizeof($result); $i++)
    {
        $stardard = $result[$i]['date']['sec'];
        $result[$i]['date'] = date("Y/m/d", $stardard);
    }
    return $result;
}

function ArrScheduleWithMovieInfo($result, $arr)
{
    for($i = 0; $i < sizeof($result); $i++)
    {
        for($j = 0; $j < sizeof($result[$i]['movies']); $j++)
        {
            $v_id = $result[$i]['movies'][$j]['_id'];
            $result[$i]['movies'][$j]['_id'] = $arr[$v_id];
        }
    }
    return $result;
}
?>