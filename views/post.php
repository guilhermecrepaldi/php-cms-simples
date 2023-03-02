<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title><?=htmlspecialchars($post["title"])?> - CMS</title>
<style>*{margin:0;padding:0;box-sizing:border-box}body{font-family:Arial;background:#fafafa;color:#333}
header{background:#2c3e50;color:white;padding:20px 40px}.container{max-width:800px;margin:30px auto;padding:0 20px}
h1{color:#2c3e50;margin-bottom:10px}.meta{color:#999;margin-bottom:20px;font-size:0.9em}
.content{line-height:1.8;font-size:1.05em}.content p{margin-bottom:15px}
a{color:#3498db;text-decoration:none}</style></head>
<body><header><h1>CMS Simples</h1></header>
<div class="container"><h1><?=htmlspecialchars($post["title"])?></h1>
<div class="meta"><?=date("d/m/Y",strtotime($post["created_at"]))?> por <?=htmlspecialchars($post["author"])?></div>
<div class="content"><?=nl2br(htmlspecialchars($post["content"]))?></div>
<a href="?page=home">&laquo; Voltar</a></div></body></html>
