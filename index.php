<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
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

include "vars.inc";
include "colours.inc";
include "common.inc"; 
include "fest.inc"; 
include "festtemplate.inc"; 

function mainpage() {

?>
			<BR><BR>
<H1 ALIGN=CENTER>The InstallFest has been and gone -- thank you to those who participated.</H1>
<H1 ALIGN=CENTER>Photos from the InstallFest now available <A HREF="/meetings/installfest2001-images/">here</A>.</H1>

			<CENTER>
			<TABLE WIDTH="70%" BORDER="0" CELLSPACING="0" CELLPADDING="5">
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Date</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">Saturday August 25.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Time</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">10:00am - 4:00pm.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Where</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">The cafe at UniSA's Magill Campus.<BR>Building A on <A HREF="http://www.unisa.edu.au/maps/magillmap.htm">this map</A>.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Bring</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">Your computer, monitor, keyboard, mouse, power cables, network cables (if applicable), and anything else that you regularly plug into your computer.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Win</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">Door prizes of O'Reilly books, kindly supplied by <A HREF="http://www.oreilly.com">O'Reilly and Associates</A>.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">RSVP</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">Please <A HREF="register.php">register here</A>.</FONT></TD></TR>
				<TR><TD WIDTH="70" BGCOLOR="#000000"><FONT FACE="helvetica, arial, sans" SIZE="+1" COLOR="#FFFFFF">Cost</FONT></TD>
					<TD><FONT FACE="helvetica, arial, sans" SIZE="+1">Free.</FONT></TD></TR>
			</TABLE>
			<BR><BR>
			<IMG SRC="img/binary.gif">
                        <BR><BR>
			</CENTER>
<?
	display_sponsors();
?>
			<BR><BR>
<?
}

display("sidebar", "mainpage"); 

?>

