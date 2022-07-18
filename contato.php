<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    
<form action="" method="POST">

<p>
  <label for="nome">Nome:</label>
  <input type="text" id="nome" name="nome">
</p>

<p>
  <label for="email">E-mail:</label>
  <input type="text" id="email" name="email">
</p>

<p>Assunto:
 <select name="assunto" id="assunto" required>
    <option value=""></option>
    <option value="duvidas">Dúvidas</option>
    <option value="reclamacoes">Reclamações</option>
    <option value="elogios">Elogios</option>
  </select> 
</p>

<p>
    <label for="mensagem">Mensagem:</label> <br>
    <textarea name="mensagem" id="mensagem" cols="30" rows="5"></textarea>
</p>

<button type="submit" name="enviar">Enviar</button>
</form>
    
</body>
</html>