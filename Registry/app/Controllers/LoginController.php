<?php
namespace App\Controllers;
use App\View;
use App\Collections\PeopleCollection;
use App\Repositories\Repository;
use App\Service\Service;

class LoginController
{
    private Repository $repository;

    public function __construct()
    {
        $this->repository = new Repository;
    }

    public function login(): array
    {
        $view = new View;
        $data = $this->repository->validateLogin($_POST['code']);
        if ($data[0] == true) 
        {
            $service = new Service;
            $service->createToken($data[1]['ID']);
            $collection = new PeopleCollection;
            $collection->setCollection();
            return $view->displayRegistry($collection);
        } else {
            $view->viewError();
            return [];
        }
    }

    public function dashboard(): array
    {
        $view = new View;
        $url = $_SERVER['REQUEST_URI'];
        $token = explode('=', $url)[1];
        $userId = $this->repository->searchToken($token);
        if ($userId == false) {
            return $view->viewError();
        } else {
            $user = $this->repository->searchPerson('ID',$userId['ID'])[0];
            $_SESSION['auth'] = $userId['ID'];
            return $view->viewDashboard($user);
        }
    }
}
?>