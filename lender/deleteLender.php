<?php
require_once('lender.php');

class DeleteLender extends Lender {

    private $err = [];

    public function __construct($post) {
        if(isset($post['id'])) { $this->id = (int)$post['id']; }
    }

    public function validData() {
        if(empty($this->id)) { array_push($this->err, "The id is required"); }
        return $this->err;
    }

    public function sendData($conn) {
        $this->query = "DELETE FROM lenders WHERE id = $this->id";
        $checkExist = "SELECT * FROM lenders WHERE id = $this->id";
        $result = $this->deleteData($conn, $checkExist, $this->query);
        return $result;
    }
    
}

?>