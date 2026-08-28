<?php
# Inicia a sessão
session_start();
// Apaga todas as informações da sessão
session_unset();
// Destrói a sessão
session_destroy();
// Volta para a página de login
header("Location: ../pages/login.php");
exit();
?>