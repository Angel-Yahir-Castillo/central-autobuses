const { Builder } = require('selenium-webdriver');
const { Options } = require('selenium-side-runner');

async function runTests() {
  const seleniumUrl = 'http://localhost:4444/wd/hub'; // URL de tu servidor Selenium

  const options = new Options().headless(); // Opciones para ejecución headless

  const runner = new Builder()
    .forBrowser('chrome') // Selecciona el navegador
    .usingServer(seleniumUrl) // Establece la URL de Selenium
    .setChromeOptions(options)
    .build();

  try {
    await runner.runSideFile('ruta/a/tu/archivo.side'); // Ruta a tu archivo .side
  } finally {
    await runner.quit();
  }
}

runTests();
