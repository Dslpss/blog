<!DOCTYPE html>
<html>
<head>
    <title>Nova Mensagem de Contato</title>
</head>
<body>
    <h2>Nova Mensagem de Contato - Self-DEV</h2>
    <p><strong>Nome:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
