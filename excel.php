<?php 
// Load the database configuration file 
include('dbconnect.php');

// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('OHID', 'RoomNo', 'day', 'TimeFrom', 'TimeTo', 'mode', 'StaffID','Staff Name','courseID','courseName'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $db->query("select o.OHID, o.RoomNo, o.day, o.TimeFrom, o.TimeTo, o.mode,s.StaffID, s.StaffName,o.courseID, c.courseName from OfficeHour o, staff s, course c where o.StaffID=s.StaffID and c.courseID=o.courseID "); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['OHID'], $row['RoomNo'], $row['day'], $row['TimeFrom'], $row['TimeTo'], $row['mode'], $row['StaffID'],$row['StaffName'],$row['courseID'],$row['courseName']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;