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

if ( ! function_exists('load_assets'))
{
	function load_assets($type, $https = false)
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		$output = "";
		switch($type)
		{
			case "css":
				$output = $CI->asset->load_css		($https);
				break;
			case "js":
				$output = $CI->asset->load_js 		($https);
				break;
			case "image":
				$output = $CI->asset->load_image 		($https);
				break;
			case "less":
				$output = $CI->asset->load_less	 	($https);
				break;
			default:
				break;
		}
		return $output;
	}
}

if ( ! function_exists('add_assets'))
{
	function add_assets($type = "", $files = "")
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		$CI->asset->add_assets($type, $files);
	}
}


if ( ! function_exists('add_asset'))
{
	function add_asset($type = "", $file = "")
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		switch($type)
		{
			case "css":
				$CI->asset->add_css		($file);
				break;
			case "js":
				$CI->asset->add_js 		($file);
				break;
			case "image":
				$CI->asset->add_image 	($file);
				break;
			case "less":
				$CI->asset->add_less 	($file);
				break;
			default:
				break;
		}
	}
}

if ( ! function_exists('asset_css'))
{
	function asset_css($file = "", $https = false)
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		return $CI->asset->output_css($file, $https);
	}
}

if ( ! function_exists('asset_js'))
{
	function asset_js($file = "", $https = false)
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		return $CI->asset->output_js($file, $https);
	}
}

if ( ! function_exists('asset_image'))
{
	function asset_image($file = "", $https = false)
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		return $CI->asset->output_image($file, $https);
	}
}

if ( ! function_exists('asset_less'))
{
	function asset_less($file = "")
	{
		$CI =& get_instance();
		$CI->load->library('asset');
		return $CI->asset->output_less($file, $https);
	}
}

