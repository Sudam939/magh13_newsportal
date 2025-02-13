<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            color: red;
        }
    </style>
</head>

<body>
    <div>
        <h1>Dear admin,</h1>
        <p>
            {{ $data['message'] }}
        </p>
        <footer>
            Regards, <br>
            Jawaaf
        </footer>
    </div>
</body>

</html>
