<?php
require_once __DIR__ . '/credentials.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $user = trim($_POST['user'] ?? '');
    $pass = trim($_POST['pass'] ?? '');

    $users = getCredentials();

    if (isset($users[$user]) && $users[$user]['pass'] === $pass) {
        $role = $users[$user]['type'];
        header('Location: index.php?role=' . urlencode($role));
        exit;
    }
}

header('Location: index.php?error=1');
exit;
