<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 19:17
 * To change this template use File | Settings | File Templates.
 */
class InvalidFormatException extends Exception
{
    public function __toString() {
        return "exception '".__CLASS__ ."' with message '".$this->getMessage()."' in ".$this->getFile().":".$this->getLine()."\nStack trace:\n".$this->getTraceAsString();
    }
}

class InvalidParamException extends Exception
{
    public function __toString() {
        return "exception '".__CLASS__ ."' with message '".$this->getMessage()."' in ".$this->getFile().":".$this->getLine()."\nStack trace:\n".$this->getTraceAsString();
    }
}