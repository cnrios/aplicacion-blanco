<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$rMcTzirUqtklX7CUutbp3uWSl4EOzBkH8xAJfoBERBV8ym1DvrVqm';

if (password_verify('1234', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>