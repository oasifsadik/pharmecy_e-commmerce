<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f6f9fc;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      color: #333333;
    }

    .email-container {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .email-header {
      background-color: #007bff;
      color: #ffffff;
      padding: 20px;
      text-align: center;
    }

    .email-body {
      padding: 30px;
    }

    h2 {
      margin-top: 0;
      color: #007bff;
    }

    ul {
      padding-left: 0;
      list-style: none;
      margin: 20px 0;
    }

    ul li {
      margin-bottom: 10px;
    }

    .email-footer {
      padding: 20px;
      text-align: center;
      font-size: 14px;
      color: #888888;
      background-color: #f1f3f5;
    }

    @media screen and (max-width: 600px) {
      .email-body {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <h1>Booking Confirmed</h1>
    </div>
    <div class="email-body">
      <h2>Hello {{ $data->name }},</h2>
      <p>Thank you for booking your lab test with us. Below are your booking details:</p>

      <ul>
        <li><strong>Test:</strong> {{ $data->labTest->name }}</li>
        <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($data->test_date)->format('F j, Y') }}</li>
        <li><strong>Amount:</strong> {{ $data->amount }} {{ $data->currency }}</li>
        <li><strong>Transaction ID:</strong> {{ $data->transaction_id }}</li>
        <li><strong>Status:</strong> <span style="color: green; font-weight: bold;">Paid</span></li>
      </ul>

      <p>If you have any questions or need to make changes, feel free to contact our support team.</p>

      <p>Thanks again,<br><strong>Lab Center Team</strong></p>
    </div>
    <div class="email-footer">
      © {{ date('Y') }} Lab Center. All rights reserved.
    </div>
  </div>
</body>
</html>
