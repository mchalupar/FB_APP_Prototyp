<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class User
{

    private $id;
    private $firstName;
    private $lastName;
    private $level;
    private $grade;

    #region Properties
    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        if (is_int($value))
            $this->id = $value;
        else
            throw new InvalidFormatException();
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($value)
    {
        if (is_string($value))
            $this->firstName = $value;
        else
            throw new InvalidFormatException();
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($value)
    {
        if (is_string($value))
            $this->lastName = $value;
        else
            throw new InvalidFormatException();
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($value)
    {
        if (is_int($value))
            $this->level = $value;
        else
            throw new InvalidFormatException();
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setGrade($value)
    {
        if (is_int($value))
            $this->grade = $value;
        else
            throw new InvalidFormatException();
    }
    #endregion

    public function __construct() {
        $param = func_get_args();
        if (func_num_args() == 4) {
            $this->setFirstName($param[0]);
            $this->setLastName($param[1]);
            $this->setLevel($param[2]);
            $this->setGrade($param[3]);
        } else if (func_num_args() == 5) {
            $this->setId($param[0]);
            $this->setFirstName($param[1]);
            $this->setLastName($param[2]);
            $this->setLevel($param[3]);
            $this->setGrade($param[4]);
        } else {
            throw new InvalidParamException();
        }
    }

}