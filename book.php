<?php
$services = json_decode(file_get_contents('data/services.json'), true);
$serviceId = isset($_GET['service_id']) ? (int)$_GET['service_id'] : null;
$selectedService = null;
foreach ($services as $s) {
    if ($s['id'] === $serviceId) {
        $selectedService = $s;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentsFile = 'data/appointments.json';
    $appointments = json_decode(file_get_contents($appointmentsFile), true);
    $appointments[] = [
        'service_id' => (int)$_POST['service_id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'date' => $_POST['date']
    ];
    file_put_contents($appointmentsFile, json_encode($appointments, JSON_PRETTY_PRINT));
    header('Location: success.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="public/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(function(){
        $('form').on('submit', function(){
            var valid = true;
            $('input[required]').each(function(){
                if(!$(this).val()) valid = false;
            });
            if(!valid){
                alert('Please fill all fields.');
            }
            return valid;
        });
    });
    </script>
</head>
<body>
<h1>Book Appointment<?php if ($selectedService) echo ' - '.htmlspecialchars($selectedService['name']); ?></h1>
<form method="post">
    <input type="hidden" name="service_id" value="<?php echo $serviceId; ?>">
    <label>Name:<input type="text" name="name" required></label>
    <label>Email:<input type="email" name="email" required></label>
    <label>Date:<input type="date" name="date" required></label>
    <button type="submit">Book</button>
</form>
</body>
</html>
