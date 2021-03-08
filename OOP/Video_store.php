<?php

class Application
{   
    private object $store;
    
    function run()
    {
        $this->store = new VideoStore();
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies(): string
    {
        $video_name = readline('Enter movie name: ');
        $this->store->add_video($video_name);
        return "Added video: " . $video_name;

    }

    private function rent_video(): string
    {
        $video_name = readline('Enter movie name: ');
        $videos = $this->store->list_all_videos();
        foreach ($videos as $video) {
            if ($video_name == $video->get_name() && $video->is_checked_out() == false) {
                $video->check_out();
                $name = $video->get_name();
                return "$name is now checked out";
            } else {
                return "Sorry, this video is not available";
            }
        }
    }

    private function return_video()
    {
        $video_name = readline('Enter movie name: ');
        $videos = $this->store->list_all_videos();
        foreach ($videos as $video) {
            if ($video_name == $video->get_name() && $video->is_checked_out() == true) {
                $video->return_video();
                $name = $video->get_name();
                return "$name is now available";
            } else {
                return "Sorry, this video is not available";
            }
        }
    }

    private function list_inventory()
    {
        $all_movies = $this->store->list_all_videos();
        foreach ($all_movies as $movie) {
            $name = $movie->get_name();
            $status = $movie->is_checked_out();
            if ($status == true) {
                echo "$name is unavailable" . "\n";
            } else {
                echo "$name is available" . "\n";
            }
        }
    }
}

class VideoStore
{
    private array $video_list = [];

    public function __construct()
    {
        //$this->video_list = $video_list;
    }

    public function list_all_videos(): array
    {
        return $this->video_list;
    }

    public function add_video(string $video_name): string
    {
        $video = new Video($video_name);
        array_push($this->video_list, $video);
        return "$video_name added to list";
    }

    public function check_out_video(string $video_name): string
    {
        for($i=0; $i<count($this->video_list); $i++) {
            if ($this->video_list[$i]->get_name() == $video_name) {
                $this->video_list[$i]->check_out();
                $video_name = $this->video_list[$i]->get_name();
            }
        }
        return "$video_name is now checked out";
    }

    public function return_video(string $video_name): string
    {
        for($i=0; $i<count($this->video_list); $i++) {
            if ($this->video_list[$i]->get_name() == $video_name) {
                $this->video_list[$i]->return_video();
                $video_name = $this->video_list[$i]->get_name();
            }
        }
        return "$video_name is now returned";
    }
}

class Video
{
    private string $name;
    private bool $is_checked_out = false;
    private float $rating = 0;
    private int $amount_of_rates = 0;
    private int $temp_rating = 0;

    public function __construct($name)
    {
        $this->name = $name;   
    }

    public function get_name(): string 
    {
        return $this->name;
    }

    public function check_out(): bool
    {
        $this->is_checked_out = true;
        return $this->is_checked_out;
    }

    public function return_video(): bool
    {
        $this->is_checked_out = false;
        return $this->is_checked_out;
    }

    public function receive_rating(): float
    {
        $rating = readline('Rate the video from 1 to 5: ');

        while ((1 > $rating) && ($rating > 5)) {
            $rating = readline('Invalid value. Rate the video from 1 to 5: ');
        }

        $this->amount_of_rates += 1;
        $this->temp_rating += $rating;
        $this->count_rating($this->temp_rating,$this->amount_of_rates);
        return $this->rating;
    }

    public function count_rating($rating, $amount_of_rates) 
    {
        $this->rating = $rating / $amount_of_rates;
        return $this->rating;
    }

    public function get_amount_of_rates(): int
    {
        return $this->amount_of_rates;
    }

    public function get_rating(): float
    {
        return $this->rating;
    }

    public function is_checked_out(): bool
    {
        return $this->is_checked_out;
    }

}

// $matrix = new Video('Matrix');
// $lotr = new Video('Godfather II');
// $tomandjerry = new Video('Star Wars Episode IV: A New Hope');

// $list = [$matrix, $lotr, $tomandjerry];

// $store = new VideoStore($list);
// echo $store->list_all_videos();
$app = new Application();
$app->run();

/*

*/