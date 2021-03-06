<?php
/*
 * Copyright (C) 2014-2016 Florian HENRY <florian.henry@atm-consulting.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * \file lead/lead/list.php
 * \ingroup lead
 * \brief list of lead
 */
$res = @include '../../main.inc.php'; // For root directory
if (! $res)
	$res = @include '../../../main.inc.php'; // For "custom" directory
if (! $res)
	die("Include of main fails");

dol_include_once('/core/class/html.formother.class.php');
require_once DOL_DOCUMENT_ROOT . '/core/class/doleditor.class.php';

// Security check
if (! $user->rights->dyntable->admin)
	accessforbidden();

$title = 'Création de liste';

llxHeader('', $title);

$editor = New DolEditor('editor', '',520,200,full,'In',true,false,true);
$editor->Create();


print '<table class="noborder" width="100%">';
print '<tr>';
print '<td class="colone" style="height:540px;"><div align="center" id="table_in" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:540px; width:219px; overflow: auto;">';
Print '</tr>';
print '</table>';

$tables = $db->DDLListTables($db->database_name,MAIN_DB_PREFIX.'%');
$form  = new Form($db);

print $form->selectarray('table', $tables,'table',1,0,1,'',0,0,0,'','',1);




// print '<table class="noborder" width="100%">';
// print '<tr>';
// print '<td width = "70px">Légende:</td>';
// print '<td width = "90px">' . img_picto('porteur', 'reception.png@volvo') . ' = Porteur </td>';
// print '<td width = "90px">' . img_picto('porteur', 'tracteur.png@volvo') . ' = tracteur </td>';
// print '<td width = "70px"><span style="display: inline-block; width:15px; height:15px; background-color:#56ff56;"></span> = FH</td>';
// print '<td width = "70px"><span style="display: inline-block; width:15px; height:15px; background-color:#ff5656;"></span> = FM</td>';
// print '<td width = "70px"><span style="display: inline-block; width:15px; height:15px; background-color:#ffaa56;"></span> = FMX</td>';
// print '<td width = "70px"><span style="display: inline-block; width:15px; height:15px; background-color:#aad4ff;"></span> = FL</td>';
// print '<td width = "70px"><span style="display: inline-block; width:15px; height:15px; background-color:#aa56ff;"></span> = FE</td>';
// print '<td width = "90px"><span style="display: inline-block; width:15px; height:15px; background-color:#cccccc;"></span> = Non défini</td>';
// print '<td></td>';
// print '</tr>';
// print '</table>';

// print '<form method="post" action="' . $_SERVER['PHP_SELF'] . '" name="search_form">' . "\n";
// print '<table class="noborder" width="100%">';
// print '<tr class="liste_titre" style="height:27px;">';
// print '<th class="liste_titre" align="center" width = "160px">';
// print '<div class="inline-block divButAction" style="height:13px;"><a href="javascript:createlead()" class="butAction">Nouvelle Affaire .</a></div>';

// print '</th>';
// print '<th class="liste_titre" align="center" width = "160px">Année: ';
// $formother->select_year($year,'year',1, 5, 0);
// print '</th>';
// print '<th class="liste_titre" align="center" width = "320px">Commercial: '. $form->select_dolusers($search_commercial,'search_commercial',1,array(),$search_commercial_disabled,$user_included) . '</th>';
// print '<th class="liste_titre" align="center" width = "60px">';
// print '<div align="left"><input class="liste_titre" type="image" src="' . DOL_URL_ROOT . '/theme/' . $conf->theme . '/img/search.png" value="' . dol_escape_htmltag($langs->trans("Search")) . '" title="' . dol_escape_htmltag($langs->trans("Search")) . '">';
// print '&nbsp;<input type="image" class="liste_titre" name="button_removefilter" src="' . DOL_URL_ROOT . '/theme/' . $conf->theme . '/img/searchclear.png" value="' . dol_escape_htmltag($langs->trans("RemoveFilter")) . '" title="' . dol_escape_htmltag($langs->trans("RemoveFilter")) . '"></div>';
// print '</th>';
// print '<th class="liste_titre" align="center"></th>';
// print "</tr>";
// print '</table>';
// print '</form>';
// // etete tableau
// print '<table class="border" width="100%">';
// print '<tr class="liste_titre">';
// print '<td class="liste_titre" align="center" colspan="2">En Cours Chaudes</td>';
// print '<td class="liste_titre" align="center" colspan="2">Traités Modifiable</td>';
// print '<td class="liste_titre" align="center">Perdues</td>';
// print '<td class="liste_titre" align="center">Sans Suite</td>';
// print "</tr>\n";
// print '<tr style="height:140px;">';

// //affaires en cours chaude
// print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" id="encours_chaude_1" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:540px; width:219px; overflow: auto;">';
// $i=0;
// foreach ($object1->lines as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}
// 	print'<div class="cal_event cal_event_busy" align="left" draggable="true"; ondragstart="drag(event);" id="'. $line->id . '" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// 	$i++;
// 	if ($i>= $mid1|| $mid1 == 0){
// 		print '</div></td>';
// 		print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" id="encours_chaude_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:540px; width:219px; overflow: auto;">';
// 		$i =-1*$i;
// 	}
// }
// if($resql1==0){
// 	print '</div></td>';
// 	print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" id="encours_chaude_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:540px; width:219px; overflow: auto;">';
// }
// print '</div></td>';

// //affaire traitée modifiables
// print '<td class="colone" style="height:140px;"><div align="center" id="traite_1" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// $i=0;
// foreach ($lines2 as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}

// 	print'<div class="cal_event cal_event_busy" align="left" draggable="true" ondragstart="drag(event);" id="'. $line->id . '" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// 	$i++;
// 	if ($i>= $mid5){
// 		print '</div></td>';
// 		print '<td class="colone" style="height:140px;"><div align="center" id="traite_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// 		$i =-1*$i;
// 	}
// }
// if($mid5==0){
// 	print '</div></td>';
// 	print '<td class="colone" style="height:140px;"><div align="center" id="traite_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// }
// print '</div></td>';

// //affaire perdues
// print '<td class="colone" rowspan="5" style="height:700px;"><div align="center" id="perdu" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:700px; width:219px; overflow: auto;">';
// foreach ($object4->lines as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}
// 	print'<div class="cal_event cal_event_busy" align="left" draggable="true" ondragstart="drag(event);" id="'. $line->id . '" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// }
// print '</div></td>';

// //affaires sans suite
// print '<td class="colone"rowspan="5" style="height:700px;"><div align="center" id="sanssuite" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:700px; width:219px; overflow: auto;">';
// foreach ($object5->lines as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}
// 	print'<div class="cal_event cal_event_busy" align="left" draggable="true" ondragstart="drag(event);" id="'. $line->id . '" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// }
// print '</div></td>';

// //changement de ligne --> affaires traitées non modifiables--> titre
// print '</tr style="height:20px;">';
// print '<tr class="liste_titre">';
// print '<td class="liste_titre" align="center" colspan="2" style="height:20px;"><div style="height:20px;">Traitées Non Modifiable</div></td>';
// print '</tr>';
// print '<tr style="height:380px;">';

// //changement de ligne --> affaires traitées non modifiables--> data
// print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" style="height:540px; width:219px; overflow: auto;">';
// $i=0;
// foreach ($lines1 as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}

// 	print'<div class="cal_event cal_event_busy" align="left" draggable="false" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// 	$i++;
// 	if ($i>= $mid4){
// 		print '</div></td>';
// 		print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" style="height:540px; width:219px; overflow: auto;">';
// 		$i =-1*$i;
// 	}
// }
// if($mid4 == 0){
// 	print '</div></td>';
// 	print '<td class="colone" rowspan="3" style="height:540px;"><div align="center" style="height:540px; width:219px; overflow: auto;">';
// }
// print '</div></td>';

// //changement de ligne --> affaires en cours froides--> titre
// print '</tr style="height:20px;">';
// print '<tr class="liste_titre">';
// print '<td class="liste_titre" align="center" colspan="2" style="height:20px;"><div style="height:20px;">En Cours Froides</div></td>';
// print '</tr>';
// print '<tr style="height:140px;">';
// //changement de ligne --> affaires en cours froides--> titre
// print '<td class="colone" style="height:140px;"><div align="center" id="encours_froide_1" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// $i=0;
// foreach ($object2->lines as $line){
// 	$line->fetch_thirdparty();
// 	if($line->array_options['options_type']==1){
// 		$img = img_picto('porteur', 'reception.png@volvo');
// 	}elseif($line->array_options['options_type']==2){
// 		$img = img_picto('porteur', 'tracteur.png@volvo');
// 	}
// 	if($line->array_options['options_gamme'] == 1){
// 		$color = '#56ff56';
// 		$color2= '#00ff00';
// 	}elseif($line->array_options['options_gamme'] == 2){
// 		$color = '#ff5656';
// 		$color2= '#ff0000';
// 	}elseif($line->array_options['options_gamme'] == 18){
// 		$color = '#ffaa56';
// 		$color2= '#ff7f00';
// 	}elseif($line->array_options['options_gamme'] == 3){
// 		$color = '#aad4ff';
// 		$color2= '#56aaff';
// 	}elseif($line->array_options['options_gamme'] == 4){
// 		$color = '#aa56ff';
// 		$color2= '#7f00ff';
// 	}else{
// 		$color = '#cccccc';
// 		$color2= '#b2b2b2';
// 	}
// 	print'<div class="cal_event cal_event_busy" align="left" draggable="true" ondragstart="drag(event);" id="'. $line->id . '" style="background:' . $color .'; background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color2.'));';
// 	print 'border-radius:6px; margin-bottom: 3px; width:200px;">';
// 	print $img . ' ';
// 	print '<a href="javascript:wievlead('.$line->id .')">' .$line->ref . '</a></br>';
// 	print $line->thirdparty->name;
// 	print '</div>';
// 	$i++;
// 	if ($i>= $mid2){
// 		print '</div></td>';
// 		print '<td class="colone" style="height:140px;"><div align="center" id="encours_froide_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// 		$i =-1*$i;
// 	}
// }
// if($resql2==0){
// 	print '</div></td>';
// 	print '<td class="colone" style="height:140px;"><div align="center" id="encours_froide_2" class="dropper" ondrop="drop(event);" ondragover="allowDrop(event);" style="height:140px; width:219px; overflow: auto;">';
// }
// print '</div></td>';

// //fin de tableau
// print '</tr>';
// print "</table>";
// print '<input type="hidden" name="ordercreatedid" id="ordercreatedid" />';
?>
<script type="text/javascript" language="javascript">

function createlead() {
	$div = $('<div id="createlead"><iframe width="100%" height="100%" frameborder="0" src="<?php echo dol_buildpath('/volvo/lead/leadexpress.php?action=create&userid='.$search_commercial, 1); ?>" style="display: block;"></iframe></div>');
	$div.dialog({
		modal:true,
		width:"90%",
		height:$(window).height() - 25,
		close:function() {
 			document.location.reload(true);
 		}
	});
}

function wievlead(idlead) {
	$div = $('<div id="wievlead"><iframe width="100%" height="100%" frameborder="0" src="<?php echo dol_buildpath('/volvo/lead/leadexpress.php', 1) . '?id='; ?>' + idlead + '" style="display: block;"></iframe></div>');
	$div.dialog({
 		modal:true,
		width:"90%",
		height:$(window).height() - 25,
		close:function() {
			if($('#ordercreatedid').val()>0){
				document.location.href='<?php echo dol_buildpath('/commande/card.php',2).'?id=';?>'+$('#ordercreatedid').val();
			}else{
				document.location.reload(true);
			}
		}
 	})
}


function allowDrop(ev) {
 	ev.preventDefault();
}

function drag(ev) {
	ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
	ev.preventDefault();
	var element = ev.dataTransfer.getData("text");
	var dest = ev.target.className;
	if (ev.target.className.indexOf('cal_event cal_event_busy')!=-1){
		dest = ev.target.parentNode.id;
		ev.target.parentNode.appendChild(document.getElementById(element));
	}
 	if (ev.target.className.indexOf('dropper')!=-1){
		dest = ev.target.id;
		ev.target.appendChild(document.getElementById(element));
 	}
 	$.ajax({
 		method: "POST",
 		url: "dragdrop.php",
 		data: {
 			id_lead: element,
 			new_statut: dest
 		},
 		success: function(msg){
 			if (msg != ""){
 				$('div.fiche ').first().prepend(msg);
 			}
 		},
 		error: function(msg){
 			alert( "erreur: " + msg );
 		}
 	})
}

document.getElementById("table").onchange = function(){
	$.ajax({
 		method: "POST",
 		url: "ajax/table_select.php",
 		data: {
 			table_add: document.getElementById("table").value,
 		},
 		success: function(msg){
 			if (msg != ""){
 				$('div.fiche ').first().prepend(msg);
 			}
 		},
 		error: function(msg){
 			alert( "erreur: " + msg );
 		}
	})
}

function visibilite(thingId) {
	var targetElement;
	targetElement = document.getElementById(thingId) ;
	if (targetElement.style.display == "none") {
		targetElement.style.display = "" ;
	} else {
		targetElement.style.display = "none" ;
	}
}


</script>
<?php

dol_fiche_end();
llxFooter();
$db->close();
