<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Charly
 * Date: 09.01.13
 * Time: 01:27
 * To change this template use File | Settings | File Templates.
 */

include_once 'Generic/GeneralDao.php';

class DaoFactory
{
    public static function CreateAnswerDao() {
        return new AnswerDao();
    }
    public static function CreateCommentDao() {
        return new CommentDao();
    }
    public static function CreateDifficultyDao() {
        return new DifficultyDao();
    }
    public static function CreateGradeDao() {
        return new GradeDao();
    }
    public static function CreateQuestionDao() {
        return new QuestionDao();
    }
    public static function CreateReportDao() {
        return new ReportDao();
    }
    public static function CreateSubjectDao() {
        return new SubjectDao();
    }
    public static function CreateUserDao() {
        return new UserDao();
    }

}