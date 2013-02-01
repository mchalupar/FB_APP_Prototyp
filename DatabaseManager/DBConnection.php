<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 31.01.13
 * Time: 20:51
 * To change this template use File | Settings | File Templates.
     */
class DBConnection {
    private $user = "root";
    private $pass = "";
    private $root = "localhost";
    private $dbName = "knowhow";

    public function getRoot()
    {
        return $this->root;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getDbName()
    {
        return $this->dbName;
    }
}
?>