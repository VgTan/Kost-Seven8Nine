<?php

// Sample time ranges
$timeRanges = [
    '09:00-09:30',
    '10:00-10:30',
    '11:00-11:30',
    // Add more time ranges as needed
];

// Sample booked times (per day)
$bookedTimes = [
    'Monday' => ['10:00-10:30', '11:00-11:30'],
    'Tuesday' => ['09:00-09:30', '10:00-10:30'],
    // Add more days and booked times as needed
];

// Function to check if a time is booked for a specific day
function isBooked($timeRange, $day, $bookedTimes) {
    return in_array($timeRange, $bookedTimes[$day] ?? []);
}

// Function to convert time range to HTML table row
function createTimeSlot($timeRange, $bookedTimes) {
    list($start, $end) = explode('-', $timeRange);
    $row = "<tr><td>$start - $end</td>";

    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

    foreach ($daysOfWeek as $day) {
        $isBooked = isBooked($timeRange, $day, $bookedTimes);
        $color = $isBooked ? 'red' : 'white';
        $row .= "<td style='background-color: $color;'></td>";
    }

    $row .= '</tr>';
    return $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/roomdetail.css">
    <title>Timetable</title>
</head>
<body>

    <table class="timetable">
        <thead>
            <tr>
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Generate timetable rows
                foreach ($timeRanges as $timeRange) {
                    echo createTimeSlot($timeRange, $bookedTimes);
                }
            ?>
        </tbody>
    </table>

</body>
</html>
