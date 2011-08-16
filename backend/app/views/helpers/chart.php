<?php
/*************************************************
 * Micro Bar Cart Helper
 *
 * Version 1.0
 * Randy Klepetko
 * for DMGx
 * 08/15/2011
 *
 *************************************************/

    class ChartHelper extends AppHelper {
        
        function drawChart($chartData, $index_name='Index', $unit_name='Each', $tableSize = 600){
            $maxValue = 0;
            
            // First get the max value from the array
            foreach ($chartData as $item) {
                if ($item['value'] > $maxValue) $maxValue = $item['value'];
            }
            
            // Now set the theoretical maximum value depending on the maxValue
            $maxBar = 1;
            while ($maxBar < $maxValue) $maxBar = $maxBar * 1.1;
            $maxBar = ceil($maxBar);
            
            // Calculate 1px value as the table is 300px
             $pxValue = $tableSize/$maxBar;
            
            // Now display the table with bars
            echo '<table><tr><th class="index_title">'.$index_name.'</th><th colspan="2" class="unit_title">'.$unit_name.'</th></tr>';
            foreach ($chartData as $item) {
                $width = ceil($item['value']*$pxValue);
                echo '<tr><td class="index_name">'.$item['title'].'</td>';
                echo '<td width="'.($maxBar*$pxValue).'">
                    <img src="img/barbg.gif" alt="'.$item['title'].'" width="'.$width.'" height="15" /></td>';
                echo '<td class="chart_value">'.$item['value'].'</td></tr>';
            }
            echo '</table>';
        
        }
        
        function drawChart2($chartData, $index_name='Index', $unit_name='Each', $tableSize = 600){
            $maxValue0 = 0;
            $maxValue1 = 0;
            
            // First get the max value from the array
            foreach ($chartData as $item) {
                if ($item['value'][0] > $maxValue0) $maxValue0 = $item['value'][0];
                if ($item['value'][1] > $maxValue1) $maxValue1 = $item['value'][1];
            }
            $maxValue = $maxValue0 + $maxValue1;
            
            // Now set the theoretical maximum value depending on the maxValue
            $maxBar = 1;
            while ($maxBar < $maxValue) $maxBar = $maxBar * 1.1;
            
            // Calculate 1px value as the table is 300px
             $pxValue = $tableSize/$maxBar;
             $pxValue1 = $tableSize/$maxBar*$maxValue0/$maxValue;
             $pxValue2 = $tableSize/$maxBar*$maxValue1/$maxValue;
            
            // Now display the table with bars
            echo '<table><tr><th class="index_title">'.$index_name.'</th><th class="unit_title0">'.$unit_name[0].'</th><th class="unit_title1" text-align="right" align="right">'.$unit_name[1].'</th></th><th colspan="2" class="unit_title2"></th></tr>';
            foreach ($chartData as $item) {
                $width0 = ceil($item['value'][0]*$pxValue);
                $width1 = ceil($item['value'][1]*$pxValue);
                echo '<tr><td class="index_name">'.$item['title'].'</td>';
                echo '<td width="'.($maxBar*$pxValue1).'" class="index_bar0">
                    <img src="img/barbg.gif" alt="'.$item['title'].' '.$unit_name[0].'" width="'.$width0.'" height="15" /></td>';
                echo '<td width="'.($maxBar*$pxValue2).'" class="index_bar1">
                    <img src="img/barbg.gif" alt="'.$item['title'].' '.$unit_name[1].'" width="'.$width1.'" height="15"/></td>';
                echo '<td class="chart_value">'.$item['value'][0].'/'.$item['value'][1].'</td></tr>';
            }
            echo '</table>';
        
        }
    }
?>