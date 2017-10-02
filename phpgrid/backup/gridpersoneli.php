<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 2.0.0
 * @license: see license.txt included in package
 */

// include db config
include_once("config.php");

// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php");

// Database config file to be passed in phpgrid constructor
$db_conf = array(
					"type" 		=> PHPGRID_DBTYPE,
					"server" 	=> PHPGRID_DBHOST,
					"user" 		=> PHPGRID_DBUSER,
					"password" 	=> PHPGRID_DBPASS,
					"database" 	=> PHPGRID_DBNAME
				);

$g = new jqgrid($db_conf);

$opt = array();
$opt["rowNum"] = 10; // by default 20
$opt["sortname"] = 'did'; // by default sort grid by this field
$opt["sortorder"] = "desc"; // ASC or DESC
$opt["caption"] = "Personeli mjekesor"; // caption of grid
$opt["autowidth"] = false; // expand grid to screen width
$opt["width"] = "100%";
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["altRows"] = true;
$opt["resizable"] = true;
$opt["altclass"] = "myAltRowClass";

$opt["rowactions"] = true; // allow you to multi-select through checkboxes

// export XLS file
// export to excel parameters
$opt["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

$g->set_options($opt);

$g->set_actions(array(
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"showhidecolumns"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					)
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM tbldoktoret";

// this db table will be used for add,edit,delete
$g->table = "tbldoktoret";

// you can customize your own columns ...
$col = array();
$col["title"] = "DID"; // caption of column
$col["name"] = "did"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "10";
//$col["editable"] = true;
$col["hidden"] = true;
//$col["editrules"] = array("edithidden"=>true);
$cols[] = $col;

$col = array();
$col["title"] = "Limak ID"; // caption of column
$col["name"] = "limakid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["autowidth"] = false;
$col["width"] = "100";
$col["editable"] = true;
$col["align"] = "center";
$cols[] = $col;

$col = array();
$col["title"] = "Username";
$col["name"] = "username";
$col["dbname"] = "LOWER(name)";
$col["hidden"] = true;
$col["autowidth"] = true;
//$col["width"] = "100";
$col["editable"] = true; // this column is editable
$col["align"] = "center";
$cols[] = $col;

$col = array();
$col["title"] = "Emri";
$col["name"] = "emri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Prindi";
$col["name"] = "prindi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Mbiemri";
$col["name"] = "mbiemri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Gjinia";
$col["name"] = "gjinia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Ditelindja";
$col["name"] = "ditelindja";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Vendlindja";
$col["name"] = "vendlindja";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Adresa";
$col["name"] = "adresa";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "E-mail";
$col["name"] = "email";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "150";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Departamenti";
$col["name"] = "departamenti";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["width"] = "100";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Mbikqyresi";
$col["name"] = "mbikqyresi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Telefoni";
$col["name"] = "nrtel";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<style>
    .myAltRowClass { background-color: #F1F1F1; background-image: none; }


		.ui-jqgrid tr.jqgrow td {white-space: normal !important;}
	</style>

	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>

	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<style>
    .myAltRowClass { background-color: #F1F1F1; background-image: none; }


		.ui-jqgrid tr.jqgrow td {white-space: normal !important;}
	</style>


	<?php echo $out?>
	
</body>
</html>
