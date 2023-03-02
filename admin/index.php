<?php session_start();
if(!isset($_SESSION["admin"])){header("Location: login.php");exit;}
$pdo=new PDO("mysql:host=localhost;dbname=cms_simples;charset=utf8","root","");
if($_SERVER["REQUEST_METHOD"]==="POST"&&isset($_POST["title"])){
if(!empty($_POST["id"])){
$stmt=$pdo->prepare("UPDATE posts SET title=?,slug=?,content=?,author=? WHERE id=?");
$stmt->execute([$_POST["title"],$_POST["slug"],$_POST["content"],$_POST["author"],$_POST["id"]]);
}else{
$stmt=$pdo->prepare("INSERT INTO posts (title,slug,content,author) VALUES (?,?,?,?)");
$stmt->execute([$_POST["title"],$_POST["slug"],$_POST["content"],$_POST["author"]]);
}header("Location: index.php");exit;}
if(isset($_GET["deletar"])){$pdo->prepare("DELETE FROM posts WHERE id=?")->execute([$_GET["deletar"]]);header("Location: index.php");exit;}
$edit=null;if(isset($_GET["editar"])){$stmt=$pdo->prepare("SELECT * FROM posts WHERE id=?");$stmt->execute([$_GET["editar"]]);$edit=$stmt->fetch();}
$posts=$pdo->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
?><!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Admin - CMS</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#f5f5f5}
header{background:#2c3e50;color:white;padding:15px 30px;display:flex;justify-content:space-between}
nav a{color:white;text-decoration:none;margin-left:20px}.container{max-width:900px;margin:20px auto;padding:0 20px}
form{background:white;padding:20px;border-radius:8px;margin-bottom:20px}
input,textarea,select{width:100%;padding:8px;margin:5px 0;border:1px solid #ddd;border-radius:4px}
textarea{height:200px}button{background:#27ae60;color:white;border:none;padding:10px 25px;border-radius:4px;cursor:pointer}
table{width:100%;border-collapse:collapse;background:white;border-radius:8px}
th,td{padding:10px;text-align:left;border-bottom:1px solid #eee}
th{background:#f9f9f9}a.btn{display:inline-block;padding:4px 10px;border-radius:3px;color:white;text-decoration:none;font-size:0.9em}
.btn-edit{background:#3498db}.btn-del{background:#e74c3c}h1{margin:20px 0}</style></head>
<body><header><strong>Admin CMS</strong><nav><a href="index.php">Posts</a><a href="logout.php">Sair</a></nav></header>
<div class="container"><h1><?=$edit?"Editar":"Novo"?> Post</h1>
<form method="POST"><?php if($edit):?><input type="hidden" name="id" value="<?=$edit["id"]?>"><?php endif;?>
<input type="text" name="title" placeholder="Titulo" value="<?=$edit["title"]??""?>" required>
<input type="text" name="slug" placeholder="slug-do-post" value="<?=$edit["slug"]??""?>" required>
<input type="text" name="author" placeholder="Autor" value="<?=$edit["author"]??""?>" required>
<textarea name="content" placeholder="Conteudo"><?=$edit["content"]??""?></textarea>
<button type="submit"><?=$edit?"Atualizar":"Publicar"?></button></form>
<h1>Todos os Posts</h1>
<table><tr><th>Titulo</th><th>Autor</th><th>Data</th><th>Acoes</th></tr>
<?php foreach($posts as $p):?><tr>
<td><?=htmlspecialchars($p["title"])?></td><td><?=$p["author"]?></td><td><?=$p["created_at"]?></td>
<td><a href="?editar=<?=$p["id"]?>" class="btn btn-edit">Editar</a>
<a href="?deletar=<?=$p["id"]?>" class="btn btn-del" onclick="return confirm('Deletar?')">Deletar</a></td></tr>
<?php endforeach;?></table></div></body></html>
