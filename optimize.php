// define database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "lapo";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind statement with parameters
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

// set parameters and execute statement
$email = "user@example.com";
$stmt->execute();

// get result set
$result = $stmt->get_result();

// fetch result row as associative array
$row = $result->fetch_assoc();

// output user's name
echo "Hello, " . $row["fullname"] . "!";

// close statement and connection
$stmt->close();
$conn->close();
