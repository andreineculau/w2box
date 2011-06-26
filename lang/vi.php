<?php
//thanks to kyanh ;)

//msg
$lang['warning_msg'] = "Đây chỉ là repos tạm. Các tập tin sẽ được xét chuyển đến repos chính bởi moderator.";
$lang['delete_confirm_msg'] = "Bạn thật sự muốn xóa tập tin này?";
//upload form
$lang['upload'] = 'tải lên';
$lang['file'] = 'tập tin';
$lang['renameto'] = 'tên mới';
$lang['filetypesallowed'] = 'loại tập tin';
$lang['filesizelimit'] = 'kích thước tối đa';
$lang['filedeleteafter'] = 'các tập tin sẽ được xóa tự động sau <b>{D}</b> ngày';
//listing heading
$lang['filename'] = 'tập tin';
$lang['date'] = 'ngày tháng';
$lang['date_format'] = 'd/m/Y H:i';
$lang['type'] = 'loại';
$lang['size'] = 'cỡ';
$lang['delete'] = 'xóa';
$lang['download'] = 'download';
$lang['delete_link'] = 'Delete';
$lang['download_link'] = 'Tải về!';
$lang['nofiles'] = 'repos chưa có gì cả...';
$lang['dir'] = 'thư mục';
$lang['make'] = 'Make';


//logging
$lang['DELETE'] = 'DELETE';
$lang['UPLOAD'] = 'UPLOAD';
$lang['DOWNLOAD'] = 'DOWNLD';
//delete error
$lang['delete_error_notfound'] = "Error: không tìm thấy tập tin.";
$lang['delete_error_cant'] = "Error: tập tin đã không được xóa.";
$lang['delete_error_cant_dir'] = "Error: thư mục không rỗng.";
//upload error
$lang['upload_error'] = array(1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
							  2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
						 	  3 => "The uploaded file was only partially uploaded.",
						 	  4 => "Tập tin đã không được tải lên.",
						 	  6 => "Thiếu thư mục tạm thời.");

						 	  
$lang['upload_error_sizelimit'] = "Kích thước tập tin vượt quá giới hạn cho phép";
$lang['upload_error_fileexist'] = "Đã có tập tin này trong repos.";
$lang['upload_error_nocopy'] = "Không thể chép tập tin vào repos.";
$lang['upload_error_sid'] = "Không thể tìm thấy tập tin theo yêu cầu chỉ ra.";
$lang['upload_error_badext'] = "Phần mở rộng của tập tin không hợp lệ!";
$lang['make_error_exist'] = "Đã có thư mục này!";
$lang['make_error_cant'] = "Không thể tạo thư mục.";
$lang['make_error_maxdepth']= "You cannot create new folder at this directory depth.";
$lang['repos_size'] = "kích thước repos";
$lang['repos_quota'] = "kích thước tối đa";
$lang['repos_full'] = "repos đã đầy";
?>
