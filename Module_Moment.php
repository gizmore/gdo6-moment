<?php
namespace GDO\Moment;

use GDO\Core\GDO_Module;
use GDO\Javascript\Module_Javascript;

/**
 * Moment.js bindings for gdo6.
 * @author gizmore
 */
final class Module_Moment extends GDO_Module
{
	public $module_priority = 15;
	
	public function onLoadLanguage() { return $this->loadLanguage('lang/moment'); }
	
	public function onIncludeScripts()
	{
		$min = Module_Javascript::instance()->jsMinAppend();
		
		$this->addBowerJavascript("moment/min/moment-with-locales$min.js");
		$this->addBowerJavascript("moment-timezone/builds/moment-timezone-with-data$min.js");
	}
	
	/**
	 * Convert a PHP date format to moment.js format.
	 * 
	 * @author https://stackoverflow.com/a/30192680/13599483
	 * 
	 * @param string $format
	 * @return string
	 */
	public function convertFormat($format)
	{
        $replacements = [
            'd' => 'DD',
            'D' => 'ddd',
            'j' => 'D',
            'l' => 'dddd',
            'N' => 'E',
            'S' => 'o',
            'w' => 'e',
            'z' => 'DDD',
            'W' => 'W',
            'F' => 'MMMM',
            'm' => 'MM',
            'M' => 'MMM',
            'n' => 'M',
            't' => '', // no equivalent
            'L' => '', // no equivalent
            'o' => 'YYYY',
            'Y' => 'YYYY',
            'y' => 'YY',
            'a' => 'a',
            'A' => 'A',
            'B' => '', // no equivalent
            'g' => 'h',
            'G' => 'H',
            'h' => 'hh',
            'H' => 'HH',
            'i' => 'mm',
            's' => 'ss',
            'u' => 'SSS',
            'e' => 'zz', // deprecated since version 1.6.0 of moment.js
            'I' => '', // no equivalent
            'O' => '', // no equivalent
            'P' => '', // no equivalent
            'T' => '', // no equivalent
            'Z' => '', // no equivalent
            'c' => '', // no equivalent
            'r' => '', // no equivalent
            'U' => 'X',
        ];
        return strtr($format, $replacements);
	}

}
