<?php
    include ('../app/models/movies.php');
    
    class movieController
    {
        //Methods
        public $resultMovie = array();
        public function __construct()
		{
            $name = $_GET['inttitle'];
            $arr = $this->GetMoviesListByName($name);
            if(sizeof($arr)>0)
            {
                $this->resultMovie['date'] = date('d', $arr[0]['ReleaseDate']->sec);
                $this->resultMovie['month'] = date('m', $arr[0]['ReleaseDate']->sec);
                $this->resultMovie['year'] = date('Y', $arr[0]['ReleaseDate']->sec);
                $this->resultMovie['intTitle'] = $arr[0]['IntTitle'];
                $this->resultMovie['title'] = $arr[0]['Title'];
                $this->resultMovie['format'] = $arr[0]['Format'];
                $this->resultMovie['studio'] = $arr[0]['Studio'];
                $this->resultMovie['genres'] = $arr[0]['Genres'];
                $this->resultMovie['runtime'] = $arr[0]['Runtime'];
                $this->resultMovie['restricted'] = $arr[0]['Restricted'];
                $this->resultMovie['storyline'] = $arr[0]['Storyline'];
                $this->resultMovie['distributor'] = $arr[0]['Distributor'];
            }
            else
            {
                //echo "Movie not found!";
                header('Location: index.php');
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
    	public function GetMoviesListByName($name)
    	{
    		$movies = new movies();
    		return $movies->GetListByName($name);
    	}
    }
    
    $movieController = new movieController();
    $resultMovie = $movieController->resultMovie;
    
    include ('../app/views/movie.php');
?>
