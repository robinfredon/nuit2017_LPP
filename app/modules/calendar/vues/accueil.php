<?php
$titre = "Calendrier de l'Avent";
$corps="<div class='container-fluid'>";

		$nbrCol=5;
		foreach($data['donnees'] as $date)
		{
			$nbrCol++;
			if($nbrCol>=5)
			{
				$corps .= "</div><div class='row'>";
				$nbrCol=1;
			}

/*			if($date->get_date() <= date("Y-m-d"))
			{
*/				$u=URL_BASE."/public/images/".$date->getImg();
				$l=URL_BASE."/public/calendar/Base/day/".$date->getNbr();
/*			}else{
				$u=URL_BASE."/public/images/tn_cartman_noel.jpg";
				$l="";
			}
*/
			$corps .= "<a href='$l'><div class='col s3 m3 l3 case_calendar' style='background-image : url(";
			$corps .= $u.");'>". $date->getNbr() ."</div></a>";
		}
		$corps .= "</div></div>";

	/*<div class='row'>
		<div class="col s3 m3 l3 " style="background-image : url($u);">13</div>
		<div class="col s3 m3 l3">5</div>
		<div class="col s3 m3 l3">19</div>
		<div class="col s3 m3 l3">21</div>
	</div>
	<div class='row'>
		<div class="col s3 m3 l3">20</div>
		<div class="col s3 m3 l3">12</div>
		<div class="col s3 m3 l3">14</div>
		<div class="col s3 m3 l3">23</div>
	</div>
	<div class='row'>
        	<div class="col s3 m3 l3">15</div>
                <div class="col s3 m3 l3">6</div>
                <div class="col s3 m3 l3">1</div>
                <div class="col s3 m3 l3">18</div>
        </div>
        <div class='row'>
                <div class="col s3 m3 l3">7</div>
                <div class="col s3 m3 l3">10</div>
                <div class="col s3 m3 l3">24</div>
                <div class="col s3 m3 l3">3</div>
        </div>
        <div class='row'>
                <div class="col s3 m3 l3">2</div>
                <div class="col s3 m3 l3">17</div>
                <div class="col s3 m3 l3">8</div>
                <div class="col s3 m3 l3">11</div>
	</div>
        <div class='row'>
                <div class="col s3 m3 l3">9</div>
                <div class="col s3 m3 l3">22</div>
                <div class="col s3 m3 l3">4</div>
                <div class="col s3 m3 l3">16</div>
        </div>*/
$corps .= "</div>";

$lienjs="<script src='".URL_BASE."/public/js/calendar.js'></script>";

require '../app/config/gabarit.php';
?>
