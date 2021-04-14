<?php
namespace App\Controllers;
use App\View;
use App\Collections\PeopleCollection;
use App\Repositories\Repository;

class Controller
{
    public function home(): array
    {
        $view = new View;
        $collection = new PeopleCollection;
        $collection->setCollection();
        $peopleList = $view->displayRegistry($collection);
        return $peopleList;
    }

    public function search(): array
    {
        $parameter = $_POST['searchParam'];
        $view = new View;
        return $view->searchRegistry($parameter);
    }

    public function add(): array
    {
        $name = $_POST['name'];
        $age = intval($_POST['age']);
        $code = $_POST['code'];
        $desc = $_POST['description'];
        $address = $_POST['address'];
        $codeArray = str_split($code);

        if (!in_array('-', $codeArray))
        {
            $firstPart = array_slice($codeArray, 0,6);
            $secondPart = array_slice($codeArray,-5);
            $code = implode('',$firstPart) . "-" . implode('',$secondPart);
        }
        $collection = new PeopleCollection;
        $collection->addPerson($name,$age,$code,$desc,$address);
        $view = new View;
        return $view->displayRegistry($collection); 
    }

    public function showResults(): array
    {
        $view = new View;
        $parameterName = $_POST['searchParam'];
        $parameterValue = $_POST['param'];
        $collection = new PeopleCollection;
        $results = $collection->searchPerson($parameterName,$parameterValue);
        return $view->displaySearchResults($results);
    }

    public function showForm(): array
    {
        $view = new View;
        return $view->addToRegistry();
    }

    public function showDashboard()
    {
        if (!isset($_SESSION['auth']))
        {
            $view = new View;
            return $view->viewLoginPage();
        } else {
            $view = new View;
            $auth = $_SESSION['auth'];
            $repository = new Repository;
            $person = $repository->searchPerson('ID',$auth);
            return $view->viewDashboard($person[0]);
        }
    }
}
?>