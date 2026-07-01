<?php
require_once __DIR__ . '/credentials.php';
require_once __DIR__ . '/rules.php';

$role = $_GET['role'] ?? null;
$display = 'Usuário';
$cargo = 'Usuário';
$menuTitle = 'Home';
$dashboardMessage = 'Logue primeiro';
$error = '';

if (isset($_GET['error']) && $_GET['error'] === '1') {
    $error = 'Credenciais incorretas';
}

if ($role) {
    $display = cargoLabel($role);
    $cargo = cargoLabel($role);
    $menuTitle = 'Menu do ' . $cargo;
    $dashboardMessage = 'Conteúdo do ' . $cargo;
}

$headerClass = getHeaderClass($role);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Painel - <?php echo htmlspecialchars($cargo); ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header <?php echo htmlspecialchars($headerClass); ?>">
        <h1><?php echo htmlspecialchars($cargo); ?></h1>
        <nav>
            <?php if (!$role): ?>
                <form action="login.php" method="post">
                    <input type="hidden" name="action" value="login">
                    <label for="user">Usuário:</label>
                    <input type="text" id="user" name="user" required>
                    <label for="pass">Senha:</label>
                    <input type="password" id="pass" name="pass" required>
                    <button type="submit">Entrar</button>
                </form>
                <?php if ($error): ?>
                    <div><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
            <?php else: ?>
                <a href="config.php?role=<?php echo urlencode($role); ?>">Configurações</a>
                <a href="logout.php">Sair</a>
            <?php endif; ?>
        </nav>
    </div>

    <div class="container">
        <div class="sidebar">
            <div>
                <h2><?php echo htmlspecialchars($menuTitle); ?></h2>
                <strong>Credenciais</strong>
                <div>admin / admin123</div>
                <div>cliente / cliente123</div>
                <div>suporte / suporte123</div>
            </div>
        </div>
        <div class="content">
            <h1><?php echo htmlspecialchars($dashboardMessage); ?></h1>
        </div>
    </div>
</body>
</html>
