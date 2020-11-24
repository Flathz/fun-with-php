<?php 

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Player;
use App\Entity\Match;

class MatchController{

    /**
     * @Route("/index")
     */
    public function index(){
        $playerA = new Player("A");
        $playerB = new Player("B");
        $playerC = new Player("C");
        $playerD = new Player("D");

        $playerA->setPoints("1700");
        $playerB->setPoints("2500");
        $playerC->setPoints("1200");
        $playerD->setPoints("1800");

        $matchAB = new Match($playerA,$playerB);
        $matchAC = new Match($playerA,$playerC);
        $matchAD = new Match($playerA,$playerD);

        $matchAB->endMatch($playerB);

        $response = new Response();
        $response = new Response(json_encode(array(
            'Joueur A face au joueur B' => $matchAB->get_proba(),
            'Joueur B face au joueur A' => (1-$matchAB->get_proba()),
            'Joueur A face au joueur C' => $matchAC->get_proba(),
            'Joueur C face au joueur A' => (1-$matchAC->get_proba()),
            'Joueur A face au joueur D' => $matchAD->get_proba(),
            'Joueur D face au joueur A' => (1-$matchAD->get_proba()),
            'Joueur A apres match contre B' => $playerA->getPoints(),
            'Joueur B apres match contre B' => $playerB->getPoints(),
            )));

        return $response;
    }
}

?>