<?php 


class calendar {

	private $currentYear = 0;
	private $currentMonth = 0;
	private $numberOfDays = 0;
	private $daysOfWeek = array('S','M','T','W','T','F','S');

	public function __construct() {

		$this->numberOfDays = date("t");

	}

	function showCalendar($date) {

		//echo $date;
		if (!isset($date)) {
			$date = mktime();
		}
		$output = '';
		//Create Month and Date Header
		$output .= "<div class='calendar-Label'>";
		$output .= date("F", $date);
		$output .= date("Y", $date);
		$output .= "</div>\n";
		$output .= "<table class='calendar-Table'><tr>\n";

		//Display Letter for Days of Week
		foreach ($this->daysOfWeek as $day) {
			$output .= "<th class='calendar-Header'>$day</th>\n";
		}

		$output .= "</tr><tr>\n";

		$currentDay = 1;
		//Get the day of week for the first day of month.
		$firstOfTheMonth = mktime(0, 0, 0, date("m", $date), 1, date("Y", $date));
		$dayOfWeek = date("w", $firstOfTheMonth);
		echo $dayOfWeek;
		//Create blank days until the first day of the month.
		if ($dayOfWeek > 0) {
			for ($i = 1; $i <= $dayOfWeek; $i++) {
				$output .="<td class='calendar-Date'>&nbsp;</td>\n";
			}
		}


		while ($currentDay <= $this->numberOfDays) {

			if ($dayOfWeek == 7) {
				$output .= "</tr><tr>\n";
				$dayOfWeek = 0;
			}

			$output .= "<td>$currentDay</td>\n";
			$currentDay++;
			$dayOfWeek++;

		}
		$output .= "</tr></table>\n";

		return $output;

	}

}

//$cal = new calendar();
//$date = mktime(0,0,0,6,1,2017);
//echo $cal->showCalendar($date);

?>
