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

    public function add_css($file)
    {
        $this->add("css", $file);
    }

    public function add_js($file)
    {
        $this->add("js", $file);
    }

    public function add_image($file)
    {
        $this->add("image", $file);
    }

    public function add_less($file)
    {
        $this->add("less", $file);
    }

    private function add($type, $file)
    {
        array_push($this->$asset[$type], $file);
    }

    public function load_css($https)
    {
        return $this->load("css", $https);
    }

    public function load_js($https)
    {
        return $this->load("js", $https);
    }

    public function load_image($https)
    {
        return $this->load("image", $https);
    }

    public function load_less($https)
    {
        return $this->load("less", $https);
    }

    private function load($type, $https)
    {
        $assets = $this->$asset[$type];
        $assets_output = "";
        if(!empty($assets))
        {
            foreach($assets as $asset)
            {
                $assets_output .= $this->output_css($asset, $https);
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

        if(isset($this->assets_config['format']))
        {
            $this->format = $this->assets_config['format'];
        }

        if($this->format[$type])
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