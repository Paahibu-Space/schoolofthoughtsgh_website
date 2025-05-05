<!-- resources/views/emails/contact-auto-reply.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You for Contacting Us</title>
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
        .cta-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Thank You for Contacting Us</h1>
        </div>
        
        <div class="content">
            <p>Dear {{ $contact->name }},</p>
            
            <p>Thank you for reaching out to us. We have received your message and appreciate your interest in our services.</p>
            
            <p>Our team will review your inquiry and get back to you as soon as possible. During business hours, we typically respond within 24 hours.</p>
            
            <div class="message-box">
                <p style="margin-top: 0;"><strong>Your message details:</strong></p>
                <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                <p style="white-space: pre-wrap;"><strong>Message:</strong> {{ $contact->message }}</p>
                <p><strong>Sent:</strong> {{ $contact->created_at->format('F j, Y h:i A') }}</p>
            </div>
            
            <p>If you have any additional questions or information to provide, please don't hesitate to reply to this email.</p>
            
            <p>In the meantime, feel free to explore our website for more information about our products and services.</p>
            
            <div style="text-align: center;">
                <a href="{{ url('/') }}" class="cta-button">Visit Our Website</a>
            </div>
            
            <p>Thank you for your patience and we look forward to assisting you!</p>
            
            <p>Best regards,<br>
            The [Your Company] Team</p>
        </div>
        
        <div class="footer">
            <p>This is an automated response to your contact form submission.</p>
            <p>© {{ date('Y') }} [Your Company]. All rights reserved.</p>
        </div>
    </div>
</body>
</html>