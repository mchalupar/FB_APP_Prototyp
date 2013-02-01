<?php
/**
 * Created by JetBrains PhpStorm.
 * Question: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once '../Common/IQuestionDao.php';
include_once '../Model/Question.php';

class QuestionDao implements IQuestionDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Question(1, "Calculate the term: \"6 * 7 = \"", 1, 99, 17);
    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $question) {
                if ($question instanceof Question) {
                    if ($question->getId() == $id)
                        return $question;
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }

    public function FindAll()
    {
        return $this->daolist;
    }

    public function Update($entity)
    {
        if ($entity instanceof Question) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $question = $this->daolist[$i];
                if ($question instanceof Question) {
                    if ($question->getId() == $entity->getId()) {
                        $this->daolist[$i] = $entity;
                        return true;
                    }
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }

    public function Insert($entity)
    {
        if ($entity instanceof Question) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize - 1];
            if ($lastEntry instanceof Question) {
                $newId = $lastEntry->getId() + 1;
                $entity->setId($newId);
                $this->daolist[$currSize] = $entity;
                return $newId;
            } else {
                throw new InvalidFormatException();
            }
        } else {
            throw new InvalidFormatException();
        }
    }

    public function Delete($id)
    {
        if (is_int($id)) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $question = $this->daolist[$i];
                if ($question instanceof Question) {
                    if ($question->getId() == $id) {
                        $this->daolist[$i] = null;
                        return true;
                    }
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }
    }
}