<?php

namespace Craft;

class Low_regexTwigExtension extends \Twig_Extension
{
	protected $env;

	public function getName()
	{
		return 'Low Regex';
	}

	public function getFilters()
	{
		return array('regex' => new \Twig_Filter_Method($this, 'regex'));
	}

	public function getFunctions()
	{
		return array('regex' => new \Twig_Function_Method($this, 'regex'));
	}

	public function getFilters()
	{
		return array('regex' => new \Twig_Filter_Method($this, 'match'));
	}

	public function getFunctions()
	{
		return array('regex' => new \Twig_Function_Method($this, 'match'));
	}

	public function initRuntime(\Twig_Environment $env)
	{
		$this->env = $env;
	}

	public function regex($var, $find = '', $replace = '')
	{
		if (is_string($var) && strlen($var))
		{
			$var = preg_replace($find, $replace, $var);
		}

		return $var;
	}

	public function match($var, $find = '', $replace = '')
	{
		if (is_string($var) && strlen($var))
		{
			$var = preg_match($find, $var);
		}

		return $var;
	}
}
