<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>CMS Simples</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#fafafa;color:#333}
header{background:#2c3e50;color:white;padding:20px 40px}h1{font-size:1.5em}
nav a{color:white;text-decoration:none;margin-left:20px}.container{max-width:800px;margin:30px auto;padding:0 20px}
.post{background:white;padding:20px;margin-bottom:15px;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.1)}
.post h2{color:#2c3e50;margin-bottom:5px}.post h2 a{color:#2c3e50;text-decoration:none}
.post .meta{color:#999;font-size:0.85em;margin-bottom:10px}
.post p{line-height:1.6;color:#555}.btn{display:inline-block;background:#3498db;color:white;padding:8px 15px;border-radius:4px;text-decoration:none;margin-top:10px}
footer{text-align:center;padding:30px;color:#999;font-size:0.9em}</style></head>
<body><header><h1>CMS Simples</h1></header>
<div class="container"><?php foreach($posts as $p):?><div class="post">
<h2><a href="?page=post&slug=<?=urlencode($p["slug"])?>"><?=htmlspecialchars($p["title"])?></a></h2>
<div class="meta"><?=date("d/m/Y",strtotime($p["created_at"]))?> por <?=htmlspecialchars($p["author"])?></div>
<p><?=nl2br(htmlspecialchars(mb_substr($p["content"],0,300)))?>...</p>
<a class="btn" href="?page=post&slug=<?=urlencode($p["slug"])?>">Ler mais</a></div>
<?php endforeach;?></div>
<footer>&copy; 2023 CMS Simples</footer></body></html>
