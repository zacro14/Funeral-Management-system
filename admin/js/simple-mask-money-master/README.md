<h1 align="center">SimpleMaskMoney</h1>
<h3 align="center"><b>WARNING</b></h3>
<h5 align="center">
  if you are having problems check the version you are using.
  <a href="docs/#2.x.x">
    The docs to old (2.x.x) version stay <b>here</b>
  </a>
</h5>
<p align="center">
  <a class="badge-align" href="https://nodei.co/npm/simple-mask-money/">
  <img src="https://nodei.co/npm/simple-mask-money.png?downloads=true&downloadRank=true" alt="NPM"></a>
</p>

<p align="center">
  <a class="badge-align" href="https://travis-ci.org/codermarcos/simple-mask-money"><img  src="https://travis-ci.org/codermarcos/simple-mask-money.svg?branch=master" alt="build Status"/></a>

  <a class="badge-align" href="https://badge.fury.io/js/simple-mask-money">
  <img src="https://badge.fury.io/js/simple-mask-money.svg" alt="npm version"></a>
  
  <a class="badge-align" href="https://www.npmjs.com/package/simple-mask-money">
  <img src="https://img.shields.io/npm/dm/simple-mask-money.svg" alt="npm Downloads"></a>
  
  <a class="badge-align" href="https://www.codacy.com/app/codermarcos/simple-mask-money?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=codermarcos/simple-mask-money&amp;utm_campaign=Badge_Grade">
  <img src="https://api.codacy.com/project/badge/Grade/ee8f87689ae749b1822499995ef8d1d2" alt="Codacy Badge"></a>

  <a class="badge-align" href="https://opensource.org/licenses/Apache-2.0">
  <img src="https://img.shields.io/badge/License-Apache%202.0-blue.svg" alt="License"></a>
</p>

<p align="center">
  Simple money mask developed with pure JavaScript. To run on <b>Client Side</b> and <b>Server Side</b>.
  <a href="https://simple-mask-money.codermarcos.zone/">Try <b>live demo</b></a> 
</p>

## Getting Started

First install it:

```shell
  npm i simple-mask-money --save
```

Or access the GitHub release directly:

```html
<script src="https://github.com/codermarcos/simple-mask-money/releases/download/<RELEASE_VERSION_HERE>/simple-mask-money.js"></script>
```

> Remember to replace **<RELEASE_VERSION_HERE>** with the [latest version](https://github.com/codermarcos/simple-mask-money/releases/latest)

Read the [docs](docs/#readme) or chose your implementation:

* [JavaScript](examples/3.x.x/javascript/#readme)
* [Angular](examples/3.x.x/angular#readme)
* [React](examples/3.x.x/react#readme)
* [Node](examples/3.x.x/node#readme)
* [Vue](examples/3.x.x/vue#readme)

Here is a usage example:

```html
  <body>
    <!-- Set inputmode to numeric to show only numbers on mobile -->
    <input id="myInput" inputmode="numeric" value="0,00">

    <script src="./node_modules/simple-mask-money/lib/simple-mask-money.js"></script>
    
    <script>
      // configuration
      const args = {
        afterFormat(e) { console.log('afterFormat', e); },
        allowNegative: false,
        beforeFormat(e) { console.log('beforeFormat', e); },
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: ',',
        thousandsSeparator: '.',
        cursor: 'move'
      };

      // Select the element
      const input = SimpleMaskMoney.setMask('#myInput', args);
      // Convert the input value to a number, which you can save e.g. to a database:
      input.formatToNumber();

    </script>
  </body>
```

Or if you prefer use the methods in your events

```html
  <body>
    <!--  Set inputmode to numeric to show only numbers on mobile -->
    <input inputmode="numeric" value="0,00">

    <script src="./node_modules/simple-mask-money/lib/simple-mask-money.js"></script>
    <script>
      // Select the element
      let input = document.getElementsByTagName('input')[0];

      // Configuration
      SimpleMaskMoney.args = {
        afterFormat(e) { console.log('afterFormat', e); },
        allowNegative: false,
        beforeFormat(e) { console.log('beforeFormat', e); },
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: ',',
        thousandsSeparator: '.',
        cursor: 'move'
      };

      input.oninput = () => {
        input.value = SimpleMaskMoney.format(input.value);
      }

      // Your send method
      input.onkeyup = (e) => {
        if (e.key !== "Enter") return;
        // Returns the value of your input as a number:
        SimpleMaskMoney.formatToNumber(input.value);
      }
    </script>
  </body>
```
