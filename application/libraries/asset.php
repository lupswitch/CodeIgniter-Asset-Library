<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 	CodeIgniter Asset Library
 * 	An open source PHP library written to easily manage assets for CodeIgniter Framework
 *  
 *  Copyright 2014  Daniel Lee
 *	GitHub:  https://github.com/inputx/CodeIgniter-Asset-Library
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the Apache License (2.0) as published by
 *  the The Apache Software Foundation, either version 2.0 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  Apache License for more details.
 *
 *  You should have received a copy of the Apache License
 *  along with this program.  If not, see <http://www.apache.org/licenses/>
 *
 * @package			dli/framework-library/codeIgniter-asset-library
 * @author			Daniel Lee
 * @copyright		Copyright 2014 Daniel Lee
 * @link			https://github.com/inputx/CodeIgniter-Asset-Library
 * @since			Version 0.1
 * @updated			24th Oct 2014
 * @filesource
*/

class Asset {
	private $asset              = array(
                "css"               =>  array()
            ,   "js"                =>  array()
            ,   "image"             =>  array()
            ,   "less"              =>  array()
        );
    private $enable             = false;
    private $path               = array();
    private $asset_path         = "";
    private $version            = "";
    private $format             = array();
	private $asset_format       = "";
    
    public function __construct($params = array())
    {
        
    }

    /**
     * Add asset files
     *
     * add multiple asset files
     *
     * @access  public
     * @param   string  asset type
     * @param   array   file name
     * @return  null
     */ 
    public function add_assets($type, $files = array())
    {
        if(is_array($files))
        {
            switch($type)
            {
                case "css":
                case "js":
                case "image":
                case "less":
                    $assets             = $this->asset[$type];
                    $assets             = array_merge($assets, $files);
                    $this->asset[$type] = $assets;
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * Add css file
     *
     * add single css file as asset
     *
     * @access  public
     * @param   string  file name
     * @return  null
     */ 
    public function add_css($file)
    {
        $this->add("css", $file);
    }

    /**
     * Add js file
     *
     * add single js file as asset
     *
     * @access  public
     * @param   string  file name
     * @return  null
     */ 
    public function add_js($file)
    {
        $this->add("js", $file);
    }

    /**
     * Add image file
     *
     * add single image file as asset
     *
     * @access  public
     * @param   string  file name
     * @return  null
     */ 
    public function add_image($file)
    {
        $this->add("image", $file);
    }

    /**
     * Add less file
     *
     * add single less file as asset
     *
     * @access  public
     * @param   string  file name
     * @return  null
     */ 
    public function add_less($file)
    {
        $this->add("less", $file);
    }

    /**
     * Add asset file
     *
     * add single file as asset
     *
     * @access  public
     * @param   string  file type
     * @param   string  file name
     * @return  null
     */ 
    private function add($type, $file)
    {
        array_push($this->asset[$type], $file);
    }

    /**
     * Load css asset
     *
     * load single or multiple css asset
     *
     * @access  public
     * @param   boolen  enable/disable https access
     * @return  null
     */
    public function load_css($https = false)
    {
        return $this->load("css", $https);
    }

    /**
     * Load js asset
     *
     * load single or multiple js asset
     *
     * @access  public
     * @param   boolen  enable/disable https access
     * @return  null
     */
    public function load_js($https = false)
    {
        return $this->load("js", $https);
    }

    /**
     * Load image asset
     *
     * load single or multiple image asset
     *
     * @access  public
     * @param   boolen  enable/disable https access
     * @return  null
     */
    public function load_image($https = false)
    {
        return $this->load("image", $https);
    }

    /**
     * Load less asset
     *
     * load single or multiple less asset
     *
     * @access  public
     * @param   boolen  enable/disable https access
     * @return  null
     */
    public function load_less($https = false)
    {
        return $this->load("less", $https);
    }

    /**
     * Load assets
     *
     * load multiple asset file, and output html code
     *
     * @access  public
     * @param   string  asset type
     * @param   boolen  enable/disable https access
     * @return  null
     */
    private function load($type, $https = false)
    {
        $assets = $this->asset[$type];
        $assets_output = "";
        if(!empty($assets))
        {
            foreach($assets as $asset)
            {
                
                switch($type)
                {
                    case "css":
                        $assets_output .= $this->output_css     ($asset, $https);
                        break;
                    case "js":
                        $assets_output .= $this->output_js      ($asset, $https);
                        break;
                    case "image":
                        $assets_output .= $this->output_image   ($asset, $https);
                        break;
                    case "less":
                        $assets_output .= $this->output_less    ($asset, $https);
                        break;
                    default:
                        break;
                }
            }
        }
        
        return $assets_output;
    }

    public function output_css($file, $https)
    {
        return $this->output_setting("css",$file, $https);
    }

    public function output_js($file, $https)
    {
        return $this->output_setting("js",$file, $https);
    }

    public function output_image($file, $https)
    {
        return $this->output_setting("image",$file, $https);
    }

    public function output_less($file, $https)
    {
        return $this->output_setting("less",$file, $https);
    }



    private function output_setting($type, $file, $https)
    {
        $CI =& get_instance();
        $CI->load->helper("url");
        $CI->load->config("asset_config");
        
        $assets_config = $CI->config->item('assets');

        
        if(isset($assets_config['enable']))
        {
            $this->enable = $assets_config['enable'];
        }

        if(isset($assets_config['version']))
        {
            $this->version = $assets_config['version'];
        }

        if(isset($assets_config['path']))
        {
            $this->path = $assets_config['path'];
        }

        if($this->path[$type])
        {
            $this->asset_path = $this->path[$type];
        }

        if(isset($assets_config['format']))
        {
            $this->format = $assets_config['format'];
        }
        
        if(isset($this->format[$type]))
        {
            $this->asset_format = $this->format[$type];
        }

        $url = site_url($this->asset_path.$file, $https);

        $asset_output = str_replace("{:url:}", $url."?version=".$this->version, $this->asset_format);

        if($this->enable)
        {
            return $asset_output;
        }
        else
        {
            return "";
        }
    }

}