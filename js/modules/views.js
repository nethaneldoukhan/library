const formSearchBooks = `
    <form id="formSearchBooks" method="GET" action="index.php">
        <input type="number" name="id" placeholder="id">
        <input type="text " name="title" placeholder="title">
        <input type="text" name="price" placeholder="price">
        <input type="number" name="editor_id" placeholder="editor id">
        <input type="number" name="author_id" placeholder="author id">
        <input type="text" name="theme" placeholder="theme">
        <button type="submit" name="searchBook">Search book</button>
    </form>
`;

const formSearchLenders = `
    <form id="formSearchLenders" method="GET" action="index.php">
        <input type="number" name="id" placeholder="id">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="adress" placeholder="adress">
        <input type="number" name="zipcode" placeholder="zipcode">
        <input type="text" name="city" placeholder="city">
        <input type="text" name="country" placeholder="country">
        <input type="tel" name="tel" placeholder="tel">
        <input type="email" name="email" placeholder="email">
        <input type="number" name="nb_lends" placeholder="number lends">
        <button type="submit" name="searchLender">Search lender</button>
    </form>
`;

const formSearchLends = `
    <form id="formSearchLends" method="GET" action="index.php">
        <input type="number" name="id" placeholder="id">
        <input type="number " name="book_id" placeholder="book id">
        <input type="number" name="lender_id" placeholder="lender id">
        <input type="date" name="lend_date" placeholder="lend date">
        <input type="date" name="return_date" placeholder="return date">
        <button type="submit" name="searchLend">Search lend</button>
    </form>
`;

const formSearchAuthors = `
    <form id="formSearchAuthors" method="GET" action="index.php">
        <input type="number" name="id" placeholder="id">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="city" placeholder="city">
        <input type="number" name="birth_year" placeholder="year of birth (AAAA)">
        <button type="submit" name="searchAuthor">Search author</button>
    </form>
`;

const formSearchEditors = `
    <form id="formSearchEditors" method="GET" action="index.php">
        <input type="number" name="id" placeholder="id">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="adress" placeholder="adress">
        <input type="number" name="zipcode" placeholder="zip code">
        <input type="text" name="city" placeholder="city">
        <input type="text" name="country" placeholder="country">
        <input type="tel" name="tel" placeholder="tel">
        <input type="email" name="email" placeholder="email">
        <button type="submit" name="searchEditor">Search editor</button>
    </form>
`;

const formAddBooks = `
    <form id="formAddBooks" method="POST" action="index.php">
        <input type="number" name="isbn" placeholder="isbn">
        <input type="text " name="title" placeholder="title">
        <input type="number" name="nb_pages" placeholder="number of pages">
        <input type="date" name="publish_date" placeholder="publish date">
        <input type="text" name="price" placeholder="price">
        <input type="number" name="editor_id" placeholder="editor id">
        <input type="number" name="author_id" placeholder="author id">
        <input type="text" name="theme" placeholder="theme">
        <button type="submit" name="addBook">Add book</button>
    </form>
`;

const formAddLenders = `
    <form id="formAddLenders" method="POST" action="index.php">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="adress" placeholder="adress">
        <input type="number" name="zipcode" placeholder="zipcode">
        <input type="text" name="city" placeholder="city">
        <input type="text" name="country" placeholder="country">
        <input type="tel" name="tel" placeholder="tel">
        <input type="email" name="email" placeholder="email">
        <button type="submit" name="addLender">Add lender</button>
    </form>
`;

const formAddLends = `
    <form id="formAddLends" method="POST" action="index.php">
        <input type="number " name="book_id" placeholder="book id">
        <input type="number" name="lender_id" placeholder="lender id">
        <input type="date" name="lend_date" placeholder="lend date">
        <input type="date" name="return_date" placeholder="return date">
        <button type="submit" name="addLend">Add lend</button>
    </form>
`;

const formAddAuthors = `
    <form id="formSearchAuthors" method="POST" action="index.php">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="city" placeholder="city">
        <input type="number" name="birth_year" placeholder="year of birth">
        <button type="submit" name="addAuthor">Add author</button>
    </form>
`;

const formAddEditors = `
    <form id="formAddEditors" method="POST" action="index.php">
        <input type="text " name="lastname" placeholder="lastname">
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="adress" placeholder="adress">
        <input type="number" name="zipcode" placeholder="zip code">
        <input type="text" name="city" placeholder="city">
        <input type="text" name="country" placeholder="country">
        <input type="tel" name="tel" placeholder="tel">
        <input type="email" name="email" placeholder="email">
        <button type="submit" name="addEditor">Add editor</button>
    </form>
`;

const formDeleteBooks = `
    <form id="formdeleteBooks" method="POST" action="index.php">
        <input type="number" name="id" placeholder="id">
        <button type="submit" name="deleteBook">Delete book</button>
    </form>
`;

const formDeleteLenders = `
    <form id="formdeleteEditors" method="POST" action="index.php">
        <input type="number" name="id" placeholder="id">
        <button type="submit" name="deleteLender">Delete lender</button>
    </form>
`;

const formDeleteLends = `
    <form id="formdeleteEditors" method="POST" action="index.php">
        <input type="number" name="id" placeholder="id">
        <button type="submit" name="deleteLend">Delete lend</button>
    </form>
`;

const formDeleteAuthors = `
    <form id="formdeleteEditors" method="POST" action="index.php">
        <input type="number" name="id" placeholder="id">
        <button type="submit" name="deleteAuthor">Delete author</button>
    </form>
`;

const formDeleteEditors = `
    <form id="formdeleteEditors" method="POST" action="index.php">
        <input type="number" name="id" placeholder="id">
        <button type="submit" name="deleteEditor">Delete editor</button>
    </form>
`;


function getFormSearch(val) {
    if (val === '1') {
        return formSearchBooks;
    } else if (val === '2') {
        return formSearchAuthors;
    } else if (val === '3') {
        return formSearchEditors;
    } else if (val === '4') {
        return formSearchLenders;
    } else if (val === '5') {
        return formSearchLends;
    }
}

function getFormAdd(val) {
    if (val === '1') {
        return formAddBooks;
    } else if (val === '2') {
        return formAddAuthors;
    } else if (val === '3') {
        return formAddEditors;
    } else if (val === '4') {
        return formAddLenders;
    } else if (val === '5') {
        return formAddLends;
    }
}

function getFormDelete(val) {
    if (val === '1') {
        return formDeleteBooks;
    } else if (val === '2') {
        return formDeleteAuthors;
    } else if (val === '3') {
        return formDeleteEditors;
    } else if (val === '4') {
        return formDeleteLenders;
    } else if (val === '5') {
        return formDeleteLends;
    }
}

export {
    getFormSearch,
    getFormAdd,
    getFormDelete
}