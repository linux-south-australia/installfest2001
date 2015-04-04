<?
#    Installfest Webpage - a php/postgresql/apache instant Linux
#                          installfest web page and database.
#    Copyright (C) 2001 Michael Davies (michaeld@senet.com.au) & Phil Hutton (phil@hutton.sh)
#
#    This program is free software; you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation; either version 2 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program; if not, write to the Free Software
#    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

function footer() { 
	global $VERSION;
?>

				<center>
					<font size="-2">
						<? echo "Web page version is ", $VERSION, ".&nbsp;&nbsp;"; ?>
						<? copyright_light(); ?>
						<? copyright_details(); ?>
						<? download_details(); ?>
					</font>
				</center>
	
<?
}
?>


<?  function display($thesidebar, $themainpage) {
global $TITLE;
?>
<HTML>
	<HEAD>
		<TITLE>LinuxSA Installfest 2001</TITLE>
		<LINK REL="stylesheet" HREF="style.css" TYPE="text/css">
	</HEAD>
	<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LEFTMARGIN="0" TOPMARGIN="0" marginwidth="0" marginheight="0">
	<FONT FACE="helvetica, arial, sans" SIZE="+1">
	<TABLE WIDTH="100%" COLS="2" CELLSPACING="0" CELLPADDING="0" BORDER="0">
	<TR>
		<TD WIDTH="20" CELLPADDING="0" VALIGN="top"><IMG SRC="img/installfestlong.gif" BORDER="0" VSPACE="0" HSPACE="0"></TD>
		<TD ALIGN="left" VALIGN="top">
		<BR>
		<BR>
		<FONT FACE="helvetica, arial, sans">
			<CENTER>
			<TABLE BORDER="0" WIDTH="580" CELLPADDING="0" CELLSPACING="0">
				<TR><TD>Welcome to the</TD></TR>
				<TR><TD><CENTER><IMG SRC="img/linuxsainstallfest2001.gif"></CENTER></TD></TR>
				<TR><TD ALIGN="right">by AUUG</TD></TR>
			</TABLE>
			<? topnavbar(); ?>
			<!-- Main Content -->
			</CENTER>
			<TABLE WIDTH="100%"><TR><TD>
			<? echo $themainpage(); ?> 
			</TD></TR></TABLE>
		</TD>
	</TR>
	<TR>
	  <TD></TD>
	  <TD><? footer(); ?></TD>
	</TR>
	
	</TABLE>	
	</BODY>
</HTML> 

<?
}
?>
