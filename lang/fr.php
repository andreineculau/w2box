<?php
//thanks to me ;)

//msg
$lang['warning_msg'] = "Jene suis pas responsable de ces fichiers. Téléchargez les à vos risques et périls.";
$lang['delete_confirm_msg'] = "Sûr de supprimer ce fichier ?";
//upload form
$lang['upload'] = 'Envoyer';
$lang['file'] = 'fichier';
$lang['renameto'] = 'renommer';
$lang['filetypesallowed'] = 'types de fichier autorisés';
$lang['filesizelimit'] = 'taille limite du fichier';
$lang['filedeleteafter'] = 'les fichiers seront automatiquement supprimés {D} jours après leur envoi.';
//listing heading
$lang['filename'] = 'nom de fichier';
$lang['date'] = 'date';
$lang['date_format'] = 'd-m-Y H:i';
$lang['type'] = 'type';
$lang['size'] = 'taille';
$lang['delete'] = 'supprimer';
$lang['download'] = 'télécharger';
$lang['delete_link'] = 'Supprimer';
$lang['download_link'] = 'Télécharger directement';
$lang['nofiles'] = 'le répertoire est vide...';
$lang['dir'] = 'répertoire';
$lang['make'] = 'Créer';


//logging
$lang['DELETE'] = 'DUPPRIMER';
$lang['UPLOAD'] = 'ENVOYER';
$lang['DOWNLOAD'] = 'TELECHARGER';
//delete error
$lang['delete_error_notfound'] = "Erreur : fichier introuvable.";
$lang['delete_error_cant'] = "Ereur : le fichier ne peut pas être suprrimé.";
$lang['delete_error_cant_dir'] = "Erreur :le répertoire n'est pas vide.";
//upload error
$lang['upload_error'] = array(1 => "Le fichier envoyé dépasse la directive upload_max_filesize de php.ini",
							  2 => "Le fichier envoyé dépasse la directive MAX_FILE_SIZE spécifié dans le formulaire HTML.",
						 	  3 => "Le fichier n'a été que partiellement envoyé.",
						 	  4 => "Aucun fichier envoyé.",
						 	  6 => "Il manque le répertoire temporaire.");

						 	  
$lang['upload_error_sizelimit'] = "La taille du fichier dépasse la limite.";
$lang['upload_error_fileexist'] = "existe déjà dans le répertoire.";
$lang['upload_error_nocopy'] = "Incapable de copier le fichier dans le répertoire.";
$lang['upload_error_sid'] = "Incapable de trouver le fichier spécifié.";
$lang['upload_error_badext'] = "Type de fichier non autorisé !";
$lang['make_error_exist'] = "Ce répertoire existe déjà !";
$lang['make_error_cant'] = "Incapable de créer un nouveau répertoire.";
$lang['make_error_maxdepth']= "Vous ne pouvez plus créer un nouveau répertoire à cette profondeur.";
?>