<!DOCTYPE html>
<html>

<head>
    <title>Task {{ $taskData['title'] }} is {{ $statusName }} Now!</title>
</head>

<body>
    <h2>{{ $userName }}: has done the task and it is ready for Review!</h2>
    <p>Title: {{ $taskData['title'] }}</p>
    <p>Description: {{ $taskData['description'] }}</p>
    <p>Username: {{ $userName }}</p>
    <p>Status: {{ $statusName }}</p>
</body>

</html>
