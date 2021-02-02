<?php
require_once('lend.php');

class AddLend extends Lend {

    private $query;
    private $err = [];

    public function __construct($post) {
        if(isset($post['book_id'])) { $this->book_id = filter_var(trim($post['book_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['lender_id'])) { $this->lender_id = filter_var(trim($post['lender_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['lend_date'])) { $this->lend_date = filter_var(trim($post['lend_date']), FILTER_SANITIZE_STRING); }
        if(isset($post['return_date'])) { $this->return_date = filter_var(trim($post['return_date']), FILTER_SANITIZE_STRING); }
    }

    public function validData($conn) {
        if(empty($this->book_id)) { array_push($this->err, "The book id is required"); }
        if(empty($this->lender_id)) { array_push($this->err, "The lender id is required"); }
        if(empty($this->lend_date)) { array_push($this->err, "The lend date is required"); }
        
        if($this->book_id) {
            $queryBookExist = "SELECT * FROM books WHERE id='$this->book_id'";
            $resultBook = $this->getData($conn, $queryBookExist);
            if(count($resultBook) == 0) { array_push($this->err, "The book id not exist"); }
        }
        if($this->lender_id) {
            $querylenderExist = "SELECT * FROM lenders WHERE id='$this->lender_id'";
            $resultLender = $this->getData($conn, $queryLenderExist);
            if(count($resultLender) == 0) { array_push($this->err, "The lender id not exist"); }
        }
        
        return $this->err;
    }

    public function sendData($conn) {
        $this->query = "INSERT INTO lends (book_id, lender_id, lend_date) VALUES ('$this->book_id', '$this->lender_id', '$this->lend_date')";
        $checkExist = "SELECT * FROM lends WHERE book_id='$this->book_id' AND lender_id='$this->lender_id' AND lend_date='$this->lend_date'";
        $result = $this->sendQueryToDb($conn, $checkExist, $this->query);
        return $result;
    }

}



?>