<?php

namespace App\Controller;

use App\Model\UserManager;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController extends AbstractController
{
    public function signUp()
    {
        if (isset($_SESSION['userId'])) {
            header('Location:/');
            die();
        }
        return $this->twig->render('Login/signUp.html.twig' );
    }

    public function logIn()
    {
        if (isset($_SESSION['userId'])) {
            header('Location:/');
            die();
        }
        return $this->twig->render('Login/login.html.twig' );
    }

    public function create()
    {
        $errors = [];
        $userManager = new UserManager();
        $values = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
        ];

        if (isset( $_POST ) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['username'])) {
                $errors['username'] = "You have to enter a username";
            } else {
                $tmpUsername = trim($_POST['username']);
                $tmpId = $userManager->is_UsedUsername($tmpUsername);
                if (!empty($tmpId)) {
                    $errors['username'] = "This username is already used";
                } else {
                    $username = $tmpUsername;
                }
            }

            if(empty($_POST['email'])) {
                $errors['email'] = "You have to enter an email";
            } else if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email !";
            } else {
                $tmpEmail = trim($_POST['email']);
                $tmpId = $userManager->is_UsedEmail($tmpEmail);
                if (!empty($tmpId)) {
                    $errors['email'] = "This email is already used";
                } else {
                    $email = $tmpEmail;
                }
            }

            $tmpPassword = $_POST["password"];
            $password2 = $_POST["password2"];
            if (empty($tmpPassword)) {
                $errors['password'] = 'Password required';
            }
            if (empty($password2)) {
                $errors['password2'] = 'Confirmation required';
            } elseif ($tmpPassword !== $password2) {
                $errors['password'] = "Sorry, your passwords are different";
            } else {
                $password = password_hash($tmpPassword, PASSWORD_DEFAULT );
            }

            if (!empty( $errors )) {
                return $this->twig->render('login/signUp.html.twig', [
                    'errors' => $errors,
                    'values' => $values
                ]);
            } else {
                $user = [
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                ];
                $userId = $userManager->newUser($user);
                $_SESSION['userId'] = $userId;
                header ( "Location:/game/menu" );
            }
        }
    }

    public function connect()
    {
        $logErrors = [];
        $userManager = new UserManager();
        $values['username'] = $_POST['username'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(empty($_POST['username'])) {
                $logErrors['username'] = "You have to enter a username";
            } else {
                $username = trim($_POST['username']);
            }
            if(empty($userManager->is_UsedUsername($username))) {
                $logErrors['username'] = "No such User...";
            }
            if (empty($_POST['password'])) {
                $logErrors['password'] = 'Password required';
            } else {
                $password = trim($_POST['password']);
            }
            if (empty($logErrors)) {
                $dbCheck = $userManager->passwordCheck($username);
                if (password_verify($password, $dbCheck['password'])) {
                    $_SESSION['userId'] = $dbCheck['id'];
                    header ( "Location:/game/menu" );
                } else {
                    $logErrors['login'] = "Wrong password or username";
                    return $this->twig->render('Login/login.html.twig', [
                        'errors' => $logErrors,
                        'values' => $values,
                    ]);
                }
            } else {
                return $this->twig->render('Login/login.html.twig', [
                    'errors' => $logErrors,
                    'values' => $values,
                ]);
            }
        }
    }

    public function logOut(): void
    {
        session_destroy();
        unset($_SESSION);
        header('Location:/');
    }
}