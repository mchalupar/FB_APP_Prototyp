<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class Difficulty
{

    private $id;
    private $gradeId;
    private $difficulty;

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

    public function getGradeId()
    {
        return $this->gradeId;
    }

    public function setGradeId($value)
    {
        if (is_int($value))
            $this->gradeId = $value;
        else
            throw new InvalidFormatException();
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($value)
    {
        if (is_int($value))
            $this->difficulty = $value;
        else
            throw new InvalidFormatException();
    }
    #endregion

    public function __construct() {
        $param = func_get_args();
        if (func_num_args() == 3) {
            $this->setId($param[0]);
            $this->setGradeId($param[1]);
            $this->setDifficulty($param[2]);
        } else {
            throw new InvalidParamException();
        }
    }

}