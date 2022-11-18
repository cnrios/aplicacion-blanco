
<?php

    if (isset($_COOKIE['session'])) {
        unset($_COOKIE['session']); // vaciar en el servidor
        setcookie('session', null, -1, '/'); // vaciar en el cliente
    }
    header('Location: index.php');
?>