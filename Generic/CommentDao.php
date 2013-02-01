<?php
/**
 * Created by JetBrains PhpStorm.
 * Comment: Charly
 * Date: 08.01.13
 * Time: 22:35
 * To change this template use File | Settings | File Templates.
 */

include_once '../Common/ICommentDao.php';
include_once '../Model/Comment.php';

class CommentDao implements ICommentDao
{

    private $daolist = array();

    public function __construct()
    {
        $this->daolist[0] = new Comment(1, 1, "Good Question", 1);
        $this->daolist[1] = new Comment(2, 1, "Too Easy", 2);
        $this->daolist[2] = new Comment(3, 1, "Doesn't belong to that subject", 3);
        $this->daolist[3] = new Comment(4, 1, "WTF", 4);
    }

    public function FindByFullId($id, $pkId)
    {
        if (is_int($id) && is_int($pkId)) {
            foreach ($this->daolist as $comment) {
                if ($comment instanceof Comment) {
                    if ($comment->getId() == $id && $comment->getQuestId() == $pkId)
                        return $comment;
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
            foreach ($this->daolist as $comment) {
                if ($comment instanceof Comment) {
                    if ($comment->getId() == $id)
                        return $comment;
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
        if ($entity instanceof Comment) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $comment = $this->daolist[$i];
                if ($comment instanceof Comment) {
                    if ($comment->getId() == $entity->getId()) {
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
        if ($entity instanceof Comment) {
            $currSize = sizeof($this->daolist);
            $lastEntry = $this->daolist[$currSize - 1];
            if ($lastEntry instanceof Comment) {
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

    public function Delete($id, $pkId)
    {
        if (is_int($id) && is_int($pkId)) {
            for ($i = 0; $i < sizeof($this->daolist); $i++) {
                $comment = $this->daolist[$i];
                if ($comment instanceof Comment) {
                    if ($comment->getId() == $id && $comment->getQuestId() == $pkId) {
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