<?php
require_once('book.php');

class AddBook extends Book {

    private $query;
    private $err = [];

    public function __construct($post) {
        if(isset($post['isbn'])) { $this->isbn = filter_var(trim($post['isbn']), FILTER_SANITIZE_STRING); }
        if(isset($post['title'])) { $this->title = filter_var(trim($post['title']), FILTER_SANITIZE_STRING); }
        if(isset($post['nb_pages'])) { $this->nb_pages = filter_var(trim($post['nb_pages']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['publish_date'])) { $this->publish_date = filter_var(trim($post['publish_date']), FILTER_SANITIZE_STRING); }
        if(isset($post['price'])) { $this->price = filter_var(trim($post['price']), FILTER_SANITIZE_STRING); }
        if(isset($post['editor_id'])) { $this->editor_id = filter_var(trim($post['editor_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['author_id'])) { $this->author_id = filter_var(trim($post['author_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($post['theme'])) { $this->theme = filter_var(trim($post['theme']), FILTER_SANITIZE_STRING); }
    }

    public function validData($conn) {
        if(empty($this->isbn)) { array_push($this->err, "The isbn is required"); }
        if ($this->isbn && strlen($this->isbn) != 13) { array_push($this->err, "The ISBN is not valid"); }
        if(empty($this->title)) { array_push($this->err, "The title is required"); }
        if(empty($this->nb_pages)) { array_push($this->err, "The number of pages is required"); }
        if(empty($this->publish_date)) { array_push($this->err, "The publish date is required"); }
        if(empty($this->price)) { array_push($this->err, "The price is required"); }
        if(empty($this->editor_id)) { array_push($this->err, "The editor id is required"); }
        if(empty($this->author_id)) { array_push($this->err, "The author id number is required"); }
        if(empty($this->theme)) { array_push($this->err, "The theme is required"); }

        
        $queryAuthorExist = "SELECT * FROM authors WHERE id='$this->author_id'";
        $queryEditorExist = "SELECT * FROM editors WHERE id='$this->editor_id'";
        $resultAuthor = $this->getData($conn, $queryAuthorExist);
        $resultEditor = $this->getData($conn, $queryEditorExist);
        if(count($resultAuthor) == 0) { array_push($this->err, "The author id not exist"); }
        if(count($resultEditor) == 0) { array_push($this->err, "The editor id not exist"); }
        
        return $this->err;
    }

    public function sendData($conn) {
        $this->query = "INSERT INTO books (isbn, title, nb_pages, publish_date, price, editor_id, author_id, theme) VALUES ('$this->isbn', '$this->title', '$this->nb_pages', '$this->publish_date', '$this->price', '$this->editor_id', '$this->author_id', '$this->theme')";
        $checkExist = "SELECT * FROM books WHERE isbn='$this->isbn' AND title='$this->title' AND nb_pages='$this->nb_pages' AND publish_date='$this->publish_date' AND price='$this->price' AND editor_id='$this->editor_id' AND author_id='$this->author_id' AND theme='$this->theme'";
        $result = $this->sendQueryToDb($conn, $checkExist, $this->query);
        return $result;
    }

}



?>