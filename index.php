<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #000;
            margin: 0;
            color: #fff;
            font-family: 'Arial', sans-serif;
            text-align: center;
        }

        .heart {
            position: relative;
            width: 350px;
            height: 350px;
            transform: rotate(-45deg);
            animation: pulse 1.5s infinite;
            
        }

        .heart::before,
        .heart::after {
            content: '';
            position: absolute;
            top: 0;
            width: 104px;
            height: 190px;
            background-color: #f90a0a;
            border-radius: 50% 50% 0 0;
        }

        .heart::before {
            left: 100px;
            transform: rotate(-45deg);
            transform-origin: 0 100%;
        }

        .heart::after {
            left: 0;
            transform: rotate(45deg);
            transform-origin: 100% 100%;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .message {
            margin-top: 20px;
            font-size: 34px;
        }
    </style>
</head>
<body>
    <div class="heart"></div>
    <div class="message">Happy Birthday Ankita... Enjoy Your Day .....! </div>
</body>
</html>
