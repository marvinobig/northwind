<?php

declare(strict_types=1);

class SQL
{
    protected string $root;
    protected string $database;
    protected PDO $pdo;

    function __construct(string $database)
    {
        $this->root = $_SERVER['DOCUMENT_ROOT'];
        $this->database = $database;
    }

    /**
     * Creates a db connection by generating the sqlite db file.
     */
    public function dbConnect(): PDO
    {
        try {
            $this->pdo = new PDO("sqlite:" . __DIR__ . "/../$this->database.sqlite");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->pdo;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    /**
     * This function creates the northwind table in the database.
     * This should be called after dbConnect() or it will throw an exception.
     */
    public function dbCreateNorthwind(): void
    {
        if (!$this->pdo) {
            throw new Exception("No connection to the database exists. Call dbConnect()");
        }

        if ($sqlScript = file_get_contents("$this->root/config/northwind.sql")) {
            $this->pdo->query($sqlScript)->fetchAll();
        } else {
            throw new Exception("SQL script could not be found");
        }
    }
}
