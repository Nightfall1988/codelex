<?php 

class SlotMachine {
    
    private $display = [];

    private $wild;

    public function __construct(array $elements, string $bet)
    {
        $this->elements = $elements;
        $this->bet = $bet;
        $this->wild = 'Z';
    }

    public function getGame() {
        for($i = 0; $i <= 8; $i++) {
            $this->display[$i] = $this->elements[rand(0,5)];
        }        
    }

    public function display_result(): void {

        $line1 = [$this->display[0], $this->display[1], $this->display[2]];
        $line2 = [$this->display[3], $this->display[4], $this->display[5]];
        $line3 = [$this->display[6], $this->display[7], $this->display[8]];

        $all_lines = [$line1, $line2, $line3];

        ob_implicit_flush(true);

        for ($i=0; $i<count($all_lines); $i++) {
            echo "| " . $all_lines[$i][0] . " | "  . $all_lines[$i][1] . " | " . $all_lines[$i][2] . " |" . "\n";
            sleep(1);
        }
    }

    public function determine_win(): bool {
        if ($this->display[0] == $this->display[1] && $this->display[1] == $this->display[2]) {
            $this->wild = $this->display[0];
            return true;
        }
        elseif ($this->display[3] == $this->display[4] && $this->display[4] == $this->display[5]) {
            $this->wild = $this->display[3];
            return true;
        } elseif ($this->display[6] == $this->display[7] && $this->display[6] == $this->display[8]) {
            $this->wild = $this->display[6];
            return true;            
        } elseif ($this->display[0] == $this->display[4] && $this->display[4] == $this->display[8]) {
            $this->wild = $this->display[0];
            return true;
        } elseif ($this->display[2] == $this->display[4] && $this->display[4] == $this->display[6]) {
            $this->wild = $this->display[4];
            return true;
        } else {
            return false;
        }
    }

    public function game_result($result) {
        if ($result == true) {
            $payout_quotent = $this->bet / 10;
            $payout = $this->bet * $payout_quotent;
            return $payout;
        } else {
            return 0;
        }
    }

    public function get_wild() {
        return $this->wild;
    }
}
?>