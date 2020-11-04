<?php
session_start(); // on démare la session
require_once 'lib/File.php'; // on import le fichier PHP file.php qui permet de gerer les imports plis simplement
require_once (File::build_path(["controller","routeur.php"])); // on importe ensuite le routeur