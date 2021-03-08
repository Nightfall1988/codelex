<?php 

# Excercise 5

class Date 
{
    private int $day;

    private int $month;

    private int $year;

    public function __construct(int $day, int $month, int $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function GetDay() 
    {
        return $this->day;
    }

    public function GetMonth() 
    {
        return $this->month;
    }

    public function GetYear() 
    {
        return $this->year;
    }

    public function SetDay() 
    {
        $day = readline("Enter day: ");

        while (!is_numeric($day) || $day > 31) {
            $day = readline("Sorry, incorrect input. Enter day: ");
        }
        $this->day = $day;
        return $this->day;
    }

    public function SetMonth() 
    {
        $month = readline("Enter month: ");

        while (!is_numeric($month) || $month > 12) {
            $month = readline("Sorry, incorrect input. Enter month: ");
        }
        $this->month = $month;
        return $this->month;
    }

    public function SetYear() 
    {
        $year = readline("Enter year: ");

        while (!is_numeric($year)) {
            $year = readline("Sorry, incorrect input. Enter year: ");
        }
        $this->year = $year;
        return $this->year;
    }

    public function DisplayDate() 
    {
        return $this->day . "/" . $this->month . "/" . $this->year;
    }
}

$date = new Date(12,9,2009);

$date->SetDay();
$date->SetMonth();
$date->SetYear();
echo $date->DisplayDate() . "\n";

?>