<?php
    include ('../app/models/movies.php');
    
    class movieController
    {
        //Methods
        public $resultMovie = array();
        public function __construct()
		{
            $name = $_GET['inttitle'];
            $name = str_replace('-', ' ', $name);
            $name = str_replace('_', ':', $name);
            //search from database
            //$arr = $this->GetMoviesListByName($name);
            
            //OR search from json file
            $str1 = file_get_contents("movies_showing.json");
            $arr1 = json_decode($str1, true);
            $str2 = file_get_contents("movies_next.json");
            $arr2 = json_decode($str2, true);
            $arr = array_merge($arr1,$arr2);
            $find = 0;
            for($i = 0; $i < sizeof($arr); $i++)
            {
                //if(sizeof($arr)>0)
                if($name == $arr[$i]['IntTitle'])
                {
                    //$this->resultMovie['date'] = date('d', $arr[$i]['ReleaseDate']->sec);
                    //$this->resultMovie['month'] = date('m', $arr[$i]['ReleaseDate']->sec);
                    //$this->resultMovie['year'] = date('Y', $arr[$i]['ReleaseDate']->sec);
                    $this->resultMovie['date'] = date('d', $arr[$i]['ReleaseDate']['sec']);
                    $this->resultMovie['month'] = date('m', $arr[$i]['ReleaseDate']['sec']);
                    $this->resultMovie['year'] = date('Y', $arr[$i]['ReleaseDate']['sec']);
                    $this->resultMovie['intTitle'] = $arr[$i]['IntTitle'];
                    $this->resultMovie['title'] = $arr[$i]['Title'];
                    $this->resultMovie['format'] = $arr[$i]['Format'];
                    $this->resultMovie['studio'] = $arr[$i]['Studio'];
                    $this->resultMovie['genres'] = $arr[$i]['Genres'];
                    $this->resultMovie['runtime'] = $arr[$i]['Runtime'];
                    $this->resultMovie['restricted'] = $arr[$i]['Restricted'];
                    $this->resultMovie['storyline'] = $arr[$i]['Storyline'];
                    $this->resultMovie['distributor'] = $arr[$i]['Distributor'];
                    $find = 1;
                    break;
                }
            }
            if($find == 0)
            {
                echo "Movie not found!";
                header('Location: index.php');
            }
		}
    	public function GetMoviesList()
    	{
    		$movies = new movies();
            return $movies->GetList();
    	}
    	public function GetMoviesListByName($name)
    	{
    		$movies = new movies();
    		return $movies->GetListByName($name);
    	}
        public function __destruct()
        {
            
        }
    }
    
    $movieController = new movieController();
    $resultMovie = $movieController->resultMovie;
    
    include ('../app/views/movie.php');
?>
