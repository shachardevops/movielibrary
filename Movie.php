<?php
require_once 'requires.php';
class Movie
{
    private $name;
    private $genre;
    private $year;
    private $rate;
    
    function __construct($row,$conn)
    {
        $this->name = $row['nameofthemovie'];
        $this->genre = $row['genre'];
        $this->year = $row['yearofthemovie'];
        $this->rate = averageRate($this->name,$conn);
    }
    function getAverageRate()
    {
        return $this->rate;
    }
   
    function __toString()
    {
        return "Movie-$this->name type-$this->name year-$this->year";
    }
    function getName()
    {
        return $this->name;
    }
    function getGenre()
    {
        return $this->genre;
    }
    function getYear()
    {
        return $this->year;
    }
}
?>