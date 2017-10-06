<?php

require('fpdf181/fpdf.php');
require_once( 'databaze.php');


/************************************/
/* global functions                 */
/************************************/
function hex2dec($color = "#000000")
{
    $tbl_color = array();
    $tbl_color['R']=hexdec(substr($color, 1, 2));
    $tbl_color['G']=hexdec(substr($color, 3, 2));
    $tbl_color['B']=hexdec(substr($color, 5, 2));
    return $tbl_color;
}

function px2mm($px) { return $px*25.4/72; }

function txtentities($html)
{
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}

/************************************/
/* main class createPDF             */
/************************************/
class createPDF 
{

    function __construct($post) 
    {
    	
        
        $this->emriDok=$_SESSION['emriDok'];
    	$this->mbiemriDok=$_SESSION['mbiemriDok'];

		$this->emri=$_SESSION['emri'];
        $this->telefoniInput=$_SESSION['telefoni'];
		$this->numriID=$_SESSION['numriid'];
		$this->adresaInput=$_SESSION['adresa'];
		$this->ditelindjaInput=$_SESSION['ditelindja'];
		

        $this->emailInput=$_SESSION['email'];
        $this->vendlindja=$_SESSION['vendlindja'];
        $this->gjiniaInput=$_SESSION['gjinia'];
        $this->nrDosjes=$_SESSION['nrDosjes'];
        $this->njesiaInput=$_SESSION['njesia'];
		
		$this->alergjiteInput=$_SESSION['alergjite'];
        $this->ankesaInput=$_SESSION['ankesa'];
        $this->anamnezaInput=$_SESSION['anamnezaSemundjes'];
        $this->anamnezaFamiljes=$_SESSION['anFamiljes'];
        $this->TAinput=$_SESSION['ta'];
        $this->pulsiInput=$_SESSION['pulsi'];
        $this->spoInput=$_SESSION['spo2']." %";
        $this->komentInput=$_SESSION['koment'];
        $this->perfundim=$_SESSION['perfundimi'];
        $this->trajtim=$_SESSION['trajtimi'];
        $this->laborator=$_SESSION['laboratori'];

        $this->raportMjeksor=$_SESSION['rap'];

        $this->diagnozaInput=$_SESSION['diagnoza'];
        $this->rp=$_SESSION['Rp'];


        $this->udhPer=$_SESSION['udhPer'];
        $this->diagnozaKonsult=$_SESSION['diagnoza'];
        $this->gjPrez=$_SESSION['gjPrez'];
        $this->terapiaAp=$_SESSION['terapiaAp'];

        $this->udhPerLab=$_SESSION['udhPerLab'];
        //$this->diagnozaLab=$_SESSION['diagnozaLab'];
        $this->gjPrezLab=$_SESSION['gjPrezLab'];
        $this->terLab=$_SESSION['terLab'];

        $this->udhezohetPerRent=$_SESSION['udhezohetPerRent'];
        //$this->diagnozaRent=$_SESSION['diagnozaRent'];
        $this->gjPrezenteRent=$_SESSION['gjPrezenteRent'];
        $this->terapiaApRent=$_SESSION['terapiaApRent'];

        $this->origjina=$_SESSION['origjina'];
        $this->destinacioni=$_SESSION['destinacioni'];
        $this->shenime=$_SESSION['shenime'];

        $this->qellimiLar=$_SESSION['qellimiLar'];
        $this->prej=$_SESSION['prej'];
        $this->deriInput=$_SESSION['deri'];

        $this->entiInput=$_SESSION['enti'];
        $this->ditaPareInput=$_SESSION['fillimi'];
        $this->ditaFunditInput=$_SESSION['fundi'];
        $this->numriDiteveInput=$_SESSION['numri'];
        $this->komentInputRaport=$_SESSION['komentRaport'];
				
        // other options
        $this->from='iso-8859-2';         // input encoding
        $this->to='cp1250';               // output encoding
        $this->useiconv=false;            // use iconv
        $this->bi=true;                   // support bold and italic tags
        
        define('EeMadhe',chr(203));
		define('EeVogel',chr(235));

        //variablat statike 
        $this->titulli = "LIMAK KOSOVO INTERNATIONAL AIRPORT J.S.C.";
        $this->titulli1 = "SH". EeMadhe."RBIMI MJEK".EeMadhe."SOR/ MEDICAL SERVICE";
		$this->raportTitulli = "RAPORT MJEK".EeMadhe."SOR/ MEDICAL REPORT";

        
        //PJESA 1
        $this->te_dhenat="<B>T".EeMadhe." DH".EeMadhe."NAT E P".EeMadhe."RGJITHSHME</B><EM> (GENERAL DATA):</EM>";
        $this->emri_mbiemri="<pre>EMRI MBIEMRI</pre><i> (Full Name):</i>";
        $this->nr_id="<pre>NR. ID</pre><i> (ID No.):</i>";
        $this->ditelindja="<pre>DIT".EeMadhe."LINDJA</pre><i> (DOB):</i>";
        $this->vendi_lindjes="<pre>VENDI I LINDJES</pre><i> (POB):</i>";
        $this->gjinia="<pre>GJINIA</pre><i> (Gender):</i>";
        $this->nr_dosjes="<pre>NR. DOSJES</pre><i> (File No.):</i>";
        $this->njesia="<pre>NJ".EeMadhe."SIA</pre><i> (Unit):</i>";
        $this->adresa="<pre>ADRESA</pre><i> (Address):</i>";
        $this->email="<pre>EMAIL:</pre><i></i>";
        $this->telefoni="<pre>TEL</pre><i> (Telephone):</i>";

       $this->alergjite="<pre>ALERGJITE</pre><i> (Allergy):</i>";
        $this->ankesa="<pre>ANKESA</pre><i> (Complaint):</i>";
        $this->anamneza_semundjes="<pre>ANAMNEZA E S".EeMadhe."MUNDJES</pre><i> (Disease Anamnesis):</i>";
        $this->ekzaminimi_fizikal="<pre>EKZAMINIMI FIZIKAL</pre><i> (Physical Examination):</i>";
        $this->ta="<pre>TA:</pre>";
        $this->pulsi="<pre>Pulsi:</pre>";
        $this->spo="<pre>SPO<sub>2</sub>:</pre>";
        $this->koment="<pre>                                         Koment</pre><i> (Comment):</i>";
        $this->koment1="<pre>Koment</pre><i> (Comment):</i>";
        $this->anamneza_familjes="<pre>ANAMNEZA E FAMILJES</pre><i> (Family Anamnesis):</i>";
        $this->perfundimi="<pre>P".EeMadhe."RFUNDIMI</pre><i> (Conclusion):</i>";
        $this->trajtimi="<pre>TRAJTIMI</pre><i> (Medical Treatment):</i>";
        $this->laboratori="<pre>LABORATORI</pre><i> (Laboratory):</i>";
        $this->Diagnoza = "<pre>DIAGNOZA</pre><i> (Diagnosis):</i>";
        
        //PJESA 2
        $this->raport_mjekesor="<B>RAPORT MJEK".EeMadhe."SOR</B><i> (MEDICAL REPORT)</i>";
        $this->raporti="<pre>Raporti</pre><i> (Report):</i>";
        
        //PJESA 3
        $this->Recete = "<B>RECET".EeMadhe."</B><i> (RECIPE)</i>";
        $this->Rp = "<pre>Rp</pre><i> (Rp):</i>";
        
        //PJESA 4
        $this->udhezim_konsultime="<B>UDH".EeMadhe."ZIM P".EeMadhe."R KONSULTIME</B><i> (MEDICAL GUIDANCE FOR CONSULTATION)</i>";
        $this->udhezohet_per="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnoza="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjendja_pre="<pre>Gjendja prezente</pre><i> (Present condition):</i>";
        $this->terapia_apl="<pre>Terapia e aplikuar</pre><i> (Applied therapy):</i>";
        
        //PJESA 5
        $this->udhezim_laborator="<B>UDH".EeMadhe."ZIM P".EeMadhe."R EKZAMINIME LABORATORIKE</B><i> (MEDICAL GUIDANCE FOR LABORATORY EXAMINATIONS)</i>";
        $this->udhezohet="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnozau="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjendja_p="<pre>Gjendja prezente</pre><i> (Present Condition):</i>";
        $this->terapia_ap="<pre>Terapia e aplikuar</pre><i> (Applied therapy):</i>";
        
        //PJESA 6
        $this->udhezim_rentgen="<B>UDH".EeMadhe."ZIM P".EeMadhe."R EKZAMINIME RENTGENOLOGJIKE</B><i> (MEDICAL GUIDANCE FOR ROENTGENOLOGICAL EXAMINATIONS)</i>";
         $this->udhezoheet="<pre>Udh".EeVogel."zohet p".EeVogel."r</pre><i> (Guided for):</i>";
        $this->diagnozaau="<pre>Diagnoza</pre><i> (Diagnosis):</i>";
        $this->gjeendja_p="<pre>Gjendja prezente</pre><i> (Present Condition):</i>";
        $this->terapia_aplikuar="<pre>Terapia e aplikuar</pre><i> (Applied Therapy):</i>";
        
        //PJESA 7
        $this->raport_pasagjer="<B>RAPORT UDH".EeMadhe."TIMI P".EeMadhe."R UDH".EeMadhe."TAR</B><i> (TRAVEL REPORT FOR PASSENGER)</i>";
     	$this->origjinap="<pre>Origjina</pre><i> (Origin):</i>";
        $this->destinimip="<pre>Destinimi</pre><i> (Destination):</i>";
        $this->shenimep="<pre>Sh".EeVogel."nime</pre><i> (Notes):</i>";
        $this->notep="The passenger signed below here by confirms that concerning his health condition at the present time takes all responsibility towards the Airlines, its employees and its representative in connection with this flight. She or he is responsible for any damages, injuries or other complications, as well as additional expense, which may arise for the Airlines.    ";
        $this->passengersignature="<PRE>Udh".EeVogel."tari</PRE><i> (Passenger):</i>";
        $this->psignature="<i>  __________________________</i>";
        
        //PJESA 8
        $this->leje_largimi="<B>LEJE P".EeMadhe."R LARGIM NGA VENDI I PUN".EeMadhe."S </B><i> (PERMIT TO LEAVE WORK)</i>";
        $this->qellimi_largimit="<pre>Q".EeVogel."llimi i largimit</pre><i> (Reason for leaving): </i>";
        $this->koha_largimit="<pre>Koha e largimit</pre><i> (Time Of Leave): </i><pre>Prej </pre><i>(From):</i>";
        $this->deri="<pre>Deri </pre><i>(To):</i>";

        //PJESA 9
        $this->raport_nderprerje="<B>RAPORT I ND".EeMadhe."RPRERJES S".EeMadhe." P".EeMadhe."RKOH".EeMadhe."SHME P".EeMadhe."R PUN".EeMadhe."</B><i> (TEMPORARY LEAVE REPORT)</i>";
        $this->entiShendetesor="<pre>Enti Sh".EeVogel."ndet".EeVogel."sor</pre><i> (Health entity):</i>";
        $this->ditaPare="<pre>Dita e par".EeVogel."</pre><i> (First day):</i>";
        $this->ditaFundit="<pre>Dita e fundit</pre><i> (Last day):</i>";
        $this->NumriDiteve="<pre>Numri i dit".EeVogel."ve pushim</pre><i> (Number of days off):</i>";

        //$this->doctorsignature="<pre>Doktori</pre><i> (Doctor):</i>";
        $this->dsignature=" : __________________________";
    }

    function _convert($s) 
    {
        if ($this->useiconv) 
            return iconv($this->from,$this->to,$s); 
        else 
            return $s;
    }

    function run() 
    {

    	$pdf=new PDF('P','mm','A4',$this->titulli,$this->titulli1,$this->raportTitulli,false);
        $pdf->AddPage();
		
		$pdf->SetTitle('RaportiMjekesor');
		$pdf->SetAutoPageBreak(true,30); 
        $pdf->Ln(2);
                
		//1.TE DHENAT E PERGJITHSHME
		$pdf->WriteHTML($this->te_dhenat);
		$pdf->Ln(10);

     	//Rreshti nje
		$pdf->WriteHTML($this->emri_mbiemri);
		$pdf->Cell(4.8);
		$pdf->Cell(60,5,$this->emri,0,0);   		
		$pdf->Cell(1.3,5,"",0,0);
		$pdf->WriteHTML($this->nr_id);
		$pdf->Cell(9);
		$pdf->Cell(52,5,$this->numriID,0,1);
     	$pdf->Cell(500,1,"",0,1);
     		
		//Rreshti dy
		$pdf->WriteHTML($this->adresa);
		$pdf->Cell(17,10,"",0,0);
		$pdf->Cell(60,5,$this->adresaInput,0,0);
		$pdf->Cell(1,10,"",0,0);
		$pdf->WriteHTML($this->telefoni);
		$pdf->Cell(7);
		$pdf->Cell(52,5,$this->telefoniInput,0,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti tre
		$pdf->WriteHTML($this->vendi_lindjes);
		$pdf->Cell(9.7);
		$pdf->Cell(60,5,$this->vendlindja,0,0);
		$pdf->Cell(1,10,"",0,0);
		$pdf->WriteHTML($this->ditelindja);
		$pdf->Cell(2.5);
		$pdf->Cell(52,5,$this->ditelindjaInput,0,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti kater
		$pdf->WriteHTML($this->gjinia);
		$pdf->Cell(21);
		$pdf->Cell(60,5,$this->gjiniaInput,0,0);
		$pdf->Cell(1,10,"",0,0);
		$pdf->WriteHTML($this->email);
		$pdf->Cell(21.2);
		$pdf->Cell(52,5,$this->emailInput,0,1);
     
		$pdf->Cell(500,1,"",0,1);

		//Rreshti pese
		$pdf->WriteHTML($this->nr_dosjes);
		$pdf->Cell(12);
		$pdf->Cell(60,5,'$this->nrDosjes',0,0);
		$pdf->Cell(1,10,"",0,0);
		$pdf->WriteHTML($this->njesia);
		$pdf->Cell(10.8);
		$pdf->Cell(52,5,$this->njesiaInput,0,1);

		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->alergjite);
		$pdf->Cell(44);
		$pdf->MultiCell(116,5,$this->alergjiteInput,0,"L",false);
     
		$pdf->Cell(500,5,"",0,1);
		$pdf->WriteHTML($this->ankesa);
		$pdf->Cell(44);
		$pdf->MultiCell(116,5,$this->ankesaInput,0,"L",false);
     
		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->anamneza_semundjes);
		$pdf->Cell(2);
		$pdf->MultiCell(116,5,$this->anamnezaInput,0,"L",false);

		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->anamneza_familjes);
		$pdf->Cell(8.5);
		$pdf->MultiCell(116,5,$this->anamnezaFamiljes,0,"L",false);
    
		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->ekzaminimi_fizikal);
		$pdf->Cell(10.1);
		$pdf->WriteHTML($this->ta);
		$pdf->Cell(2);
		$pdf->Cell(20,5,$this->TAinput,0,0);

		$pdf->Cell(5);
		$pdf->WriteHTML($this->pulsi);
		$pdf->Cell(2);
		$pdf->Cell(20,5,$this->pulsiInput,0,0);

		$pdf->Cell(5);
		$pdf->WriteHTML($this->spo);
		$pdf->Cell(2);
		$pdf->Cell(20,5,$this->spoInput,0,1);

		$pdf->Cell(500,1.5,"",0,1);
		$pdf->WriteHTML($this->koment);
		$pdf->Cell(17.2);
		$pdf->MultiCell(108,5,$this->komentInput,0,'L',false);

		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->laboratori);
		$pdf->Cell(35.5);
		$pdf->MultiCell(116,5,$this->laborator,0,"L",false);

		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->Diagnoza);
		$pdf->Cell(40.5);
		$pdf->MultiCell(116,5,$this->diagnozaInput,0,"L",false);
      
		$pdf->Cell(500,3,"",0,1);
		$pdf->WriteHTML($this->trajtimi);
		$pdf->Cell(30.6);
		$pdf->MultiCell(116,5,$this->trajtim,0,"L",false);

		$pdf->Cell(500,3,"",0,1);
        $pdf->WriteHTML($this->perfundimi);
		$pdf->Cell(35.7);
		$pdf->MultiCell(116,5,$this->perfundim,0,"L",false);   
		
        if (!empty($_SESSION["rap"])) 
		{
			$pdf->Ln(5);
			$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(5);

			//2.RAPORT MJEKESOR
			$pdf->WriteHTML($this->raport_mjekesor);
			$pdf->Cell(100);
			$pdf->Cell(100);
     
			$pdf->WriteHTML($this->raporti);
			$pdf->Cell(2);
			$pdf->MultiCell(165,5,$this->raportMjeksor,0,'L',false);
			//$pdf->PutLine(5,20,420,20);
			
		}

		if (!empty($_SESSION["Rp"])) 
		{
			$pdf->Ln(5);
			$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(5);

			//3.RECETE
			$pdf->WriteHTML($this->Recete);
			$pdf->Cell(100);
			$pdf->Cell(100);
     
			$pdf->WriteHTML($this->Rp);
			$pdf->Cell(2);
			$pdf->MultiCell(157.5,5,$this->rp,0,'L',false);
			
  			
		}

  		if (!empty($_SESSION["udhPer"])||!empty($_SESSION["gjPrez"])||!empty($_SESSION["terapiaAp"])) 
  		{
  			$pdf->Ln(5);
			$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(5);

			//4.UDHEZIM PER KONSULTIME
			$pdf->WriteHTML($this->udhezim_konsultime);
			$pdf->Cell(100);
			$pdf->Cell(100);
     
			$pdf->WriteHTML($this->udhezohet_per);
			$pdf->Cell(16);
			$pdf->MultiCell(135,5,$this->udhPer,0,'L',false);
			$pdf->Cell(3,5,"",0,1);
		
			$pdf->WriteHTML($this->gjendja_p);
			$pdf->Cell(2.5);
			$pdf->MultiCell(135,5,$this->gjPrez,0,'L',false);
			$pdf->Cell(3,5,"",0,1);
     
			$pdf->WriteHTML($this->terapia_apl);
			$pdf->Cell(4.3);
			$pdf->MultiCell(135,5,$this->terapiaAp,0,'L',false);
			
			
		}

		if (!empty($_SESSION["udhPerLab"])||!empty($_SESSION["gjPrezLab"])||!empty($_SESSION["terLab"])) 
		{
			$pdf->Ln(5);
			//$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(55);

			//5.UDHEZIM PER EKZAMINIME LABORATORIKE
			$pdf->WriteHTML($this->udhezim_laborator);
			$pdf->Cell(100);
			$pdf->Cell(100);
     	
			$pdf->WriteHTML($this->udhezohet);
			$pdf->Cell(15);
			$pdf->MultiCell(136,5,$this->udhPerLab,0,'L',false);
			$pdf->Cell(3,5,"",0,1);
          
			$pdf->WriteHTML($this->gjendja_pre);
			$pdf->Cell(2);
			$pdf->MultiCell(136,5,$this->gjPrezLab,0,'L',false);
			$pdf->Cell(3,5,"",0,1);
     
			$pdf->WriteHTML($this->terapia_ap);
			$pdf->Cell(3);
			$pdf->MultiCell(136,5,$this->terLab,0,'L',false);
			
  			
		}

		if (!empty($_SESSION["qellimiLar"])||!empty($_SESSION["prej"])||!empty($_SESSION["deri"])) 
		{
			$pdf->Ln(5);
			$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(5);

  		//8.LEJE PER LARGIM NGA PUNA
		$pdf->WriteHTML($this->leje_largimi);
		$pdf->Cell(100);
		$pdf->Cell(100);
     
		$pdf->WriteHTML($this->qellimi_largimit);
		$pdf->Cell(2);
		$pdf->MultiCell(134.2,5,$this->qellimiLar,0,'L',false);
		$pdf->Cell(3,5,"",0,1);
     
		$pdf->WriteHTML($this->koha_largimit);
		$pdf->Cell(2);
		$pdf->Cell(25,5,$this->prej,0,0);
		//$pdf->Cell(2,1,"",0,0);
		$pdf->WriteHTML($this->deri);
		$pdf->Cell(2);
		$pdf->Cell(52,5,$this->deriInput,0,0);
		//$pdf->PutLine(5,20,420,20);
  		//$pdf->SetAutoPageBreak(true,90); 
		
		}
		
		if (!empty($_SESSION["udhezohetPerRent"])||!empty($_SESSION["gjPrezenteRent"])||!empty($_SESSION["terapiaApRent"])) 
		{
			$pdf->Ln(10);
		$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
		$pdf->Ln(5);

		//6.UDHEZIM PER EKZAMINIME RENTGENOLOGJIKE
		$pdf->WriteHTML($this->udhezim_rentgen);
		$pdf->Cell(100);
		$pdf->Cell(100);
     	
     	$pdf->WriteHTML($this->udhezohet);
		$pdf->Cell(16);
		$pdf->MultiCell(135,5,$this->udhezohetPerRent,0,'L',false);
		$pdf->Cell(3,5,"",0,1);
          
		$pdf->WriteHTML($this->gjendja_pre);
		$pdf->Cell(2.5);
		$pdf->MultiCell(135,5,$this->gjPrezenteRent,0,'L',false);
		$pdf->Cell(3,5,"",0,1);
     
		$pdf->WriteHTML($this->terapia_ap);
		$pdf->Cell(3.8);
		$pdf->MultiCell(135,5,$this->terapiaApRent,0,'L',false);
		 
		
		}
	
		if (!empty($_SESSION["origjina"])||!empty($_SESSION["destinacioni"])||!empty($_SESSION["shenime"])) 
		{
			$pdf->Ln(5);
		$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
		$pdf->Ln(5);

		//7. RAPORT UDHETIMI PER PASAGJER
		$pdf->WriteHTML($this->raport_pasagjer);
		$pdf->Cell(100);
		$pdf->Cell(100);
          
		$pdf->WriteHTML($this->origjinap);
		$pdf->Cell(2);
		$pdf->Cell(35,5,$this->origjina,0,0);
		//$pdf->Cell(2,3,"",0,0);
     
		$pdf->WriteHTML($this->destinimip);
		$pdf->Cell(2);
		$pdf->Cell(62,5,$this->destinacioni,0,1);
		$pdf->Ln(3);
     
		$pdf->WriteHTML($this->shenimep);
		$pdf->Cell(2);
		$pdf->MultiCell(163.5,5,$this->shenime,0,'L',false);
		$pdf->Ln(3);     
		$pdf->MultiCell(200,5,$this->notep,0,'L');
		$pdf->Ln(3); 

		$pdf->WriteHTML($this->passengersignature);
		$pdf->WriteHTML($this->psignature);

		

		}

		if (!empty($_SESSION["enti"])||!empty($_SESSION["fillimi"])||!empty($_SESSION["fundi"]) || !empty($_SESSION['numri'])) 
		{
			$pdf->Ln(5);
			$pdf->Cell(100,2,'......................................................................................................................................................................................................................',0,0);
			$pdf->Ln(5);

			//9. RAPORT PER NDERPRERJE TE PERKOHESHME PER PUNE
			$pdf->WriteHTML($this->raport_nderprerje);
			$pdf->Cell(100);
			$pdf->Cell(100);

			$pdf->WriteHTML($this->entiShendetesor);
			$pdf->Cell(2);
			$pdf->MultiCell(142,5,$this->entiInput,0,'L',false);
			$pdf->Ln(3);
     
			$pdf->WriteHTML($this->ditaPare);
			$pdf->Cell(2);
			$pdf->Cell(22,5,$this->ditaPareInput,0,0);

			$pdf->WriteHTML($this->ditaFundit);
			$pdf->Cell(2);
			$pdf->Cell(22,5,$this->ditaFunditInput,0,0);

			$pdf->WriteHTML($this->NumriDiteve);
			$pdf->Cell(2);
			$pdf->Cell(20,5,$this->numriDiteveInput,0,1);
			$pdf->Ln(3);

			$pdf->WriteHTML($this->koment1);
			$pdf->Cell(19);
			$pdf->MultiCell(142,5,$this->komentInputRaport,0,'L',false);
		
		}
		
		//Paraqitet te raporti gjeneral, nuk varet nga sections
		$pdf->Ln(30);  
		$pdf->WriteHTML($this->emriDok);
		$pdf->Cell(5,5," ",0,0);
		$pdf->WriteHTML($this->mbiemriDok);
		$pdf->Cell(5,5,"  : _______________________",0,1);
		$pdf->Cell(80);
		$pdf->Cell(60,20,"(V.V)",0,0);


		
		// output
		//$pdf->Output('C:/Users/gresa/Documents/'.date('Y-m-d')."_".$this->emri.".pdf",'F');
        $pdf->Output(date('Y-m-d')."_".$this->emri.".pdf",'I');

        // stop processing
        exit();  
    }
}


/************************************/
/* class PDF                        */
/************************************/
class PDF extends FPDF
{
    protected $B;
    protected $I;
    protected $U;
    protected $HREF;
    protected $fontList;
    protected $issetfont;
    protected $issetcolor;

    var $ALIGN='';

    function __construct($orientation='P',$unit='mm',$format='A4',$_title,$_url,$_url1,$_debug=false)
    {
        parent::__construct($orientation,$unit,$format);
        $this->B=0;
        $this->I=0;
        $this->U=0;
        $this->HREF='';
        $this->PRE='';
        $this->SetFont('Arial','',10);
        
        $this->fontlist=array('Times','Arial');
        $this->issetfont=false;
        $this->issetcolor=false;
        $this->articletitle=$_title;
        $this->articleurl=$_url;
        $this->url1=$_url1;
        
        $this->debug=$_debug;
        $this->AliasNbPages();
    }

    function WriteHTML($html)
    {
        //remove all unsupported tags
        $html=str_replace("\n",' ',$html); //replace carriage returns with spaces
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        
        foreach($a as $i=>$e)
        {
            if($i%2==0)
                {
                   //Text
                    if($this-> ALIGN =='center')
                    	$this->Cell(100,1,$e,0,1,'L');
                    else
                      	$this->Write(4.5,$e);
                      
                } 
                else 
                {
                    //Tag
                   	if($e[0]=='/')
                        $this->CloseTag(strtoupper(substr($e,1)));
                    
                    else 
                    {
                        //Extract attributes
                        $a2=explode(' ',$e);
                        $tag=strtoupper(array_shift($a2));
                        $attr=array();
                        foreach($a2 as $v) {
                            if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                                $attr[strtoupper($a3[1])]=$a3[2];
                        }
                        $this->OpenTag($tag,$attr);
                    }
                }
        }
    }

    function OpenTag($tag,$attr)
    {
        //Opening tag
        if($tag == 'STRONG')
            {
            	$this->SetFontSize(14);
            	//$this->ALIGN=$attr['ALIGN'];
            	$this->SetStyle('B',true);
            }
           
        if($tag == 'B')  
        	{
            	$this->SetFontSize(10);
            	$this->SetStyle($tag,true);
            }

        if($tag == 'EM')
        	{
        		$this->SetFontSize(10);
        		$this->SetStyle('I',true);
        	}
            
        if($tag== 'PRE')
            $this->SetFontSize(9);
                
        if($tag == 'I')
			{
				$this->SetStyle($tag,true);
				$this->SetFontSize(9);
			} 

		if($tag == 'U')
		{
			$this->SetStyle($tag,true);
			$this->SetFontSize(9);
		}

		if($tag == 'SUB')
		{
			$this->SetFontSize(6);
		}    
	}
    	
    function CloseTag($tag)
    {
        //Closing tag
       	if($tag == 'STRONG')
            {
            	$this->ALIGN='';
        		$this->SetStyle('B',false);
    		}
        
        if($tag == 'EM')
        {
        	$this->SetStyle('I',false);
        }

        if ($tag=='B' || $tag=='I' || $tag == 'U')
			$this->SetStyle($tag,false);         
    } 
	
	function SetStyle($tag,$enable)
    {
		$this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s) 
        {
            if($this->$s>0)
                $style.=$s;
        }
		
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->mySetTextColor(-1);
    }

    function PutLine()
    {
        $this->Ln(3);
        $this->Line($this->GetX(),$this->GetY(),$this->GetX()+198,$this->GetY());
        $this->Ln(3);
    }

    function mySetTextColor($r,$g=0,$b=0)
    {
        static $_r=0, $_g=0, $_b=0;

        if ($r==-1) 
            $this->SetTextColor($_r,$_g,$_b);
        else {
            $this->SetTextColor($r,$g,$b);
            $_r=$r;
            $_g=$g;
            $_b=$b;
        }
    }

    function Footer()
    {
    	// $this->data=date("Y/m/d");
    	$this->emriDok=$_SESSION['emriDok'];
    	$this->mbiemriDok=$_SESSION['mbiemriDok'];
    	$this->email=$_SESSION['emailDok'];
    	$this->nrtel=$_SESSION['nrtel'];

        //Go to 1.5 cm from bottom
        $this->SetY(-26);
        //Select Arial italic 8
        $this->SetFont('Times','',8);
        
        $this->PutLine(5,10,420,20);

        //Print centered page number
        $this->SetTextColor(0,0,0);
        //$this->Cell(0,4,'dfsdf',0,1,'C');
        $this->Cell(0,4,$this->emriDok.' '.$this->mbiemriDok.', '. '$this->data'.' '.date("h:i"),0,1,'C');
        //$this->Cell(0,4,$this->data.', '.date("h:i:sa").', '.$this->emriDok.' '.$this->mbiemriDok,0,1,'C');

        
        //$this->SetTextColor(0,0,180);
        $this->Cell(0,4,'Prishtina International Airport, Vrelle, Lipjan, 10070, '.$this->email.', '.$this->nrtel,0,0,'C',0);
        $this->mySetTextColor(-1);

        $this->Ln(4);
        $this->Cell(0,4,'Faqe (Page) '.$this->PageNo().'/{nb}',0,1,'C');
    }

    function Header()
    {
		$this->Image("limak_logo.png",10,11,60);
        //Select Arial bold 15
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',10);
        $this->Cell(150,10,$this->articletitle,0,0,'R');
		$this->Ln(4.5);
				
		$this->SetFont('Arial','',10);
        $this->Cell(138,10,$this->articleurl,0,0,'R');

        $this->Ln(4.5);
        $this->Cell(135,10,$this->url1,0,0,'R');
        $this->Ln(5);
        $this->Line($this->GetX(),$this->GetY()+3,$this->GetX()+190,$this->GetY()+3);
        
        //Line break
        $this->Ln(5);
        //$this->SetFont('Times','',20);
        //$this->mySetTextColor(-1);
    }

    function SetDash($black=null,$white=null)
    {
    	if($black !== null)
    		$s = sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
    	else
    		$s = '[] 0 d';
    	$this-> _out($s);
    }
}// class PDF

?>