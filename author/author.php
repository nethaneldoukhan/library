<?php
abstract class Author {

    protected $id = '';
    protected $lastname = '';
    protected $firstname = '';
    protected $city = '';
    protected $birth_year = '';

    abstract protected function sendData($conn);

    protected function getData($conn, $query) {
        $result = $conn->query($query);
        $resultArray = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($resultArray, $row);
            }
        }
        return $resultArray;
    }

    protected function sendQueryToDb($conn, $checkEist, $query) {
            $result = $this->getData($conn, $checkEist);
            if (count($result) > 0) {
                return ["class" => "error", "text" => "The author already exist"];
            } else {
                if ($conn->query($query) === TRUE) {
                    $last_id = $conn->insert_id;
                    return ["class" => "success", "text" => "New record created successfully. Last inserted ID is: " . $last_id];
                } else {
                    return ["class" => "error", "text" => "An error has occurred. Please try again"];
                }
            }
    }

    protected function deleteData($conn, $checkEist, $query) {
        $result = $this->getData($conn, $checkEist);
        if (count($result) == 0) {
            return ["class" => "error", "text" => "The id not found"];
        } else {
            if ($conn->query($query) === TRUE) {
                return ["class" => "success", "text" => "The author deleted successfully."];
            } else {
                return ["class" => "error", "text" => "An error has occurred. Please try again"];
            }
        }
    }
    
}

?>