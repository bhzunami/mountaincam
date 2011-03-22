<?php
include 'dbConnect.php';
echo '<head>
  <title>Mountain cam</title>
  <meta content="">
  <style></style>
</head>';

$query = "select id, name from Category";
$result = mysql_query($query);
while( $row = mysql_fetch_array($result) ) {
echo '<table>
       <tr>
         <td align="left">'.$row['id'].' </td>
         <td align="left">'.$row['name'].' </td>
       </tr>
     </table>';
 }