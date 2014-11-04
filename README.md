CodeIgniter-Asset-Library
=========================

##What is this
This package includes library and helper can manage asset file for CodeIgniter project. 

##Requirements

 - CodeIgniter version > 2.0
 - URL helper in codeigniter

##Installation
The package includes three files
 - asset_config.php copy to application/config
 - asset_helper.php copy to application/helper
 - asset.php copy to application/library


##Asset Configuration
###1. Version number
`$config['assets']['version'] 			= 1;`

The Asset version number is usually to make sure that web browser gets a new version of asset when the site gets updated with a new version asset. e.g.

`asset.css?version=1`

###2. Asset Path
`$config['assets']['path']['css'] 		= "assets/css/";`

`$config['assets']['path']['js'] 		= "assets/js/";`

`$config['assets']['path']['image'] 		= "assets/images/";`

`$config['assets']['path']['less'] 		= "assets/less/";`

Asset path is where project asset file storage at. Normally asset file could be storaged at assets folder in the root of project.


###3. Asset Html Format
`$config['assets']['format']['css'] = '<link type="text/css" rel="stylesheet" href="{:url:}">';`

`$config['assets']['format']['js'] = '<script src="{:url:}" type="text/javascript" charset="utf-8"></script>';`

`$config['assets']['format']['image'] = '<img src="{:url:}">';`

`$config['assets']['format']['less'] = '<link rel="stylesheet/less" type="text/css" href="{:url:}">';`

HTML format that for asset script file in views. 


###4. Auto loading helper and library
Asset library and helper can be auto loading by CodeIgniter project. Add asset library and helper into `application/config/autoload.php`. 


`$autoload['libraries'] 	= array('asset');`

`$autoload['helper'] 		= array('asset_helper');`