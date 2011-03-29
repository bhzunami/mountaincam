<?php
include 'dbConnect.php';
echo '<head>
  <title>Mountain cam</title>
  <meta content="">
  <style></style>
</head>';

echo 'Kategorien: ';
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

echo 'Bilder in der Datenbank:';
$query = "select i.id, i.name, i.pfad, i.date, c.name as category from Images i, Category c where i.Category_id = c.id";
$result = mysql_query($query);
$i = 0;
$pfad[] = 3;
while( $row = mysql_fetch_array($result) ) {
$pfad[$i] = $row['pfad'];
echo '<table>
       <tr>
         <td align="left">'.$row['id'].' </td>
         <td align="left">'.$row['name'].' </td>
         <td align="left">'.$row['pfad'].' </td>
         <td align="left">'.$row['date'].' </td>
         <td align="left">'.$row['category'].' </td>
       </tr>
     </table>';
echo "Zeige Bild an: <br /> <img src='".$row['pfad']."'/>";
$i++;
 }

print_r($pfad);

