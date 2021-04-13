<?php
namespace App\Models;

class Share
{
    private string $symbol;

    private string $priceBought;

    private string $currentPrice = '0';
    
    private string $currentInvestment = '0';

    private string $amount = '0';

    private string $difference;
    
    public function __construct(string $symbol, float $price)
    {
        $this->symbol = $symbol;
        $this->priceBought = $price;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getcurrentInvestment(): string
    {
        return $this->currentInvestment;
    }

    public function getpriceBought(): string
    {
        return $this->priceBought;
    }


    public function getPrice(): string
    {
        return $this->priceBought;
    }

    public function addAmount(int $amount): void
    {
        if ($this->amount == 0)
        {
            $this->amount = $amount;
        } else {
            $this->amount += $amount;
        }
    }

    public function addCurrentInvestment(float $fullInvestment): void
    {
        if ($this->currentInvestment == 0)
        {
            $this->currentInvestment = $fullInvestment;
        } else {
            $this->currentInvestment += $fullInvestment;
        }
    }

    public function addCurrentPrice(float $currentPrice): void
    {
        $this->currentPrice = $currentPrice;
    }

    public function getCurrentPrice(): string
    {
        return $this->currentPrice;
    }

    public function getDifference(): string
    {
        if ($this->currentPrice == $this->priceBought)
        {
            $this->difference = "0";
            return $this->difference;
        } else {
            $sub = $this->currentPrice - $this->priceBought;
            $diff = round(($sub / $this->priceBought) * 100, 2);
            $this->difference = $diff;
            return $this->difference;
        }
    }
}

?>