<?php 

//session_start(); //for starting or resuming sessions
    
/*
    class Course {
        // Properties
        public $book1;
        public $book2;

        // Methods
        function __construct($book1, $book2) {
            set_book1($book1);
            set_book2($book2);
        }

        function set_book1($book) {
            $this->book1 = $book;
        }

        function set_book2($book) {
            $this->book2 = $book;
        }

        function get_book1() {
            return $this->book1;
        }

        function get_book2() {
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
        function __construct($title, $publisher, $edition, $printDate) {

            set_title($title);
            set_publisher($publisher);
            set_edition($edition);
            set_printDate($printDate);

        }
        

        // Methods (set)
        function set_title($title) {
            $this->title = $title;
        }

        function set_publisher($publisher) {
            $this->publisher = $publisher;
        }

        function set_edition($edition) {
            $this->edition = $edition;
        }

        function set_printDate($printDate) {
            $this->printDate = $printDate;
        }

        //get methods v 

        function get_title($title) {
           return $this->title;
        }

        function get_publisher($publisher) {
            return $this->publisher;
        }

        function get_edition($edition) {
           return $this->edition;
        }

        function get_printDate($printDate) {
           return $this->printDate;
        }

        
    }

    class Student {

        // Properties
        public $name;
        public $course;
        public $book1 = new Book();
        public $book2 = new Book();
        
        // Methods
        __construct($name, $course, $book1, $book2) {
            set_name($name);
            set_course($course);
            set_book1($book1);
            set_book2($book2);
        }

        
        function set_name($name) {
            $this->name = $name;
        }

        function set_course($course) {
            $this->course = $course;
        }

        function set_book1($book) {
            $this->book1 = ($book);
        }

        function set_book2($book) {
            $this->book2 = $book;
        }

        function get_name() {
            return $this->name;
        }

        function get_course() {
            return $this->course;
        }

        function get_book1() {
            return $this->book1;
        }

        function get_book2() {
            return $this->book2;
        }
    }
*/
    session_start(); // Start or resume the session

    $courseList = array();
    $studentList = array();

    $courseParamsToRetrieve = ["course", "book1N", "book1P", "book1E", "pd1", "book2N", "book2P", "book2E", "pd2"];
    $courseParams = [];
    
    $courseList = isset($_SESSION["courseList"]) ? $_SESSION["courseList"] : array();
    
    foreach ($courseParamsToRetrieve as $param) {
        $courseParams[$param] = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
        array_push($courseList, $courseParams[$param]);
        $_SESSION["courseList"] = $courseList;
    }

    /*
    if (isset($_REQUEST["course"])) {
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
  
?>