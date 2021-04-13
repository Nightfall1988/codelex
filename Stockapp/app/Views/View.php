<?php
namespace App\Views;

class View
{
    public function selectedForm(): string
    {
        return 'shareProfile.php';    
    }

    public function buyShares(): string
    {
        return 'buyShares.php';    
    }

    public function displayPurchase(): string
    {
        return 'currentPurchase.php';   
    }

    public function shareTable(): string
    {
        return 'shareTable.php';
    }
}
?>