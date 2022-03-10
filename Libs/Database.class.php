<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Database
{
    protected $connection;
    //===========This constructor connects to the database==========================
    public function __construct(String $db_type, String $host, String $user, String $pass, String $dbname, String $db_charset)
    {
        $this->connection = new PDO("{$db_type}:host=" . $host . ";dbname=" . $dbname, $user, $pass);
        //$this->connection = new mysqli($host, $user, $pass, $dbname)
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->query("SET NAMES {$db_charset}");
        if (!$this->connection) {
            throw new Exception('Could not connect to database');
        }
    }
    //===PDO prepared statement===============//
    public function prepare(String $sql)
    {
        if (!$this->connection) {
            return false;
        }
        $result = $this->connection->prepare($sql);
        return $result;
    }
    //=====PDO transaction============//
    public function beginTransaction()
    {
        if (!$this->connection) {
            return false;
        }
        return $this->connection->beginTransaction();
    }
    //====PDO commit=========//
    public function commit()
    {
        if (!$this->connection) {
            return false;
        }
        return $this->connection->commit();
    }

    //=====PDO Rollback=======//
    public function rollBack()
    {
        if (!$this->connection) {
            return false;
        }
        return $this->connection->rollBack();
    }
    //======return the last inserted id ===========//
    public function lastInsertId()
    {
        if (!$this->connection) {
            return false;
        }
        return $this->connection->lastInsertId();
    }
    //=======check if the database is in transaction=======//
    public function inTransaction(){
        if (!$this->connection) {
            return false;
        }
        return $this->connection->inTransaction();
    }
    //======get the available database driver===========//
    public function getAvailableDrivers():array{
        if (!$this->connection) {
            return false;
        }
        return $this->connection->getAvailableDrivers();
    }
}
