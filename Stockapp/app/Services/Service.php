<?php
namespace App\Services;
use App\Repositories\StockRepository;

class Service
{
    private StockRepository $stockRepository;

    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    public function getShareProfile(string $symbol)
    {
        $repoItems = $this->stockRepository->getDataOnCurrentPrice($symbol);
        return $repoItems;
    }

    public function confirmPurchase(int $amount, string $symbol): array
    {
        $priceBought = $this->stockRepository->getDataOnCurrentPrice($symbol)[0];
        $fullPrice = floatval($priceBought * $amount);
        
        if ($this->stockRepository->buy($amount, $symbol, $priceBought, $fullPrice) == true)
        {
            $confirm = [strval($amount), $symbol, strval(round($priceBought)), strval(round($fullPrice))];
            return $confirm;
        } else {
            return [];
        }
    }

    public function showActiveShares(): array
    {
        $allShares = $this->stockRepository->getAllShares();
        $shares = $allShares->get();
        return $shares;
    }

    public function sell($symbol): array
    {
        $this->stockRepository->sell($symbol);
        $allShares = $this->stockRepository->getAllShares();
        $shares = $allShares->get();
        return $shares;
    }
}
?>