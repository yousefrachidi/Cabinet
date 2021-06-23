<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Medicale</h1>
    <p>Mr {{$data['nom']}},</p>
    <p>Pour valider votre compte sur notre site Medicale et accéder à tous les
        services, vous devez cliquer sur le lien suivant est identifier:</p>
    <a href="{{route('login')}}">Authentifier</a>
    <p>Est entrer vos informaion:</p>
    <p>Email:{{$data['email']}}</p>
    <p>Mot de passe:{{$data['password']}}</p>
</body>

</html>