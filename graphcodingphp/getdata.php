<?php

// getData.php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mydb';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Automatically determine the current month and year
$currentMonth = date('n'); // 'n' returns the month without leading zeros
$currentYear = date('Y');

// Fetch data from the database
$query = "SELECT DAY(day) as day, IFNULL(amount, 0) as amount 
          FROM daily_sales
          WHERE MONTH(day) = $currentMonth AND YEAR(day) = $currentYear
          ORDER BY day";

$result = $conn->query($query);

$data = [
    'labels' => [],
    'datasets' => [
        [
            'label' => 'Sales',
            'data' => [],
            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
            'borderColor' => 'rgba(75, 192, 192, 1)',
            'borderWidth' => 1,
        ],
    ],
];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data['labels'][] = $row['day'];
        $data['datasets'][0]['data'][] = $row['amount'];
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
