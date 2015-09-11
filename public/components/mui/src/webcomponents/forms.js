/**
 * MUI WebComponents forms module
 * @module webcomponents/forms
 */

'use strict';


var jqLite = require('../js/lib/jqLite.js'),
    muiFormControl = require('../js/forms/form-control.js'),
    formControlClass = 'mui-form-control',
    formControlTagName = formControlClass,
    formGroupClass = 'mui-form-group',
    floatingLabelClass = 'mui-form-floating-label';


/**
 * Class representing a FormControl element.
 * @class
 */
var FormControlProto = Object.create(HTMLElement.prototype);


/** FormControl createdCallback */
FormControlProto.createdCallback = function() {
  var root = this.createShadowRoot(),
      innerEl = document.createElement('div'),
      labelEl;

  var attrs = {
    type: this.getAttribute('type') || 'text',
    value: this.getAttribute('value'),
    placeholder: this.getAttribute('placeholder'),
    label: this.getAttribute('label'),
    floating: this.getAttribute('floating')
  };

  // create wrapper
  innerEl.setAttribute('class', formGroupClass);

  // input element
  innerEl.appendChild(_createInputEl(attrs));

  // label element
  if (attrs.label) {
    var labelEl = _createLabelEl(attrs);
    innerEl.appendChild(labelEl);
  }

  // add to root
  root.appendChild(_getStyleEl().cloneNode(true));
  root.appendChild(innerEl);
}




// ============================================================================
// UTILITIES
// ============================================================================

var styleEl;


/**
 * Get or create style
 * @function
 */
function _getStyleEl() {
  if (styleEl === undefined) {
    styleEl = document.createElement('style');
    styleEl.innerHTML = require('mui.min.css');
  }

  return styleEl;
}


/**
 * Create input element.
 * @function
 */
function _createInputEl(attrs) {
  var inputEl;

  // input element
  if (attrs.type === 'textarea') {
    inputEl = document.createElement('textarea');
    if (attrs.value) inputEl.appendChild(document.createTextNode(attrs.value));
  } else {
    inputEl = document.createElement('input');
    inputEl.setAttribute('type', attrs.type);
    if (attrs.value) inputEl.setAttribute('value', attrs.value);
  }

  if (attrs.placeholder) {
    inputEl.setAttribute('placeholder', attrs.placeholder);
  }

  inputEl.setAttribute('class', formControlClass);

  // add event listeners
  muiFormControl.initialize(inputEl);
  
  return inputEl;
}


/**
 * Create label element.
 * @function
 */
function _createLabelEl(attrs) {
  var labelEl = document.createElement('label');
  labelEl.appendChild(document.createTextNode(attrs.label));
  
  // configure floating label
  if (attrs.floating !== null) {
    labelEl.setAttribute('class', floatingLabelClass);
  }

  return labelEl;
}


/** Define module API */
module.exports = {
  /** Register module elements */
  registerElements: function() {
    var FormControlElement = document.registerElement(formControlTagName, {
      prototype: FormControlProto
    });

    return {
      FormControlElement: FormControlElement
    };
  }
};
