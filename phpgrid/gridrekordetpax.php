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
include(PHPGRID_LIBPATH."inc/jqgrid_dist_regjistri_pax.php");

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
$opt["sortname"] = 'rid'; // by default sort grid by this field
$opt["sortorder"] = "desc"; // ASC or DESC
$opt["caption"] = "Regjistri i kontrollave te pasagjereve"; // caption of grid
//$opt["autowidth"] = true; // expand grid to screen width
$opt["width"] = "100%";
$opt["multiselect"] = true; // allow you to multi-select through checkboxes
$opt["altRows"] = true;
$opt["resizable"] = true;
$opt["altclass"] = "myAltRowClass";

$opt["rowactions"] = true; // allow you to multi-select through checkboxes
$opt["view_options"] = array('width'=>'600');


// export XLS file
// export to excel parameters
//$opt["export"] = array("format"=>"pdf", "filename"=>"my-file", "sheetname"=>"test");

// export PDF file params
$opt["export"] = array("filename"=>"RegjistriPax", "heading"=>"Regjistri i kontrolleve per udhetare", "orientation"=>"landscape", "paper"=>"a4");
// for excel, sheet header
$opt["export"]["filename"] = "RegjistriPax-" . date('Y-m-d');
$opt["export"]["sheetname"] = "RegjistriPax";
// export filtered data or all data
$opt["export"]["range"] = "filtered"; // or "all"

$g->set_options($opt);

$g->set_actions(array(
	"add"=>false, // allow/disallow add
	"edit"=>false, // allow/disallow edit
	"delete"=>false, // allow/disallow delete
	"rowactions"=>true, // show/hide row wise edit/del/save option
	"showhidecolumns"=>false, // show/hide row wise edit/del/save option
	//"export"=>true, // show/hide export to excel option
	//"export_excel"=>true,
	"export_excel"=>true, // export excel button
	"export_pdf"=>true, // export pdf button
	"handover"=>false, // export pdf button
	//"export_csv"=>true, // export csv button
	"autofilter" => true, // show/hide autofilter for search
	"search" => "simple" // show single/multi field search condition (e.g. simple or advance)
					)
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT a.rid as rid,
																a.emri as emri,
												        a.prindi as prindi,
												        a.mbiemri as mbiemri,
												        /*b.emri as demri,
												        b.mbiemri as dmbiemri,*/

																a.gjinia as gjinia,
												        a.ditelindja as ditelindja,
												        a.vendlindja as adresa,

												        a.shifra_veprimtarise as shifra_veprimtarise,
												        a.ankesa as ankesa,
												        a.anamnezaesemundjes as anamneza_konstatimi,
												        a.diagnoza as diagnoza,
												        a.trajtimi as terapia,
																concat(b.emri, ' ',b.mbiemri) as demri,

																a.data_regjistrimit as data_regjistrimit,

												        a.cmimi as cmimi,
																a.rid as download




FROM tblrekordetpax as a inner join tbldoktoret as b on a.did=b.did";

// this db table will be used for add,edit,delete
$g->table = "tblrekordetpax";

// you can customize your own columns ...
$col = array();
$col["title"] = "Nr Dosjes (File Nr.)"; // caption of column
$col["name"] = "rid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["autowidth"] = true;
$col["align"] = "center";
$col["editable"] = false;
$col["hidden"] = false;
$col["width"] = "55";
$col["export"] = true;
//$col["editrules"] = array("edithidden"=>true);
$cols[] = $col;

$col = array();
$col["title"] = "Data (Date)";
$col["name"] = "data_regjistrimit";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "80";
$col["align"] = "center";


// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Emri (Name)";
$col["dbname"] = "a.emri";
$col["name"] = "emri";
$col["autowidth"] = true;
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "100";
$col["align"] = "center";


// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Prindi (Parent)";
$col["dbname"] = "a.prindi";
$col["name"] = "prindi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "100";
$col["align"] = "center";


// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Mbiemri (Last Name)";
$col["dbname"] = "a.mbiemri";
$col["name"] = "mbiemri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "105";
$col["align"] = "center";




//$cols[] = $col;

//$col = array();
//$col["title"] = "Mbiemri i doktorit";
//$col["name"] = "dmbiemri";
//$col["sortable"] = true; // this column is not sortable
//$col["search"] = true; // this column is not searchable
//$col["editable"] = false;
//$col["width"] = "105";
//$col["align"] = "center";
//$col["edittype"] = "textarea"; // render as textarea on edit
//$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
//$col["hidden"] = false;
//$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Gjinia (Gender)";
$col["dbname"] = "a.gjinia";
$col["name"] = "gjinia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "50";
$col["align"] = "center";


$cols[] = $col;

$col = array();
$col["title"] = "Ditelindja (DOB)";
$col["dbname"] = "a.ditelindja";
$col["name"] = "ditelindja";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "80";
$col["align"] = "center";


$cols[] = $col;

$col = array();
$col["title"] = "Adresa (Address)";
$col["dbname"] = "a.vendlindja";
$col["name"] = "adresa";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "120";
$col["align"] = "center";


$cols[] = $col;



$col = array();
$col["title"] = "Shifra e vep. (ICD code)";
$col["name"] = "shifra_veprimtarise";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "80";
$col["align"] = "center";


$cols[] = $col;

$col = array();
$col["title"] = "Ankesa (Complaint)";
$col["name"] = "ankesa";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["align"] = "center";
$col["export"] = false;
$col["width"] = "120";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Anamneza e semundjes (Disease Anamnesis)";
$col["dbname"] = "a.anamnezaesemundjes";
$col["name"] = "anamneza_konstatimi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "120";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Diagnoza (Diagnosis)";
$col["name"] = "diagnoza";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "120";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>false);

$cols[] = $col;

$col = array();
$col["title"] = "Trajtimi (Medical Treatment)";
$col["dbname"] = "a.trajtimi";
$col["name"] = "terapia";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["width"] = "120";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

/*$col = array();
$col["title"] = "Ku udhezohet";
$col["name"] = "ku_udhezohet";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "120";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Paraqitja e serishme";
$col["name"] = "paraqitja_serishme";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "100";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = false;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;*/



$col = array();
$col["title"] = "Cmimi (Price)";
$col["name"] = "cmimi";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = true;
$col["export"] = false;
$col["width"] = "70";
$col["align"] = "center";
$col["edittype"] = "textarea"; // render as textarea on edit
$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

// don't show this column in list, but in edit/add mode
//edited from true(bes)$col["hidden"] = true;
$col["hidden"] = true;
$col["editrules"] = array("edithidden"=>true);

$cols[] = $col;

$col = array();
$col["title"] = "Kontrolloi (Doctor)";
$col["dbname"] = "CONCAT(b.emri, ' ', b.mbiemri)";
$col["name"] = "demri";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["editable"] = false;
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
$col["title"] = "Download";
$col["name"] = "download";
$col["sortable"] = true; // this column is not sortable
$col["search"] = true; // this column is not searchable
$col["export"] = false;
//$col["default"] = "View More";
$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"../raportet/raporti_nga_rekordet.php?pxid='+cellval+'\">'+\"Download\"+'</a>'; }";
$col["editable"] = true;
$col["align"] = "center";
$col["width"] = "165";
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

		.ui-jqdialog-content .CaptionTD
		{
				vertical-align: top;
		}

		.ui-jqdialog-content .form-view-data
		{
				white-space: normal;
		}
	</style>

	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>
	<link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>

	<script src="lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>

<!--	<style>
		.myAltRowClass { background-color: #F1F1F1; background-image: none; }


		.ui-jqgrid tr.jqgrow td {white-space: normal !important;}





	</style>
-->
</head>
<body>


	<?php echo $out?>

</body>
</html>
