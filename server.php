<?php
session_start();


$searchResult = [];
$errorsAdd = [];
$errorsDelete = [];
$messageAdd = [];
$messageDelete = [];


// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $db = 'nati006_library';

$servername = 'mysql-nati006.alwaysdata.net';
$username = 'nati006';
$password = 'Nati1980.';
$db = 'nati006_library';

$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error) {
    die('Connect failed: ' . $conn->connect_error);
}

// BOOK
// search book
if(isset($_GET["searchBook"])) {
    require_once('book/searchBook.php');
    $book = new SearchBook($_GET);
    $searchResult = $book->sendData($conn);
}

// add book
if(isset($_POST['addBook'])) {
    require_once('book/addBook.php');
    $book = new AddBook($_POST);
    $errorsAdd = $book->validData($conn);
    if(empty($errorsAdd)) { 
        $messageAdd = $book->sendData($conn);
    }
}

// delete book
if(isset($_POST['deleteBook'])) {
    require_once('book/deleteBook.php');
    $book = new DeleteBook($_POST);
    $errorsDelete = $book->validData();
    if(empty($errorsDelete)) { 
        $messageDelete = $book->sendData($conn);
    }
}

// Lender
// search lender
if(isset($_GET["searchLender"])) {
    require_once('lender/searchLender.php');
    $lender = new SearchLender($_GET);
    $searchResult = $lender->sendData($conn);
}

// add lender
if(isset($_POST['addLender'])) {
    require_once('lender/addLender.php');
    $lender = new AddLender($_POST);
    $errorsAdd = $lender->validData();
    if(empty($errorsAdd)) { 
        $messageAdd = $lender->sendData($conn);
    }
}

// delete lender
if(isset($_POST['deleteLender'])) {
    require_once('lender/deleteLender.php');
    $lender = new DeleteLender($_POST);
    $errorsDelete = $lender->validData();
    if(empty($errorsDelete)) { 
        $messageDelete = $lender->sendData($conn);
    }
}

// LEND
// search lend
if(isset($_GET["searchLend"])) {
    require_once('lend/searchLend.php');
    $lend = new SearchLend($_GET);
    $searchResult = $lend->sendData($conn);
}

// add lend
if(isset($_POST['addLend'])) {
    require_once('lend/addLend.php');
    $lend = new AddLend($_POST);
    $errorsAdd = $lend->validData($conn);
    if(empty($errorsAdd)) { 
        $messageAdd = $lend->sendData($conn);
    }
}

// delete lend
if(isset($_POST['deleteLend'])) {
    require_once('lend/deleteLend.php');
    $lend = new DeleteLend($_POST);
    $errorsDelete = $lend->validData();
    if(empty($errorsDelete)) { 
        $messageDelete = $lend->sendData($conn);
    }
}


// AUTHOR
// search author
if(isset($_GET["searchAuthor"])) {
    require_once('author/searchAuthor.php');
    $author = new SearchAuthor($_GET);
    $searchResult = $author->sendData($conn);
}

// add author
if(isset($_POST['addAuthor'])) {
    require_once('author/addAuthor.php');
    $author = new AddAuthor($_POST);
    $errorsAdd = $author->validData();
    if(empty($errorsAdd)) { 
        $messageAdd = $author->sendData($conn);
    }
}

// delete author
if(isset($_POST['deleteAuthor'])) {
    require_once('author/deleteAuthor.php');
    $author = new DeleteAuthor($_POST);
    $errorsDelete = $author->validData();
    if(empty($errorsDelete)) { 
        $messageDelete = $author->sendData($conn);
    }
}


// EDITOR
// search editor
if(isset($_GET["searchEditor"])) {
    require_once('editor/searchEditor.php');
    $editor = new SearchEditor($_GET);
    $searchResult = $editor->sendData($conn);
}

// add editor
if(isset($_POST['addEditor'])) {
    require_once('editor/addEditor.php');
    $editor = new AddEditor($_POST);
    $errorsAdd = $editor->validData();
    if(empty($errorsAdd)) { 
        $messageAdd = $editor->sendData($conn);
    }
}

// delete editor
if(isset($_POST['deleteEditor'])) {
    require_once('editor/deleteEditor.php');
    $editor = new DeleteEditor($_POST);
    $errorsDelete = $editor->validData();
    if(empty($errorsDelete)) { 
        $messageDelete = $editor->sendData($conn);
    }
}
    
    // $author->sendQuery();
    // $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    // $firsname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    // $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    // $year = filter_var($_POST['year_death'], FILTER_SANITIZE_NUMBER_INT);
    // var_dump($year);
    // if (empty($lastname)) { array_push($errors, "The last name is required"); }
    // if (empty($firsname)) { array_push($errors, "The first name is required"); }
    // if (empty($city)) { array_push($errors, "The city is required"); }
    // if (empty($year)) { array_push($errors, "The year of death is required"); }
    // if ($year && strlen($year) != 4) { array_push($errors, "The year of death is not valid"); }
    // var_dump($errors);


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
  
    if (empty($username)) {
        array_push($errorsAdd, "Username is required");
    }
    if (empty($password)) {
        array_push($errorsAdd, "Password is required");
    }
  
    if (count($errorsAdd) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = $conn->query($query);
        if ($results->num_rows > 0) {
            $row = $results->fetch_assoc();
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errorsAdd, "Wrong username/password combination");
        }
    }
}


$conn->close();


?>