<?php
namespace app\module\login\plugin;

abstract class plugin_base
{
	abstract function init();
	abstract function render();
}