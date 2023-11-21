<?php
namespace Controller;
include_once __DIR__.'/../Model/Organisation.php';

use Model\Organisation;
use Database;

class OrganisationController
{
    static function getAll(): array
    {
        $pdo = Database::getConnection();
        $query = $pdo->prepare("SELECT * FROM organisations");
        $query->execute();
        return $query->fetchAll();
    }

static function getOne(int $id): array
    {
        $pdo = Database::getConnection();
        $query = $pdo->prepare("SELECT * FROM organisations WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    static function create(string $name, string $email, string $phone, string $address): void
    {
        $pdo = Database::getConnection();
        $query = $pdo->prepare("INSERT INTO organisations (name, email, phone, address) VALUES (:name, :email, :phone, :address)");
        $query->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address]);
    }

    static function update(int $id, string $name, string $email, string $phone, string $address): void
    {
        $pdo = Database::getConnection();
        $query = $pdo->prepare("UPDATE organisations SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id");
        $query->execute(['id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address]);
    }

    static function delete(int $id): void
    {
        $pdo = Database::getConnection();
        $query = $pdo->prepare("DELETE FROM organisations WHERE id = :id");
        $query->execute(['id' => $id]);
    }

}