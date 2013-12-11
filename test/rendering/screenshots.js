
var casper = require("casper").create();

var screenshot,
    screenshotNow = new Date(),
    screenshotDateTime = screenshotNow.getFullYear() + pad(screenshotNow.getMonth() + 1) + pad(screenshotNow.getDate()) + '-' + pad(screenshotNow.getHours()) + pad(screenshotNow.getMinutes()) + pad(screenshotNow.getSeconds()),
    devices = [
      {
        'name': 'smartphone-portrait',
        'viewport': {width: 320, height: 480}
      },
      {
        'name': 'smartphone-landscape',
        'viewport': {width: 480, height: 320}
      },
      {
        'name': 'tablet-portrait',
        'viewport': {width: 768, height: 1024}
      },
      {
        'name': 'tablet-landscape',
        'viewport': {width: 1024, height: 768}
      },
      {
        'name': 'desktop-standard',
        'viewport': {width: 1280, height: 1024}
      }
    ],
    screenshots = [
      {
        'name': 'index',
        'url': 'http://localhost:8888'
      },
      {
        'name': 'categorie-front',
        'url': 'http://localhost:8888/?cat=7'
      },
      {
        'name': 'article-10',
        'url': 'http://localhost:8888/?p=10'
      }
    ];

if (casper.cli.args.length < 2) {
  casper
    .echo("SCREENSHOTS Impossible car il faut 2 paramètres : nom & url")
    .exit(1);
} else {
  screenshot = {'name' : casper.cli.args[0], 'url' : casper.cli.args[1]};
  casper
    .echo('SCREENSHOTS Nom : ' + screenshot.name + ', URL : ' + screenshot.url);
}

casper.start().each(devices, function(self, device) {
  // on laisse 5s au navigateur pour s'ouvrir et se mettre sur le bon viewport
  casper.wait(5000, function() {
    this.viewport(device.viewport.width, device.viewport.height);
    self.thenOpen(screenshot.url, function() {
      this.capture(
        'screenshots/'
          + screenshotDateTime + '/'
          + screenshot.name
          + '-' + device.name
          + '-' + device.viewport.width
          + '-' + device.viewport.height
          + '.png',
        {
          top: 0,
          left: 0,
          width: device.viewport.width,
          height: device.viewport.height
        }
        );
    });
  });
});

casper.run();


function pad(number) {
  var r = String(number);
  if ( r.length === 1 ) {
    r = '0' + r;
  }
  return r;
}
