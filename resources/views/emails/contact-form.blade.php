<!-- resources/views/emails/contact-form.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Contact Form Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #007bff;
            padding: 20px;
            text-align: center;
            color: #fff;
            border-radius: 5px 5px 0 0;
        }
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .info-row {
            margin-bottom: 15px;
            display: flex;
        }
        .info-label {
            font-weight: bold;
            width: 100px;
        }
        .info-value {
            flex: 1;
        }
        .message-box {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Message</h1>
        </div>
        
        <div class="content">
            <p>You have received a new message from your website's contact form.</p>
            
            <div class="info-row">
                <div class="info-label">Name:</div>
                <div class="info-value">{{ $contact->name }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value">{{ $contact->email }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Subject:</div>
                <div class="info-value">{{ $contact->subject }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">IP Address:</div>
                <div class="info-value">{{ $contact->ip_address }}</div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Date:</div>
                <div class="info-value">{{ $contact->created_at->format('F j, Y h:i A') }}</div>
            </div>
            
            <div class="message-box">
                <p style="margin-top: 0;"><strong>Message:</strong></p>
                <p style="white-space: pre-wrap;">{{ $contact->message }}</p>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent from your website's contact form.</p>
        </div>
    </div>
</body>
</html>