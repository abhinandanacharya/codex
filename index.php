<?php
$services = json_decode(file_get_contents('data/services.json'), true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Astrologer Services</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
<h1>Astrologer Services</h1>
<ul>
<?php foreach ($services as $service): ?>
    <li>
        <h2><?php echo htmlspecialchars($service['name']); ?></h2>
        <p><?php echo htmlspecialchars($service['description']); ?></p>
        <a href="book.php?service_id=<?php echo $service['id']; ?>">Book Appointment</a>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>
