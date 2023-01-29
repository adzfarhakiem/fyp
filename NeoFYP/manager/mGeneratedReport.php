<?php
    // Connect to the database
    // ...

    // Determine the time range for the report (e.g. this week or this month)
    $start_date = null;
    $end_date = null;
    if (isset($_GET['report_type']) && $_GET['report_type'] === 'weekly') {
        $start_date = new DateTime();
        $start_date->modify('-1 week');
        $end_date = new DateTime();
    } elseif (isset($_GET['report_type']) && $_GET['report_type'] === 'monthly') {
        $start_date = new DateTime();
        $start_date->modify('-1 month');
        $end_date = new DateTime();
    } else {
        // Invalid report type, redirect to an error page
        // ...
    }

    // Retrieve the appointments from the database within the specified time range
    $appointments = array();
    // ...

    // Generate the report HTML
    $report_html = '<table><br>';
    $report_html .= '<tr><th>Customer Name </th><th>  Appointment Date </th><th>  Appointment Time</th></tr>';
    foreach ($appointments as $appointment) {
        $report_html .= '<tr>';
        $report_html .= '<td>' . $appointment['cName'] . '</td>';
        $report_html .= '<td>' . $appointment['appDate'] . '</td>';
        $report_html .= '<td>' . $appointment['appTime'] . '</td>';
        $report_html .= '</tr>';
    }
    $report_html .= '</table>';
?>