<?php 

	/**
	 * Helper
	 */
	class helper
	{
		public function validation($value)
		{
			return trim(htmlspecialchars(stripcslashes($value)));
		}

		public function textShorter($value)
		{
			if(strlen($value) > 40)
			{
				return substr($value, 0, 40)."...";
			}
			else {
				return $value;
			}
		}
	}
	


	?>