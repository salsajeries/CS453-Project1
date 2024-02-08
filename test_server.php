<?php

session_start(); // Start or resume the session

// Class definitions
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
  public $compliant = false;
  
  // Methods
  public function __construct($name, $course, $book1, $book2, $compliant = false) {
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

  public function set_compliant($compliant) {
    $this->compliant = $compliant;
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

  public function get_compliant() {
    return $this->compliant;
}
}

// Global array to store course objects
$courseArray = isset($_SESSION["courseArray"]) ? $_SESSION["courseArray"] : array();
// Global array to store student objects
$studentArray = isset($_SESSION["studentArray"]) ? $_SESSION["studentArray"] : array();

// Function to process course request
function processCourseRequest($courseName, $book1Data, $book2Data) {
    // Put book1 data in a Book object
    $book1 = new Book($book1Data['title'], $book1Data['publisher'], $book1Data['edition'], $book1Data['printDate']);

    // Put book2 data in a Book object
    $book2 = new Book($book2Data['title'], $book2Data['publisher'], $book2Data['edition'], $book2Data['printDate']);

    // Put these two books and the course name into a Course object
    $course = new Course($courseName, $book1, $book2);

    // Add the course object to the global array
    global $courseArray;
    array_push($courseArray, $course);
    $_SESSION["courseArray"] = $courseArray;

    // Convert the course object to JSON
    $courseJson = json_encode($course);

    // Return the course object to the HTML page
    echo $courseJson;
}

function processStudentRequest($studentName, $courseName, $book1Data, $book2Data){
    // Put book1 data in a Book object
    $book1 = new Book($book1Data['title'], $book1Data['publisher'], $book1Data['edition'], $book1Data['printDate']);

    // Put book2 data in a Book object
    $book2 = new Book($book2Data['title'], $book2Data['publisher'], $book2Data['edition'], $book2Data['printDate']);

    $student = new Student($studentName, $courseName, $book1, $book2);

    // Add the student object to the global array
    global $studentArray;
    array_push($studentArray, $student);
    $_SESSION["studentArray"] = $studentArray;

    // Convert the student object to JSON
    $studentJson = json_encode($student);
    
    echo $studentJson;
}

// Function to get all course objects
function getAllCourses() {
    global $courseArray;
    $_SESSION["courseArray"] = $courseArray;
    return json_encode($courseArray);
}

function getAllStudents() {
    global $studentArray;
    $_SESSION["studentArray"] = $studentArray;
    return json_encode($studentArray);
}

function validateTextbooks() {
  // Student loop
  global $studentArray;
  global $courseArray;

  foreach ($studentArray as $student) {
    
    $student->compliant = false;    // Default to false
    
    foreach ($courseArray as $course) {
      // Compare student course with current course
      if ($student->get_course == $course->get_name) {
        $validateBook1 = false;
        $validateBook2 = false;

        // if course.book1 is not NULL
        if ($course->book1->get_title() != "") {
          // if (student.book1.getTitle == course.book1.getTitle)
          if ($student->book1->get_title() == $course->book1->get_title()) {
            echo "can you see me";
            if ($student->book1 == $course->book1)
              $validateBook1 = true;
          }
          // else if (student.book2.getTitle == course.book1.getTitle)
          else if ($student->book2->get_title() == $course->book1->get_title()) {
            if ($student->book2 == $course->book1)
              $validateBook1 = true;
          }
        }
        else {
          $validateBook1 = true;
        }
        
        // if course.book2 is not NULL
        if ($course->book2->get_title() != "") {

          // if (student.book1.getTitle == course.book1.getTitle)
          if ($student->book1->get_title() == $course->book2->get_title()) {
            if ($student->book1 == $course->book2)
              $validateBook2 = true;
          }
          // else if (student.book2.getTitle == course.book1.getTitle)
          else if ($student->book2->get_title() == $course->book2->get_title()) {
            if ($student->book2 == $course->book2)
              $validateBook2 = true;
          }
        }
        else {
          $validateBook2 = true;
        }
          
        if ($validateBook1 && $validateBook2) {
          $student->set_compliant(true);
          $_SESSION["studentArray"] = $studentArray;
        }
      }
    }
  }
}

// Determine the type of request
$requestType = isset($_GET['requestType']) ? $_GET['requestType'] : '';

// Handle different types of requests
switch ($requestType) {
    case 'addCourse':
        // Read the request for course
        $courseName = isset($_GET['course']) ? $_GET['course'] : '';
        $book1Data = array(
            'title' => $_GET['book1N'],
            'publisher' => $_GET['book1P'],
            'edition' => $_GET['book1E'],
            'printDate' => $_GET['pd1']
        );

        $book2Data = array(
            'title' => $_GET['book2N'],
            'publisher' => $_GET['book2P'],
            'edition' => $_GET['book2E'],
            'printDate' => $_GET['pd2']
        );

        // Call the function for processing the course request
        processCourseRequest($courseName, $book1Data, $book2Data);
        break;

    case 'addStudent':
        // Read the request for student
        $studentName = isset($_GET['name']) ? $_GET['name'] : '';
        $courseName = isset($_GET['course']) ? $_GET['course'] : '';
        $book1Data = array(
            'title' => $_GET['book1N'],
            'publisher' => $_GET['book1P'],
            'edition' => $_GET['book1E'],
            'printDate' => $_GET['pd1']
        );

        $book2Data = array(
            'title' => $_GET['book2N'],
            'publisher' => $_GET['book2P'],
            'edition' => $_GET['book2E'],
            'printDate' => $_GET['pd2']
        );

        // Call the function for processing student request
        processStudentRequest($studentName, $courseName, $book1Data, $book2Data);
        break;

    case 'getAllCourses':
        // Call the function to get all course objects
        echo getAllCourses();
        break;

    case 'getAllStudents':
        // Call the function to get all student objects
        echo getAllStudents();
        break;

    case 'clearCourses':
        // Clear session
        unset($_SESSION["courseArray"]);
        break;

    case 'clearStudents':
        // Clear session
        unset($_SESSION["studentArray"]);
        break;

    case 'validate':
        // Validate student textbooks 
        validateTextbooks();
        break;

    default:
        // Handle default case or show an error for an unsupported request
        echo "Unsupported request type";
        break;
}

?>
