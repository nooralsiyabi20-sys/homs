<?php
include('header.php');
include('mylib.php');
include("dbconnect.php");

echo "<h2 style='text-align:center;margin:2px auto;border-radius:20px ;background-color:#e6b3b3;'>Staff Details </h2>\n";

$errors = [];

// Assuming UID is stored in session
$uid = $_SESSION['uid'] ?? 0;

// Fetch user details
$nf_q = "SELECT * FROM users WHERE uId = '$uid'";
$nf_r = mysqli_query($conn, $nf_q) or die("Error in the Query :<br><mark>$nf_q</mark><br>" . mysqli_error($conn));

if ($nf_r && mysqli_num_rows($nf_r) > 0) {
    $nf_p = mysqli_fetch_assoc($nf_r);

    // Hidden input
    echo "<input type='hidden' name='uid' value='" . htmlspecialchars($nf_p['uId']) . "'>";

    // Fetch staff details
    $staffName = $nf_p['StaffName'] ?? '';
    $nf_s = "SELECT * FROM staff WHERE StaffName = '$staffName'";
    $nf_r2 = mysqli_query($conn, $nf_s) or die("Error in the Query :<br><mark>$nf_s</mark><br>" . mysqli_error($conn));

    $mo = "<b>";
    $mc = "</b>";

    echo "Staff Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "$mo{$staffName}$mc &nbsp;&nbsp;<hr>\n";

} else {
    echo "<p>No user data found.</p>";
}

include("footer.php");
?>
