<?php
$tweets = [
    [
        'user_name' => 'user4',
        'text' => 'text4',
        'created' => '2024-09-15 10:00:00',
    ],
    [
        'user_name' => 'user3',
        'text' => 'text3',
        'created' => '2024-09-14 10:00:00',
    ],
    [
        'user_name' => 'user2',
        'text' => 'text2',
        'created' => '2024-09-13 10:00:00',
    ],
    [
        'user_name' => 'user1',
        'text' => 'text1',
        'created' => '2024-09-12 10:00:00',
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	foreach ($tweets as $tweet) {
		echo '<div>';
		echo	'<p>';
		echo 		'@' . $tweet['user_name'];
		echo 	'</p>';
		echo 	'<p>';
		echo 		$tweet['text'];
		echo 	'</p>';
		echo 	'<p>';
		echo 		$tweet['created'];
		echo 	'</p>';
		echo '</div>';
		echo '<hr>';
	}
	?>
</body>
</html>
