<?php

namespace mitoteam\jpgraph;

//MiTo Team: set defaults for known test environment
if (defined('PHPUNIT_COMPOSER_INSTALL'))
{
  MtJpGraph::setSkipExceptionHandler(true);
}

final class MtJpGraph
{
  //global MtJpGraph options
  private static $options = array(
    'extended'               => false, // MiToTeam: Extended mode flag. See README.md for the details.
    'skip_exception_handler' => false, // MiToTeam: Do not set JpGraph's custom exception handler
  );

  public static function setOption($name, $value)
  {
    self::$options[$name] = $value;
  }

  public static function getOption($name)
  {
    if (isset(self::$options[$name]))
    {
      return self::$options[$name];
    }
    else
    {
      return null;
    }
  }

  /**
   * MiToTeam: List of already loaded modules. Empty string ('') is added when loading library itself.
   */
  private static $_loaded = array();

  /**
   * Loads jpgraph library.
   *
   * @param array|string $modules Either string with jpgraph module name or array with several modules names.
   *
   * @return void
   * @throws \Exception
   * @example
   *  MtJpGraph::load(); # not really useful without modules
   *  MtJpGraph::load('bar'); # load with single module
   *  MtJpGraph::load(['bar', 'line']); #load with several modules
   */
  public static function load($modules = null, $extended_mode = false)
  {
    // basic "module" has empty name
    if(!in_array('', self::$_loaded))
    {
      require_once __DIR__ . '/lib/jpgraph.php';
      self::$_loaded[] = '';
    }

    if($modules)
    {
      if(!is_array($modules))
      {
        $modules = array($modules);
      }

      foreach ($modules as $module)
      {
        if(in_array($module, self::$_loaded))
        {
          continue; // already loaded
        }

        $filename = __DIR__ . '/lib/jpgraph_' . $module . '.php';

        if(!file_exists($filename))
        {
          throw new \Exception("Module '$filename' not found");
        }

        require_once $filename;
        self::$_loaded[] = $module;
      }
    }

    self::setOption('extended', self::getOption('extended') || $extended_mode);
  }

  /**
   * Returns true if library was added in Extended Mode (with not just compatibility patches but with some functionality
   * fixed as well).
   * @return bool
   */
  public static function isExtendedMode()
  {
    return (bool)self::getOption('extended');
  }

  /**
   * Disable setting custom exception handler by jpgraph. Useful when running library code in some tests context (like
   * phpunit for example).
   * @param bool $value
   * @return void
   */
  public static function setSkipExceptionHandler($value)
  {
    self::setOption('skip_exception_handler', (bool) $value);
  }

  /**
   * Returns true if setting custom exception handler is disabled.
   * @return bool
   */
  public static function isSkipExceptionHandler()
  {
    return (bool) self::getOption('skip_exception_handler');
  }
}
