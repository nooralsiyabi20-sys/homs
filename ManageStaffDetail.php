<?php
include('header.php');
include("dbconnect.php");

$errors = [];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = trim($_POST['id']);

    if (empty($staff_id)) {
        $errors[] = "Please write the Id";
    }

    if (count($errors) == 0) {
        echo "<h1 style='text-align:center;margin:2px auto;'>The Staff Details - <a href='ManageStaffDetail.php'>Change the staff Id</a></h1><br>";

        // Fetch staff details using prepared statement
        $stmt = $conn->prepare("SELECT * FROM Staff WHERE StaffID = ?");
        $stmt->bind_param("s", $staff_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table border='1' style='margin:auto; background-color:#FFFAF0;'>";
            echo "<tr><th>StaffID</th><th>Name</th><th>Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['StaffID']}</td><td>{$row['Name']}</td><td>{$row['Email']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No staff found with ID: $staff_id</p>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            text-align: center;
            background-color: #DCDCDC;
        }
    </style>
</head>
<body>

<!-- Staff ID Form -->
<form action="" method="post" style="width:40%;background-color:#FFFAF0; margin:auto; padding:20px;">
    <h2 style="text-align:center;margin:2px auto;">Login</h2>
    *Staff ID: <input type="text" name="id" style="width:190px;"><hr>
    <p style="margin:5px auto;text-align:center;">
        <input type="submit" name="add" value="Go">
    </p>
</form>

<?php include('footer.php'); ?>

</body>
</html>
