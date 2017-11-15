# Trafficlightradar API

This is proof of concept project made for school course.

Project contains configuration and module for handling API calls to Tampere open data API.

## What it does?
- Fetches data from [Trafficlightdata Service -API](http://trafficlights.tampere.fi)
- Fetches location of detectors (that are not provided in the API for some reason) from [another API](http://wiki.itsfactory.fi/index.php/Tampere_traffic_lights_open_data)
- Stores fetched data for 24h
- Provides UI to browse fetched data and filter results by detector
- Provides REST export for stored data.

## Scope
This project had very small scope, only to fecth data from another API and store it for
own implementation of front end, where the data will be shown. More about the frontend itself [here](https://github.com/leflonen/geijjoo).

Due to small scope, the code of the fetching module is not done properly.
To actually host this project as a production version, the code would need to be refactored.
As of the current state, code does work as intented, but only stores gathered data for 24 hours.

I'm huge fan of [code standards](https://www.drupal.org/docs/develop/standards), but with this project
I have chosen to go with the easiest way. If you are new to PHP or Drupal 8, this code is not for you.
