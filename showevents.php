<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "testcalendar";
$conn = new mysqli($host, $user, $password, $database);

$sql = "SELECT title, start_datetime as start, end_datetime as end FROM events";
$result = $conn->query($sql);

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Calendar Events</title>
    <link rel="stylesheet" href="css/main.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/main.min.js"></script>
</head>
<body>
    <div id="calendar"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: <?php echo json_encode($events); ?>
            });
            calendar.render();
        });
    </script>
</body>
</html>