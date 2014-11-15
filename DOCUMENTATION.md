DOCUMENTATION
=========================

##Library
###1. Loading Library
Asset helper can be auto load by autoload config. It also can be loaded on controller like: 
```php
class Welcome extends CI_Controller {
  public function index()
  {
    $this->load->library("asset");
    // your code
  }
}
```

###2. Functions

#### add_assets
`public`

add multiple asset files

 - Params
	 - string: asset type
	 - array: file name
 - Return
	 - null
