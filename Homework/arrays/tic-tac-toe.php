<?php


function Game() {

    $board = ['   ', '   ',  '   ', '   ',  '   ', '   ', '   ', '   ', '   '];

    $gameWon = false;

    while ((in_array('   ', $board)) && ($gameWon != true)) {
        display_board($board);
        $player = DeterminePlayer($board);
        $index = MakeAMove($board, $player);
        $board = WriteAMove($board, $index, $player);

        if (GameState($board) == true) {
            display_board($board);
            echo "Congratulations! $player Has Won!";
            $gameWon = true;
        } elseif ((GameState($board) == false) && (!in_array("   ", $board))) {
            echo "It's a Tie! Noone Wins!";
        }
    }

}

function display_board($board)
{
    echo "$board[0]|$board[1]|$board[2]\n";
    echo "---+---+---\n";
    echo "$board[3]|$board[4]|$board[5]\n";
    echo "---+---+---\n";
    echo "$board[6]|$board[7]|$board[8]\n";
}

function DeterminePlayer($board) {
    
    $players = ['X', 'O'];

    if ((in_array(" $players[0] ", $board)) && (in_array(" $players[1] ", $board))) {
        $counts = array_count_values($board);

        $X_count = $counts[" $players[0] "];
        $O_count = $counts[" $players[1] "];

        if ($X_count == $O_count) {
            return " $players[0] ";
        } elseif ($X_count > $O_count) {
            return " $players[1] ";
        }
    }        
        elseif(!in_array(" $players[0] ", $board)) {
            return " $players[0] ";
    } else {
        return " $players[1] ";
    }
}

function CheckCell($board, $move_request) {
    if (($board[$move_request-1] == ' X ') || ($board[$move_request-1] == ' O ')) {
        return false;
    } else {
        return true;
    }
}

function MakeAMove($board, $player) {
        $move_request = readline("$player make a move! ");

        while((!((1 <= $move_request) && ($move_request <= 9))) || (!is_numeric($move_request)) || CheckCell($board, $move_request) == false) {
            echo "Sorry, This move is not available" . "\n";
            $move_request = readline("$player make a move! ");
        }
        return $move_request-1;
    }

function WriteAMove($board, $moveIndex, $player) {
    $board[$moveIndex] = $player;
    return $board;
}

function GameState($board) {
    if (
        ($board[0] == $board[1]) && ($board[1] == $board[2])  && ($board[0] != '   ')  || 
        ($board[3] == $board[4]) && ($board[4] == $board[5])  && ($board[3] != '   ')  ||
        ($board[6] == $board[7]) && ($board[7] == $board[8])  && ($board[6] != '   ')  ||
        ($board[0] == $board[4]) && ($board[4] == $board[8])  && ($board[0] != '   ')  ||
        ($board[2] == $board[4]) && ($board[4] == $board[6])  && ($board[2] != '   ')  ||
        ($board[0] == $board[3]) && ($board[3] == $board[6])  && ($board[0] != '   ')  ||
        ($board[1] == $board[4]) && ($board[4] == $board[7])  && ($board[1] != '   ')  ||
        ($board[2] == $board[5]) && ($board[5] == $board[8])  && ($board[2] != '   ')
    ) {
        return true;
    }
    else {
        return false;
    }
}


echo Game();