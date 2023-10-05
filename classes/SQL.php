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
}
