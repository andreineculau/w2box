<?php
//thanks to FLAIC ;)

//msg
$lang['warning_msg'] = "Non sono responsabile di questi files! Scaricateli a vostro rischio e pericolo!";
$lang['delete_confirm_msg'] = "Sei sicuro di voler cancellare il file?";
//upload form
$lang['upload'] = 'Carica';
$lang['file'] = 'file';
$lang['renameto'] = 'rinomina in';
$lang['filetypesallowed'] = 'tipi di files consentiti';
$lang['filesizelimit'] = 'Dimensione massima del file';
$lang['filedeleteafter'] = 'I files saranno cancellati automaticamente dopo {D} giorni dalla data di caricamento';
//listing heading
$lang['filename'] = 'Nome del file';
$lang['date'] = 'data';
$lang['date_format'] = 'd-m-Y H:i';
$lang['type'] = 'tipo';
$lang['size'] = 'dimensione';
$lang['delete'] = 'cancella';
$lang['download'] = 'scarica';
$lang['delete_link'] = 'Cancella';
$lang['download_link'] = 'Scarica ora!';
$lang['nofiles'] = 'Questo archivio  vuoto...';
$lang['dir'] = 'cartella';
$lang['make'] = 'Crea';


//logging
$lang['DELETE'] = 'CANCELLA';
$lang['UPLOAD'] = 'CARICA';
$lang['DOWNLOAD'] = 'SCARICA';
//delete error
$lang['delete_error_notfound'] = "Errore: file non trovato.";
$lang['delete_error_cant'] = "Errore: Il file non pu˜ essere rimosso.";
$lang['delete_error_cant_dir'] = "Errore: la cartella non  vuota.";
//upload error
$lang['upload_error'] = array(1 => "Il file caricato supera la direttiva  upload_max_filesize indicata nel file php.ini",
							  2 => "Il file caricato supera la direttiva MAX_FILE_SIZE impostata nel form HTML.",
						 	  3 => "Il file  stato caricato solo parzialmente.",
						 	  4 => "Nessun file caricato.",
						 	  6 => "Cartella temporanea mancante.");

						 	  
$lang['upload_error_sizelimit'] = "La dimensione del file  superiore al limite di dimensione dei files";
$lang['upload_error_fileexist'] = "giˆ esistente in archivio.";
$lang['upload_error_nocopy'] = "Impossibile copiare il file  in archivio.";
$lang['upload_error_sid'] = "Impossibile trovare il file in questione.";
$lang['upload_error_badext'] = "Questa estensione non  autorizzata!";
$lang['make_error_exist'] = "Cartella giˆ esistente!";
$lang['make_error_cant'] = "Impossibile creare un nuovo archivio.";
$lang['make_error_maxdepth']= "Non si pu˜ creare una cartella a questo livello.";
?>