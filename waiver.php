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

function waiver() {

	// Anything you want on the main section of the page.
?>
<CENTER><B>WAIVER</B></CENTER>
<BR><BR>
Please read and sign your Agreement:
<BR><BR>
<B>I acknowledge</B> that I have authorised the Australian Unix and
Open Systems User Group Inc. (AUUG) to install and/or configure on my
computer the Linux or BSD operating systems and associated software.
<BR><BR>
<B>I have</B> backed up all data on my computer and accept that there
may be risks to remaining data upon installation, operation and
removal of these operating systems.
<BR><BR>
<B>I acknowledge</B> that AUUG gives no undertaking to me in respect
of future licence or registration requirements of the software to be
installed.
<BR><BR>
<B>I agree</B> that this voluntary service is given to me free of any
liability on the part of AUUG or its volunteers and without warranty
of merchantability or fitness for any purpose and free, release and
discharge AUUG and its volunteers from any resulting loss or damage.
<BR><BR>
<BR><BR>

Signed as a Deed (Sign) ...............
<BR><BR>

           (Print Name) ...............
<?

}

display("sidebar", "waiver"); 

?>
