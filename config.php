<?php
require_once __DIR__ . '/rules.php';

$role = $_GET['role'] ?? null;
$display = 'Usuário';
$cargo = 'Usuário';
$menuTitle = 'Home';
$dashboardMessage = 'Logue primeiro';

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
    <title>Configurações - <?php echo htmlspecialchars($cargo); ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header <?php echo htmlspecialchars($headerClass); ?>">
        <h1><?php echo htmlspecialchars($cargo); ?></h1>
        <nav>
            <a href="index.php?role=<?php echo urlencode($role ?? ''); ?>">Voltar</a>
            <a href="logout.php">Sair</a>
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
