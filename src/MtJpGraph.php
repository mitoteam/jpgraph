<?php

namespace mitoteam\jpgraph;

final class MtJpGraph
{
  /**
   * MiToTeam: List of already loaded modules. Empty string ('') is added when loading library itself.
   */
  private static $_loaded = array();

  /**
   * MiToTeam: Extended mode flag. See README.md for the details.
   */
  private static $_extended_mode = false;

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

    self::$_extended_mode = self::$_extended_mode || $extended_mode;
  }

  /**
   * Returns true if library was added in Extended Mode (with not just compatibility patches but with some functionality fixed as well).
   */
  public static function isExtendedMode()
  {
    return self::$_extended_mode;
  }
}
