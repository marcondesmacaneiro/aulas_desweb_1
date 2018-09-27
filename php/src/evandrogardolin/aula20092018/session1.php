<?php
    session_start();
    $_SESSION['valor'] = 'configuração';
    echo '<a href="session2.php">Link</a>';