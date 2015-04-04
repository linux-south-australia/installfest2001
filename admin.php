<? # Password Authentication
    if (!isset($PHP_AUTH_USER) || (isset($Logout))) {
      Header("WWW-Authenticate: Basic realm=\"Installfest2001 Admin Page\"");
      Header("HTTP/1.0 401 Unauthorized");
      echo "<h1>You are unauthorised to enter this site.</h1>\n";
      exit;
    } else {
      if (($PHP_AUTH_USER != "rupert") || ($PHP_AUTH_PW != "ximian")) {
        Header("HTTP/1.0 401 Unauthorized");
        echo "<h1>You are unauthorised to enter this site.</h1>\n";
        exit;
      }
    }
?>
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

	global $delete_installee;
	global $delete_helper;
	global $delete_todo;
	global $delete_minutes;
	global $addtodo;
	global $addminutes;
	global $completed_todo;
	global $uncompleted_todo;

	if (isset($delete_helper) and ereg("^[0-9]+$", $delete_helper)) {
		$sql = "DELETE FROM helpers WHERE id = $delete_helper;";
	

		# Now put this in the database
		@$connection = getdbconn();

		if (!$connection) {
			echo "Whoops! an error occured connecting to the ";
			echo "LinuxSA database (for table helper).  Sorry.\n";
			closedbconn();
			exit;
		}
		@$result = pg_exec ($connection, $sql);

		if (!$result) {
			echo "<H1>Error - Problem deleting data in";
			echo " helper table</H1><p>";
			echo "Please click ";
			echo "<a href=admin.php>here</a>";
			echo " to reload this page, or your browser's Bacl key to try again.";
		} 
		closedbconn();

	} else {

		if (isset($delete_installee) and ereg("^[0-9]+$", $delete_installee)) {
			$sql = "DELETE FROM installees WHERE id = $delete_installee;";

			# Now put this in the database
			@$connection = getdbconn();
	
			if (!$connection) {
				echo "Whoops! an error occured connecting to the ";
				echo "LinuxSA database (for table installees).  Sorry.\n";
				closedbconn();
				exit;
			}
			@$result = pg_exec ($connection, $sql);

			if (!$result) {
				echo "<H1>Error - Cannot delete data in";
				echo " installees table</H1><p>";
				echo "Please click ";
				echo "<a href=admin.php>here</a>";
				echo " to reload this page, or your browser's Back key to try again.";
			} 
			closedbconn();
		} else {

			if (isset($delete_todo) and ereg("^[0-9]+$", $delete_todo)) {
				$sql = "DELETE FROM todo WHERE id = $delete_todo;";

				# Now put this in the database
				@$connection = getdbconn();
	
				if (!$connection) {
					echo "Whoops! an error occured connecting to the ";
					echo "LinuxSA database (for table todo).  Sorry.\n";
					closedbconn();
					exit;
				}
				@$result = pg_exec ($connection, $sql);

				if (!$result) {
					echo "<H1>Error - Cannot delete data in";
					echo " todo table</H1><p>";
					echo "Please click ";
					echo "<a href=admin.php>here</a>";
					echo " to reload this page, or your browser's Back key to try again.";
				} 
				closedbconn();
			} else {

				if ((isset($completed_todo) and ereg("^[0-9]+$", $completed_todo)) or 
					(isset($uncompleted_todo) and ereg("^[0-9]+$", $uncompleted_todo))) {

					if (isset($completed_todo)) {
						$sql = "UPDATE todo SET completed = 'TRUE' where id = $completed_todo";
					} else {
						$sql = "UPDATE todo SET completed = 'FALSE' where id = $uncompleted_todo";
					}

					# Now put this in the database
					@$connection = getdbconn();

					if (!$connection) {
						echo "Whoops! an error occured connecting to the ";
						echo "LinuxSA database (for table todo).  Sorry.\n";
						closedbconn();
						exit;
					}
					@$result = pg_exec ($connection, $sql);

					if (!$result) {
						echo "<H1>Error - Cannot delete data in";
						echo " todo table</H1><p>";
						echo "Please click ";
						echo "<a href=admin.php>here</a>";
						echo " to reload this page, or your browser's Back key to try again.";
					}
					closedbconn();

				} else { 


					if (isset($delete_minutes) and ereg("^[0-9]+$", $delete_minutes)) {
						$sql = "DELETE FROM minutes WHERE id = $delete_minutes;";

						@$connection = getdbconn();
	
						if (!$connection) {
							echo "Whoops! an error occured connecting to the ";
							echo "LinuxSA database (for table minutes).  Sorry.\n";
							closedbconn();
							exit;
						}

						@$result = pg_exec ($connection, $sql);

						if (!$result) {
							echo "<H1>Error - Cannot delete data in";
							echo " minutes table</H1><p>";
							echo "Please click ";
							echo "<a href=admin.php>here</a>";
							echo " to reload this page, or your browser's Back key to try again.";
						} 
						closedbconn();
	
					} else {

						if (isset($addtodo) || isset($addminutes)) {
							global $name;
							global $email;
							global $text;
							global $info;
							global $title;
	
							echo "<h1>Adding todo or minutes item</h1>\n";
	
							if (((!$name) || (!$email) || (!$text)) &&
								((!$title) || (!$info))) {
								echo "<h1>Sorry Unacceptable - </h1>\n";
								echo "<br>\n";
								if (!$name) 
									echo "You need to supply your name<br>\n";      
								if (!$email) 
									echo "You need to supply your email<br>\n";      
								if (!$text) 
									echo "You need to supply your todo item<br>\n";
								if (!$title) 
									echo "You need to supply your title item<br>\n";
								if (!$info) 
									echo "You need to supply your info item<br>\n";
								echo "<br>\n";
								echo "<br>\n";
								echo "<br>\n";
								echo "Hit back on your browser window to re-enter data.\n";
       							} else {
								# Now put this in the database
								@$connection = getdbconn();

								if (!$connection) {
									echo "Whoops! an error occured.  Sorry.\n";
									closedbconn();
								}
	
								if (isset($addtodo)) {	
									$name = addslashes($name);
									$email = addslashes($email);
									$text = addslashes($text);
		
									$sql = "INSERT INTO todo (name, email, text, completed) VALUES ('$name', '$email', '$text', 'FALSE')";
								} else {
									if (isset($addminutes)) {
										$title = addslashes($title);
										$info = addslashes($info);
										$sql = "INSERT INTO minutes (title, info) VALUES ('$title', '$info')";
									}
								}
	
								@$result = pg_exec ($connection, $sql);
	
								if (!$result) {
									echo "<H1>Error - Could not add ToDo/Minutes item";
									echo " - data lost.</H1><p>";
									echo "Please click ";
									echo "<a href=admin.php>here</a>";
									echo " to reload this page, or your browser's Back key to try again.";
								} 	
								closedbconn();
							} 
						}
					}
				}
			}
		}
	}	
}

function dumpInstalleeDB() {

        $connection = getdbconn();

        if (!$connection) {
          echo "Whoops! an error occured.  Sorry.\n";
        }

        $sql = "select * from installees";

        @$result = pg_exec ($connection, $sql);

        @$rows = pg_NumRows($result);

	echo "<h1>Installees Database ($rows";
	if ($rows == 1) {
		echo " person registered).</h1>\n";
	} else {
		echo " people registered).</h1>\n";
	}

        if (!$result) {
          echo "<H1>Error - no installees registered!?!</H1><p>\n";
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
	  closedbconn();
          exit;
        }

	if ($rows > 0) {

		if (!isset($dumptext)) {
		echo "<center>\n";
		echo "<table border=2 cols=8 width=90%>";
		echo "<tr>\n";
		echo "<td width=10>Delete?</td>\n";
		echo "<td width=10>Id</td>\n";
		echo "<td width=70>First Name</td>\n";
		echo "<td width=70>Last Name</td>\n";
		echo "<td width=100>Email</td>\n";
		echo "<td width=10>E-Waiver</td>\n";
		echo "<td width=10>Paper Waiver</td>\n";
		echo "<td width=300>Description</td>\n";
		echo "</tr>\n";
		} else {
		echo "Id\n";
		echo "&nbsp;";
		echo "First Name\n";
		echo "&nbsp;";
		echo "Last Name\n";
		echo "&nbsp;";
		echo "Email\n";
		echo "&nbsp;";
		echo "E-Waiver\n";
		echo "&nbsp;";
		echo "Paper Waiver<br>\n";
		}
		for ($i=0; $i < $rows; $i++) {
        
			if (!isset($dumptext)) {

				echo "<tr>\n";
				$id = pg_result($result, $i, "id");
				echo "<td>\n";
				echo "<input type=SUBMIT name=delete_installee value=$id>\n";
				echo "</td>\n";
				echo "<td>\n";
				echo $id;
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "firstname");
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "lastname");
				echo "</td>\n";
				echo "<td>\n";
				echo "<a href=mailto:";
				echo pg_result($result, $i, "email");
				echo ">";
				echo pg_result($result, $i, "email");
				echo "</a>\n";
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "ewaiver");
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "paperwaiver");
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "description");
				echo "</td>\n";
				
				echo "</tr>\n";

			} else {

				echo pg_result($result, $i, "id");
				echo "&nbsp;";
				echo pg_result($result, $i, "firstname");
				echo "&nbsp;";
				echo pg_result($result, $i, "lastname");
				echo "&nbsp;";
				echo pg_result($result, $i, "email");
				echo "&nbsp;";
				echo pg_result($result, $i, "ewaiver");
				echo "&nbsp;";
				echo pg_result($result, $i, "paperwaiver");
				echo "<br>\n";

			}
		}
	  	closedbconn();

        	echo "</table>\n";
	        echo "</center>\n";

	}

}



function dumpMinutes() {

        $connection = getdbconn();

        if (!$connection) {
          echo "Whoops! an error occured.  Sorry.\n";
	  closedbconn();
        }

        $sql = "select * from minutes";

        $result = pg_exec ($connection, $sql);

        $rows = pg_NumRows($result);

        echo " <br><br> <hr width=65%> <h1>Minutes Database ($rows";
	if ($rows == 1) {
		echo " item registered).</h1>\n";
	} else {
		echo " items registered).</h1>\n";
	}

        if (!$result) {
          echo "<H1>Error - no minutes registered!?!</H1><p>\n";
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

	if ($rows > 0) {

		if (!isset($dumptext)) {
			echo "<center>\n";
			echo "<table border=2 cols=8 width=90%>";
			echo "<tr>\n";
			echo "<td width=10>Delete?</td>\n";
			echo "<td width=10>Id</td>\n";
			echo "<td width=70>Title</td>\n";
			echo "<td width>Info</td>\n";
			echo "</tr>\n";
	        } else {
			echo "Id\n";
			echo "&nbsp;";
			echo "Title\n";
			echo "&nbsp;";
			echo "Info\n";
			echo "<br>\n";
       		}

		for ($i=0; $i < $rows; $i++) {
			if (!isset($dumptext)) {
				echo "<tr>\n";
				$id = pg_result($result, $i, "id");
				echo "<td>\n";
				echo "<input type=SUBMIT name=delete_minutes value=$id>\n";
				echo "</td>\n";
				echo "<td>\n";
				echo $id;
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "title");
				echo "</td>\n";
				echo "<td><PRE>\n";
				echo pg_result($result, $i, "info");
				echo "</PRE></td>\n";

				echo "</tr>\n";

			} else {

				echo pg_result($result, $i, "id");
				echo "&nbsp;";
				echo pg_result($result, $i, "title");
				echo "&nbsp;";
				echo pg_result($result, $i, "info");
				echo "<br>";

			}

		}
	  	closedbconn();
		echo "</table>\n";
		echo "</center>\n";
	}
}


function dumpHelpersDB() {

        $connection = getdbconn();

        if (!$connection) {
          echo "Whoops! an error occured.  Sorry.\n";
          closedbconn();
        }

        $sql = "select * from helpers";

        @$result = pg_exec ($connection, $sql);

        @$rows = pg_NumRows($result);

        echo " <br><br> <hr width=65%> <h1>Helpers Database ($rows";
        if ($rows == 1) {
                echo " person registered).</h1>\n";
        } else {
                echo " people registered).</h1>\n";
        }

        if (!$result) {
          echo "<H1>Error - no helpers registered!?!</H1><p>\n";
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

       if ($rows > 0) {

                if (!isset($dumptext)) {
                        echo "<center>\n";
                        echo "<table border=2 cols=8 width=90%>";
                        echo "<tr>\n";
                        echo "<td width=10>Delete?</td>\n";
                        echo "<td width=10>Id</td>\n";
                        echo "<td width=70>First Name</td>\n";
                        echo "<td width=70>Last Name</td>\n";
                        echo "<td width=100>Email</td></td>\n";
                        echo "<td width=100>Offering</td>\n";
                        echo "<td width=50>Install</td>\n";
                        echo "<td width=50>Configure</td>\n";
                        echo "</tr>\n";
                } else {
                        echo "Id\n";
                        echo "&nbsp;";
                        echo "First Name\n";
                        echo "&nbsp;";
                        echo "Last Name\n";
                        echo "&nbsp;";
                        echo "Email\n";
                        echo "&nbsp;";
                        echo "Offering\n";
                        echo "<br>\n";
                }

              for ($i=0; $i < $rows; $i++) {
                        if (!isset($dumptext)) {
                                echo "<tr>\n";
                                $id = pg_result($result, $i, "id");
                                echo "<td>\n";
                                echo "<input type=SUBMIT name=delete_helper value=$id>\n";
                                echo "</td>\n";
                                echo "<td>\n";
                                echo $id;
                                echo "</td>\n";
                                echo "<td>\n";
                                echo pg_result($result, $i, "firstname");
                                echo "</td>\n";
                                echo "<td>\n";
                                echo pg_result($result, $i, "lastname");
                                echo "</td>\n";
                                echo "<td>\n";
                                echo "<a href=mailto:";
                                echo pg_result($result, $i, "email");
                                echo ">";
                                echo pg_result($result, $i, "email");
                                echo "</a>\n";
                                echo "</td>\n";
                                echo "<td>\n";
                                echo pg_result($result, $i, "offering");
                                echo "</td>\n";
                                echo "<td>\n";
                                $temp = pg_result($result, $i, "install");
                                if ($temp == "") {
                                        echo "none\n";
                                } else {
                                        echo $temp;
                                }
                                echo "</td>\n";
                                echo "<td>\n";
                                $temp = pg_result($result, $i, "configure");
                                if ($temp == "") {
                                        echo "none\n";
                                } else {
                                        echo $temp;
                                }
                                echo "</td>\n";

                                echo "</tr>\n";

                       } else {

                                echo pg_result($result, $i, "id");
                                echo "&nbsp;";
                                echo pg_result($result, $i, "firstname");
                                echo "&nbsp;";
                                echo pg_result($result, $i, "lastname");
                                echo "&nbsp;";
                                echo pg_result($result, $i, "email");
                                echo "&nbsp;";
                                echo pg_result($result, $i, "offering");
                                echo "<br>";

                        }

                }
                closedbconn();
                echo "</table>\n";
                echo "</center>\n";
        }

}




function dumpToDoDB() {

        $connection = getdbconn();

        if (!$connection) {
          echo "Whoops! an error occured.  Sorry.\n";
	  closedbconn();
        }

        $sql = "select * from todo";

        @$result = pg_exec ($connection, $sql);

        @$rows = pg_NumRows($result);

        echo " <br><br> <hr width=65%> <h1>ToDo Database ($rows";
	if ($rows==1){
		echo " item).</h1>";
	} else {
		echo " items).</h1>";
	}

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

	if ($rows > 0) {

		if (!isset($dumptext)) {
			echo "<center>\n";
			echo "<table border=1 cols=6 width=90%>";
			echo "<tr>\n";
			echo "<td width=50>Delete?</td>\n";
			echo "<td width=50>Id</td>\n";
			echo "<td width=140>Submitter</td>\n";
			echo "<td width=100>Submitter Email</td></td>\n";
			echo "<td width=300>Text</td>\n";
			echo "<td width=50>Completed</td>\n";
			echo "</tr>\n";
		} else {
			echo "Id\n";
			echo "&nbsp;";
			echo "Name\n";
			echo "&nbsp;";
			echo "Email\n";
			echo "&nbsp;";
			echo "Text\n";
			echo "&nbsp;";
			echo "Completed\n";
			echo "<br>\n";
		}

		for ($i=0; $i < $rows; $i++) {
			if (!isset($dumptext)) {
				echo "<tr>\n";
				$id = pg_result($result, $i, "id");
				echo "<td>\n";
				echo "<input type=SUBMIT name=delete_todo value=$id>\n";
				echo "</td>\n";
				echo "<td>\n";
				echo $id;
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "name");
				echo "</td>\n";
				echo "<td>\n";
				echo "<a href=mailto:";
				echo pg_result($result, $i, "email");
				echo ">";
				echo pg_result($result, $i, "email");
				echo "</a>\n";
				echo "</td>\n";
				echo "<td>\n";
				echo pg_result($result, $i, "text");
				echo "</td>\n";
				echo "<td>\n";
				$completed = pg_result($result, $i, "completed");
				if ($completed == "f") {
					$completed = "uncompleted";
					echo "Currently $completed, toggle <input type=SUBMIT name=completed_todo value=$id>\n";
				} else {
					$completed = "completed";
					echo "Currently $completed, toggle <input type=SUBMIT name=uncompleted_todo value=$id>\n";
				}
				echo "</td>\n";
  
				echo "</tr>\n";

			} else {

				echo pg_result($result, $i, "id");
				echo "&nbsp;";
				echo pg_result($result, $i, "name");
				echo "&nbsp;";
				echo pg_result($result, $i, "email");
				echo "&nbsp;";
				echo pg_result($result, $i, "text");
				echo "&nbsp;";
				echo pg_result($result, $i, "completed");
				echo "<br>";

			}

		}
	  	closedbconn();
		echo "</table>\n";
		echo "</center>\n";
	}
}


function minutesEntry() {

        echo "<br><br> <hr width=65%> <h1>Minutes Entry</h1>\n";

	echo "<form action='admin.php' method='POST'>\n";
	echo "  <table border=0 cols=2 width=90%>\n";
	echo "    <tr>\n";
	echo "      <td width=100 align=right>\n";
	echo "        <b>Title:</b>\n";
	echo "      </td>\n";
	echo "      <td>\n";
	echo "        <input type='text' name='title' maxlength=25 size=25>\n";
	echo "      <font size=\"-2\">(compulsory)</font></td>\n";
	echo "    </tr>\n";

	echo "    <tr>\n";
	echo "      <td width=100 align=right>\n";
	echo "        <b>Info:</b>\n";
	echo "      </td>\n";
	echo "      <td>\n";
	echo "        <TEXTAREA name='info' rows='5' cols='80'></TEXTAREA>\n";
	echo "      <font size=\"-2\">(compulsory)</font></td>\n";
	echo "    </tr>\n";

	echo "    <tr>\n";
	echo "      <td>\n";
	echo "         <input type='SUBMIT' name='addminutes' value='Submit minutes'>\n";
	echo "      </td>\n";
	echo "    </tr>\n";
	echo "  </table>\n";
	echo "</form>\n";
}


function actionEntry() {

        echo "<br><br> <hr width=65%> <h1>ToDo Action Entry</h1>\n";

	echo "<form action='admin.php' method='POST'>\n";
	echo "  <table border=0 cols=2 width=90%>\n";
	echo "    <tr>\n";
	echo "      <td width=100 align=right>\n";
	echo "        <b>Submitter:</b>\n";
	echo "      </td>\n";
	echo "      <td>\n";
	echo "        <input type='text' name='name' maxlength=30 size=30>\n";
	echo "      <font size=\"-2\">(compulsory)</font></td>\n";
	echo "    </tr>\n";

	echo "    <tr>\n";
	echo "      <td width=100 align=right>\n";
	echo "        <b>Submitter Email:</b>\n";
	echo "      </td>\n";
	echo "      <td>\n";
	echo "        <input type='text' name='email' maxlength=50 size=50>\n";
	echo "      <font size=\"-2\">(compulsory)</font></td>\n";
	echo "    </tr>\n";

	echo "    <tr>\n";
	echo "      <td width=100 align=right>\n";
	echo "        <b>Text:</b>\n";
	echo "      </td>\n";
	echo "      <td>\n";
	echo "        <input type='text' name='text' maxlength=500 size=50>\n";
	echo "      <font size=\"-2\">(compulsory)</font></td>\n";
	echo "    </tr>\n";

	echo "    <tr>\n";
	echo "      <td>\n";
	echo "         <input type='SUBMIT' name='addtodo' value='Submit TODO Item'>\n";
	echo "      </td>\n";
	echo "    </tr>\n";
	echo "  </table>\n";
	echo "</form>\n";
}


function adminpage() {
 
        echo "<h1>This is the Installfest Administration page...</h1>\n";

	processAdminRequests();

	echo "<form action=admin.php method=POST>\n";

	dumpInstalleeDB();

	dumpHelpersDB();

	dumpToDoDB();

	dumpMinutes();

        if (!isset($dumptext)) {
          echo "</form>\n";
        }

	actionEntry();

	minutesEntry();
}

display("sidebar", "adminpage"); 

?>

