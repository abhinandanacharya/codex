<?php
$appointments = json_decode(file_get_contents('data/appointments.json'), true);
$services = json_decode(file_get_contents('data/services.json'), true);
$servicesById = [];
foreach ($services as $s) {
    $servicesById[$s['id']] = $s['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Appointments</title>
    <link rel="stylesheet" href="public/styles.css">
</head>
<body>
<h1>All Appointments</h1>
<table>
    <tr><th>Service</th><th>Name</th><th>Email</th><th>Date</th></tr>
    <?php foreach ($appointments as $apt): ?>
    <tr>
        <td><?php echo htmlspecialchars($servicesById[$apt['service_id']] ?? ''); ?></td>
        <td><?php echo htmlspecialchars($apt['name']); ?></td>
        <td><?php echo htmlspecialchars($apt['email']); ?></td>
        <td><?php echo htmlspecialchars($apt['date']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
