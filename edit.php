<?php
session_start();
include('db.php');

$name = "";
$email = "";
$rollno = "";
$city = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        header("Location: /crud/index.php");
        exit;
    }

    $id = $_GET['id'];

    // read the record of selected student
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("Location: /crud/index.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $rollno = $row["rollno"];
    $city = $row["city"];
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // update student
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rollno = $_POST["rollno"];
    $city = $_POST["city"];

    if (empty($name) || empty($email) || empty($rollno) || empty($city)) {
        $_SESSION['status'] = "Please fill all the fields";
    } else {
        $sql = "UPDATE students 
                SET name='$name', email='$email', rollno='$rollno', city='$city'
                WHERE id=$id";

        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['status'] = "Student has updated successfully";
            header("Location: /crud/index.php"); // redirect after update
            exit;
        } else {
            $_SESSION['status'] = "Invalid query";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="flex items-center justify-center h-screen">
    <form action="" method="POST" class="border border-gray-300 rounded-lg shadow-md p-4 w-[350px]">
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <h1 class="text-center text-2xl font-semibold mb-3">Edit Student</h1>
      <h2>Name</h2>
      <input
        type="text"
        placeholder="Name"
        name="name"
        value="<?php echo $name ?>"
        class="mt-1 mb-3 w-full px-3 py-1 text-[16px] border border-gray-300">
      <h2>Email </h2>
      <input
        type="email"
        placeholder="Email"
        name="email"
        value="<?php echo $email ?>"
        class="mt-1 mb-3 w-full px-3 py-1 text-[16px] border border-gray-300">
      <h2>Roll No</h2>
      <input
        type="Roll No"
        placeholder="Name"
        name="rollno"
        value="<?php echo $rollno ?>"
        class="mt-1 mb-3 w-full px-3 py-1 text-[16px] border border-gray-300">
      <h2>City</h2>
      <input
        type="text"
        placeholder="City"
        name="city"
        value="<?php echo $city ?>"
        class="mt-1 mb-3 w-full px-3 py-1 text-[16px] border border-gray-300">
        <!-- Edit page message  -->
      <?php
      if (isset($_SESSION['status'])) {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
      }
      ?>
      <input type="submit" name="add" value="Edit Student" class="text-white bg-blue-500 hover:bg-blue-700 px-3 py-1 cursor-pointer mt-2 w-full">
    </form>
  </div>
</body>

</html>