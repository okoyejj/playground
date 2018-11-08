<?php
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/php-template/about.php":
        $CURRENT_PAGE = "About";
        $PAGE_TITLE = "About Us";
        break;
    case "/php-template/contact.php":
        $CURRENT_PAGE = "Contact";
        $PAGE_TITLE = "Contact Us";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Welcome to my homepage!";
}

if(isset($_SESSION['user']) === isset($_COOKIE['user']) || true){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mysql";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}

interface UserDao
{
    /**
     * Store the new user and assign a unique auto-generated ID.
     */
    function create($user);

    /**
     * Return the user with the given auto-generated ID.
     */
    function findById($id);

    /**
     * Return the user with the given login ID.
     */
    function findByLogin($login);

    /**
     * Update the user's fields.
     */
    function update($user);

    /**
     * Delete the user from the database.
     */
    function delete($user);
}

if(isset($conn)){
    $conn = null;
}
?>