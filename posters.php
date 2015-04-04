<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<?
#    Installfest Webpage - a php/postgresql/apache instant Linux
#                          installfest web page and database.
#    Copyright (C) 2001 Michael Davies (michaeld@senet.com.au) and Phil Hutton (phil@hutton.sh)
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

function posterpage() {
?>
  <H1>Installfest Posters</H1>
  Get your official Installfest posters here.  Download them, print them out, and stick them up everywhere.
  <UL>
    <LI><A HREF="posters/poster6.pdf">Colour version</A>.  Should work with black and white printers too.
    <LI><A HREF="posters/poster6-bw.pdf">Black & white version</A>.  If the your printer doesn't handle grey
    scales too well, you may want to try this version.
  </UL>

  If you don't have access to a printer, e-mail <A HREF="mailto:phil@hutton.sh">Phil Hutton</A> or
  <A HREF="mailto:sarah@cs.unisa.edu.au">Sarah Bolderoff</A> and we'll organise to get some posters to you.
<?
}

display("sidebar", "posterpage"); 

?>

