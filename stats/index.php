<?php
/* Ancient Beast - Free Open Source Online PvP TBS: card game meets chess, with creatures.
 * Copyright (C) 2007-2012  Valentin Anastase (a.k.a. Dread Knight)
 *
 * This file is part of Ancient Beast.
 *
 * Ancient Beast is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * Ancient Beast is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * http://www.AncientBeast.com
 * https://github.com/FreezingMoon/AncientBeast
 * DreadKnight@FreezingMoon.org
 */

$stats = db_query("SELECT column_name FROM information_schema.columns WHERE table_name = 'ab_stats' AND column_name != 'id'");
foreach ($stats as $key => $x) {
	foreach ($x as $v) $stats[$key] = $v;
	$stats[$stats[$key]] = '<img src="../stats/' . $stats[$key] . '.png" title="' . ucfirst($stats[$key]) . '" onMouseOver="swap(this,\'mouseover_' . $stats[$key] . '\')" onMouseOut="swap(this,\'normal_' . $stats[$key] . '\')">'."\n";
	define(strtoupper($stats[$key]) . '_ICON', $stats[$stats[$key]]);
	unset($stats[$key]);
}

$counter = 0; //make it so $stats[0] = 'health'
foreach ($stats as $x) {
	$stats2[$counter] = $x;
	$counter++;
}

?>
<!--roll over image script-->
<script type="application/javascript">
var icons = new Array(
	"<?php echo implode(array_keys($stats), "\",\n\t\""); ?>"
);
for(var x in icons) {
	window["normal_" + icons[x]] = '../stats/' + icons[x] + '.png';
	window["mouseover_" + icons[x]] = '../stats/' + icons[x] + '.gif';
}
function swap(element, image) {$(element).attr('src', window[image]);} </script>
