<!DOCTYPE html>
<html>

<head>
    <title>Task Assigned Notification</title>
</head>

<body>
    <h2>Task Assigned</h2>
    <p>Title: {{ $taskData['title'] }}</p>
    <p>Description: {{ $taskData['description'] }}</p>
    <p>Assigned By: {{ $assigned_by }}</p>
</body>

</html>
