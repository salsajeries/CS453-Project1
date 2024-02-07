<?php 

session_destroy();
session_start(); //for starting or resuming sessions
    
    class Course {
        // Properties
        public $name;
        public $book1;
        public $book2;

        // Methods
        public function __construct($name, $book1, $book2) {
            $this->set_name($name);
            $this->set_book1($book1);
            $this->set_book2($book2);
        }

        public function set_name($name) {
            $this->name = $name;
        }
        
        public function set_book1($book) {
            $this->book1 = $book;
        }

        public function set_book2($book) {
            $this->book2 = $book;
        }

        public function get_name() {
            return $this->name;
        }
        
        public function get_book1() {
            return $this->book1;
        }

        public function get_book2() {
            return $this->book2;
        }

        public function printCourseDetails() {
            $details = "<ul>\n";
            $details .= "  <li>Course: {$this->get_name()}</li>\n";
            $details .= "  <li>Book 1: {$this->get_book1()}</li>\n";
            $details .= "  <li>Book 2: {$this->get_book2()}</li>\n";
            $details .= "</ul>";
    
            return $details;
        }

    }

    class Book {

        // Properties
        public $title;
        public $publisher;
        public $edition;
        public $printDate;
        
        //default constructor
        public function __construct($title, $publisher, $edition, $printDate) {

            $this->set_title($title);
            $this->set_publisher($publisher);
            $this->set_edition($edition);
            $this->set_printDate($printDate);

        }
        

        // Methods (set)
        public function set_title($title) {
            $this->title = $title;
        }

        public function set_publisher($publisher) {
            $this->publisher = $publisher;
        }

        public function set_edition($edition) {
            $this->edition = $edition;
        }

        public function set_printDate($printDate) {
            $this->printDate = $printDate;
        }

        //get methods v 

        public function get_title() {
           return $this->title;
        }

        public function get_publisher() {
            return $this->publisher;
        }

        public function get_edition() {
           return $this->edition;
        }

        public function get_printDate() {
           return $this->printDate;
        }

        
    }

    class Student {

        // Properties
        public $name;
        public $course;
        public $book1;
        public $book2;
        
        // Methods
        public function __construct($name, $course, $book1, $book2) {
            $this->set_name($name);
            $this->set_course($course);
            $this->set_book1($book1);
            $this->set_book2($book2);
        }

        
        public function set_name($name) {
            $this->name = $name;
        }

        public function set_course($course) {
            $this->course = $course;
        }

        public function set_book1($book) {
            $this->book1 = ($book);
        }

        public function set_book2($book) {
            $this->book2 = $book;
        }

        public function get_name() {
            return $this->name;
        }

        public function get_course() {
            return $this->course;
        }

        public function get_book1() {
            return $this->book1;
        }

        public function get_book2() {
            return $this->book2;
        }
    }

    //session_start(); // Start or resume the session
    $bookObj = new Book("yes we can see the title", "publisher", "edition", "print date");
    $studentObj = new Student("some name", $courseObj, $bookObj, $bookObj);

    $tempBook1;
    $tempBook2;
    $pleaseRead;

    $courseList = array();
    $studentList = array();

    $courseParamsToRetrieve = ["course", "book1N", "book1P", "book1E", "pd1", "book2N", "book2P", "book2E", "pd2"];
    $courseParams = [];
    
    $courseList = isset($_SESSION["courseList"]) ? $_SESSION["courseList"] : array();
    
    foreach ($courseParamsToRetrieve as $param) {
        if (isset($_REQUEST[$param])){
            $courseParams[$param] = $_REQUEST[$param];
            array_push($courseList, $courseParams[$param]);
            $_SESSION["courseList"] = $courseList;
        }
        //$courseParams[$param] = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
    }

    /*
    if (isset($_REQUEST["func"])) {
        if (isset($_REQUEST["course"])){
            $pleaseRead = $_REQUEST["course"];
            $_SESSION["courseList"] = $pleaseRead;
        }
        // Make book 1 and 2
        //$pleaseRead = $_REQUEST["course"];
        //$tempBook1 = new Book($_REQUEST["book1N"], $_REQUEST["book1P"], $_REQUEST["book1E"], $_REQUEST["pd1"]);
        //$tempBook2 = new Book($_REQUEST["book2N"], $_REQUEST["book2P"], $_REQUEST["book2E"], $_REQUEST["pd2"]);

        // Make course
        //$tempCourse = new Course($_REQUEST["course"], $tempBook1, $tempBook2);

        // Add the course to courseList
        //array_push($courseList, $tempCourse);
    }
    */

    /*
    if (isset(??_/..>llL..$courseObj["course"])) {
        $mydata = $_REQUEST["course"];
        array_push($courseList, $mydata); 
        $_SESSION["courseList"] = $courseList; // Store the updated array in the session
    }
    */

    if (isset($_REQUEST["lastValue"])) {
        $lastValue = $courseList;
        //echo $lastValue;
        foreach ($courseList as $item) {
            echo "<li>$item</li>";
        }
    }



    
    /*
    $nameArr = array();


    $nameArr = isset($_SESSION["nameArr"]) ? $_SESSION["nameArr"] : array();

    if (isset($_REQUEST["fname"])) {
        $mydata = $_REQUEST["fname"];
        array_push($nameArr, $mydata);
        $_SESSION["nameArr"] = $nameArr; // Store the updated array in the session
    }

    if (isset($_REQUEST["lastValue"])) {
        $lastValue = end($nameArr);
        echo $lastValue;
    }
    */