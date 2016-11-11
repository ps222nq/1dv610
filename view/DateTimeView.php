<?php

namespace view;

class DateTimeView {


	public function show()
    {
        //Current date and time according to format: "Sunday, the 11th of December, the time is 19:20:21"
		$timeString = date('l\, \t\h\e jS \of F Y\, \T\h\e \t\i\m\e \i\s h:i:s');

		return '<p>' . $timeString . '</p>';
	}
}