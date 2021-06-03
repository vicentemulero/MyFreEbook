<!DOCTYPE html>
<head>

    <title>Mensaje recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de  <strong>{{$msg['name']}}</strong>.
        <br>
    <br>
    </p>
    <p>
    <strong>Email:</strong> {{$msg['email']}} <br>
    <strong>Motivo:</strong> {{$msg['reason']}} <br>
    </p>
    <p>
    <strong>Mensaje:</strong> {{$msg['contactText']}}
    </p>
</body>
</html>
