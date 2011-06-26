<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>
			<?php echo $config['w2box_title']; ?>
			| powered by w2box
		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . '/w2box.css'; ?>" />
		<script type="text/javascript">
			var ROOT_URL = '<?php echo BASE_URL; ?>';
			var ALLOWED_TYPES = '<?php echo join(".", $config['allowed_ext']); ?>';
			var MAX_FILESIZE = <?php echo $max_filesize; ?>;
			var UPLOAD_SCRIPT = '<?php echo $config['upload_cgiscript']; ?>';
		</script>
		<script type="text/javascript" src="<?php echo js_url('pt.ajax'); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('sorttable'); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('w2box'); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('jquery', $config['jquery_js']); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('jquery/jquery.easing-1.3'); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('jquery/jquery.mousewheel-3.0.2'); ?>">
		</script>
		<script type="text/javascript" src="<?php echo js_url('jquery.fancybox', $config['fancybox_js']); ?>">
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo js_url('jquery.fancybox', $config['fancybox_js'], 'css'); ?>" />
		<script type="text/javascript">
			$(document).ready(function(){
			    $("a.fancybox_image").fancybox({
			        'overlayShow': true,
			        'titlePosition': 'inside',
					'padding':0,
			        'hideOnContentClick': false
			    });
			    $("a.fancybox_video").fancybox({
					'titleShow': false,
					'padding':0,
			        'frameWidth': 775, // width (775) -25
			        'frameHeight': 480,
			        'type': 'swf',
					'swf':{'allowfullscreen':true},
			        'transitionIn': 'none',
			        'transitionOut': 'none',
			        'overlayShow': true,
			        'hideOnContentClick': false,
			        'autoDimensions': false,
			        'autoScale': false
			    });
			    $("a.fancybox_audio").fancybox({
					'titleShow': false,
					'showCloseButton': false,
					'padding':0,
			        'frameWidth': 775, // width (775) -25
			        'frameHeight': 20,
			        'type': 'swf',
			        'transitionIn': 'none',
			        'transitionOut': 'none',
			        'overlayShow': true,
			        'hideOnContentClick': false,
			        'autoDimensions': false,
			        'autoScale': false
			    });
			    $("a.fancybox_gdoc, a.fancybox_viewdocs").fancybox({
					'titleShow': false,
					'padding':0,
			        'frameWidth': 800,
			        'frameHeight': 600,
			        'type': 'iframe',
			        'transitionIn': 'none',
			        'transitionOut': 'none',
			        'overlayShow': true,
			        'hideOnContentClick': false,
			        'autoDimensions': false,
			        'autoScale': false
			    });
			    
			})
		</script>
		<?php if (isset($_REQUEST['preview'])): ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$("a[title=<?php echo $_REQUEST['download']; ?>]").click();
				})
			</script>
		<?php endif; ?>
	</head>
	<body onload="filetypeCheck();">
		<div id="page" class="mainbox">
			<div id="header">
				<h1><a href="<?php echo BASE_URL; ?>"><?php echo $config['w2box_title']; ?></a></h1>
			</div>
			<div id="content">
				<?php if ($config['show_warning']): ?>
				<div id="warningmsg">
					<p>
<?php echo $lang['warning_msg']; ?>
					</p>
				</div>
				<?php endif; ?>
				<?php if (isset($errormsg)): ?>
				<div id="errormsg">
					<p>
<?php echo $errormsg; ?>
					</p>
				</div>
				<?php endif; ?>
				<?php if ($config['enable_folder_maxdepth'] && (!($config['hide_makedir']) || $auth)): ?>
				<div id="makedirform" class="formdiv">
					<form method="post" action="">
						<p>
							<label for="dir">
<?php echo $lang['dir']?>:
							</label>
							<input type="text" id="dir" name="dir" size="50" /><input id="make" type="submit" value="<?php echo $lang['make'] ?>" class="button" />
						</p>
					</form>
				</div>
				<?php 
				endif;
				?>
				<?php if (!($config['hide_upload']) || $auth): ?>
				<div id="uploadform" class="formdiv">
					<?php $sid = md5(uniqid(rand())); //unique file id ?>
					<form method="post" enctype="multipart/form-data" action="index.php">
						<p>
							<label for="file">
<?php echo $lang['file']?>:
							</label>
							<input type="file" id="file" name="file" size="50" onchange="renameSync();"/><input id="upload" type="submit" value="<?php echo $lang['upload'] ?>" class="button"<?php if ($config['upload_progressbar']) echo 'onclick="beginUpload(\'' . $sid . '\');return false;" '; ?>
/>
						</p>
						<p>
							<label for="filename">
<?php echo $lang['renameto']?>:
							</label>
							<input type="text" id="filename" name="filename" onkeyup="filetypeCheck();" size="50" />
						</p>
						<p class="small">
							<span id="allowed"><?php echo $lang['filetypesallowed']?>: <?php echo join(",", $config['allowed_ext']); ?></span>
							<br/>
<?php echo $lang['filesizelimit']?>: <?php echo getfilesize($max_filesize); ?>
							<?php if ($config['delete_after']) echo '<br />' . str_replace("{D}", $config['delete_after'], $lang['filedeleteafter']); ?>
						</p>
					</form>
					<?php 
					#Progress
					if ($config['upload_progressbar'])
					{
						
					?>
					<div id="upload_pb" style="display: none;">
						<p>
							Uploading <span id="upload_filename"></span>...
						</p>
						<div id="upload_border">
							<div id="upload_progress">
							</div>
						</div>
					</div>
					<iframe name="upload_iframe" style="border:0;width:0px;height:0px;visibility:hidden;">
					</iframe>
					<?php } ?>
				</div>
				<?php endif; ?>
				<?php
					$path = BASE_URL;
					echo '<div id="dirpath"><a href="' . $path . '">' . $config['w2box_title'] . '</a>';
					if (isset($dir))
					{
						foreach ($dir as $k=>$v)
						{
							$path .= "/$v";
							if (sizeof($dir) == $k + 1)
								echo ' &raquo; ' . $v . ' ';
							else
								echo ' &raquo; <a href="' . $path . '/">' . $v . '</a> ';
								
						}
						/*if (sizeof(dir) > 1)
						{
							echo '<a href="..">(go up)</a>';
						}*/
					}
					echo '</div>';
				?>
				<div id="filelisting">
					<img src="<?php echo BASE_URL; ?>/images/arrow_up.gif" alt="" style="display:none;"/><img src="<?php echo BASE_URL; ?>/images/arrow_down.gif" alt="" style="display:none;"/>
					<table id="filelisting_table" class="sortable">
						<tr>
							<th id="th1" class="lefted">
								<?php echo $lang['filename']; ?>
							</th>
							<th id="th2">
								<?php echo $lang['type']; ?>
							</th>
							<th id="th3">
								<?php echo $lang['date']; ?>
							</th>
							<th id="th4">
								<?php echo $lang['size']; ?>
							</th>
							<?php if ($config['count_downloads'] && (!$config['hide_count_downloads'] || $auth)): ?>
								<th id="th5">
									<?php echo $lang['counter'] ? $lang['counter'] : '#'; ?>
								</th>
							<?php endif; ?>
							<?php if (!$config['hide_delete'] || $auth): ?>
								<th id="th6" class="unsortable">
									-
								</th>
							<?php endif; ?>
						</tr>
						<?php
							$files = ls($config['storage_path']);
							$series = array();
							if ( empty($files)): ?>
							<tr>
								<td class="lefted">
									<?php echo $lang['nofiles']; ?>
								</td>
							</tr>
						<?php else : ?>
							<?php while ($file = @array_shift(each($files))): ?>
								<tr class="off" onmouseover="if (this.className!='delete') {this.className='on'};" onmouseout="if (this.className!='delete') {this.className='off'};">
									<td class="lefted">
										<?php 
										$dlink = $file['file'];
										if ($config['utf8encode_directlink'])
										{
											$dlink = utf8_encode($file['file']);
										}
										if ($file['ext'] != "directory")
										{
											$url = BASE_URL . $config['storage_path_relative'] . '/' . urlencode($dlink);
											$inline_url = $url;
											$force_url = $url . '?force';
										} else
										{
											$url = BASE_URL . $config['storage_path_relative'] . '/' . urlencode($dlink) . '/';
										}
										
										$filename = $file['file'];
										$maxlen = 45;
										if ($maxlen > 0 && strlen($file['file']) > $maxlen)
										{
											$filename = substr($file['file'], 0, $maxlen - 3) . "...";
										}
										
										if ($file['ext'] != "directory")
										{
											$class = '';
											$rel = '';
											
											if (preg_match("/\d{6,8}/", $file['file'])){
												$series_name = preg_replace("/[ _]?\d{6,8}[ _]?/", '', basename($file['file'], '.' . extname($file['file'])));
												if (!in_array($series_name, $series)){
													$series[] = $series_name;
													$files[] = array('file' => preg_replace("/\d{6,8}/", '!latest!', $file['file']), 'date' => time(), 'size' => 0, 'ext' => $file['ext'], 'counter' => 0, 'link' => urlencode(preg_replace("/\d{6,8}/", '!latest!', $file['file'])), 'permalink' => $series_name);
												}
											}
											
											if (in_array($file['ext'], $config['fancybox_image']))
											{
												$class = 'fancybox_image';
												$rel = ' rel="image"';
												$inline_url = $url . '?downsize';
												//$inline_url = $url;
											}
											if (in_array($file['ext'], $config['fancybox_video']))
											{
												$class = 'fancybox_video';
												//$inline_url = BASE_URL . '/flv.php?autostart=true&file=' . $url;
												if ($file['ext'] != 'swf')
												{
													$inline_url = 'http://media.dreamhost.com/mp4/player.swf?autostart=true&file=' . $url;
												}
											}
											if (in_array($file['ext'], $config['fancybox_audio']))
											{
												$class = 'fancybox_audio';
												//$inline_url = BASE_URL . '/flv.php?autostart=true&file=' . $url;
												$inline_url = 'http://media.dreamhost.com/mp4/player.swf?autostart=true&file=' . $url;
											}
											/*if (in_array($file['ext'], $config['fancybox_gdoc']) && $ua['msie'] != '8.0')
											{
												$class = 'fancybox_gdoc';
												$inline_url = 'http://docs.google.com/viewer?embedded=true&url=' . $url;
											}*/
											/*if (in_array($file['ext'], $config['fancybox_viewdocs']))
											{
												$class = 'fancybox_viewdocs';
												$inline_url = 'http://www.viewdocsonline.com/view.php?url=' . $url;
											}*/
											if ($class)
											{
												$preview_url = $url . '?preview';
											}
										}
										?>
										<?php if ($file['ext'] != "directory"): ?>
											<?php if ($config['disable_directlink']): ?>
												<span class="sort">1</span>
												<?php if (!$file['permalink']): ?>
													<?php if ($class): ?>
														<a href="<?php echo $preview_url; ?>" class="right" onclick="javascript:alert('Please right-click and copy the link instead.'); return false;">
															<img src="<?php echo BASE_URL; ?>/images/page_link.gif" alt="(<?php echo $lang['preview']; ?>)" title="<?php echo $lang['preview_link']; ?>" />
														</a>
													<?php endif; ?>
													<a href="<?php echo $url; ?>" title="<?php echo $lang['download_link']; ?>" class="left">
														<img src="<?php echo BASE_URL; ?>/images/page_down.gif" alt="(<?php echo $lang['download']; ?>)" title="<?php echo $lang['download_link']; ?>" />
													</a>
													<div class="filename"><a href="<?php echo $inline_url; ?>"<?php if (!$class): ?> target="_blank"<?php endif; ?> title="<?php echo $file['file']; ?>" class="filename left <?php echo $class; ?>"<?php echo $rel; ?>>
														<?php echo $filename; ?>
													</a></div>
												<?php else : ?>
													<a href="<?php echo $url; ?>" class="right" onclick="javascript:alert('Please right-click and copy the link instead.'); return false;">
														<img src="<?php echo BASE_URL; ?>/images/page_link.gif" alt="(<?php echo $lang['permalink']; ?>)" title="<?php echo $lang['permalink_link']; ?>" />
													</a>
													<a href="<?php echo $url; ?>" title="<?php echo $lang['download_link']; ?>" class="left">
														<img src="<?php echo BASE_URL; ?>/images/page_down.gif" alt="(<?php echo $lang['download']; ?>)" title="<?php echo $lang['download_link']; ?>" />
													</a>
													<div class="filename"><a href="<?php echo $url; ?>" target="_blank" title="<?php echo $file['permalink']; ?> [MOST RECENT]" class="filename left <?php echo $class; ?>"<?php echo $rel; ?>>
														<?php echo $file['permalink']; ?>
													</a></div>
												<?php endif; ?>
											<?php else : ?>
												<span class="sort">1</span>
												<img src="<?php echo BASE_URL ?>/images/page_down.png" alt="(<?php echo $lang['download']; ?>)" title="<?php echo $lang['download_link']; ?>" />
												<a href="<?php echo $file['link']; ?>"<?php echo $class; ?>>
													<?php echo str_replace('_', ' ', $file['file']); ?>
												</a>
											<?php endif; ?>
										<?php else : ?>
											<span class="sort">0</span>
											<img src="<?php echo BASE_URL; ?>/images/icons/<?php echo $file['ext']; ?>.png" alt="" />
											<a href="<?php echo $url; ?>">
												<?php echo $filename; ?>
											</a>
										<?php endif; ?>
									</td>
									<td>
										<?php if ($file['ext'] != "directory"): ?>
											<span style="display:block; width:50px; margin:0 auto; text-align:left">
												<img src="<?php echo BASE_URL; ?>/images/icons/<?php echo $file['ext']; ?>.png" />
												<?php echo $file['ext']; ?>
											</span>
										<?php endif; ?>
									</td>
									<td>
										<?php echo date($lang['date_format'], $file['date']); ?>
									</td>
									<td>
										<?php if (!$file['permalink'] && ($file['ext'] != "directory" || $config['dynamic_directory_size'])): ?>
											<?php echo getfilesize($file['size']); ?>
										<?php endif; ?>
									</td>
									<?php if ($config['count_downloads'] && (!$config['hide_count_downloads'] || $auth)): ?>
										<td>
											<?php if (!$file['permalink'] && $file['ext'] != "directory") echo $file['counter']; ?>
										</td>
									<?php endif; ?>
									<?php if (!$config['hide_delete'] || $auth): ?>
										<td>
											<?php if (!$file['permalink']): ?>
												<a onclick="<?php if ($config['confirm_delete']) echo 'if(confirm(\'' . $lang['delete_confirm_msg'] . '\')) '; ?> deletefile(this.parentNode.parentNode); return false;" href="#">
													<img src="<?php echo BASE_URL; ?>/images/delete.png" alt="<?php echo $lang['delete']; ?>" title="<?php echo $lang['delete_link']; ?>" />
												</a>
											<?php endif; ?>
										</td>
									<?php endif; ?>
								</tr>
							<?php endwhile; ?>
						<?php endif; ?>
					</table>
				</div>
			</div>
			<div id="footer">
				<p>
					<a id="hiddenlink" href="<?php echo BASE_URL . $config['storage_path_relative']; ?>/?admin" onmouseover="return true;">Powered</a>
					by <!-- ANDRIE -->a modded <!-- ANDRIE end --><a href="http://labs.beffa.org/w2box/">w2box</a>, using valid <a href="http://validator.w3.org/check/referer">xhtml</a>
					&amp; <a href="http://jigsaw.w3.org/css-validator/check/referer">css</a>.
				</p>
			</div>
		</div>
		<?php if ($config['analytics']): ?>
			<script type="text/javascript">
				var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
				document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
				try {
				    var pageTracker = _gat._getTracker("<?php echo $config['analytics']; ?>");
				    pageTracker._trackPageview();
				} 
				catch (err) {
				}
			</script>
		<?php endif; ?>
	</body>
</html>
