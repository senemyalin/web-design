<?php
setcookie('username', '', time() + 31536000, '/');
setcookie('admin','', time() + 31536000, '/');
echo "<script>
    localStorage.removeItem('basket');
    window.location='/index.php';
</script>";