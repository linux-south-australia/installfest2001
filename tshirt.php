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

function tshirtpage() {
 
?>

<h1>Buy An InstallFest T-Shirt!</h1>
Once again the dawning of yet another InstallFest includes the traditional InstallFest T-Shirt. Available on the day, at a cost of $25, 
the design will be available in a number of sizes and in two superbly set colours. 
The all time favourite <B>classic white</B> (as shown below) is sure to keep you in with the crowd. But for those of you that
need a little more colour in your life, there'll be a royal blue version as well.
<P>
If you wish to be guaranteed a T-Shirt, email 
<A HREF="mailto:cisbjc@cs.unisa.edu.au?Subject=INSTALLFEST_TSHIRT_RESERVATION">cisbjc@cs.unisa.edu.au</A>
 with your preferences, including size, colour and quantity.
It's a first in first serve basis so be quick!
<CENTER>
<TABLE BORDER>
<TR>
<TD>
	<CENTER>
	<IMG SRC="tshirt/front.jpg"><BR>
	Front View
</TD>
</TR><TR>
<TD>
	<CENTER>
	<IMG SRC="tshirt/back.jpg"><BR>
	Back View
</TD>
</TR>
</TABLE>
</CENTER>
<?
}

display("sidebar", "tshirtpage"); 

?>

