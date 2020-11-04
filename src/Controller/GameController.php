<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace App\Controller;

use App\Model\GameManager;

/**
 * Class GameController
 *
 */
class GameController extends AbstractController
{

    public function createCharacter()
    {
        return $this->twig->render('Character/character.html.twig');
    }

    public function start()
    {
        $errors = [];
        $mimeAllowed = [
            'png' => 'image/png',
            'jpe' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg' => 'image/jpeg',
        ];
        if (isset($_FILES) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = trim($_POST['name']);
            } else {
                $errors['type'] = "Sorry mate, you need to enter a name for your character !";
            }
            if (!in_array ( $_FILES['image']['type'], $mimeAllowed )) {
                $errors['type'] = "Sorry mate, your file has a wrong extension -> only jpeg and png !";
            }
            if ($_FILES['image']['size'] > 1000000) {
                $errors['size'] = "Sorry mate, your file is too big";
            }
            if (!empty( $errors )) {
                return $this->twig->render('Character/character.html.twig', ['errors' => $errors]);
            } else {
                $extension = pathinfo ( $_FILES['image']['name'], PATHINFO_EXTENSION );
                $filename = uniqid () . '.' . $extension;
                $uploadDir = '/assets/images/characters/';
                $uploadFile = $uploadDir . basename ( $filename );
                move_uploaded_file ( $filename, $uploadFile );
                $gameManager = new GameManager();
                $character = [
                    'name' => $_POST['name'],
                    'image' => $filename,
                    'strength' => $_POST['strength'],
                    'energy' => $_POST['energy'],
                    'humor' => $_POST['humor'],
                    'agility' => $_POST['agility'],
                ];
                $id = $gameManager->newGame($character);
                header('Location:/');
            }
        } else {
            $errors['emptyFile'] = "You need to upload an avatar in order to play";
            return $this->twig->render('Character/character.html.twig', ['errors' => $errors]);
        }
    }
}
