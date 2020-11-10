<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractController
{
    public function menu()
    {
        $gameManager = new gameManager();
        //$id = $_GET['id'];
        $id = 1;
        $isEnded = $gameManager->isEnded($id);

        return $this->twig->render('Game/menu.html.twig', ['is_ended' => $isEnded]);
    }
}
