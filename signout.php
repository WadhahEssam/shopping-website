<?php
session_start();
session_unset();
session_destroy();
?>

<html>
    <body>
        <script>
            window.location = 'index.php?message=you logged out';
        </script>
    </body>
</html>


