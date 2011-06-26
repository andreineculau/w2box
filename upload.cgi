#!/usr/bin/perl
#!c:/perl/bin/Perl.exe
# if you're using windows, you should remove the first line
#
# PHP File Uploader with progress bar Version 2.0
# Copyright (C) Raditha Dissanyake 2003
# http://www.raditha.com
# Changed for use with AJAX by Tomas Larsson
# http://tomas.epineer.se/
# Changed for use in w2box by Clem in 2006
# http://labs.beffa.org/w2box/

# Licence:
# The contents of this file are subject to the Mozilla Public
# License Version 1.1 (the "License"); you may not use this file
# except in compliance with the License. You may obtain a copy of
# the License at http://www.mozilla.org/MPL/
# 
# Software distributed under this License is distributed on an "AS
# IS" basis, WITHOUT WARRANTY OF ANY KIND, either express or
# implied. See the License for the specific language governing
# rights and limitations under the License.
# 
# The Initial Developer of the Original Code is Raditha Dissanayake.
# Portions created by Raditha are Copyright (C) 2003
# Raditha Dissanayake. All Rights Reserved.
# 

# CHANGES:
# As of version 1.00 cookies were abolished!
# as of version 1.02 stdin is no longer set to non blocking.
# 1.40 - POST is no longer required and processing is more efficient.
#	Please refer online docs  for details.
# 1.42 - The temporary locations were changed, to make it easier to
#	clean up afterwards.	
# 1.45.
#   Changed the way in which the file list is passed to the php handler
# 2.0  (2006-03-12) (Tomas Larsson)
#   Changed to work better with AJAX. This meant improved error handling
#	and no forwarding to php page after successful upload. Also moved settings
#	in to this file.
# 3.0 Fixed for windows + some modif for w2box
# 3.0.1 correct chmoding of the file and cleaning of temp file if the script is aborted
# 3.0.2 correct redirection
# 3.0.3 corrected redirection again

#############
# SETTINGS! #
#############

# set this to your tmp path, you can use this or a full path like the line afterward
$tmp_dir= "tmp"; 
#$tmp_dir= "/home/username/tmp";
#$tmp_dir= "~/tmp";
#$tmp_dir= "C:/wamp/tmp";

#############
# /SETTINGS #
#############
use CGI;
use Fcntl qw(:DEFAULT :flock);
use File::Temp qw/ tempfile tempdir /;
#use Carp;
$high_max_upload = 524288000; #it will be change by params

@qstring=split(/&/,$ENV{'QUERY_STRING'});
@p1 = split(/=/,$qstring[0]);
$sessionid = $p1[1];
$sessionid =~ s/[^a-zA-Z0-9]//g;  # sanitized as suggested by Terrence Johnson.

@p1 = split(/=/,$qstring[1]);
$max_upload = $p1[1];
$max_upload =~ s/[^0-9]//g;  # sanitized
if ($max_upload > $high_max_upload) {$max_upload = $high_max_upload;}

if (!$sessionid) {
	print "Content-type: text/html\n\n";
	if (-e $tmp_dir && -d $tmp_dir)
	{ 
		print "CGI Working\n";
	} else
	{
		print "The tmp directory doesn't exist. Please correct upload.cgi!\n";
	}
	
	exit;
}

# don't change the next few lines unless you have a very good reason to.
$post_data_file = "$tmp_dir/$sessionid"."_postdata";
$monitor_file = "$tmp_dir/$sessionid"."_flength";
$error_file = "$tmp_dir/$sessionid"."_err";
$signal_file = "$tmp_dir/$sessionid"."_signal";
$qstring_file = "$tmp_dir/$sessionid"."_qstring";

#require("./header.cgi");

#carp "$post_data_file and $monitor_file";

$content_type = $ENV{'CONTENT_TYPE'};
$len = $ENV{'CONTENT_LENGTH'};
$bRead=0;
$|=1;

sub bye_bye {
	$mes = shift;
	$mes =~ s/'/\\'/g;
	# Try to open error file to output message too
	$err_ok = open (ERRFILE,">", $error_file);
	if($err_ok) {
		print ERRFILE $mes; #write message to file, so can be read from fileprogress.php
		close (ERRFILE);
	} else {
		# can't write error file. output alert directly to client
		print "Content-type: text/html\n\n";
		print "<script>alert('".$mes."');parent.location = '?error';</script>\n";
	}
	exit;
}


# see if we are within the allowed limit.

if($len > $max_upload)
{
	close (STDIN);
	bye_bye("The maximum upload size has been exceeded");
}


#
# The thing to watch out for is file locking. Only
# one thread may open a file for writing at any given time.
# 

if (-e "$post_data_file") {
	unlink("$post_data_file");
}

if (-e "$monitor_file") {
	unlink("$monitor_file");
}


sysopen(FH, $monitor_file, O_RDWR | O_CREAT)
	or &bye_bye ("Can't open numfile: $!");

# autoflush FH
$ofh = select(FH); $| = 1; select ($ofh);
flock(FH, LOCK_EX)
	or  &bye_bye ("Can't write-lock numfile: $!");
seek(FH, 0, 0)
	or &bye_bye ("Can't rewind numfile : $!");
print FH $len;	
close(FH);	
	
sleep(1);


open(TMP,">","$post_data_file") or &bye_bye ("Can't open temp file");
binmode TMP; 

#
# read and store the raw post data on a temporary file so that we can
# pass it though to a CGI instance later on.
#



my $i=0;

$ofh = select(TMP); $| = 1; select ($ofh);
			
while (read (STDIN ,$LINE, 4096) && $bRead < $len )
{
	$bRead += length $LINE;
	
	#select(undef, undef, undef,0.35);	# sleep for 0.35 of a second.
	
	# Many thanx to Patrick Knoell who came up with the optimized value for
	# the duration of the sleep

	$i++;
	print TMP $LINE;
}

close (TMP);

#
# We don't want to decode the post data ourselves. That's like
# reinventing the wheel. If we handle the post data with the perl
# CGI module that means the PHP script does not get access to the
# files, but there is a way around this.
#
# We can ask the CGI module to save the files, then we can pass
# these filenames to the PHP script. In other words instead of
# giving the raw post data (which contains the 'bodies' of the
# files), we just send a list of file names.
#

open(STDIN,"$post_data_file") or &bye_bye("Can't open temp file");

my $cg = new CGI();
my $qstring="";
my %vars = $cg->Vars;
my $j=0;

while(($key,$value) = each %vars)
{
 	
	$file_upload = $cg->param($key);

	if(defined $value && $value ne '')
	{	

		my $fh = $cg->upload($key);
		if(defined $fh)
		{
			#carp $fh;
			($tmp_fh, $tmp_filename) = tempfile(DIR => $tmp_dir);
			
			binmode $tmp_fh;
			while(<$fh>) {
				print $tmp_fh $_;
			}

			close($tmp_fh);
			chmod 0644, $tmp_filename;
			
			$fsize =(-s $fh);

			$fh =~ s/([^a-zA-Z0-9_\-.])/uc sprintf("%%%02x",ord($1))/eg;
			$tmp_filename =~ s/([^a-zA-Z0-9_\-.])/uc sprintf("%%%02x",ord($1))/eg;
			$qstring .= "file[name][$j]=$fh&file[size][$j]=$fsize&";
			$qstring .= "file[tmp_name][$j]=$tmp_filename&";
			$j++;
		}
		else
		{
			$value =~ s/([^a-zA-Z0-9_\-.])/uc sprintf("%%%02x",ord($1))/eg;
			$qstring .= "$key=$value&" ;
		}
	}
}

open (QSTR,">", "$qstring_file") or &bye_bye ("Can't open output file");
print QSTR $qstring;
close (QSTR);

open (SIGNAL,">", $signal_file) or &bye_bye ("Can't open signal file");
print SIGNAL "\n";
close (SIGNAL);

print "Content-type: text/html\n\n";
print "<html><script>loc = parent.location.href.split('/');parent.location = loc.splice(0,loc.length-1).join('/') + '?sid=".$sessionid."';</script></html>";

END {
	#clean up the mess on abortion
	if (not -e $signal_file){
		if (-e $post_data_file){ unlink($post_data_file); }
		if (-e $monitor_file){ unlink($monitor_file); }
		if (-e $qstring_file){ unlink($qstring_file); }
		if (-e $tmp_filename){ unlink($tmp_filename); }
	}
}