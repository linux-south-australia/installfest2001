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

function transmeta() {
	echo "<!-- There are no hidden messages in this web page, who do you -->";
	echo "<!-- think we are, Transmeta??? :-) -->";
}

function title($title) {
     echo ($title);
     echo "\n";
   }

function genbox($border_col, $bg_col, $border_text_col, $bg_text_col, $header, $functext) {
	global $DEBUG_LEVEL;
	if ($DEBUG_LEVEL >= 8) { 
		echo "border_col =", $border_col, "<br>";
		echo "bg colour = ", $bg_col, "<br>";
		echo "border text colour = ", $border_text_col, "<br>";
		echo "bg text colour = ", $bg_text_col, "<br>";
	}
	echo "<table width=100% bgcolor=$border_col border=0 cellspacing=5 callpadding=0 cols=1>\n";
	echo "  <tr><td>\n";
	echo "    <table width=\"100%\" bgcolor=$bg_col border=0 cellspacing=1 cellpadding=0 cols=1>\n";
	echo "      <tr><td bgcolor=$border_col><font color=$border_text_col>$header</font></td></tr>\n";
	echo "      <tr><td><font color=$bg_text_col>\n";
	echo $functext();
	echo "</font></td></tr>\n";
	echo "    </table>\n";
	echo "</table>\n";
}

function box($border_col, $bg_col, $border_text_col, $bg_text_col, $header, $text) {
	global $DEBUG_LEVEL;
	if ($DEBUG_LEVEL >= 8) { 
		echo "border_col =", $border_col, "<br>";
		echo "bg colour = ", $bg_col, "<br>";
		echo "border text colour = ", $border_text_col, "<br>";
		echo "bg text colour = ", $bg_text_col, "<br>";
	}
	echo "<table width=100% bgcolor=$border_col border=0 cellspacing=5 callpadding=0 cols=1>\n";
	echo "  <tr><td>\n";
	echo "    <table width=\"100%\" bgcolor=$bg_col border=0 cellspacing=1 cellpadding=0 cols=1>\n";
	echo "      <tr><td bgcolor=$border_col><font color=$border_text_col>$header</font></td></tr>\n";
	echo "      <tr><td><font color=$bg_text_col>$text</font></td></tr>\n";
	echo "    </table>\n";
	echo "</table>\n";
}


function copyright_light() {
	global $AUTHORS, $EMAIL, $DATE;
	echo "Copyright &copy; ", $DATE, "<a href='mailto:", $EMAIL, "'>", $AUTHORS, "</a>.\n";

}


function copyright_details() {
	echo "This web page software comes with ABSOLUTELY NO WARRANTY. &nbsp; &nbsp;";
        echo "This is free software, and you are welcome to redistribute it under certain conditions.&nbsp;&nbsp;";
	echo "Please see the <a href='LICENCE'>GPL</a> for licence details.";
}


function download_details() {
	global $DOWNLOAD_URL;
	echo "The source code for this page is available <a href='", $DOWNLOAD_URL, "'>here</a>."; 
}


function sysinfo() {
	global $DEBUG_LEVEL;
	if ($DEBUG_LEVEL == 9) {
		echo "<br><br>";
		phpinfo();
	}
}

?>
