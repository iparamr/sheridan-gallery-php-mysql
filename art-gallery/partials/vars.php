<?php
// Set the default language
$lang = 'en';

// Check if a language is set in the URL or session
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}

// Include the language file
$translations = include "i18n/{$lang}.php";

// Section ID for Index pages
if (isset($_GET['sectionID'])) {
	$sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
} else {
	$sectionID = 2;
}
