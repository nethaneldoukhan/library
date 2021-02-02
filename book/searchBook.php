<?php
require_once('book.php');

class SearchBook extends Book {

    private $query = "SELECT * FROM books";
    private $queryExist = false;

    public function __construct($get) {
        if(isset($get['id'])) { $this->id = filter_var(trim($get['id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['isbn'])) { $this->isbn = filter_var(trim($get['isbn']), FILTER_SANITIZE_STRING); }
        if(isset($get['title'])) { $this->title = filter_var(trim($get['title']), FILTER_SANITIZE_STRING); }
        if(isset($get['nb_pages'])) { $this->nb_pages = filter_var(trim($get['nb_pages']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['publish_date'])) { $this->publish_date = filter_var(trim($get['publish_date']), FILTER_SANITIZE_STRING); }
        if(isset($get['price'])) { $this->price = filter_var(trim($get['price']), FILTER_SANITIZE_STRING); }
        if(isset($get['editor_id'])) { $this->editor_id = filter_var(trim($get['editor_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['author_id'])) { $this->author_id = filter_var(trim($get['author_id']), FILTER_SANITIZE_NUMBER_INT); }
        if(isset($get['theme'])) { $this->theme = filter_var(trim($get['theme']), FILTER_SANITIZE_STRING); }
    }


    private function checkData() {
        $this->buildQuery('id', $this->id);
        $this->buildQuery('isbn', $this->isbn);
        $this->buildQuery('title', $this->title);
        $this->buildQuery('nb_pages', $this->nb_pages);
        $this->buildQuery('publish_date', $this->publish_date);
        $this->buildQuery('price', $this->price);
        $this->buildQuery('editor_id', $this->editor_id);
        $this->buildQuery('author_id', $this->author_id);
        $this->buildQuery('theme', $this->theme);
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
        return ["result" => $result, "query" => ["Id" => $this->id, "ISBN" => $this->isbn, "Title" => $this->title, "Number of pages" => $this->nb_pages, "Publish date" => $this->publish_date, "Price" => $this->price, "Editor id" => $this->editor_id, "Author id" => $this->author_id, "Theme" => $this->theme]];
    }
}

?>