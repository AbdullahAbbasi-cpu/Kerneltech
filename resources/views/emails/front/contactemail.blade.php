<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        .strong {
            font-weight: bold;
        }
        .thanks {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Contact Form Submission</h2>
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>You have received a new contact form submission. Here are the details:</p>
            <p><span class="strong">Name:</span> {{ $data['fullname'] }}</p>
            <p><span class="strong">Phone:</span> {{ $data['phone'] }}</p>
            <p><span class="strong">Message:</span> {{ $data['message'] }}</p>
            <p class="thanks">Thank you for your attention.</p>
        </div>
    </div>
</body>
</html>
