<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class Question
{

    private $id;
    private $question;
    private $subjectId;
    private $likes;
    private $dislikes;

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

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($value)
    {
        if (is_string($value))
            $this->question = $value;
        else
            throw new InvalidFormatException();
    }

    public function getSubjectId()
    {
        return $this->subjectId;
    }

    public function setSubjectId($value)
    {
        if (is_int($value))
            $this->subjectId = $value;
        else
            throw new InvalidFormatException();
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($value)
    {
        if (is_int($value))
            $this->likes = $value;
        else
            throw new InvalidFormatException();
    }

    public function getDislikes()
    {
        return $this->dislikes;
    }

    public function setDislikes($value)
    {
        if (is_int($value))
            $this->dislikes = $value;
        else
            throw new InvalidFormatException();
    }

    #endregion

    public function __construct()
    {
        $param = func_get_args();
        if (func_num_args() == 4) {
            $this->setQuestion($param[0]);
            $this->setSubjectId($param[1]);
            $this->setLikes($param[2]);
            $this->setDislikes($param[3]);
        } else if (func_num_args() == 5) {
            $this->setId($param[0]);
            $this->setQuestion($param[1]);
            $this->setSubjectId($param[2]);
            $this->setLikes($param[3]);
            $this->setDislikes($param[4]);
        } else {
            throw new InvalidParamException();
        }
    }

}