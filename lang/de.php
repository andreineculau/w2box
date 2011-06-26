<?php
// german localization
//thanks to me 2

//msg
$lang['warning_msg'] = "F&uuml;r diese Dateien bin ich nicht verantwortlich. Herunterladen erfolgt auf eigenes Risiko!";
$lang['delete_confirm_msg'] = "Soll die Datei wirklich gel&ouml;scht werden?";
//upload form
$lang['upload'] = 'Hochladen';
$lang['file'] = 'Datei';
$lang['renameto'] = 'umbenennen nach';
$lang['filetypesallowed'] = 'erlaubte Dateitypen';
$lang['filesizelimit'] = 'maximale Dateigr&ouml;&szlig;e';
$lang['filedeleteafter'] = 'Dateien werden automatisch gel&ouml;scht nach {D} Tagen nach dem Hochladen';
//listing heading
$lang['filename'] = 'Dateiname';
$lang['date'] = 'Datum';
$lang['date_format'] = 'Y-m-d H:i';
$lang['type'] = 'Typ';
$lang['size'] = 'Gr&ouml;&szlig;e';
$lang['delete'] = 'l&ouml;schen';
$lang['download'] = 'herunterladen';
$lang['delete_link'] = 'L&ouml;schen';
$lang['download_link'] = 'Jetzt herunterladen!';
$lang['nofiles'] = 'das Verzeichnis ist leer...';
$lang['dir'] = 'Verzeichnis';
$lang['make'] = 'erstellen';


//logging
$lang['DELETE'] = 'L&Ouml;SCHEN';
$lang['UPLOAD'] = 'HOCHLADEN';
$lang['DOWNLOAD'] = 'HERUNTERLADEN';
//delete error
$lang['delete_error_notfound'] = "Fehler: Datei nicht gefunden.";
$lang['delete_error_cant'] = "Fehler: Datei kann nicht gel&ouml;scht werden.";
$lang['delete_error_cant_dir'] = "Fehler: Verzeichnis ist nicht leer.";
//upload error
$lang['upload_error'] = array(1 => "Die hochgeladene Datei ist gr&ouml;&szlig;er als die upload_max_filesize Einstellung in der php.ini",
                                                         2 => "Die &uuml;bertragene Datei ist gr&ouml;&szlig;er als die im Formular angegebene MAX_FILE_SIZE Einstellung.",
                                                         3 => "Die &uuml;bertragene Datei wurde nur teilweise &uuml;bertragen.",
                                                         4 => "Keine Datei &uuml;bertragen.",
                                                         6 => "Kein tempor&äuml;res Verzeichnis.");


$lang['upload_error_sizelimit'] = "Die hochgeladene Datei ist gr&ouml;&szlig;er als maximal zul&äuml;ssig";
$lang['upload_error_fileexist'] = "existiert bereits im Verzeichnis.";
$lang['upload_error_nocopy'] = "Kann Datei nicht ins Verzeichnis kopieren.";
$lang['upload_error_sid'] = "Kann angegebene Datei nicht finden.";
$lang['upload_error_badext'] = "Dateityp nicht erlaubt!";
$lang['make_error_exist'] = "Verzeichnis existiert bereits!";
$lang['make_error_cant'] = "Kann kein neues Verzeichnis erstellen.";
$lang['make_error_maxdepth']= "In dieser Verzeichnistiefe kann kein neues Verzeichnis erstellt werden.";
?>