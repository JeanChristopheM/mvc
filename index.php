<?php
declare(strict_types=1);
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require 'Model/Article.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
require 'Controller/LoginController.php';
require 'Controller/SingleArticleController.php';
require 'Controller/SignUpController.php';

// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;

// Checking if user is authentified
// If he is NOT, he will be sent to the login page.
if($page !== 'signup') {
    (new LoginController())->checkAuth();
}




// Load the controller
// It will *control* the rest of the work to load the page
switch ($page) {
    case 'articles-index':
        // This is shorthand for:
        // $articleController = new ArticleController;
        // $articleController->index();
        (new ArticleController())->index();
        break;
    case 'logout':
        (new LoginController())->logout();
        break;
    case 'article':
        (new SingleArticleController($_GET['ID']))->index();
        break;
    case 'signup':
        if(!isset($_SESSION['usr'])) {
            if(isset($_POST['usernameSignup'])) {
                (new SignUpController())->signup($_POST['usernameSignup'], $_POST['passwordSignup'], $_POST['mailSignup']);
                (new LoginController())->login($_POST['usernameSignup'], $_POST['passwordSignup'], $_POST['mailSignup']);
                header('Location: /home/');
                exit;
            }
            (new SignUpController())->index();
        } else {
            (new HomepageController())->index();
        }
        break;
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}