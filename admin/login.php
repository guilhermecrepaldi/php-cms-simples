<?php session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){
if($_POST["user"]==="admin"&&$_POST["pass"]==="cms2023"){
$_SESSION["admin"]=true;header("Location: index.php");exit;}
$erro="Credenciais invalidas";}
?><!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Login Admin</title>
<style>body{font-family:Arial;display:flex;justify-content:center;align-items:center;height:100vh;background:#f0f2f5}
.card{background:white;padding:40px;border-radius:8px;width:360px;box-shadow:0 2px 10px rgba(0,0,0,0.1)}
h1{text-align:center;margin-bottom:20px}input{width:100%;padding:12px;margin:8px 0;border:1px solid #ddd;border-radius:4px}
button{width:100%;padding:12px;background:#2c3e50;color:white;border:none;border-radius:4px;cursor:pointer}
.erro{color:#e74c3c;text-align:center;margin-bottom:10px}</style></head>
<body><div class="card"><h1>Login</h1>
<?php if(isset($erro)):?><div class="erro"><?=$erro?></div><?php endif;?>
<form method="POST"><input type="text" name="user" required placeholder="Usuario">
<input type="password" name="pass" required placeholder="Senha">
<button type="submit">Entrar</button></form></div></body></html>
