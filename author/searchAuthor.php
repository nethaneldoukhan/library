<?php
require_once('author.php');

class SearchAuthor extends Author {

    private $query = "SELECT * FROM authors";
    private $queryExist = false;

    public function __construct($get) {
        if(isset($get['id'])) { $this->id = filter_var(trim($get['id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['lastname'])) { $this->lastname = filter_var(trim($get['lastname']), FILTER_SANITIZE_STRING); }
        if(isset($get['firstname'])) { $this->firstname = filter_var(trim($get['firstname']), FILTER_SANITIZE_STRING); }
        if(isset($get['city'])) { $this->city = filter_var(trim($get['city']), FILTER_SANITIZE_STRING); }
        if(isset($get['birth_year'])) { $this->birth_year = filter_var(trim($get['birth_year']), FILTER_SANITIZE_NUMBER_INT); }
        $this->checkData();
    }


    private function checkData() {
        $this->buildQuery('id', $this->id);
        $this->buildQuery('lastname', $this->lastname);
        $this->buildQuery('firstname', $this->firstname);
        $this->buildQuery('city', $this->city);
        $this->buildQuery('birth_year', $this->birth_year);
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
        return ["result" => $result, "query" => ["Id" => $this->id, "Lastname" => $this->lastname, "Firstname" => $this->firstname, "City" => $this->city, "Year of birth" => $this->birth_year]];
    }
}




?>