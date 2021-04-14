<?php
namespace App\Collections;

use App\Models\Human;
use App\Repositories\Database;
use App\Repositories\Repository;

class PeopleCollection
{
    private array $people;

    public function setCollection(): void
    {
        $repo = new Repository;
        $this->people = $repo->populateCollection();
    }

    public function getCollection(): array
    {
        return $this->people;
    }

    public function addPerson(string $name, int $age, string $code, string $description, string $address): void
    {
        $db = new Database;
        $sql = "INSERT INTO Registery (Name, Age, Code, Description, Address) VALUES ('$name', '$age', '$code', '$description', '$address');";
        $db->query($sql);
        $this->people[] = new Human($name,$age,$code,$description, $address);
    }

    public function searchPerson(string $parameterName, string $parameterValue): array
    {
        $repo = new Repository;
        $person = $repo->searchPerson($parameterName,$parameterValue);
        return $person;
    }
}
?>