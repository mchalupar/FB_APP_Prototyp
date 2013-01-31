<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 31.01.13
 * Time: 21:07
 * To change this template use File | Settings | File Templates.
 */
class ConnectionFailedException extends Exception
{
    public function __toString() {
        return "exception '".__CLASS__ ."' with message '".$this->getMessage()."' in ".$this->getFile().":".$this->getLine()."\nStack trace:\n".$this->getTraceAsString();
    }
}

class DatabaseNotFoundException extends Exception
{
    public function __toString() {
        return "exception '".__CLASS__ ."' with message '".$this->getMessage()."' in ".$this->getFile().":".$this->getLine()."\nStack trace:\n".$this->getTraceAsString();
    }
}