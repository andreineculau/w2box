<?php
//thanks to me ;)

//msg
$lang['warning_msg'] = "I'm not responsible of the files here. Download them at your own risk!";
$lang['delete_confirm_msg'] = "Are you sure you want to delete this file?";
//upload form
$lang['upload'] = 'Upload';
$lang['file'] = 'file';
$lang['renameto'] = 'rename to';
$lang['filetypesallowed'] = 'file types allowed';
$lang['filesizelimit'] = 'file size limit';
$lang['filedeleteafter'] = 'files will be automatically deleted {D} days after being uploaded';
//listing heading
$lang['filename'] = 'filename';
$lang['date'] = 'date';
$lang['date_format'] = 'Y-m-d H:i';
$lang['type'] = 'type';
$lang['size'] = 'size';
$lang['delete'] = 'delete';
$lang['download'] = 'download';
$lang['delete_link'] = 'Delete';
$lang['download_link'] = 'Download Now!';
$lang['nofiles'] = 'the storage directory is empty...';
$lang['dir'] = 'directory';
$lang['make'] = 'Make';

$lang['view'] = 'view';
$lang['view_link'] = 'View Now!';

$lang['preview'] = 'preview';
$lang['preview_link'] = 'Preview link';
$lang['permalink_link'] = 'permalink';
$lang['permalink_link'] = 'Permanent link to the latest file in this series';


//logging
$lang['DELETE'] = 'DELETE';
$lang['UPLOAD'] = 'UPLOAD';
$lang['DOWNLOAD'] = 'DOWNLD';
//delete error
$lang['delete_error_notfound'] = "Error: file not found.";
$lang['delete_error_cant'] = "Error: file can not be deleted.";
$lang['delete_error_cant_dir'] = "Error: directory is not empty.";
//upload error
$lang['upload_error'] = array(1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
							  2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
						 	  3 => "The uploaded file was only partially uploaded.",
						 	  4 => "No file was uploaded.",
						 	  6 => "Missing a temporary folder.");

						 	  
$lang['upload_error_sizelimit'] = "File size is greater than the file size limit";
$lang['upload_error_fileexist'] = "already exists in the storage directory.";
$lang['upload_error_nocopy'] = "Unable to copy the file into the storage directory.";
$lang['upload_error_sid'] = "Unable to find the specified file.";
$lang['upload_error_badext'] = "File Extention isn't allowed!";
$lang['make_error_exist'] = "Directory already exists!";
$lang['make_error_cant'] = "Unable to make a new directory.";
$lang['make_error_maxdepth']= "You cannot create new folder at this directory depth.";
?>