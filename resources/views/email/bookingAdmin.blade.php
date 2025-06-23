<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Lab Booking</title>
</head>
<body>
    <h2>New Booking Notification</h2>
    <p><strong>Name:</strong> {{ $data->name }}</p>
    <p><strong>Email:</strong> {{ $data->email }}</p>
    <p><strong>Test:</strong> {{ $data->labTest->name }}</p>
    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($data->test_date)->format('F j, Y') }}</p>
    <p><strong>Amount:</strong> {{ $data->amount }} {{ $data->currency }}</p>
    <p><strong>Transaction ID:</strong> {{ $data->transaction_id }}</p>
</body>
</html>
