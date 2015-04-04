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
include "connmgr.inc";

function helperEntry() {

?>

	<h1> Help Others Installing or Configuring Linux. </h1>
	<p> Please fill in the following information if you wish to help
	out at the installfest either installing or configuring 
	Linux/FreeBSD on other people's PCs. </p>
	<p> Note that we expect you to be just as careful with other people's
	machines as you would be with your own. </p>
	<p> If you have trouble filling in this form, please contact one of the
	people listed <a href="index.php#Contact">here</a>. </p>

	<form action="helpers-register.php" method="POST">
		<table border="0" cols="2">
			<tr>
				<td width="100" align="right">
					<b>First Name:</b>
				</td>
				<td>
					<input type="text" name="firstname" maxlength="25" size="25">
					<font size="-2">(compulsory)</font>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>Last Name:</b>
				</td>
				<td>
					<input type="text" name="lastname" maxlength="25" size="25">
					<font size="-2">(compulsory)</font>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>Email Address:</b>
				</td>
				<td>
					<input type="text" name="emailaddress" maxlength="50" size="50">
					<font size="-2">(compulsory)</font>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>I can help:</b>
				</td>
				<td>
					<select NAME=offering size=1>
						<option selected>Installing Linux
						<option>Configuring Linux
						<option>Both installing and configuring Linux
						<option>Installing FreeBSD
						<option>Configuring FreeBSD
						<option>Both installing and configuring FreeBSD
						<option>I can Install/Configure Linux/FreeBSD
						<option>on the day, running around doing non-technical stuff
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">
					<b> If you can help installing, what can you comfortably install? </b>
				</td>
				<td>
					<input type="text" name="install" maxlength="75" size="75">
				</td>
			</tr>
			<tr>
				<td align="right">
					<b> If you can help configure, what can you comfortably configure? </b>
				</td>
				<td>
					<input type="text" name="configure" maxlength="75" size="75">
				</td>
			</tr>
			<tr>
				<td align="right">
					<b>I want to help out at:</b>
				</td>
				<td>
					<input type="SUBMIT" name="registerhelper" value="Installfest2001">
				</td>
			</tr>
		</table>
	</form>
<?
}


function registerHelper() {

	global $firstname;
	global $lastname;
	global $emailaddress;
	global $offering;
	global $install;
	global $configure;
	global $registerhelper;
	# Now check the compulsory fields
	if ((!$firstname) || (!$lastname) || (!$emailaddress)) {
		echo "<h1>Sorry Unacceptable - </h1>\n";
		echo "<br>\n";
		if (!$firstname) 
			echo "You need to supply your first name<br>\n";      
		if (!$lastname) 
			echo "You need to supply your last name<br>\n";      
		if (!$emailaddress) 
			echo "You need to supply your email address<br>\n";
	
		echo "If this isn't acceptable, sorry, you can't help us :-(<br>\n"; 
		echo "<br>\n";
		echo "Hit back on your browser window to re-enter data.\n";
	} else {
		#echo "We're handling an installer<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;firstname : $firstname<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;lastname : $lastname<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;emailaddress : $emailaddress<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;offering : $offering<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;install : $install<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;configure : $configure<br>\n";
		#echo "&nbsp;&nbsp;&nbsp;&nbsp;installer : $installer<br>\n";

		# Now put this in the database
		@$connection = getdbconn();

		if (!$connection) {
			echo "Whoops! an error occured.  Sorry.\n";
		}
		$firstname = addslashes($firstname);
		$lastname = addslashes($lastname);
		$emailaddress = addslashes($emailaddress);
		$offering = addslashes($offering);
		$install = addslashes($install);
		$configure = addslashes($configure);
		$sql = "insert into helpers (firstname, lastname, email, offering, install, configure, confirmed, installer_here) VALUES ('$firstname', '$lastname', '$emailaddress', '$offering', '$install', '$configure', 'FALSE', 'FALSE');";
		
		@$result = pg_exec ($connection, $sql);

		if (!$result) {
			echo "<H1>Error - Could not register helper";
			echo " - data lost.</H1><p>";
			echo "Please click ";
			echo "<a href=register-helpers.php>here</a>";
			echo " to reload this page, or your browser's Back key to try again.";
		} else {
			echo "<h1>Congratulations... You have now been registered as a helper for installfest 2001</h1>";
			echo "You may be emailed to confirm your registration<br>\n";
			echo "Please click ";
			echo "<a href=index.php>here</a>";
			echo " to reload the installfest web page.";
		}
		closedbconn();
	}

}


function helperspage() {

	global $registerhelper;
	if ($registerhelper) {
		registerHelper();
	} else {
		helperEntry();
	}
}

display("sidebar", "helperspage"); 

?>

