<?php require_once('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Library</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./css/style.css'>
</head>
<body>
    <div class="container">
        <h1 class="ta-c">MANAGEMENT</h1>
        <div id="container_search" class="ta-c">
            <h2>Search</h2>
            <div><?php require_once('./message/searchResult.php'); ?></div>
            <select name="search_select" id="search_select">
                <option value="0">Select search</option>
                <option value="1">Books</option>
                <option value="2">Authors</option>
                <option value="3">Editors</option>
                <option value="4">Lenders</option>
                <option value="5">Lends</option>
            </select>
            <div id="mainFormSearch"></div>
        </div>
    
        <div id="container_add" class="ta-c">
            <h2>Add</h2>
            <div><?php require_once('./message/messageAdd.php'); ?></div>
                <select name="add_select" id="add_select">
                    <option value="0">Select a table to add</option>
                    <option value="1">Books</option>
                    <option value="2">Authors</option>
                    <option value="3">Editors</option>
                    <option value="4">Lenders</option>
                    <option value="5">Lends</option>
                </select>
            <div id="mainFormAdd"></div>
        </div>

        <div id="container_delete" class="ta-c">
            <h2>Delete</h2>
            <div><?php require_once('./message/messageDelete.php'); ?></div>
                <select name="delete_select" id="delete_select">
                    <option value="0">Select a table to delete</option>
                    <option value="1">Books</option>
                    <option value="2">Authors</option>
                    <option value="3">Editors</option>
                    <option value="4">Lenders</option>
                    <option value="5">Lends</option>
                </select>
            <div id="mainFormDelete"></div>
        </div>
    </div>
    
    <script type="module" src='./js/app.js'></script>
    <script src="./js/modules/jquery.js"></script>
</body>
</html>
