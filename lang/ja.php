<?php
//thanks to Takayama Logue

//msg
$lang['warning_msg'] = "ここに置かれているファイルに関する責任は一切負いません。利用は自己責任で！";
$lang['delete_confirm_msg'] = "このファイルを削除してもいいですか？";
//upload form
$lang['upload'] = '添付';
$lang['file'] = 'ファイル';
$lang['renameto'] = '名前変更';
$lang['filetypesallowed'] = '添付可能なファイル形式';
$lang['filesizelimit'] = '上限容量';
$lang['filedeleteafter'] = '{D}日経過したファイルは自動的に削除されます。';
//listing heading
$lang['filename'] = 'ファイル名';
$lang['date'] = '日付';
$lang['date_format'] = 'Y-m-d H:i';
$lang['type'] = '種類';
$lang['size'] = '容量';
$lang['delete'] = '削除';
$lang['download'] = 'ダウンロード';
$lang['delete_link'] = '削除';
$lang['download_link'] = 'ダウンロードする';
$lang['nofiles'] = 'ファイルがありません…。';
$lang['dir'] = 'ディレクトリ';
$lang['make'] = '作成';


//logging
$lang['DELETE'] = 'DELETE';
$lang['UPLOAD'] = 'UPLOAD';
$lang['DOWNLOAD'] = 'DOWNLD';
//delete error
$lang['delete_error_notfound'] = "エラー：ファイルが見つかりません。";
$lang['delete_error_cant'] = "エラー：ファイルを削除できません。";
$lang['delete_error_cant_dir'] = "エラー：ディレクトリにファイルが存在します。";
//upload error
$lang['upload_error'] = array(1 => "このファイルは、php.iniで定義されたupload_max_filesizeの値を超過しています。",
							  2 => "このファイルは、HTML上に示されるMAX_FILE_SIZEの値を超過しています。",
						 	  3 => "ファイルは部分的にしかアップロードできませんでした。",
						 	  4 => "ファイルは何もアップロードされていません。",
						 	  6 => "テンポラリフォルダが見つかりませんでした。");

						 	  
$lang['upload_error_sizelimit'] = "ファイルサイズが添付可能な容量の上限を超えています。";
$lang['upload_error_fileexist'] = "ストレージディレクトリにすでに存在します。";
$lang['upload_error_nocopy'] = "ストレージディレクトリにファイルをコピーすることができませんでした。";
$lang['upload_error_sid'] = "指定されたファイルは見つかりませんでした。";
$lang['make_error_exist'] = "ディレクトリはすでに存在します。";
$lang['make_error_cant'] = "ディレクトリの作成に失敗しました。";
$lang['make_error_maxdepth']= "これ以上深い階層のディレクトリを作成することはできません。";
?>