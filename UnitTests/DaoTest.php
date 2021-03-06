<?php
include_once '../Generic/GeneralDao.php';
include_once '../Model/General.php';

echo "<h1>Testing DAOs</h1>";

echo "<h2>UserDao</h2>";
$users = new UserDao();
var_dump($users->FindAll());
echo "</br></br></br>";
var_dump($users->FindById(1));
echo "</br></br></br>";
var_dump($users->Update(new User(1, "Charly", "Chalupar", 42, 17)));
echo "</br></br></br>";
var_dump($users->Insert(new User("Chicken", "Charly", 42, 17)));
echo "</br></br></br>";
var_dump($users->FindAll());
echo "</br></br></br>";
var_dump($users->Delete(5));
echo "</br></br></br>";
var_dump($users->FindAll());

echo "<h2>QuestionDao</h2>";
$questions = new QuestionDao();
var_dump($questions->FindAll());
echo "</br></br></br>";
var_dump($questions->FindById(1));
echo "</br></br></br>";
var_dump($questions->Update(new Question(1, "Calculate the term: \" 7 * 6 = \"", 1, 272, 0)));
echo "</br></br></br>";
var_dump($questions->Insert(new Question("Calculate the term: \"10 * 7 = \"", 1, 22, 0)));
echo "</br></br></br>";
var_dump($questions->FindAll());
echo "</br></br></br>";
var_dump($questions->Delete(2));
echo "</br></br></br>";
var_dump($questions->FindAll());

echo "<h2>SubjectDao</h2>";
$subjects = new SubjectDao();
var_dump($subjects->FindAll());
echo "</br></br></br>";
var_dump($subjects->FindById(1));
echo "</br></br></br>";
var_dump($subjects->Update(new Subject(1, "Mathe")));
echo "</br></br></br>";
var_dump($subjects->Insert(new Subject("Literature")));
echo "</br></br></br>";
var_dump($subjects->FindAll());
echo "</br></br></br>";
var_dump($subjects->Delete(2));
echo "</br></br></br>";
var_dump($subjects->FindAll());

echo "<h2>GradeDao</h2>";
$grades = new GradeDao();
var_dump($grades->FindAll());
echo "</br></br></br>";
var_dump($grades->FindById(1));
echo "</br></br></br>";
var_dump($grades->Update(new Grade(1, "Mathe")));
echo "</br></br></br>";
var_dump($grades->Insert(new Grade("Literature")));
echo "</br></br></br>";
var_dump($grades->FindAll());
echo "</br></br></br>";
var_dump($grades->Delete(2));
echo "</br></br></br>";
var_dump($grades->FindAll());

echo "<h2>CommentDao</h2>";
$comments = new CommentDao();
var_dump($comments->FindAll());
echo "</br></br></br>";
var_dump($comments->FindById(1));
echo "</br></br></br>";
var_dump($comments->Update(new Comment(1, 1, "Like that one! xD", 2)));
echo "</br></br></br>";
var_dump($comments->Insert(new Comment(1, "WTF2", 4)));
echo "</br></br></br>";
var_dump($comments->FindAll());
echo "</br></br></br>";
var_dump($comments->Delete(4, 1));
echo "</br></br></br>";
var_dump($comments->FindAll());

echo "<h2>DifficultyDao</h2>";
$difficulties = new DifficultyDao();
var_dump($difficulties->FindAll());
echo "</br></br></br>";
var_dump($difficulties->FindById(1));
echo "</br></br></br>";
var_dump($difficulties->Update(new Difficulty(1, 1, "Like Hell")));
echo "</br></br></br>";
var_dump($difficulties->Insert(new Difficulty(1, 3, "WTF2")));
echo "</br></br></br>";
var_dump($difficulties->FindAll());
echo "</br></br></br>";
var_dump($difficulties->Delete(4, 1));
echo "</br></br></br>";
var_dump($difficulties->FindAll());

echo "<h2>AnswerDao</h2>";
$answers = new AnswerDao();
var_dump($answers->FindAll());
echo "</br></br></br>";
var_dump($answers->FindById(1));
echo "</br></br></br>";
var_dump($answers->Update(new Answer(1, 1, "42!", true)));
echo "</br></br></br>";
var_dump($answers->Insert(new Answer(1, "WTF", false)));
echo "</br></br></br>";
var_dump($answers->FindAll());
echo "</br></br></br>";
var_dump($answers->Delete(4, 1));
echo "</br></br></br>";
var_dump($answers->FindAll());


echo "<h2>ReportDao</h2>";
$reports = new ReportDao();
var_dump($reports->FindAll());
echo "</br></br></br>";
var_dump($reports->FindById(1));
echo "</br></br></br>";
var_dump($reports->Update(new Report(1, "Correct Answer to all Questions in Universe")));
echo "</br></br></br>";
var_dump($reports->Insert(new Report("WTF")));
echo "</br></br></br>";
var_dump($reports->FindAll());
echo "</br></br></br>";
var_dump($reports->Delete(4, 1));
echo "</br></br></br>";
var_dump($reports->FindAll());