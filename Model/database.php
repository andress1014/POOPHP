<?php

class Database
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=quantum', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}