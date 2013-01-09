<?php
/**
 * Created by JetBrains PhpStorm.
 * Subject: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once 'Common/ISubjectDao.php';
include_once 'Model/Subject.php';

class SubjectDao implements ISubjectDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Subject(1, "Mathematics");
        $this->daolist[1] = new Subject(2, "Biology");
        $this->daolist[2] = new Subject(3, "Applied Chemistry");
        $this->daolist[3] = new Subject(4, "History");
    }

    public function FindById($id)
    {
        if (is_int($id)) {
            foreach ($this->daolist as $subject) {
                if ($subject instanceof Subject) {
                    if ($subject->getId() == $id)
                        return $subject;
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
        if ($entity instanceof Subject) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $subject = $this->daolist[$i];
                if ($subject instanceof Subject) {
                    if ($subject->getId() == $entity->getId()) {
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
        if ($entity instanceof Subject) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize-1];
            if ($lastEntry instanceof Subject) {
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
                $subject = $this->daolist[$i];
                if ($subject instanceof Subject) {
                    if ($subject->getId() == $id) {
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