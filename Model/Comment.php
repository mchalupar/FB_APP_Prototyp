<?php
include_once 'InvalidFormatException.php';
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 08.01.13
 * Time: 18:38
 * To change this template use File | Settings | File Templates.
 */

Class Comment
{

    private $id;
    private $questId;
    private $comment;
    private $authorId;

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

    public function getQuestId()
    {
        return $this->questId;
    }

    public function setQuestId($value)
    {
        if (is_int($value))
            $this->questId = $value;
        else
            throw new InvalidFormatException();
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($value)
    {
        if (is_string($value))
            $this->comment = $value;
        else
            throw new InvalidFormatException();
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setAuthorId($value)
    {
        if (is_int($value))
            $this->authorId = $value;
        else
            throw new InvalidFormatException();
    }

    #endregion

    public function __construct()
    {
        $param = func_get_args();
        if (func_num_args() == 3) {
            $this->setQuestId($param[0]);
            $this->setComment($param[1]);
            $this->setAuthorId($param[2]);
        } else if (func_num_args() == 4) {
            $this->setId($param[0]);
            $this->setQuestId($param[1]);
            $this->setComment($param[2]);
            $this->setAuthorId($param[3]);
        } else {
            throw new InvalidParamException();
        }
    }

}