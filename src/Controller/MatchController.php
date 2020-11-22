<?php 

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Player;
use App\Entity\Match;
use App\Repository\PlayerRepository;

class MatchController{

    /**
     * @Route("/index")
     */
    public function index(PlayerRepository $PlayerRepository){/*
        $playerA = new Player("A");
        $playerB = new Player("B");
        $playerC = new Player("C");
        $playerD = new Player("D");

        $playerA->setPoints("1700");
        $playerB->setPoints("2500");
        $playerC->setPoints("1200");
        $playerD->setPoints("1800");
*/

        $Players = $PlayerRepository->findAll();

        $matchAB = new Match($playerA,$playerB);
        $matchAB->get_proba();
        (1-$matchAB->get_proba());
        $matchAB->endMatch($playerB);


        $response = new Response('Player A :'.$playerA->getPoints(), "\n",
        'Player A :'.$playerA->getPoints(), "\n"

    
        
        
        
        
        
        , Response::HTTP_OK);


        return $response;
    }
}

?>