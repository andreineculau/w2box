<?php
// thanks to Juliano Toazza

//msg
$lang['warning_msg'] = "N&atilde;o somos respons&aacute;veis por nenhum arquivo por voc&ecirc; armazenado. Baixe por sua conta e risco.";
$lang['delete_confirm_msg'] = "Tem certeza que deseja deletar o arquivo?";
//upload form
$lang['upload'] = 'Enviar';
$lang['file'] = 'arquivo';
$lang['renameto'] = 'renomear';
$lang['filetypesallowed'] = 'extens&otilde;es permitidas';
$lang['filesizelimit'] = 'tamanho m&aacute;ximo de arquivo';
$lang['filedeleteafter'] = 'Os arquivos ser&atilde;o apagados {D} dias depois de ser enviados';
//listing heading
$lang['filename'] = 'nome do arquivo';
$lang['date'] = 'data';
$lang['date_format'] = 'd-m-y H:i';
$lang['type'] = 'tipo';
$lang['size'] = 'tamanho';
$lang['delete'] = 'apagar';
$lang['download'] = 'baixar';
$lang['delete_link'] = 'Apagar';
$lang['download_link'] = 'Baixar agora!';
$lang['nofiles'] = 'Esta pasta est&aacute; vazia';
$lang['dir'] = 'diret&oacute;rio';
$lang['make'] = 'Criar';

//logging
$lang['DELETE'] = 'APAGAR';
$lang['UPLOAD'] = 'ENVIAR';
$lang['DOWNLOAD'] = 'BAIXAR';
//delete error
$lang['delete_error_notfound'] = "Erro: Arquivo n&atilde;o encontrado.";
$lang['delete_error_cant'] = "Erro: Voc&ecirc; n&atilde;o pode apagar este arquivo.";
$lang['delete_error_cant_dir'] = "Erro: A pasta n&atilde;o est&aacute; vazia, apague seus arquivos primeiro.";
//upload error
$lang['upload_error'] = array(1 => "O arquivo enviado excede a diretiva upload_max_filesize do php.ini",
	2 => "O arquivo enviado excede a diretiva MAX_FILE_SIZE especificada no formulario HTML.",
	3 => "O arquivo foi parcialmente enviado.",
	4 => "N&atilde;o foi enviado nenhum arquivo.",
	6 => "Falta uma pasta tempor&aacute;ria.");

                               
$lang['upload_error_sizelimit'] = "O tamanho do arquivo &eacute; superior ao limite permitido";
$lang['upload_error_fileexist'] = "Ops! Este arquivo j&aacute; existe no diret&oacute;rio de armazenamento.";
$lang['upload_error_nocopy'] = "N&atilde;o foi poss&iacute;vel copiar o arquivo no diret&oacute;rio de armazenamento.";
$lang['upload_error_sid'] = "N&atilde;o foi poss&iacute;vel encontrar o arquivo especificado.";
$lang['make_error_exist'] = "Esta pasta j&aacute; existe!";
$lang['make_error_cant'] = "N&atilde;o foi poss&iacute;vel criar esta pasta!.";
$lang['make_error_maxdepth']= "Ops! Voc&ecirc; ultrapassou o limite de subpastas.";
?>
