<?php
namespace App\Service;
use App\Repositories\Repository;
class Service
{
    public function createToken($ID): string
    {
        $token = substr(str_shuffle(str_repeat($x='0123456789', ceil(10/strlen($x)) )),1,10);
        $repo = new Repository;
        $repo->addToken($ID,$token);
        return $token;
    }
}
?>