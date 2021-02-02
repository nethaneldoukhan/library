<?php
require_once('author.php');

class AddAuthor extends Author {

    private $query;
    private $err = [];

    public function __construct($post) {
        if(isset($post['lastname'])) { $this->lastname = filter_var(trim($post['lastname']), FILTER_SANITIZE_STRING); }
        if(isset($post['firstname'])) { $this->firstname = filter_var(trim($post['firstname']), FILTER_SANITIZE_STRING); }
        if(isset($post['city'])) { $this->city = filter_var(trim($post['city']), FILTER_SANITIZE_STRING); }
        if(isset($post['birth_year'])) { $this->birth_year = filter_var(trim($post['birth_year']), FILTER_SANITIZE_NUMBER_INT); }
    }

    public function validData() {
        if(empty($this->lastname)) { array_push($this->err, "The lastname is required"); }
        if(empty($this->firstname)) { array_push($this->err, "The firstname is required"); }
        if(empty($this->city)) { array_push($this->err, "The city is required"); }
        if(empty($this->birth_year)) { array_push($this->err, "The year of birth is required"); }
        if ($this->birth_year && strlen($this->birth_year) != 4) { array_push($this->err, "The year of death is not valid"); }
        
        return $this->err;
    }

    public function sendData($conn) {
        $this->query = "INSERT INTO authors (lastname, firstname, city, birth_year) VALUES ('$this->lastname', '$this->firstname', '$this->city', '$this->birth_year')";
        $checkExist = "SELECT * FROM authors WHERE lastname='$this->lastname' AND firstname='$this->firstname' AND city='$this->city' AND birth_year='$this->birth_year'";
        $result = $this->sendQueryToDb($conn, $checkExist, $this->query);
        return $result;
    }

}



?>