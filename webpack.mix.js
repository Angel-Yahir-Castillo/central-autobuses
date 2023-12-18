const mix = require('laravel-mix');
const { Options } = require('selenium-side-runner');

//mix.js('resources/js/runSeleniumTests.js', 'public/js'); // Ruta donde se generará el archivo JS
mix.js('resources/js/runSeleniumTests.js', 'dist').setPublicPath('dist');
mix.then(async () => {
  const runner = new Options()
    .headless() // Opciones para ejecución headless
    .addArguments('start-maximized')
    .build();

  await runner.runSideFile('ruta/a/tu/archivo.side'); // Ruta a tu archivo .side
});
