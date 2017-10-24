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
session_start();
$username=$_SESSION['CurrentUser'];


// include and create object
include(PHPGRID_LIBPATH."inc/jqgrid_dist_regjistri_staff.php");

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
				$opt["caption"] = "Regjistri i kontrollave te stafit"; // caption of grid
				//$opt["autowidth"] = true; // expand grid to screen width
				$opt["width"] = "100%";
				//$opt["width"] = "100%";
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
				$opt["export"] = array("filename"=>"RegjistriStaf", "heading"=>"Regjistri i kontrolleve per staf", "orientation"=>"landscape", "paper"=>"a4");
				// for excel, sheet header
				$opt["export"]["filename"] = "RegjistriStaf-" . date('Y-m-d');
				$opt["export"]["sheetname"] = "RegjistriStaf";
				// export filtered data or all data
				$opt["export"]["range"] = "filtered"; // or "all"

				//echo $grid["export"]["range"];
				//session_start();
				$_SESSION["exprange"] = "filtered";

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
																		 b.limakid as limakid,

																		 b.emri as pemri,
																		 b.mbiemri as pmbiemri,
																		 a.shifra_veprimtarise as shv,
																		 a.ankesa as ankesa,
																		 a.diagnoza as diagnoza,
																		 a.trajtimi as trajtimi,
																		 a.data_regjistrimit as data,
																		 CONCAT(c.emri, ' ', c.mbiemri) as kontrolloi,
																		 a.anamnezaesemundjes as anamneza,
																		 a.anamnezaefamiljes as anamneza2,
																		 a.laboratori as laboratori,
																		 a.perfundimi as perfundimi,
																		 b.alergjite as alergjite,
																		 a.rid as download,
																		 b.username as usnm



				FROM ((tblrekordetstaff as a
				INNER JOIN tblpacientatstaff as b on a.pid = b.limakid)
				INNER JOIN tbldoktoret as c on a.did = c.did) where b.username='" . $username . "'";

				// this db table will be used for add,edit,delete
				$g->table = "tblrekordetstaff";

				// you can customize your own columns ...
				$col = array();
				$col["title"] = "Nr. Dosjes (File Nr.)"; // caption of column
				$col["name"] = "rid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["width"] = "60";
				$col["export"] = true;
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "ID"; // caption of column
				$col["dbname"] = "b.limakid";
				$col["name"] = "limakid"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["width"] = "65";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Data (Date)"; // caption of column
				$col["name"] = "data";
				$col["width"] = "60";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;


				$col = array();
				$col["title"] = "Emri (Name)"; // caption of column
				$col["dbname"] = "b.emri";
				$col["name"] = "pemri"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["width"] = "100";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Mbiemri (Last Name)"; // caption of column
				$col["dbname"] = "b.mbiemri"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["name"] = "pmbiemri";
				$col["width"] = "110";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Shifra e vep. (ICD Code)"; // caption of column
				$col["dbname"] = "a.shifra_veprimtarise";
				$col["name"] = "shv"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["width"] = "65";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Ankesa (Complaint)"; // caption of column
				$col["name"] = "ankesa";
				$col["width"] = "110";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Anamneza e semundjes (Disease Anamnesis)"; // caption of column
				$col["dbname"] = "a.anamnezaefamiljes";
				$col["name"] = "anamneza";
				$col["width"] = "165";
				$col["export"] = false;
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Anamneza e familjes (Family Anamnesis)"; // caption of column
				$col["dbname"] = "a.anamnezaefamiljes";
				$col["name"] = "anamneza2";
				$col["width"] = "165";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["export"] = false;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Diagnoza (Diagnosis)"; // caption of column
				$col["name"] = "diagnoza";
				$col["width"] = "105";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Trajtimi (Treatment)"; // caption of column
				$col["name"] = "trajtimi";
				$col["width"] = "105";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Perfundimi (Conclusion)"; // caption of column
				$col["name"] = "perfundimi";
				$col["width"] = "100";
				$col["align"] = "center";
				$col["export"] = false;
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Alergjite (Allergies)"; // caption of column
				$col["name"] = "alergjite";
				$col["width"] = "100";
				$col["align"] = "center";
				$col["export"] = false;
				$col["css"] = "'background-color':'#FFFFFF', 'color':'green', 'font-weight':'bold'";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;



				$col = array();
				$col["title"] = "Kontrolloi (Doctor)"; // caption of column
				$col["name"] = "kontrolloi";
				$col["dbname"] = "CONCAT(c.emri, ' ', c.mbiemri)"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
				$col["width"] = "100";
				$col["align"] = "center";
				//$col["editable"] = true;
				$col["hidden"] = false;
				//$col["editrules"] = array("edithidden"=>true);
				$cols[] = $col;

				$col = array();
				$col["title"] = "Download";
				$col["name"] = "download";
				$col["sortable"] = true; // this column is not sortable
				$col["search"] = true; // this column is not searchable
				//$col["default"] = "View More";
				$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"../raportet/raporti_nga_rekordet.php?sid='+cellval+'\">'+\"Download\"+'</a>'; }";
				$col["editable"] = false;
				$col["align"] = "center";
				$col["export"] = false;
				$col["width"] = "165";
				$col["edittype"] = "textarea"; // render as textarea on edit
				$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = false;
				$col["editrules"] = array("edithidden"=>true);

				$cols[] = $col;

				$col = array();
				$col["title"] = "Laboratori (Laboratory)";
				$col["name"] = "laboratori";
				$col["sortable"] = false; // this column is not sortable
				$col["search"] = false; // this column is not searchable
				//$col["default"] = "View More";
				$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"../download.php?id=s'+cellval+'\">'+\"Download\"+'</a>'; }";
				$col["editable"] = false;
				$col["align"] = "center";
				$col["export"] = false;
				$col["width"] = "165";

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = true;
				$col["editrules"] = array("edithidden"=>false);

				$cols[] = $col;

				$col = array();
				$col["title"] = "Usnm";
				$col["name"] = "usnm";
				$col["sortable"] = false; // this column is not sortable
				$col["search"] = false; // this column is not searchable
				//$col["default"] = "View More";
				$col["formatter"] = "function(cellval,options,rowdata){ return '<a target=\"_blank\" href=\"../download.php?id=s'+cellval+'\">'+\"Download\"+'</a>'; }";
				$col["editable"] = false;
				$col["align"] = "center";
				$col["export"] = false;
				$col["width"] = "165";

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = true;
				$col["editrules"] = array("edithidden"=>false);

				$cols[] = $col;




				/*
				$col = array();
				$col["title"] = "Diagnoza";
				$col["name"] = "diagnoza";
				$col["sortable"] = true; // this column is not sortable
				$col["search"] = true; // this column is not searchable
				$col["editable"] = true;
				$col["align"] = "center";
				$col["edittype"] = "textarea"; // render as textarea on edit
				$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = false;
				$col["editrules"] = array("edithidden"=>true);

				$cols[] = $col;

				$col = array();
				$col["title"] = "Terapia";
				$col["name"] = "terapia";
				$col["sortable"] = true; // this column is not sortable
				$col["search"] = true; // this column is not searchable
				$col["editable"] = true;
				$col["align"] = "center";
				$col["edittype"] = "textarea"; // render as textarea on edit
				$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = false;
				$col["editrules"] = array("edithidden"=>true);

				$cols[] = $col;

				$col = array();
				$col["title"] = "Ku udhezohet";
				$col["name"] = "ku_udhezohet";
				$col["sortable"] = true; // this column is not sortable
				$col["search"] = true; // this column is not searchable
				$col["editable"] = true;
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
				$col["align"] = "center";
				$col["edittype"] = "textarea"; // render as textarea on edit
				$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = false;
				$col["editrules"] = array("edithidden"=>true);

				$cols[] = $col;

				$col = array();
				$col["title"] = "Cmimi";
				$col["name"] = "cmimi";
				$col["sortable"] = true; // this column is not sortable
				$col["search"] = true; // this column is not searchable
				$col["editable"] = true;
				$col["align"] = "center";
				$col["edittype"] = "textarea"; // render as textarea on edit
				$col["editoptions"] = array("rows"=>2, "cols"=>20); // with these attributes

				// don't show this column in list, but in edit/add mode
				//edited from true(bes)$col["hidden"] = true;
				$col["hidden"] = true;
				$col["editrules"] = array("edithidden"=>true);

				$cols[] = $col;*/

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


			<!--<?php echo $g->select_command ?>-->
			<?php echo $out?>

</body>
</html>
