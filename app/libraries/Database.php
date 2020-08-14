<?php

/**
 * pdo db class
 * connect to db
 * create prepared statements
 * bind values
 * return rows and results
 */

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // set dsn
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // create pdo instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\Throwable $th) {
            //throw $th;
            $this->error = $th->getMessage();
            echo $this->error;
        }
    }
}
