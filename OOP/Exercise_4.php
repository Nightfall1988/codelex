<?php 

# OOP Exercise 4

class Movie 

{
    private string $title;

    private string $studio;
    
    private string $rating;


    public function __construct(string $title, string $studio, string $rating) 
    {
        $this->title = $title;
        $this->$studio = $studio;
        $this->rating = $rating;
        
    }

    public function GetTitle() 
    {
        return $this->title;
    }

    public function GetStudio() 
    {
        return $this->studio;
    }

    public function GetRating() 
    {
        return $this->rating;
    }
    
    public function GetPG(array $movies) 
    {
        $pg_movies = [];
        for ($i=0; $i<count($movies); $i++) {
           if ($movies[$i]->GetRating() === "PG") {
                array_push($pg_movies, $movies[$i]);
           }
        }
        return $pg_movies;
    }
}


$casino = new Movie("Casino Royale", "Eon Productions", "PG­13");
$glass = new Movie("Glass", "Buena Vista International", "PG­13");
$spiderman = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

$films = [$casino, $glass, $spiderman];

foreach ($casino->GetPG($films) as $film) {
    echo $film->GetTitle();
};

?>