<?php
namespace App\Controllers;
use App\Collections\ShareCollection;
use App\Models\Share;
use App\Views\View;
use App\Services\Service;

class PurchaseController
{
    private Service $service;
    
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function getFormSelection(): array
    {
        $symbol = $_GET['symbol'];
        $items = $this->service->getShareProfile($symbol);
        $view = new View;
        $page = $view->selectedForm();
        return [$items, $page];
    }

    public function buyShares(): array
    {
        $amount = $_GET['amount'];
        $symbol = $_GET['symbol'];
        if (!is_numeric($amount)) {
            return [];
        } else {
            $amount = intval($amount);
            $items = $this->service->confirmPurchase($amount, $symbol);
            $share = new Share($items[1],$items[2]);
            $share->addAmount($items[0]);
            $share->addCurrentInvestment($items[3]);
            $view = new View;
            $page = $view->displayPurchase();
            return [$share, $page];
        }
    }

    public function sell(): array
    {
       $view = new View;
       $page = $view->shareTable();
       $symbol = $_POST['symbol'];
       $collection = $this->service->sell($symbol);
       return [$collection, $page];

    }
}
?>