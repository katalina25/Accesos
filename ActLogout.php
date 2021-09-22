<?php
session_start();
unset($_SESSION["usu"]);
header('Location: login.php');
