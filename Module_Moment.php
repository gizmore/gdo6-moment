<?php
namespace GDO\Moment;

use GDO\Core\GDO_Module;
use GDO\Core\Module_Core;

final class Module_Moment extends GDO_Module
{
	public $module_priority = 15;
	
	public function onIncludeScripts()
	{
		$min = Module_Core::instance()->cfgMinifyJS() === 'no' ? '' : '.min';
		
		$this->addBowerJavascript("moment/min/moment-with-locales$min.js");
		$this->addBowerJavascript("moment-timezone/builds/moment-timezone-with-data$min.js");
	}
}
