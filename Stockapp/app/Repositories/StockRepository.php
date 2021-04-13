<?php
namespace App\Repositories;

use Finnhub;
use GuzzleHttp;
use App\Collections\ShareCollection;
use App\Repositories\Database\Database;
use App\Models\Share;


class StockRepository
{
    private Finnhub\Api\DefaultApi $client;

    public function __construct()
    {
        $config = Finnhub\Configuration::getDefaultConfiguration()->setApiKey('token', 'c1mnm0i37fkpnsp60qbg');
        $this->client = new Finnhub\Api\DefaultApi(
            new GuzzleHttp\Client(),
            $config
        );
    }

    public function getDataOnCurrentPrice($symbol): array
    {
        $currentPrice = $this->client->quote($symbol)['c'];
        return [$currentPrice, $symbol];
    }

    public function multiply($amount, $symbol): array
    {
        $currentPrice = $this->client->quote($symbol)['c'];
        $fullPrice = $amount * $currentPrice;
        return [$fullPrice, $symbol];
    }

    public function buy(int $amount, string $symbol,  float $priceBought, float $fullPrice): bool
    {
        $db = new Database;
        $sql = "SELECT * FROM PersonalStock WHERE Symbol = " . "'". "$symbol" . "'" . ";";
        $query = $db->query($sql);
        $row =  mysqli_fetch_assoc($query);
        if ($row == NULL)
        {
            $sql = "INSERT INTO PersonalStock 
            (Symbol, PriceBought, FullPrice, Amount) VALUES 
            (" ."'". "$symbol" . "'". ", " . " $priceBought" . ", " . " $fullPrice". ", "  . "$amount" .  ");";

            if ($db->query($sql) == true)
            {
                return true;
            } else {
                return false;
            }
        } else {
            $newAmount = $amount + $row['Amount'];
            if ($priceBought >= $row['PriceBought']) 
            {
                $newPrice = $priceBought;
            } else {
                $newPrice = $row['PriceBought'];
            }
            
            $newFullPrice = $fullPrice + $row['FullPrice'];

            $sql = "UPDATE PersonalStock SET PriceBought = " . "$newPrice" . 
                   ", FullPrice = " . "$newFullPrice" . ", Amount = " . "$newAmount" . 
                   " WHERE Symbol = " . "'". "$symbol" . "';";
            if ( $db->query($sql) == true)
            {
                return true;
            }  else {
                return false;
            }          
        }
    }

    public function getAllShares(): ShareCollection
    {
        $db = new Database;
        $collection = new ShareCollection;
        $sql = 'SELECT * FROM PersonalStock;';

        $query = $db->query($sql);

        while($row =  mysqli_fetch_assoc($query)) {

        $share = new Share($row['Symbol'], $row['PriceBought']);
        $share->addAmount($row['Amount']);
        $share->addCurrentInvestment($row['FullPrice']);
        $share->addCurrentPrice($this->client->quote($share->getSymbol())['c']);
        $share->getDifference();
        $collection->add($share);
        }
        return $collection;
    }

    public function sell($symbol): ShareCollection
    {
        $db = new Database;
        $sql = "DELETE FROM PersonalStock WHERE Symbol = " . "'" . "$symbol" . "'" . ";";
        $db->query($sql);
        return $this->getAllShares();
    }

}


?>