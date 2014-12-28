<?
/*	Copyright Deakin University 2007,2008
 *	Written by Adam Zammit - adam.zammit@deakin.edu.au
 *	For the Deakin Computer Assisted Research Facility: http://www.deakin.edu.au/dcarf/
 *	
 *	This file is part of queXF
 *	
 *	queXF is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation; either version 2 of the License, or
 *	(at your option) any later version.
 *	
 *	queXF is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *	
 *	You should have received a copy of the GNU General Public License
 *	along with queXF; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

/**
 * XHTML functions
 */
include("../functions/functions.xhtml.php");
include("../lang.inc.php");
include("../config.inc.php");

xhtml_head(T_("queXF Admin Functions"), true, array("../css/admin.css"));

?>
<div id="menu" class="container-fluid main">

    <nav class="menu">
        <div class="jumbotron">
            <h2><? echo T_("QueXF Admin"); ?></h2>
        </div>
        <ul>
            <li class="well page"><h2><? echo T_("Form setup"); ?></h2>
                <ul>
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=pagetest.php">--><?// echo T_("Test form compatibility with queXF"); ?><!--</a></li>-->
                    <li><a class="btn btn-raised"
                           href="?page=new.php"><i class="mdi-content-add"></i> New Form</a></li>
                    <li><a class="btn btn-raised"
                           href="?page=importbandingxml.php"><? echo T_("Import/Update banding"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=delete.php"><? echo T_("Delete a form"); ?></a>
                    </li>
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=touchup.php">--><?// echo T_("Touch-up a form"); ?><!--</a></li>-->
<!--                    <li><a class="btn btn-raised" href="?page=band.php">--><?// echo T_("Band a form"); ?><!--</a></li>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=bandajax.php">--><?// echo T_("Band a form using interactive banding"); ?><!--</a></li>-->
                    <li><a class="btn btn-raised"
                           href="?page=reorder.php"><? echo T_("Order form variables"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=limesurvey.php"><? echo T_("Limesurvey integration"); ?></a></li>
                </ul>
            </li>
<!--            <li><h2>--><?// echo T_("Users"); ?><!--</h2>-->
<!--                <ul>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=operators.php">--><?// echo T_("Add operators"); ?><!--</a></li>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=verifierquestionnaire.php">--><?// echo T_("Assign forms to operators"); ?><!--</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            --><?// if (ICR_ENABLED) { ?>
<!--                <li><h2>--><?// echo T_("ICR"); ?><!--</h2>-->
<!--                    <ul>-->
<!--                        <li><a class="btn btn-raised"-->
<!--                               href="?page=icrtrain.php">--><?// echo T_("Train ICR"); ?><!--</a></li>-->
<!--                        <li><a class="btn btn-raised"-->
<!--                               href="?page=icrmonitor.php">--><?// echo T_("Monitor ICR training process"); ?><!--</a></li>-->
<!--                        <li><a class="btn btn-raised"-->
<!--                               href="?page=icrkb.php">--><?// echo T_("Import and Export ICR KB"); ?><!--</a></li>-->
<!--                        <li><a class="btn btn-raised"-->
<!--                               href="?page=icrassign.php">--><?// echo T_("Assign ICR KB to questionnaire"); ?><!--</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            --><?// } ?>
            <li class="well page"><h2><? echo T_("Importing"); ?></h2>
                <ul>
                    <li><a class="btn btn-raised"
                           href="?page=import.directory.php"><? echo T_("Import a directory of PDF files"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=listfiles.php?status=1"><? echo T_("Successfully imported files"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=listfiles.php?status=2"><? echo T_("Failed imported files"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=listduplicates.php"><? echo T_("Duplicate forms"); ?></a></li>
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=listforms.php">--><?// echo T_("Reverify forms"); ?><!--</a></li>-->
                    <li><a class="btn btn-raised"
                           href="?page=listpagenotes.php"><? echo T_("List page notes"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=pagesmissing.php"><? echo T_("Pages missing from scan"); ?></a></li>
                    <li><a class="btn btn-raised"
                           href="?page=missingpages.php"><? echo T_("Handle undetected pages"); ?></a></li>
                </ul>
            </li>
            <li class="well page"><h2><? echo T_("Output"); ?></h2>
                <ul>
                    <li><a class="btn btn-raised" href="?page=outputunverified.php"><? echo T_("Output unverified data"); ?></a></li>
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=output.php">--><?// echo T_("Output data/ddi"); ?><!--</a></li>-->
                </ul>
            </li>
<!--            <li><h2>--><?// echo T_("Progress"); ?><!--</h2>-->
<!--                <ul>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=progress.php">--><?// echo T_("Display progress of form verification"); ?><!--</a></li>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=performance.php">--><?// echo T_("Display performance of verifiers (Completions per hour)"); ?><!--</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li><h2>--><?// echo T_("Clients"); ?><!--</h2>-->
<!--                <ul>-->
<!--                    <li><a class="btn btn-raised" href="?page=clients.php">--><?// echo T_("Add clients"); ?><!--</a>-->
<!--                    </li>-->
<!--                    <li><a class="btn btn-raised"-->
<!--                           href="?page=clientquestionnaire.php">--><?// echo T_("Assign clients to forms"); ?><!--</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <li class="well page"><h2><? echo T_("System setup"); ?></h2>
                <ul>
                    <li><a class="btn btn-raised" href="?page=pagesetup.php"><? echo T_("Page setup"); ?></a>
                    </li>
                    <li><a class="btn btn-raised"
                           href="?page=testconfig.php"><? echo T_("Test configuration"); ?></a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

<?

$page = "testconfig.php";

if (isset($_GET['page']))
    $page = $_GET['page'];

print "<div id='main'>";
xhtml_object($page, "mainobj");
print "</div>";


xhtml_foot();

?>
