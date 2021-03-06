<?php
require_once('editor.php');

class SearchEditor extends Editor {

    private $query = "SELECT * FROM editors";
    private $queryExist = false;
    private $tableTitles = ["Id", "Lastname", "Firstname", "Adress", "Zipcode", "City", "Country", "Telephone", "Email"];

    public function __construct($get) {
        if(isset($get['id'])) { $this->id = filter_var(trim($get['id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['lastname'])) { $this->lastname = filter_var(trim($get['lastname']), FILTER_SANITIZE_STRING); }
        if(isset($get['firstname'])) { $this->firstname = filter_var(trim($get['firstname']), FILTER_SANITIZE_STRING); }
        if(isset($get['adress'])) { $this->adress = filter_var(trim($get['adress']), FILTER_SANITIZE_STRING); }
        if(isset($get['zipcode'])) { $this->zipcode = filter_var(trim($get['zipcode']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['city'])) { $this->city = filter_var(trim($get['city']), FILTER_SANITIZE_STRING); }
        if(isset($get['country'])) { $this->country = filter_var(trim($get['country']), FILTER_SANITIZE_STRING); }
        if(isset($get['tel'])) { $this->tel = filter_var(trim($get['tel']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['email'])) { $this->email = filter_var(trim($get['email']), FILTER_SANITIZE_STRING); }
        $this->checkData();
    }


    private function checkData() {
        $this->buildQuery('id', $this->id);
        $this->buildQuery('lastname', $this->lastname);
        $this->buildQuery('firstname', $this->firstname);
        $this->buildQuery('adress', $this->adress);
        $this->buildQuery('zipcode', $this->zipcode);
        $this->buildQuery('city', $this->city);
        $this->buildQuery('country', $this->country);
        $this->buildQuery('tel', $this->tel);
        $this->buildQuery('email', $this->email);
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
        return ["result" => $result, "tableTitles" => $this->tableTitles, "query" => ["Id" => $this->id, "Lastname" => $this->lastname, "Firstname" => $this->firstname, "Adress" => $this->adress, "Zipcode" => $this->zipcode, "City" => $this->city, "Country" => $this->country, "Telephone" => $this->tel, "Email" => $this->email]];
    }
}




?>