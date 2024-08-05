<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contact@example.com';

// Database connection details
$servername = "localhost";
$username = "root";
$password = "12345678";
$database = "loginsystem";

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

/*include('../assets/vendor/php-email-form/php-email-form.php');

$book_a_table = new PHP_Email_Form;
$book_a_table->ajax = true;

$book_a_table->to = $receiving_email_address;
$book_a_table->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$book_a_table->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$book_a_table->subject = "New table booking request from the website";

// Add database connection code here

if (isset($_POST['name'])) {
    $book_a_table->add_message($_POST['name'], 'Name');
}
if (isset($_POST['email'])) {
    $book_a_table->add_message($_POST['email'], 'Email');
}
if (isset($_POST['phone'])) {
    $book_a_table->add_message($_POST['phone'], 'Phone');
}
if (isset($_POST['r_name'])) {
    $book_a_table->add_message($_POST['r_name'], 'Date');
}
if (isset($_POST['process'])) {
    $book_a_table->add_message($_POST['process'], 'Time');
}*/


// Perform the database insertion
$sql = "INSERT INTO upload (name, email, phone, r_name, process) VALUES (
    '" . $_POST['name'] . "',
    '" . $_POST['email'] . "',
    '" . $_POST['phone'] . "',
    '" . $_POST['r_name'] . "',
    '" . $_POST['process'] . "'
)";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
     header("Location: ../recipe_login/dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}



// Close the database connection
mysqli_close($con);
?>
