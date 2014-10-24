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

/*
|--------------------------------------------------------------------------
| Enable Assets Library
|--------------------------------------------------------------------------
|
|	Enable Assets library in your project.
|
*/
$config['assets']['enable'] 			= true;

/*
|--------------------------------------------------------------------------
| Assets https access
|--------------------------------------------------------------------------
|
|	Enable https access for asset files.
|
*/
$config['assets']['https']				= true;


/*
|--------------------------------------------------------------------------
| Assets path
|--------------------------------------------------------------------------
|
|	Assets path in your project. Could be like:
|
|	*Project root
|	|-- application
|	|-- system
|	|-- assets
|	|   |-- css
|	|   |-- js
|	|   |-- images
|
|	You can add more type of assets. 
*/
$config['assets']['path']['css'] 		= "assets/css";
$config['assets']['path']['js'] 		= "assets/js";
$config['assets']['path']['images'] 	= "assets/images";
$config['assets']['path']['less'] 		= "assets/less";


