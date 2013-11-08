<?php

/**
 * LibHtml - A library of functions for working with HTML. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibHtml
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Html {

	public function ArrayToHtml($Array, $HtmlTable = True) {
	    $HtmlOut = '';
	    foreach ($Array as $Key => $Value) {
	        if(is_array($Value)) {
	            if(!isset($HtmlTableHeader)) {
	            	$HtmlTableHeader = (
	            		'<th>' .
	            		implode('</th><th>', array_keys($Value)) .
	            		'</th>'
	            	);
	            }

	            array_keys($Value);
	            $HtmlOut .= '<tr>';
	            $HtmlOut .= $this->ArrayToHtml($Value, False);
	            $HtmlOut .= '</tr>';
	        } else {
	            $HtmlOut .= "<td>$Value</td>";
	        }
	    }

	    if ($HtmlTable) {
	        return '<table>' . $HtmlTableHeader . $HtmlOut . '</table>';
	    } else {
	        return $HtmlOut;
	    }
	}

// 	function array2Html($array, $table = true)
// {
//     $out = '';
//     foreach ($array as $key => $value) {
//         if (is_array($value)) {
//             if (!isset($tableHeader)) {
//                 $tableHeader =
//                     '<th>' .
//                     implode('</th><th>', array_keys($value)) .
//                     '</th>';
//             }
//             array_keys($value);
//             $out .= '<tr>';
//             $out .= $this->array2Html($value, false);
//             $out .= '</tr>';
//         } else {
//             $out .= "<td>$value</td>";
//         }
//     }

//     if ($table) {
//         return '<table>' . $tableHeader . $out . '</table>';
//     } else {
//         return $out;
//     }
// }

	/**
	 * PrintLine() will print a line in HTML. Depending on $Mode, will wrap in P or end with BR.
	 * @param string $Variable Optional. Default is null. The string to be displayed on output. 
	 * @param string $Mode Optional. Default is 'br'. Options are 'br', 'p', 'pre', or 'nl'. 
	 * @return string $PrintLine Returns newly formated string for HTML markup. 
	 */

	public function PrintLine($Variable = Null, $Mode = 'br') {
		if(is_array($Variable)) {
			foreach($Variable As $Key => $Value) {
				if($Mode == 'br') {
					$PrintLine = print($Key . ' = ' . $Value . '<br />' . "\n");
				} elseif($Mode == 'p') {
					$PrintLine = print('<p>' . $Key . ' = ' . $Value . '</p>' . "\n");
				} elseif($Mode == 'nl') {
					$PrintLine = print($Key . ' = ' . $Value . "\n");
				} elseif($Mode == 'pre') {
					$PrintLine = print('<pre>' . $Key . ' = ' . $Value . '</pre>' . "\n");
				} else {
					$PrintLine = print($Key . ' = ' . $Value . '<br />' . "\n");
				}
			}
		} else {
			if($Mode == 'br') {
				$PrintLine = print($Variable . '<br />' . "\n");
			} elseif($Mode == 'p') {
				$PrintLine = print('<p>' . $Variable . '</p>' . "\n");
			} elseif($Mode == 'nl') {
				$PrintLine = print($Variable . "\n");
			} elseif($Mode == 'pre') {
				$PrintLine = print('<pre>' . $Variable . '</pre>' . "\n");
			} else {
				$PrintLine = print($Variable . '<br />' . "\n");
			}
		}
		return $PrintLine;
	}

	public function Td($TableData) {
		$Td = print("<td>" . $TableData . "</td>");
		return $Td;
	}

	public function Pre($Text) {
		if(is_array($Text)) {
			$Pre = print('<pre>');
			$Pre .= print_r($Text);
			$Pre .= print('</pre>');
		} else {
			$Pre = print('<pre>' . $Text . '</pre>' . "\n");
		}		
		return $Pre;
	}

	public function Img($Source, $Height = Null, $Width = Null, $AltTitle = Null) {
		$Img = print("<img src=\"" . $Source . "\">");
	}
}

?>