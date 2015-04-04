<?
#    Installfest Webpage - a php/postgresql/apache instant Linux
#                          installfest web page and database.
#    Copyright (C) 2001 Phil Hutton (phil@hutton.sh)
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

# This module makes sure that a connection to the database is present when
# needed.  getdbconn() will check that a connection is present and open
# one if necessary.  closedbconn() will close the present database connection.
# This fixes problems that are encountered when connections are not closed
# properly in PHP4.
#
# NO OTHER MODULE SHOULD USE pg_connect OR pg_close, AS THIS WILL CAUSE
# STRANGE DATABASE PROBLEMS TO OCCUR.

$connmgr_connected = false;
$connmgr_connectionid = 0;

function getdbconn()
{
  global $connmgr_connected;
  global $connmgr_connectionid;
  if ($connmgr_connected)
    return($connmgr_connectionid);
  else
  {
    $connmgr_connectionid = pg_connect("dbname=linuxsa");
    if (!$connmgr_connectionid) {
    	echo "Could not connect to the database.\n";
    }
    else
      $connmgr_connected = true;
    return $connmgr_connectionid;
  }
}

function closedbconn()
{
  global $connmgr_connected;
  global $connmgr_connectionid;
  if ($connmgr_connected)
  {
    pg_close($connmgr_connectionid);
    $connmgr_connected = false;
  }
}
