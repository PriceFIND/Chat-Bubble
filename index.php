<?php

$mysqli=new mysqli("localhost","Chatastrophy","apASSWORD","chatbubble");

$result=$mysqli->query("
SELECT chat_messages_bro.messages, usernames_bro.name AS 'user name',
chat_rooms_bro.name_of_room AS 'room'
FROM chat_messages_bro
INNER JOIN usernames_bro ON
chat_messages_bro.sender = usernames_bro.ID
INNER JOIN chat_rooms_bro ON
chat_messages_bro.room = chat_rooms_bro.ID
WHERE chat_rooms.name_of_room = '$roomName'
");

$result_count = $mysqli->field_count;

$html="
<html>
<head>
</head>
<body>
<table>
<tr>
<td><b>ID</b></td>
<td><b>User Name</b></td>
</tr>";

while($row=$result->fetch_array())
{
$html.="<tr>";
for($i=0; $i<$result_count; $i++)
{
$html.="<td>".$row[$i]."</td>";
}
$html.="</tr>";
}

$html.=
"</table>
</body>
</html>";

echo $html;


?>