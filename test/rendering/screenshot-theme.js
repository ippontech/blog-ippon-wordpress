
var casper = require("casper").create();

var fs = require("fs");

var
  listDevice = [
    {
      "name": "screenshot",
      "viewport": {"width": 600, "height": 450}
    }
  ];

// var screenshot = listScreenshot[0];
var screenshot = {
  'name': 'index',
  'url': 'http://localhost:8888'};
  
  casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
  casper.echo("Screenshots", "INFO");
  casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");
  casper.echo("screenshot-theme : " + screenshot.url);
  casper.echo("-_-_-_-_-_-_-_-_-_-_-_-_-_", "INFO");


casper.start().each(listDevice, function(self, device) {
  // on laisse 5s au navigateur pour s'ouvrir et se mettre sur le bon viewport
  casper.wait(5000, function() {
    this.viewport(device.viewport.width, device.viewport.height);
    self.thenOpen(screenshot.url, function() {
      this.capture(
        'screenshots/theme/screenshot.png',
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
