<?php 

//session_start(); //for starting or resuming sessions
    
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

    session_start(); // Start or resume the session

    $courseList = array();
    $studentList = array();

    $courseParamsToRetrieve = ["course", "book1N", "book1P", "book1E", "pd1", "book2N", "book2P", "book2E", "pd2"];
    $courseParams = isset($_SESSION["courseParams"]) ? $_SESSION["courseParams"] : array();
    
    $courseList = isset($_SESSION["courseList"]) ? $_SESSION["courseList"] : array();
    
    foreach ($courseParamsToRetrieve as $param) {
        if (isset($_REQUEST[$param])){
            $courseParams[$param] = $_REQUEST[$param];
            array_push($courseList, $courseParams[$param]);
            $_SESSION["courseList"] = $courseList;
            $_SESSION["courseParams"] = $courseParams;
        }
        //$courseParams[$param] = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
    }

    //$bookObj = new Book($courseParams[1], $courseParams["book1P"], $courseParams["book1E"], $courseParams["pd1"]);
    //$_SESSION["valuesIwantToSee"] = $courseParams;

    /*
    if (isset($_REQUEST["course"])) {
        
        
        $mydata = $_REQUEST["course"];
        array_push($courseList, $mydata); 
        $_SESSION["courseList"] = $courseList; // Store the updated array in the session
    }
    */

    if (isset($_REQUEST["lastValue"])) {
        //$lastValue = $courseList;
        //echo $lastValue;
        
        //foreach ($courseList as $item) {
        //    echo "<li>$item</li>";
        //}

        echo end($courseParams); //THIS WORKS

        //echo '<pre>' . ($courseParams["pd2"].value()) . '</pre>'; //THIS DOESN'T WORK LOL

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
  
?>