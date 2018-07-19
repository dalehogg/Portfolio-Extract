# AddRadios

> 2.0.1

```html
<input data-addui='radios' name='My_Radio' placeholder='Radio 1' />
<input data-addui='radios' name='My_Radio' placeholder='Radio 2' />
<input data-addui='radios' name='My_Radio' placeholder='Radio 3' />
```

![](res/radios.gif)

## Import
Copy `addRadios.css` and `addRadios.js` from the distribution directory (`dist/`) into you project. Import them into your HTML document using the `link` and `script` tags.

```html
<link rel='stylesheet' href='path/to/css/addRadios.css' />
<script src='path/to/js/addRadios.js' />
```

## How to Use
This is a jQuery plugin built on the [Obj.JS Framework](http://github.com/dustinpoissant/objjs). jQuery is not included in the distribution files (located in the `dist` directory), you must first import jQuery (any version) for this plugin to work. `Obj.js` is included in the distribution, there is no need to include it separately. If you already have `Obj.js` imported you should import `addRadios.js` from the src which does not include Obj.js.

### Create Inputs
To use simply create a set of inputs, give at least one of them a `data-addui="radios"` attribute and give them all the same name. Give each a `placeholder` attribute that will become the radios label.

## License

This software is property of [Dustin Poissant](http://github.com/dustinpoissat).

This software is distributed AS-IS with no warranties/guarantees either expressed or implied.

This software is Licensed under [CC BY-NC-SA 3.0 US](https://creativecommons.org/licenses/by-nc-sa/3.0/us/).
