<?php
namespace App\Controllers;
use App\Views\View;
use App\Collections\ShareCollection;
use App\Services\Service;

class HomeController
{
    private ShareCollection $collection;

    private View $view;

    private Service $service;

    public function __construct(Service $service)
    {
        $this->collection = new ShareCollection;
        $this->view = new View;
        $this->service = $service;
    }

    public function showForm(): array
    {
        $page = $this->view->buyShares();
        return [[NULL], $page];
    }

    public function showAllShares(): array
    {
        $page = $this->view->shareTable();
        $post = $this->service->showActiveShares();
        return [$post, $page];
    }
}
?>