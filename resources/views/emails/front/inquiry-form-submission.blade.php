<!DOCTYPE html>
<html>
<head>
    <title>Inquiry Form Submission</title>
</head>
<body>
    <h1>Confirmation of your Inquiry</h1>
    
    <p><strong>Name:</strong> {{ $inquiry->name }}</p>
    <p><strong>Email:</strong> {{ $inquiry->email }}</p>
    <p><strong>Phone:</strong> {{ $inquiry->phone }}</p>
    <p><strong>Message:</strong> {{ $inquiry->message }}</p>
    
    <p>Thank you for contacting us. We have received your inquiry.</p>
    <p>We will get back to you as soon as possible.</p>
</body>
</html>
 