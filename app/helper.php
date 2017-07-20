<?

class Helper
{
	static public function isLocal()
	{
		if ($_SERVER['SERVER_ADDR'] == '127.0.0.1') {
			return true;
		} else {
			return false;
		}
	}


	static public function spaces($qty, $space='&nbsp;')
	{
		$qty = (int)$qty;

		$s = $space;
		switch ($qty) {
			case 0:
				return;
				break;
			case 1:
				return $s;
				break;
			case 2:
				return $s.$s;
				break;
			case 3:
				return $s.$s.$s;
				break;
			case 4:
				return $s.$s.$s.$s;
				break;
			case 5:
				return $s.$s.$s.$s.$s;
				break;
			case 6:
				return $s.$s.$s.$s.$s.$s;
				break;
			case 7:
				return $s.$s.$s.$s.$s.$s.$s;
				break;
			default:
				$spaces = '';
				for ($i=0; $i<$qty; $i++) {
					$spaces .= $s;
				}
				return $spaces;
				break;
		}
	}


	static public function renderTable(array $heads, array $rows)
	{
		$out .= '<table border=0 cellpadding=0 cellspacing=0 class=border>';

		$out .= '<tr>';
		foreach ($heads as $head) {
	    	$out .= '<th>'.$head.'</th>';
		}
		$out .= '</tr>';

		foreach ($rows as $row) {
			$out .= '<tr>';
			foreach ($row as $td) {
		    	$out .= '<td>'.$td.'</td>';
			}
			$out .= '</tr>';
		}

		$out .= '</table>';

		return $out;
	}
}