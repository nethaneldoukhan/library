<?php
require_once('lend.php');

class SearchLend extends Lend {

    private $query = "SELECT * FROM lends";
    private $queryExist = false;
    private $tableTitles = ["Id", "Book id", "Lender id", "Lend date", "Return date"];

    public function __construct($get) {
        if(isset($get['id'])) { $this->id = filter_var(trim($get['id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['book_id'])) { $this->book_id = filter_var(trim($get['book_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['lender_id'])) { $this->lender_id = filter_var(trim($get['lender_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['lend_date'])) { $this->lend_date = filter_var(trim($get['lend_date']), FILTER_SANITIZE_STRING); }
        if(isset($get['return_date'])) { $this->return_date = filter_var(trim($get['return_date']), FILTER_SANITIZE_STRING); }
    
        $this->checkData();
    }


    private function checkData() {
        $this->buildQuery('id', $this->id);
        $this->buildQuery('book_id', $this->book_id);
        $this->buildQuery('lender_id', $this->lender_id);
        $this->buildQuery('lend_date', $this->lend_date);
        $this->buildQuery('return_date', $this->return_date);
    }

    private function buildQuery($column, $val) {
        if($val) {
            if($this->queryExist) {
                $this->query .= " AND ";
            } else {
                $this->query .= " WHERE ";
                $this->queryExist = true;
            }
            $this->query .= $column . " = '" . $val . "'";
        }
    }


    public function sendData($conn) {
        $result = $this->getData($conn, $this->query);
        return ["result" => $result, "tableTitles" => $this->tableTitles, "query" => ["Id" => $this->id, "Book id" => $this->book_id, "Lender id" => $this->lender_id, "Lend date" => $this->lend_date, "Return date" => $this->return_date]];
    }
}




?>