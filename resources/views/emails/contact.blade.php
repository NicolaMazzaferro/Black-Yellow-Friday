<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Friday</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #ff7f50;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-content {
            padding: 20px;
        }
        .email-footer {
            background-color: #f8f8f8;
            color: #666666;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff7f50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #e06a3b;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <img width="80px" src="{{asset('logo-bf.png')}}" alt="logo">
        </div>
        <div class="email-content">
            <p><strong>Nome:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Messaggio:</strong></p>
            <p>{{ $messageContent }}</p>
        </div>
        <div class="email-footer">
            Copyright © 2024 Black Friday.
        </div>
    </div>
</body>
</html>
