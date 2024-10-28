<?php
$serverName = "Ahmad_Fadlih\MSSQLSERVER01";
$connectionOptions = [
    "Database" => "budget_planner"
    
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Connection failed: " . print_r(sqlsrv_errors(), true));
}