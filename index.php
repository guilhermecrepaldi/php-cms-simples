<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=cms_simples;charset=utf8","root","");
// Rotas
$page = $_GET["page"] ?? "home";
$slug = $_GET["slug"] ?? "";
if ($page === "post" && $slug) {
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE slug=? AND published=1");
    $stmt->execute([$slug]); $post = $stmt->fetch();
    require $post ? "views/post.php" : "views/404.php";
} elseif ($page === "home") {
    $posts = $pdo->query("SELECT * FROM posts WHERE published=1 ORDER BY created_at DESC LIMIT 10")->fetchAll();
    require "views/home.php";
} else {
    require "views/404.php";
}
