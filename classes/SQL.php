<?php

declare(strict_types=1);

class SQL
{
    protected string $database;
    protected string $username;
    protected string $password;
    protected PDO $pdo;

    function __construct(string $database, string $username, string $password)
    {
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Creates a db connection by generating the sqlite db file.
     */
    public function dbConnect(): PDO
    {
        try {
            $this->pdo = new PDO("sqlsrv:server=balticsqlserver.database.windows.net; Database=$this->database", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 1);

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

        $sqlScript = file_get_contents('../config/northwind.sql');

        $this->pdo->query($sqlScript)->fetchAll();
    }
}
