<?php
//portuguese localization
//thanks to MAJESTICSKULL ;)

//msg
$lang['warning_msg'] = "Eu n&atilde;o sou respons&aacute;vel pelos arquivos. Download por sua conta e risco!";
$lang['delete_confirm_msg'] = "Voc&ecirc; tem certeza que quer deletar este arquivo?";
//upload form
$lang['upload'] = 'Upload';
$lang['file'] = 'Arquivo';
$lang['renameto'] = 'Renomear p/';
$lang['filetypesallowed'] = 'Formatos de arquivo suportados';
$lang['filesizelimit'] = 'Tamanho m&aacute;ximo de arquivo';
$lang['filedeleteafter'] = 'arquivos ser&atilde;o automaticamente deletados em {D} dias depois de fazer o upload';
//listing heading
$lang['filename'] = 'arquivo';
$lang['date'] = 'data';
$lang['date_format'] = 'd-m-Y H:i';
$lang['type'] = 'tipo';
$lang['size'] = 'tamanho';
$lang['delete'] = 'deletar';
$lang['download'] = 'download';
$lang['delete_link'] = 'deletar';
$lang['download_link'] = 'Fazer Download!';
$lang['nofiles'] = 'o diret&oacute;rio est&aacute; vazio...';
$lang['dir'] = 'Diret&oacute;rio';
$lang['make'] = 'Criar';


//logging
$lang['DELETE'] = 'DELETE';
$lang['UPLOAD'] = 'UPLOAD';
$lang['DOWNLOAD'] = 'DOWNLD';
//delete error
$lang['delete_error_notfound'] = "Erro: arquivo n&atilde;o encontrado.";
$lang['delete_error_cant'] = "Erro: arquivo n&atilde;o pode ser deletado.";
$lang['delete_error_cant_dir'] = "Erro: a pasta n&atilde;o est&aacute; vazia.";
//upload error
$lang['upload_error'] = array(1 => "O arquivo enviado excede o tamanho m&aacute;ximo do upload_max_filesize no php.ini",
							  2 => "O arquivo excede o tamanho m&aacute;ximo do MAX_FILE_SIZE especificado logo abaixo do formul&aacute;rio.",
						 	  3 => "O arquivo foi apenas parcialmente carregado",
						 	  4 => "Nenhum arquivo carregado",
						 	  6 => "Faltando pasta tempor&aacute;ria.");

						 	  
$lang['upload_error_sizelimit'] = "Tamanho do arquivo &eacute; maior que o tamanho limite";
$lang['upload_error_fileexist'] = "J&aacute; existe no diret&oacute;rio de armazenamento.";
$lang['upload_error_nocopy'] = "N&atilde;o &eacute; poss&iacute;vel copiar o arquivo para o diret&oacute;rio de armazenamento.";
$lang['upload_error_sid'] = "Incapaz de encontrar o arquivo especificado";
$lang['upload_error_badext'] = "Extenç&atilde;o n&atilde;o suportada!";
$lang['make_error_exist'] = "Diret&oacute;rio j&aacute; existe!";
$lang['make_error_cant'] = "Incapaz de criar diret&oacute;rio";
$lang['make_error_maxdepth']= "Voc&ecirc; n&atilde;o pode criar uma nova pasta dentro deste diret&oacute;rio.";
?>