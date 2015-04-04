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

function yourpage() {

?>
<BR>
Computer software is a hot topic.  The US Department of Justice has
proceeded against Microsoft for alleged abuse of market power. The man in
the street finds that he has to continually spend money buying and
upgrading expensive software that frequently crashes.  Rumours circulate
about "back doors" in the software which report confidential information
back to the vendor, or which allow the vendor to access any system running
their software.  Even experts get frustrated.
<BR><BR>
Yet people buy the software. Is it stable? Is it cheap?  Is it secure?  
Does it come with a life time of free support and warranty? Is it flexible
and can the user view (or even modify) the source code?  The answer to all
of these questions, is NO.  So why do people buy it?
<BR><BR>
Lack of choice.  Customers are locked into paying for the operating system
and other software when they buy their computer. For the most part, they
are not given the opportunity to do otherwise because of agreements
between the PC manufactures and vendors.  Are the commercial vendors
exploiting their customers?
<BR><BR>
We can't answer that question, but we can propose an alternative. Reliable
software.  Free!  And even with free support.  Does this sound too good to
be true?  No, it's just a well-kept secret.
<BR><BR>
A surprising amount of free software is available and is being used not
only by cost-conscious individuals, but also by big organizations.  The
majority of Internet Service Providers use free software, not commercial
software, to run their operations.  Telstra uses the FreeBSD operating
system for key parts of its Internet infrastructure.  The ACT Electoral
Commission is basing its pilot electronic voting system on free software.
<BR><BR>
In other countries, both the French and German governments have
initiatives supporting free software.  The German lower house of
parliament is considering upgrading its Microsoft-based computer systems
to free software.  The world's largest computer manufacturer, IBM, has
pledged to spend a billion US dollars on free software development.
<BR><BR>
Why are these people interested in free software?  It can't be the money,
though it helps.  The main reasons are different, though: free software is
available in original "source" form, the code in which the programmers
write the programs.  This enables anybody with the requisite knowledge to
solve any bugs which may occur.  It enables them to write improvements to
the software.  It allows people to scrutinize the code and confirm that it
contains no back doors or other security issues.  As a consequence of this
scrutiny, the software is also more reliable.  This crucial aspect of free
software has led to the term "open source".  Users of free operating
systems often don't reboot their machines for months on end, and it's very
rare to hear of a software-provoked crash.
<BR><BR>
Who are the players in the free software movement?  The original incentive
came from the aptly named Free Software Foundation.  Later the members of
the UNIX development team at the University of California in Berkeley made
their version of UNIX freely available under the name BSD.  At the same
time, a group of people around Linus Torvalds, at the time a student in
Finland, created a UNIX-like operating system called Linux.  In addition,
a number of other projects have grown up over the last ten years, such as
the Apache project, which maintains the world's most popular web server
software and SAMBA, an Australian grown project that is now used all over
the world for network file sharing with Microsoft computers.
<BR><BR>
Does this sound interesting?  Come and see for yourself at the LinuxSA and
AUUG Installfest on 25 August at the University of South Australia Magill
Campus Cafeteria.
<BR><BR>
Bring your computer along and we'll install your choice of Linux or BSD on
it.  For details, check out the web site www.linuxsa.org.au/installfest
<BR><BR>
<?
}

display("sidebar", "yourpage"); 

?>

