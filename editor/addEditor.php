<?php
require_once('editor.php');

class AddEditor extends Editor {

    private $query;
    private $err = [];

    public function __construct($post) {
        if(isset($post['lastname'])) { $this->lastname = filter_var(trim($post['lastname']), FILTER_SANITIZE_STRING); }
        if(isset($post['firstname'])) { $this->firstname = filter_var(trim($post['firstname']), FILTER_SANITIZE_STRING); }
        if(isset($post['adress'])) { $this->adress = filter_var(trim($post['adress']), FILTER_SANITIZE_STRING); }
        if(isset($post['zipcode'])) { $this->zipcode = filter_var(trim($post['zipcode']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['city'])) { $this->city = filter_var(trim($post['city']), FILTER_SANITIZE_STRING); }
        if(isset($post['country'])) { $this->country = filter_var(trim($post['country']), FILTER_SANITIZE_STRING); }
        if(isset($post['tel'])) { $this->tel = filter_var(trim($post['tel']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['email'])) { $this->email = filter_var(trim($post['email']), FILTER_SANITIZE_STRING); }
    }

    public function validData() {
        if(empty($this->lastname)) { array_push($this->err, "The lastname is required"); }
        if(empty($this->firstname)) { array_push($this->err, "The firstname is required"); }
        if(empty($this->adress)) { array_push($this->err, "The adress is required"); }
        if(empty($this->zipcode)) { array_push($this->err, "The zipcode is required"); }
        if(empty($this->city)) { array_push($this->err, "The city is required"); }
        if(empty($this->country)) { array_push($this->err, "The country is required"); }
        if(empty($this->tel)) { array_push($this->err, "The telephone number is required"); }
        if(empty($this->email)) { array_push($this->err, "The email is required"); }
        if(($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) { array_push($this->err, 'The email is not valid'); }

        
        return $this->err;
    }

    public function sendData($conn) {
        $this->query = "INSERT INTO editors (lastname, firstname, adress, zipcode, city, country, tel, email) VALUES ('$this->lastname', '$this->firstname', '$this->adress', '$this->zipcode', '$this->city', '$this->country', '$this->tel', '$this->email')";
        $checkExist = "SELECT * FROM editors WHERE lastname='$this->lastname' AND firstname='$this->firstname' AND adress='$this->adress' AND zipcode='$this->zipcode' AND city='$this->city' AND country='$this->country' AND tel='$this->tel' AND email='$this->email'";
        $result = $this->sendQueryToDb($conn, $checkExist, $this->query);
        return $result;
    }

}



?>