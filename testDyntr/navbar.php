<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Chovatelé zvířat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Úvodní stránka</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register-page.php">Registrace</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login-page.php">Přihlášení</a>
            </li>

            <?php if ( isset($_SESSION['username'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="owned-list.php">Seznam chovaných zvířat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="wish-list.php">Seznam zvířat, které chceme</a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</nav>
