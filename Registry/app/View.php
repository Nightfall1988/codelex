<?php
namespace App;
use App\Models\Human;
use App\Collections\PeopleCollection;

class View
{
    public function addToRegistry(): array
    {
        $view = 'viewRegiserPerson.php';
        return [NULL, $view];
    }

    public function searchRegistry(string $param): array // BY NAME OR BY ADDRESS OR BY WHATEVER
    {
        $view = 'viewSearchRegistry.php';
        return [$param, $view];
    }

    public function displayRegistry(PeopleCollection $collection): array
    {
        $peopleList = $collection->getCollection();
        return [$peopleList,'viewShowRegistry.php'];
    }

    public function displaySearchResults(array $results)
    {
        $peopleList = $results;
        $view = 'viewShowRegistry.php';
        return [$peopleList,$view];
    }

    public function viewLoginPage(): array
    {
        $view = 'viewLoginPage.php';
        return ["NULL", $view];
    }

    public function viewDashboard(Human $person): array
    {
        $view = 'viewDashboard.php';
        return [[$person], $view];
    }

    public function viewError()
    {
        $view = 'viewError.php';
        return [NULL, $view];
    }
}

?>