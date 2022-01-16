<?php

namespace mitoteam\jpgraph;

final class MtJpGraph
{
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
  public static function load($modules = null)
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
  }
}
