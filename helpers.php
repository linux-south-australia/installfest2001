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

function processAdminRequests() {

        global $displayminutes;

        if (isset($displayminutes) and ereg("^[0-9]+$", $displayminutes)) {
                $sql = "SELECT * FROM minutes WHERE id = $displayminutes;";
        
		$connection = getdbconn();

                if (!$connection) {
                        echo "Whoops! an error occured connecting to the ";
                        echo "LinuxSA database (for table minutes).  Sorry.\n";
			closedbconn();
                        exit;
                }
                @$result = pg_exec ($connection, $sql);

                if (!$result) {
                        echo "<H1>Error - Problem displaying data in";
                        echo " minutes table</H1><p>";
                        echo "Please click ";
                        echo "<a href=helpers.php>here</a>";
                        echo " to reload this page, or your browser's Bacl key to try again.";
		}

		@$rows = pg_NumRows($result);

		echo "<h1>Meeting minutes titled '",pg_result($result, 0, "title"),"'</h1>";

		echo "<br><br><PRE>";

		echo pg_result($result, 0, "info");

		echo "</PRE><br><br>Now for the regular page...<br><br>";
 
		closedbconn();
	}
}




function displayMinutes() {

	$connection = getdbconn();

	if (!$connection) { 
		echo "Whoops! an error occured.  Sorry.\n";
	}

	$sql = "SELECT * FROM minutes;";

	$result = pg_exec ($connection, $sql);

	$rows = pg_NumRows($result);

	if (!$result) {
		echo "<H1>Error - no minutes items registered!?!</H1><p>\n";
		echo "<!-- Table for centering and squeezing body text -->\n";
		echo "</td>\n";
		echo "</tr>\n";
		echo "</table>\n";
		echo "</center>\n";
		echo "<br>\n";
		echo "<hr width=65%>\n";
		echo "<? footerStd(); ?>\n";
		echo "</body>\n";
		echo "</html>\n";
		exit;
	}

	echo "<center><h1>Installfest Minutes ($rows\n";
	if ($rows == 1) {
		echo " item).</h1></center>\n";
	} else {
		echo " items).</h1></center>\n";
	}

	if ($rows > 0) {
		echo "<form action='helpers.php' method='POST'>\n";
		echo "<center>";
		for ($i=0; $i < $rows; $i++) {
			$id = pg_result($result, $i, "id");
			$title = pg_result($result, $i, "title");
			echo "Display entry with title '$title'<input type='SUBMIT' name='displayminutes' value='$id'>\n";
			echo "<br>";
		}
		echo "</center></form>";
		closedbconn();
	}

}


function dumpToDo() {
	global $DARKGREEN, $WHITE, $FIREBRICK;

	$connection = getdbconn();

        if (!$connection) {
          echo "Whoops! an error occured.  Sorry.\n";
        }

        $sql = "select * from todo;";

        @$result = pg_exec ($connection, $sql);

        @$rows = pg_NumRows($result);

        if (!$result) {
          echo "<H1>Error - no todo items registered!?!</H1><p>\n";
          echo "<!-- Table for centering and squeezing body text -->\n";
          echo "</td>\n";
          echo "</tr>\n";
          echo "</table>\n";
          echo "</center>\n";
          echo "<br>\n";
          echo "<hr width=65%>\n";
          echo "<? footerStd(); ?>\n";
          echo "</body>\n";
          echo "</html>\n";
          exit;
        }

	echo "<center><h1>Installfest TO DO list ($rows\n";
	if ($rows == 1) {
		echo " item).</h1></center>\n";
	} else {
		echo " items).</h1></center>\n";
	}

	if ($rows > 0) {
		echo "<center><table width=80%><tr><td>";
		for ($i=0; $i < $rows; $i++) {
			$id = pg_result($result, $i, "id");
			$name = pg_result($result, $i, "name");
			$email = pg_result($result, $i, "email");
			$text = pg_result($result, $i, "text");
			if (pg_result($result, $i, "completed") == "f") {
				$completed = "NOT COMPLETED";
				$maincolour = $FIREBRICK;
			} else {
				$completed = "COMPLETED";
				$maincolour = $DARKGREEN;
			}

			box ($maincolour, $WHITE, $WHITE, $maincolour, "<table width=100% cols=3><tr><td width=20% align=left><font color=$WHITE>Action Item $id</font></td><td width=50% align=center><font size=-1 color=$WHITE>Submitter: $name ($email)</font></td><td width=30% align=right><font color=$WHITE>$completed</font></td></tr></table>", $text);

		}
		echo "</td></tr></table></center>";
		closedbconn();
	}
}



function helperspage() {

	processAdminRequests();

	echo "<h1>Welcome to the helpers page...</h1>\n";

        echo "This page is for people who would like to help out at the installfest, either by helping to organise the event, or by helping out on the day by installing and/or configuring Linux and/or FreeBSD on other peoples' PCs\n<br><br>\n";
	echo "<ul>\n";
	echo "<li>Have you <a href='helpers-register.php'>registered</a> yet to help on the day at the installfest?&nbsp;&nbsp;If not, do it now!&nbsp;&nbsp;It doesn't matter if you can help installing, configuring, or helping out in non-technical ways!&nbsp;&nbsp;As an incentive, there will be a door prize for one luck helper!</li>\n";

	echo "<li>Have you joined the installfest mailing list yet?&nbsp;&nbsp;";
	echo "If not, just email <a href='mailto:installfest-request@linuxsa.org.au?subject=subscribe'>the installfest organisers email list</a> with 'subscribe' as the subject.</li>\n";

	echo "<li>Looking for the web admin interface to manipulate the on-line database?&nbsp;&nbsp;Try <a href='admin.php'>here</a>.</li>\n";
	echo "<li>Perhaps you have some comments on the web page or would like to help out there.  Just email <a href='mailto:web-monkeys@wulfz.com'>the LinuxSA web monkeys</a> with your ideas.</li>\n";
	echo "<li>Or you could help out with one of the following things that need doing.<br>If you do volunteer, email <a href='mailto:installfest@linuxsa.org.au'>the organisers</a> so we don't double up our efforts!</li>\n";
	echo "</ul>\n";

	dumpToDo();

	displayMinutes();

}

display("sidebar", "helperspage"); 

?>

