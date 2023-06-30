<?php
$id = isset($_POST['id']) ? $_POST['id'] : null;
$content = '<p>Modal content for ID ' . $id . '</p>';
echo $content;
