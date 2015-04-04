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

function installeeEntry() {

?>
    <p> Please fill in the following information if you wish to have 
      Linux or FreeBSD installed or configured on your PC as part of the 
      installfest.  Your name and email address are compulsory, as is the 
      question at the end.  All information provided will be kept 
      confidential, and email addresses provided will not be given to 
      any third party.  You needn't worry about SPAM, because we hate it 
      more than you! </p> 
    <p> If you have trouble filling in this form, please contact one of the
      people listed <a href="index.php#Contact">here</a>. </p>

    <form action="register.php" method="POST">
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
            <b>I want someone to</b>
          </td>
          <td>
            <select NAME=dowhat>
            <option selected>install Linux for me.
            <option>help me configure my Linux box.
            <option>install FreeBSD for me.
            <option>help me configure my FreeBSD box.
            </select>
          </td>
        </tr>

        <tr>
          <td>
            <br>
          </td>
          <td>
            If you selected <i>"I want someone to help me configure my 
            Linux/FreeBSD box"</i>, tell us what you need help in 
            configuring:
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;
          </td>
          <td>
            If you selected <i>"I want someone to install Linux/FreeBSD 
            for me"</i>, and you have any special instructions, write 
            them here:
          </td>
        </tr>

        <tr>
          <td align="right">
            &nbsp;
          </td>
          <td>
            <input type="text" name="whatinfo" maxlength="80" size="80">
          </td>
        </tr>
        <tr>
          <td align="right">
            <b>Computer:</b>
          </td>
          <td>
            <select NAME=computer size=1>
            <option selected>I Do Not Know What My Computer Is
            <option>486 or clone
            <option>Pentium/Pentium Pro/586/686/K6-II/K6-III
            <option>Pentium II/Pentium III/Athlon
            <option>Macintosh
            <option>PowerPC Macintosh
            <option>G3 Macintosh
            <option>Sun Workstation
            <option>Alpha Workstation
            </select>
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>RAM:</b>
          </td>
          <td>
            <select NAME=ram size=1>
            <option selected>I Do Not Know How Much RAM
            <option>Less than 8MB RAM
            <option>At least 8Mb and less than 64MB RAM
            <option>64MB of RAM or more
            </select>
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>Devices:</b>
          </td>
          <td>
            <input type=checkbox name=floppy value=floppy>
            3.5" Floppy Disk Drive
          </td>
        </tr>

        <tr>
          <td>
            &nbsp;
          </td>
          <td>
            <input type=checkbox name=cdrom value=cdrom>
            CD-ROM Drive
          </td>
        </tr>
        <tr>
          <td>
            &nbsp;
          </td>
          <td>
            <input type=checkbox name=networkcard value=networkcard>
            Network Card
          </td>
        </tr>

        <tr>
          <td>
            &nbsp;
          </td>
          <td>
            <input type=checkbox name=zipdrive value=zipdrive>
            Zip Drive
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>Graphics Card:</b>
          </td>
          <td>
            <input type="text" name="vga" maxlength="25" size="25">
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>Printer: (if bringing)</b>
          </td>
          <td>
            <input type="text" name="printer" maxlength="25" size="25">
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>Modem: (if known)</b>
          </td>
          <td>
            <input type="text" name="modem" maxlength="25" size="25">
          </td>
        </tr>

        <tr>
          <td colspan=2>
            <br>
            On the day you will be required to sign a waiver indicating that
            you will not hold LinuxSA or AUUG or any individual, responsible 
            for any loss you may suffer.  This is a condition for receiving
            assistance from us.  Do you accept this?
          </td>
        </tr>

        <tr>
          <td>
            <input type="radio" name="AcceptRightsWaiver" value="yes">
            <b>Yes</b>
          </td>
          <td>
            <input type="radio" name="AcceptRightsWaiver" value="no" checked>
            <b>No</b><br>
          </td>
        </tr>

        <tr>
          <td align="right">
            <b>I want to register for:</b>
          </td>
          <td>
            <input type="SUBMIT" name="registerinstallee" value="Installfest2001">
          </td>
        </tr>

      </table>

    </form>

<?
}

function registerInstallee() {
	global $firstname;
	global $lastname;
	global $emailaddress;
	global $AcceptRightsWaiver;
	global $dowhat;
	global $whatinfo;
	global $computer;
	global $ram;
	global $floppy;
	global $cdrom;
	global $networkcard;
	global $zipdrive;
	global $vga;
	global $printer;
	global $modem;
	global $registerinstallee;
	if ((!$firstname) || (!$lastname) || (!$emailaddress) || 
        	($AcceptRightsWaiver != "yes")) {

		echo "<h1>Sorry Unacceptable - </h1>\n";
		echo "<br>\n";
		if (!$firstname) 
			echo "You need to supply your first name<br>\n";      
		if (!$lastname) 
			echo "You need to supply your last name<br>\n";      
		if (!$emailaddress) 
			echo "You need to supply your email address<br>\n";
		if ($AcceptRightsWaiver != "yes") 
			echo "You need to accept the waiver to be part of installfest.<br>\n";

		echo "If this isn't acceptable, sorry, we can't help you.<br>\n"; 
		echo "<br>\n";
		echo "Hit back on your browser window to re-enter data.\n";
	} else {

		# Required fields have been entered

		global $DEBUG_LEVEL;
		if ($DEBUG_LEVEL >= 8) {
			echo "Installee debug information<br>\n";

			echo "&nbsp;&nbsp;&nbsp;&nbsp;firstname : $firstname<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;lastname : $lastname<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;emailaddress : $emailaddress<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;dowhat : $dowhat<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;whatinfo : $whatinfo<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;computer : $computer<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;ram : $ram<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;floppy : $floppy<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;cdrom : $cdrom<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;networkcard : $networkcard<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;zipdrive : $zipdrive<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;vga : $vga<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;printer : $printer<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;modem : $modem<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;AcceptRightsWaiver : $AcceptRightsWaiver<br>\n";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;registerinstallee : $registerinstallee<br>\n";
		}

		# Now put this in the database
		@$connection = getdbconn();

		if (!$connection) {
			echo "Whoops! an error occured.  Sorry.\n";
		}

		$firstname = addslashes($firstname);
		$lastname = addslashes($lastname);
		$emailaddress = addslashes($emailaddress);
		$AcceptRightsWaiver = addslashes($AcceptRightsWaiver);
		$dowhat = addslashes($dowhat);
		$whatinfo = addslashes($whatinfo);
		$computer = addslashes($computer);
		$ram = addslashes($ram);
		$floppy = addslashes($floppy);
		$cdrom = addslashes($cdrom);
		$networkcard = addslashes($networkcard);
		$zipdrive = addslashes($zipdrive);
		$vga = addslashes($vga);
		$printer = addslashes($printer);
		$modem = addslashes($modem);
		$sql = "INSERT INTO installees (firstname, lastname, email, ewaiver, paperwaiver, description) VALUES ('$firstname', '$lastname', '$emailaddress', '$AcceptRightsWaiver', 'FALSE', '$dowhat ( $whatinfo ) $computer $ram $floppy $cdrom $networkcard $zipdrive $vga $printer $modem');";

		@$result = pg_exec ($connection, $sql);

		if (!$result) {
			echo "<H1>Error - Could not register installee";
			echo " - data lost.</H1><p>";
			echo "Please click ";
			echo "<a href=register.php>here</a>";
			echo " to reload this page, or your browser's Back key to try again.";
		} else {
			echo "<h1>Congratulations... You have now been registered as an installee for installfest 2001</h1>";
			echo "You may be emailed to confirm your registration<br>\n";
			echo "Please click ";
			echo "<a href=index.php>here</a>";
			echo " to return to the installfest web page.<BR><BR><BR><BR><BR><BR><BR>";
		}
		closedbconn();
	}

}

function registerpage() {
//	echo "<img src='img/nil.gif' alt='just spacing' height=10>\n";
	echo "<h1>Welcome to the registration page...</h1>\n";

	global $registerinstallee;
	if ($registerinstallee) {
		registerInstallee();
	} else {
		installeeEntry();
	}

}

display("sidebar", "registerpage"); 

?>

