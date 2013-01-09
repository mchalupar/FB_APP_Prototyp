<?php
/**
 * Created by JetBrains PhpStorm.
 * Answer: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once 'Common/IAnswerDao.php';
include_once 'Model/Answer.php';

class AnswerDao implements IAnswerDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Answer(1, 1, "42", true);
        $this->daolist[1] = new Answer(2, 1, "41", false);
        $this->daolist[2] = new Answer(3, 1, "13", false);
        $this->daolist[3] = new Answer(4, 1, "72", false);
    }

    public function FindByFullId($id, $pkId)
    {
        if (is_int($id) && is_int($pkId)) {
            foreach ($this->daolist as $answer) {
                if ($answer instanceof Answer) {
                    if ($answer->getId() == $id && $answer->QuestId() == $pkId)
                        return $answer;
                } else {
                    throw new InvalidFormatException();
                }
            }
            return false;
        } else {
            throw new InvalidFormatException();
        }

    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $answer) {
                if ($answer instanceof Answer) {
                    if ($answer->getId() == $id)
                        return $answer;
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
        if ($entity instanceof Answer) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $answer = $this->daolist[$i];
                if ($answer instanceof Answer) {
                    if ($answer->getId() == $entity->getId() && $answer->getQuestId() == $entity->getQuestId()) {
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
        if ($entity instanceof Answer) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize-1];
            if ($lastEntry instanceof Answer) {
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
                $answer = $this->daolist[$i];
                if ($answer instanceof Answer) {
                    if ($answer->getId() == $id) {
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