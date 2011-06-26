<?php
// thanks to Ignacio Moratiel & Alberto de Luis

//msg
$lang['warning_msg'] = "No somos responsables de ninguno de los archivos depositados por vosotros;. Desc&aacute;rgalos bajo tu propio riesgo.";
$lang['delete_confirm_msg'] = "&iquest;Est&aacute; seguro de querer eliminar el archivo?";
//upload form
$lang['upload'] = 'Subir';
$lang['file'] = 'archivo';
$lang['renameto'] = 'renombrar';
$lang['filetypesallowed'] = 'extensiones permitidas';
$lang['filesizelimit'] = 'l&iacute;mite de tama&ntilde;o de archivo';
$lang['filedeleteafter'] = 'Los archivos ser&aacute;n eliminados {D} d&iacute;s despu&eacute;s de ser subidos';
//listing heading
$lang['filename'] = 'nombre de archivo';
$lang['date'] = 'fecha';
$lang['date_format'] = 'd-m-Y H:i';
$lang['type'] = 'tipo';
$lang['size'] = 'tama&ntilde;o';
$lang['delete'] = 'eliminar';
$lang['download'] = 'descargar';
$lang['delete_link'] = 'Eliminar';
$lang['download_link'] = '&iexcl;Descargar ahora!';
$lang['nofiles'] = 'Esta carpeta est&aacute; vac&iacute;a';
$lang['dir'] = 'directorio';
$lang['make'] = 'Crear';

//logging
$lang['DELETE'] = 'ELIMINAR';
$lang['UPLOAD'] = 'ENVIAR';
$lang['DOWNLOAD'] = 'DESCARGAR';
//delete error
$lang['delete_error_notfound'] = "Error: Archivo no encontrado.";
$lang['delete_error_cant'] = "Error: No puedes borrar ese archivo.";
$lang['delete_error_cant_dir'] = "Error: La carpeta no est&aacute; vacia, borra sus elementos primero.";
//upload error
$lang['upload_error'] = array(1 => "El archivo subido excede la directiva upload_max_filesize en php.ini",
	2 => "El archivo subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.",
	3 => "El archivo ha sido enviado parcialmente.",
	4 => "No fue enviado ning&uacute;n archivo.",
	6 => "Falta una carpeta temporal.");

                               
$lang['upload_error_sizelimit'] = "El tamaño del archivo es superior al l&iacute;mite permitido";
$lang['upload_error_fileexist'] = "existe en el directorio de almacenamiento.";
$lang['upload_error_nocopy'] = "Incapaz de copiar el archivo en el directorio de almacenamiento.";
$lang['upload_error_sid'] = "No encuentro el archivo especificado.";
$lang['make_error_exist'] = "&iexcl;Esa carpeta ya existe!";
$lang['make_error_cant'] = "&iexcl;No puedo crear esa carpeta!.";
$lang['make_error_maxdepth']= "Lo siento, has sobrepasado el l&iacute;mite de profundidad de subcarpetas.";
?>
