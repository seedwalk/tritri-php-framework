<?php
class FormManager
{

	public static function renderField($field)
	{
		Common::DebugThis($field);
		$toreturn = '<label>'.$field['label'].'</label><input type="'.$field['type'].'" />';
		Common::DebugThis($toreturn);
	}
}
?>