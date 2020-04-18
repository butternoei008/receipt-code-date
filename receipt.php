<?php
$conn = new mysqli("localhost", "root", "", "test");

function runReceiptCode($prefix, $last_code) {
   $current_date = substr(date('Y') + 543, 2).date('md');
   $last_date = substr($last_code, 3, 6);
   $prefix_date = $prefix.'-'.$current_date;

   if($current_date == $last_date) {
      $last_namber = sprintf("%'03d", substr($last_code, 9) + 1);
      return $prefix_date.$last_namber;
   }
   else {
      return $prefix_date.'001';
   }
}

$last_code_query = $conn->query("SELECT rcp_code FROM receipt ORDER BY rcp_code DESC LIMIT 1");
$last_code = $last_code_query->fetch_assoc();
$rcp_code = runReceiptCode('SE', $last_code['rcp_code']);

echo $rcp_code;
