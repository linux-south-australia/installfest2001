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

function topnavbar() {
?>
        [ <A HREF="info.php">More Info</A> ] [ <A HREF="register.php">Register</A> ] [ <A HREF="posters.php">Posters</A> ] [ <A HREF="tshirt.php">T-Shirts</A> ] [ <A HREF="helpers.php">Helpers</A> ] [ <A HREF="index.php">Main Page</A> ]
	<!-- Nav bar including image -->
<?
}

function sidenavbar() {
?>

	<!-- Site Navigation -->
        <table cellpadding="0" cellspacing="0" border="0" width="185">  
        	<tr>
			<td><b>Site Navigation</b></td>
		</tr>
                <tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...Register</a></td>
		</tr>
                <tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...T-Shirts</a></td>
		</tr>
                <tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...Australia-wide</a></td>
		</tr>
                <tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...Site-Admin</a></td>
		</tr>
                <tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...Helpers</a></td>
		</tr>
        </table>

<?
}

function howdoi() {
?>

	<!-- How Do I -->
	<table cellpadding="0" cellspacing="0" border="0" width=100%>	
	<!-- <table cellpadding="0" cellspacing="0" border="0" width="185">-->
		<tr>
			<td><i>How Do I...</i></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...configure X?</a></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...install Ximian GNOME?</a></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...delete KDE from my system?</a></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...compile a kernel?</a></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4"><a href="">...join the LinuxSA mailing list?</a></td>
		</tr>
	</table>

<?
}

function linuxwebs() {
?>

	<!-- Linux Web Sites -->
	<table cellpadding="0" cellspacing="0" border="0" width=100%> 
	<!-- <table cellpadding="0" cellspacing="0" border="0"> -->
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://www.linuxsa.org.au">LinuxSA</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://www.linux.org.au">Linux Australia</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://ldp.org">Linux Documentation Project</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://slashdot.org">slashdot</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://linuxtoday.com">LinuxToday</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://sourceforge.net">SourceFORGE</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://freshmeat.net">freshmeat</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://linux.com">linux.com</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://gnu.org">GNU</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://opensource.org">opensource.org</A></td>
		</tr>
		<tr>
			<td><img src="img/nil.gif" alt="just spacing" width="16" height="4">o <A href="http://freebsd.org">freebsd.org</A></td>
		</tr>
	</table>

<?
}

function disp_sponsor($link, $image, $alt){
	echo "<td><center><font size=\"-1\"><a href=\"$link\"><img src=\"$image\" alt=\"$alt\" border=0>";
        echo "<br>$alt</a></font></center></td>\n";
}

function display_sponsors() {

	echo "<center>\n";
	echo "Major Sponsors<BR>\n";
	echo "<table border=\"0\" cellpadding=\"10\">\n<tr><td>\n";

#	echo "2001 Major Sponsor<br><br>\n";
#	disp_sponsor("http://www.linuxsa.org.au", 
#		"img/sponsors/company.gif",
#		"Your Company Name Here");
#	echo "<br><br><br>2001 Minor Sponsors<br><br>\n";
	disp_sponsor("http://www.auug.org.au", 
		"img/sponsors/logo-auug.gif",
		"AUUG");
	disp_sponsor("http://www.netcraft.com.au", 
		"img/sponsors/logo-netcraft.gif",
		"NetCraft");
	disp_sponsor("http://www.valhalla.net.au",
		"img/sponsors/logo-valhalla.gif",
		"Valhalla");
	disp_sponsor("http://www.unisa.edu.au",
		"img/sponsors/logo-unisa.gif",
		"UniSA");
	echo "</td></tr></table>\n";

	echo "Other Sponsors<BR>\n";
	echo "<table border=\"0\" cellpadding=\"10\">\n<tr><td>\n";

	disp_sponsor("http://www.everythinglinux.com.au",
		"img/sponsors/logo-everythinglinux.gif",
		"Everything Linux");
	disp_sponsor("http://www.leadersystems.com.au",
		"img/sponsors/logo-leader.gif",
		"Leader Computers");
	disp_sponsor("http://www.mandrake.com",
		"img/sponsors/logo-mandrake.png",
		"Mandrake");
	disp_sponsor("http://www.oreilly.com",
		"img/sponsors/logo-oreilly.gif",
		"O'Reilly");
	disp_sponsor("http://www.ximian.com",
		"img/sponsors/logo-ximian.png",
		"Ximian");
	echo "</td></tr></table>\n";

	echo "</center>\n";

}

?>
