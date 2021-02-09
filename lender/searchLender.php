<?php
require_once('lender.php');

class SearchLender extends Lender {

    private $query = "SELECT lenders.*";
    private $table = '';
    private $queryExist = false;
    private $tableTitles = ["Id", "Lastname", "Firstname", "Adress", "Zipcode", "City", "Country", "Telephone", "Email", "Create date"];
    private $nb_lends = '';
    private $join = '';
    private $count = '';
    private $having = '';
    private $group = '';
    private $agregArray = ['=', '<', '>'];
    private $agreg = '';

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
        // $get = ['join' => 'lend'];
        if(isset($get['join'])) {
            if($get['join'] === 'count' || $get['join'] === 'countNull') {
                $this->join = ", COUNT(lends.id) AS Total_lends FROM lenders LEFT JOIN lends ON lenders.id = lends.lender_id";
                $this->group = " GROUP BY lenders.id";
                if($get['join'] === 'countNull') { $this->having = " HAVING Total_lends = 0"; }                
                array_push($this->tableTitles, 'Total of lend(s)');
            } elseif($get['join'] === 'lend' || $get['join'] === 'lendReturnNull' || $get['join'] === 'lendReturnNotNull') {
                if($get['join'] === 'lend') {
                    $this->join = ", lends.id AS lend_id, lends.book_id, lends.lend_date, lends.return_date FROM lenders LEFT JOIN lends ON lends.lender_id = lenders.id";
                } else {
                    $this->join = ", lends.id AS lend_id, lends.book_id, lends.lend_date, lends.return_date FROM lenders JOIN lends ON lends.lender_id = lenders.id";
                }
                array_push($this->tableTitles, 'Lend id', 'Book id', 'Lend date', 'Return date');
                if($get['join'] === 'lendReturnNull') {
                    $this->having = " HAVING lends.return_date IS NULL";
                } elseif($get['join'] === 'lendReturnNotNull') {
                    $this->having = " HAVING lends.return_date IS NOT NULL";
                }
            } else { $this->table = " FROM lenders"; }
        } else { $this->table = " FROM lenders"; }

        if(isset($get['agreg']) && in_array($get['agreg'], $this->$agregArray) && $this->nb_lends) {
            $this->agreg = filter_var(trim($get['agreg']), FILTER_SANITIZE_STRING);
        } else {
            $this->nb_lends = '';
        }

        $this->checkData();
    }


    private function checkData() {
        $this->query .= $this->join .= $this->table;
        $this->buildQuery('lenders.id', $this->id);
        $this->buildQuery('lastname', $this->lastname);
        $this->buildQuery('firstname', $this->firstname);
        $this->buildQuery('adress', $this->adress);
        $this->buildQuery('zipcode', $this->zipcode);
        $this->buildQuery('city', $this->city);
        $this->buildQuery('country', $this->country);
        $this->buildQuery('tel', $this->tel);
        $this->buildQuery('email', $this->email);
        $this->query .= $this->group . $this->having . " ORDER BY lastname, firstname";
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
        echo 'REQUEST: ' . $this->query;
        $result = $this->getData($conn, $this->query);
        return ["result" => $result, "tableTitles" => $this->tableTitles, "query" => ["Id" => $this->id, "Lastname" => $this->lastname, "Firstname" => $this->firstname, "Adress" => $this->adress, "Zipcode" => $this->zipcode, "City" => $this->city, "Country" => $this->country, "Telephone" => $this->tel, "Email" => $this->email]];
    }
}




?>