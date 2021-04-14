<?php
namespace App\Repositories;
use App\Repositories\Database;
use App\Models\Human;

class Repository
{
    public function populateCollection(): array
    {
        $db = new Database;
        $sql = "SELECT * FROM Registery;";
        $query = $db->query($sql);

        while($row =  mysqli_fetch_assoc($query)) {

            $people[] = new Human($row['Name'],
                                        $row['Age'],
                                        $row['Code'],
                                        $row['Description'],
                                        $row['Address']);
            
        }
        return $people;
    }

    public function save(string $name, int $age, string $code, string $description, string $address): void
    {
        $db = new Database;
        $sql = "INSERT INTO Registery (Name, Age, Code, Description, Address) VALUES ('$name', '$age', '$code', '$description', '$address');";
        $db->query($sql);
        $this->people[] = new Human($name,$age,$code,$description, $address);
    }

    public function searchPerson(string $parameterName, string $parameterValue): array
    {
        $db = new Database;
        $results = [];
        if ($parameterName == 'Code') {
            $valueArray = str_split($parameterValue);
            $firstPart = [];
            $secondPart = [];
            if (!in_array('-', $valueArray) && count($valueArray) <= 12)
            {
                $firstPart =  implode('',array_slice($valueArray,0,6));
                $secondPart = implode('',array_slice($valueArray, 6, count($valueArray)));
                $sql = "SELECT * FROM Registery WHERE REPLACE($parameterName, '-', '') LIKE " ." '%". "$firstPart" . "%" . "$secondPart" . "%'";
            } else {
                $sql = "SELECT * FROM Registery WHERE $parameterName LIKE " ."'%". "$parameterValue" . "%'";
            }            
        } else {
            $sql = "SELECT * FROM Registery WHERE $parameterName LIKE " ."'%". "$parameterValue" . "%'";
        } 
        $query = $db->query($sql);
        if($query->num_rows>0) {
            while($row = mysqli_fetch_assoc($query)) 
            {
                $results[] = new Human($row['Name'],
                                        $row['Age'],
                                        $row['Code'],
                                        $row['Description'],
                                        $row['Address']);
            }
        } else {
            $results = [];
        }
        return $results;
    }

    public function validateLogin(string $parameterValue): array
    {
        $db = new Database;
            $valueArray = str_split($parameterValue);
            $firstPart = [];
            $secondPart = [];
            if (!in_array('-', $valueArray) && count($valueArray) <= 12)
            {
                $firstPart =  implode('',array_slice($valueArray,0,6));
                $secondPart = implode('',array_slice($valueArray, 6, count($valueArray)));
                $sql = "SELECT * FROM Registery WHERE REPLACE(Code, '-', '') LIKE " ." '%". "$firstPart" . "%" . "$secondPart" . "%'";
            } else {
                $sql = "SELECT * FROM Registery WHERE Code LIKE " ."'%". "$parameterValue" . "%'";
            }            
        {
            $sql = "SELECT * FROM Registery WHERE Code LIKE " ."'%". "$parameterValue" . "%'";
        } 
        $query = $db->query($sql);
        if($query->num_rows>0) {
            $row = mysqli_fetch_assoc($query);
            return [true, $row];
        } else {
            return [false, null];
        }
    }

    public function addToken(int $id, string $token): void
    {
        $db = new Database;
        $timeSent = date("d-m-Y h:m:s");
        $timeExpires = date("d-m-Y h:m:s", strtotime("+1 day"));
        $sql = "INSERT INTO Tokens (ID, Token, DateSent, DateExpires) VALUES ($id, '$token', '$timeSent', '$timeExpires');";
        $db->query($sql);
    }

    public function searchToken($token): array
    {
        $db = new Database;
        $sql = "SELECT * FROM Tokens WHERE Token = '$token'";

        $query = $db->query($sql);
        if($query->num_rows>0) {
            $row = mysqli_fetch_assoc($query);
            if (strtotime($row['DateExpires']) > date("d-m-Y h:m:s")) {
                return $row;

            } else {
                return [false, null];
            }
        } else {
            return [false, null];
        }
    }
}
?>