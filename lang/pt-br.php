<?php
/* 
  w2box: web 2.0 File Repository v4.0 Beta5
  
  (c) 2005-2007, Clément Beffa
  http://labs.beffa.org/w2box/
 
  TRADUSIDO PARA O PORTUGUÊS BRASIL POR ÉDER FÁBIO
  MSN: konago_nippon@hotmail.com
  Websites: 
  http://www.geralgames.com.br
  http://www.forum-playstation.com
  

  Licence:
  w2box is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0
  http://creativecommons.org/licenses/by-nc-sa/3.0/
 
  You are free:
    * to Share — to copy, distribute and transmit the work
    * to Remix — to adapt the work

  Under the following conditions:
    * Attribution. You must attribute the work in the manner specified by the author or
      licensor (but not in any way that suggests that they endorse you or your use of the work).
    * Noncommercial. You may not use this work for commercial purposes.
    * Share Alike. If you alter, transform, or build upon this work, you may distribute
      the resulting work only under the same or similar license to this one.

  For any reuse or distribution, you must make clear to others the license terms of this work.
  Any of the above conditions can be waived if you get permission from the copyright holder.
  Nothing in this license impairs or restricts the author's moral rights.
*/
$lang['warning_msg'] = "Não nos responsabilizamos pelo upload e download dos arquivos.";
$lang['delete_confirm_msg'] = "Você realmente deseja deletar este arquivo?";
//upload form
$lang['upload'] = 'Enviar';
$lang['file'] = 'arquivo';
$lang['renameto'] = 'renomear';
$lang['filetypesallowed'] = 'extensões permitidas';
$lang['filesizelimit'] = 'limite de tamanho máximo do arquivo para envio';
$lang['filedeleteafter'] = 'Os arquivos serão elimidados em {D} depois de serem enviados';
$lang['filename'] = 'nome do arquivo';
$lang['date'] = 'Data e Hora';
$lang['date_format'] = 'd-m-Y H:i';
$lang['type'] = 'tipo';
$lang['size'] = 'tamanho';
$lang['delete'] = 'eliminar';
$lang['download'] = 'baixar';
$lang['delete_link'] = 'Eliminar';
$lang['download_link'] = 'baixar agora!';
$lang['nofiles'] = 'Está pasta está vazia';
$lang['dir'] = 'diretório';
$lang['make'] = 'Criar';

//logging
$lang['DELETE'] = 'ELIMINAR';
$lang['UPLOAD'] = 'ENVIAR';
$lang['DOWNLOAD'] = 'Baixar';
//delete error
$lang['delete_error_notfound'] = "Erro: Arquivo não encontrado.";
$lang['delete_error_cant'] = "Erro: Você não pode deletar este arquivo.";
$lang['delete_error_cant_dir'] = "Erro: A pasta não está vazia, você deverá deletar todos os arquivos antes de deletar a pasta.";
//upload error
$lang['upload_error'] = array(1 => "O arquivo que você está tentando enviar excede o tamanho máximo permitido de upload_max_filesize no php.ini",
	2 => "O arquivo enviado excedeu o tamanho máximo permitido de MAX_FILE_SIZE especificado no formulário HTML.",
	3 => "O arquivo foi enviado com sucesso.",
	4 => "Não foi possível enviar o arquivo.",
	6 => "Falta uma pasta temporária.");

                               
$lang['upload_error_sizelimit'] = "O tamanho do arquivo é maior que o tamanho permitido";
$lang['upload_error_fileexist'] = "este arquivo já está na pasta.";
$lang['upload_error_nocopy'] = "Não foi possível enviar o arquivo para a pasta.";
$lang['upload_error_sid'] = "Este arquivo não existe.";
$lang['make_error_exist'] = "Este diretório já existe!";
$lang['make_error_cant'] = "Você não pode criar pastas!.";
$lang['make_error_maxdepth']= "O número de subcategorias foi ultrapassado.";
?>
