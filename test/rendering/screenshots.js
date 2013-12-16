
var casper = require("casper").create();

var fs = require("fs");

var moment = require("../moment-with-langs.js");

var
  pathConfigDevice = "./config/device.json",
  configDevice,
  listDevice,
  pathConfigScreenshot = "./config/screenshot.json",
  configScreenshot,
  listScreenshot,
  now = moment().format("YYYY-MM-DD-HH-mm");


// if (casper.cli.args.length < 3) {




// } else {
//   screenshot = {'name' : casper.cli.args[0], 'url' : casper.cli.args[1]};
//   casper
//     .echo('SCREENSHOTS Nom : ' + screenshot.name + ', URL : ' + screenshot.url);
// }


// récupération de la configuration des devices
try {
  configDevice = fs.read(pathConfigDevice);
  try {
    listDevice = JSON.parse(configDevice);
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
    casper.echo("Devices", "INFO");
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
    for (var i = 0; i < listDevice.length; i++) {
      casper.echo(listDevice[i].name + " : " + listDevice[i].viewport.width + " - " + listDevice[i].viewport.height);
    }
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
  } catch(e) {
    casper.echo("Impossible d'interpréter le fichier de configuration des terminaux : " + pathConfigDevice, "ERROR")
    .exit(1);
  }
} catch(e) {
  casper
    .echo("Impossible d'accéder au fichier de configuration des terminaux : " + pathConfigDevice, "ERROR")
    .exit(1);
}

// récupération de la configuration des screenshots
try {
  configScreenshot = fs.read(pathConfigScreenshot);
  try {
    listScreenshot = JSON.parse(configScreenshot);
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
    casper.echo("Screenshots", "INFO");
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
    for (var i = 0; i < listScreenshot.length; i++) {
      casper.echo(listScreenshot[i].name + " : " + listScreenshot[i].url);
    }
    casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
  } catch(e) {
    casper.echo("Impossible d'interpréter le fichier de configuration des impressions écran : " + pathConfigScreenshot, "ERROR")
    .exit(1);
  }
} catch(e) {
  casper
    .echo("Impossible d'accéder au fichier de configuration des impressions écran : " + pathConfigScreenshot, "ERROR")
    .exit(1);
}



var screenshot = listScreenshot[0];


casper.start().each(listDevice, function(self, device) {
  // on laisse 5s au navigateur pour s'ouvrir et se mettre sur le bon viewport
  casper.wait(5000, function() {
    this.viewport(device.viewport.width, device.viewport.height);
    self.thenOpen(screenshot.url, function() {
      this.capture(
        'screenshots/'
          + now + '/'
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

    // Click on 1st result link
    self.click('a.menu-link');
          this.capture(
        'screenshots/'
          + now + '/'
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

casper.run();
