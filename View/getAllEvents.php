<?php
            include_once '../Controller/eventController.php';
            $eventController = new EventController();
            $allEvents = $eventController->getAllEvents();
?>
<style>
    table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>
<table>
    <thead>
        <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Location</th>
            <th>Description</th>
            <th>Organizer Name</th>
            <th>Organizer Email</th>
            <th>Registration Deadline</th>
            <th>Category ID</th>
        </tr>
    </thead>
    <tbody>
            
            <?php
            //$categorieName = $eventController->getCategorieByID($row['CategoryID']);
            foreach($allEvents as $row){
                echo '<tr>';
                echo '<td>' . $row['EventName'] . '</td>';
                echo '<td>' . $row['Date'] . '</td>';
                echo '<td>' . $row['StartTime'] . '</td>';
                echo '<td>' . $row['EndTime'] . '</td>';
                echo '<td>' . $row['Location'] . '</td>';
                echo '<td>' . $row['Description'] . '</td>';
                echo '<td>' . $row['OrganizerName'] . '</td>';
                echo '<td>' . $row['OrganizerEmail'] . '</td>';
                echo '<td>' . $row['RegistrationDeadline'] . '</td>';
                echo '<td>' . $eventController->getCategorieByID($row['CategoryID']). '</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>