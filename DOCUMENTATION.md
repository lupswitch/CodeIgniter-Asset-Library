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

---

#### add_css
`public`

add single css file as asset

 - Params
	 - string: file name
 - Return
	 - null

---

#### add_js
`public`

add single js file as asset

 - Params
	 - string: file name
 - Return
	 - null

---

#### add_image
`public`

add single image file as asset

 - Params
	 - string: file name
 - Return
	 - null

---

#### add_less
`public`

add single less file as asset

 - Params
	 - string: file name
 - Return
	 - null

---

#### add
`public`

add single file as asset

 - Params
	 - boolen: enable/disable https access
 - Return
	 - null

---

#### load_css
`public`

load single or multiple css asset

 - Params
	 - boolen: enable/disable https access
 - Return
	 - string

---

#### load_js
`public`

load single or multiple js asset

 - Params
	 - boolen: enable/disable https access
 - Return
	 - string

---

#### load_image
`public`

load single or multiple image asset

 - Params
	 - boolen: enable/disable https access
 - Return
	 - string

---

#### load_less
`public`

load single or multiple less asset

 - Params
	 - boolen: enable/disable https access
 - Return
	 - string

---

#### load
`private`

load single or multiple less asset

 - Params
	 - string: asset type
	 - boolen: enable/disable https access
 - Return
	 - string

---
