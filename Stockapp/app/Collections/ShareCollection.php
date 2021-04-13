<?php
namespace App\Collections;
use App\Models\Share;

class ShareCollection
{
    private array $shareList = [];

    public function add(Share $share): void
    {
        $this->shareList[] = $share;
    }

    public function get(): array
    {
        return $this->shareList;
    }
}
?>