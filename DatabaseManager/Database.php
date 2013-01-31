<?php

include_once("DBConnection.php");
include_once("DatabaseExceptions.php");
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 31.01.13
 * Time: 20:56
 * To change this template use File | Settings | File Templates.
 */
class Database
{
    private $sql;

    private $lastResult;
    private $affectedRows;

    public function getLastResult()
    {
        return $this->lastResult;
    }

    public function getAffectedRows()
    {
        return $this->affectedRows;
    }

    public function _construct()
    {
        $conn = new DBConnection();

        try {
            mysql_connect($conn->getRoot, $conn->getUser, $conn->getPass);
        } catch (Exception $e) {
            throw new ConnectionFailedException();
        }

        try {
            mysql_select_db($conn->getDbName);
        } catch (Exception $e) {
            throw new DatabaseNotFoundException();
        }
    }

    public function query($sql)
    {
        $this->sql = mysql_real_escape_string($sql);
        $this->lastResult = mysql_query($this->sql);
        $this->affectedRows = mysql_affected_rows();
    }

    public function destruct()
    {
        @mysql_free_result($this->lastResult);
        mysql_close();
    }

    public function debug()
    {
        echo "<br />################################# START_DEBUG #################################<br/>";
        echo "<h3 > Sql Command </h3 >";
        echo $this->sql . "<br /><br />";
        echo "<h3 > Affected Rows </h3 >";
        echo $this->affectedRows;
        echo "<br />################################## END_DEBUG ##################################<br/>";
    }
}
