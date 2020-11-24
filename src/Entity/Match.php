<?php

namespace App\Entity;


class Match{
    private Player $playerA;
    private Player $playerB;

    function __construct(Player $player1, Player $player2){
        $this->playerA = $player1;
        $this->playerB = $player2;
    }

    public function get_proba(){
        $nb = (1/ (1 + pow(10, (($this->playerB->getPoints() - $this->playerA->getPoints())/400))));
        return (round($nb, 3));
    }


    public function endMatch(Player $winner){
        if ($winner !== null){
            $this->playerA->setPoints(round($this->playerA->getPoints() + 32 * (1 - $this->get_proba()),3));
            $this->playerB->setPoints(round($this->playerB->getPoints() + 32 * (0 - (1-$this->get_proba())),3));
        }
        else {
            $this->playerA->setPoints(round($this->playerA->getPoints() + 32 * (0 - $this->get_proba()),3));
            $this->playerB->setPoints(round($this->playerB->getPoints() + 32 * (1 - (1-$this->get_proba())),3));
        }
    }
}

?> 