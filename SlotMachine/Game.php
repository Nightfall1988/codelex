<?php 
require_once ('SlotMachine.php');

class Game {

    private $elements;

    private $wallet;

    private $bet;

    public function SetData() {
        $this->elements = ['A', 'B', 'C', 'A', 'E', 'F'];

        $this->wallet = readline("Enter your money: ");
        
        $this->bet = readline('Enter your bet: ');
    }

    public function StartGame() {
        while (!is_numeric($this->bet) || !($this->bet % 10 == 0)) {
            $bet = readline('Sorry, this is not a valid bet. Enter your bet: ');
        }
    
        while (($this->bet <= $this->wallet)){
                $this->wallet = $this->wallet - $this->bet;
                $payout = $this->PlaySlot($this->elements, $this->bet);
                $this->wallet = $this->wallet + $payout;
                
            if ($payout > 0) {
                    echo "You won $payout Euro!" . "\n";
                }
                echo "You have $this->wallet left" . "\n";
                $answer = readline("Play again? y/n: ");
            if ($answer == 'n') {
                echo "You have $this->wallet left";
                die();
            }
        }
        return $this->wallet;
    }

    public function PlaySlot($elements, $bet): int {
        $machine = new SlotMachine($elements, $bet);
        $machine->getGame();
        echo $machine->display_result();
        $result = $machine->determine_win();
        $payout = $machine->game_result($result);
        if ($machine->get_wild() == 'A') {
            $this->FreeGame();
        }
        return $payout;
    }

    public function FreeGame() {
        echo "You unlocked 5 free Games!" . "\n";

        for ($i=0; $i<5; $i++) {
            $this->wallet = $this->wallet + $this->bet;
            $this->PlaySlot($this->elements, $this->bet);
            echo "\n";
        }
    }
}
?>