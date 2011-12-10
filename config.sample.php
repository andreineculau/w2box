<?php

/*
w2box: php file repositorys

(c) 2005-2008, Clement Beffa
http://labs.beffa.org/w2box/

(c) 2009-2011, Andrei Neculau
http://www.andreineculau.com

Licence:
w2box is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0
http://creativecommons.org/licenses/by-nc-sa/3.0/
*/

$config = array();

// --- basic ---
// title of your w2box
$config['w2box_title'] = "";
// path to the storage directory
$config['storage_path'] = "./data";
// maximum allowed file size in megabytes.
$config['max_filesize'] = 50; // MBytes
// allowed file type
$config['allowed_ext'] = array(
	"gif","jpg","jpeg","png",
	"doc","docx","ppt","pptx","pps","xls","xlsx","pdf","ps","odt","odp","txt","rtf",
	"zip","7z",
	"swf","flv","f4v",
	"mp3","mp4","aac"
	);
$config['fancybox_image'] = array("gif","jpg","jpeg","png");
$config['fancybox_gdoc'] = array("pdf","ppt");
$config['fancybox_viewdocs'] = array("doc","docx","ppt","pptx","pps","xls","xlsx","pdf","ps","odt","odp","txt","rtf",);
$config['fancybox_video'] = array("swf","flv","f4v");
$config['fancybox_audio'] = array("mp3","mp4","aac");
// if bigger then 0, automatically delete file after X days
$config['delete_after'] = 0;
// if true, do not direct link to files
$config['disable_directlink'] = true;
// if true, allow upload to overwrite file that exist
$config['allow_overwrite'] = true;
// if true, ask confirmation before deletion
$config['confirm_delete'] = true;
// if true, show a warning msg at the top
// you can edit the warning msg at the end
// of this file ($lang['warning_msg'])
$config['show_warning'] = false;
// if true, utf8 encode the direct link,
// turn this on if you're directlink doesn't work
// with international characters
$config['utf8encode_directlink'] = true;
// enable folder creation and the value is the maximum depth
$config['enable_folder_maxdepth'] = 3;

//activate upload progress bar
$config['upload_progressbar'] = false;
//path to the cgi script as an URL link relative to public url of the script
$config['upload_cgiscript'] = BASE_URL . '/upload.cgi';
//$config['upload_cgiscript']="/cgi-bin/upload.cgi
//path to the tmp dir, if this one doesn't work, use a full path
//(ie "/home/username/tmp", "~tmp", "C:/wamp/tmp")
$config['upload_tmpdir'] = "tmp";

//--- admin ---
// To log-in as an admin when every feature is
// hidden, click on "Powered" (hidden link) at
// the bottom of the page.
//
// if true, activate admin authentication
$config['admin_actived'] = true;
// admin username
$config['admin_username'] = "admin";
// admin password
$config['admin_password'] = "admin";
// if true, allow upload only for admin
$config['protect_upload'] = true;
// if true, show upload feature only for admin
$config['hide_upload'] = true;
// if true, allow delete only for admin
$config['protect_delete'] = true;
// if true, show delete feature only for admin
$config['hide_delete'] = true;
// if true, allow make dir only for admin
$config['protect_makedir'] = true;
// if true, show make dir feature only for admin
$config['hide_makedir'] = true;


//--- activity logging --
// if true, log activity to file
$config['log'] = true;
// log filename
$config['log_filename'] = "w2box.log";
// if true, log upload activity
$config['log_upload'] = true;
// if true, log delete activity
$config['log_delete'] = true;
// if true, log download activity (you should disable
// direct link if you want to track every download
$config['log_download'] = true;

// ANDRIE
$config['count_downloads'] = true;
$config['admin_count_downloads'] = false;
$config['hide_count_downloads'] = false;
$config['dynamic_directory_date'] = true;
$config['dynamic_directory_size'] = true;
$config['timezone'] = 'Europe/Stockholm';
//$config['jquery_js'] = array();
//$config['fancybox_js'] = array();
//$config['storage_path_mirror'] = array();
//$config['analytics'] = '';
// ANDRIE end

require("lang/index.php");
?>