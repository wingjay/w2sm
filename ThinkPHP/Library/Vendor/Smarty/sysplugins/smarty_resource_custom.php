<?php
/**
 * Smarty Resource Plugin
 *
 * @package Smarty
 * @subpackage TemplateResources
 * @author Rodney Rehm
 */

/**
 * Smarty Resource Plugin
 *
 * Wrapper Implementation for custom resource plugins
 *
 * @package Smarty
 * @subpackage TemplateResources
 */
abstract class Smarty_Resource_Custom extends Smarty_Resource {

    /**
     * fetch Template and its modification time from data source
     *
     * @param string  $name    Template name
     * @param string  &$source Template source
     * @param integer &$mtime  Template modification timestamp (epoch)
     */
    protected abstract function fetch($name, &$source, &$mtime);

    /**
     * Fetch Template's modification timestamp from data source
     *
     * {@internal implementing this method is optional.
     *  Only implement it if modification times can be accessed faster than loading the complete Template source.}}
     *
     * @param string $name Template name
     * @return integer|boolean timestamp (epoch) the Template was modified, or false if not found
     */
    protected function fetchTimestamp($name)
    {
        return null;
    }

    /**
     * populate Source Object with meta data from Resource
     *
     * @param Smarty_Template_Source   $source    source object
     * @param Smarty_Internal_Template $_template Template object
     */
    public function populate(Smarty_Template_Source $source, Smarty_Internal_Template $_template=null)
    {
        $source->filepath = strtolower($source->type . ':' . $source->name);
        $source->uid = sha1($source->type . ':' . $source->name);

        $mtime = $this->fetchTimestamp($source->name);
        if ($mtime !== null) {
            $source->timestamp = $mtime;
        } else {
            $this->fetch($source->name, $content, $timestamp);
            $source->timestamp = isset($timestamp) ? $timestamp : false;
            if( isset($content) )
                $source->content = $content;
        }
        $source->exists = !!$source->timestamp;
    }

    /**
     * Load Template's source into current Template object
     *
     * @param Smarty_Template_Source $source source object
     * @return string Template source
     * @throws SmartyException if source cannot be loaded
     */
    public function getContent(Smarty_Template_Source $source)
    {
        $this->fetch($source->name, $content, $timestamp);
        if (isset($content)) {
            return $content;
        }

        throw new SmartyException("Unable to read Template {$source->type} '{$source->name}'");
    }

    /**
     * Determine basename for compiled filename
     *
     * @param Smarty_Template_Source $source source object
     * @return string resource's basename
     */
    protected function getBasename(Smarty_Template_Source $source)
    {
        return basename($source->name);
    }

}

?>