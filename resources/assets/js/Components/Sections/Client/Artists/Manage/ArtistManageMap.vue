<template lang="pug">
div
  #controls.nicebox
    div
      select#census-variable
        option(value='https://storage.googleapis.com/mapsdevsite/json/DP02_0066PE')
          | Percent of population over 25 that completed high
          | school
        option(value='https://storage.googleapis.com/mapsdevsite/json/DP05_0017E') Median age
        option(value='https://storage.googleapis.com/mapsdevsite/json/DP05_0001E') Total population
        option(value='https://storage.googleapis.com/mapsdevsite/json/DP02_0016E') Average family size
        option(value='https://storage.googleapis.com/mapsdevsite/json/DP03_0088E') Per-capita income
    #legend
      #census-min min
      .color-key
        span#data-caret ◆
      #census-max max
  #data-box.nicebox
    label#data-label(for='data-value')
    span#data-value
  gmap-map(ref=`mapComponent`, :center="position", :zoom="7", style="width: 500px; height: 300px", :options="mapOptions")
    gmap-marker(:position='position' :clickable='true' :draggable='true' @position_changed='updatePosition($event)', :zoom="zoom")
</template>

<style>
  html, body, #map { height: 100%; margin: 0; padding: 0; overflow: hidden; }
    .nicebox {
      position: absolute;
      text-align: center;
      font-family: "Roboto", "Arial", sans-serif;
      font-size: 13px;
      z-index: 5;
      box-shadow: 0 4px 6px -4px #333;
      padding: 5px 10px;
      background: rgb(255,255,255);
      background: linear-gradient(to bottom,rgba(255,255,255,1) 0%,rgba(245,245,245,1) 100%);
      border: rgb(229, 229, 229) 1px solid;
    }
    #controls {
      top: 10px;
      left: 110px;
      width: 360px;
      height: 45px;
    }
    #data-box {
      top: 10px;
      left: 500px;
      height: 45px;
      line-height: 45px;
      display: none;
    }
    #census-variable {
      width: 360px;
      height: 20px;
    }
    #legend { display: flex; display: -webkit-box; padding-top: 7px }
    .color-key {
      background: linear-gradient(to right,
        hsl(5, 69%, 54%) 0%,
        hsl(29, 71%, 51%) 17%,
        hsl(54, 74%, 47%) 33%,
        hsl(78, 76%, 44%) 50%,
        hsl(102, 78%, 41%) 67%,
        hsl(127, 81%, 37%) 83%,
        hsl(151, 83%, 34%) 100%);
      flex: 1;
      -webkit-box-flex: 1;
      margin: 0 5px;
      text-align: left;
      font-size: 1.0em;
      line-height: 1.0em;
    }
    #data-value { font-size: 2.0em; font-weight: bold }
    #data-label { font-size: 2.0em; font-weight: normal; padding-right: 10px; }
    #data-label:after { content: ':' }
    #data-caret { margin-left: -5px; display: none; font-size: 14px; width: 14px}
</style>

<script>

export default {

  
  /**
   * The main instance reactive
   * properties of the component.
   * ------------------------------
   * @member {Function}
   * @return {Object}
   */
  data () {
    return {
      censusMin: Number.MAX_VALUE,
      censusMax: -Number.MAX_VALUE,
      map: null,
      name: '',
      address: '',
      people_limit: '',
      area: '',
      floors: '',
      errors: {
        errors: {}
      },
      position: {
        lat: 40,
        lng: -100
      },
      zoom: 4,
      mapOptions: {
        styles: [
          {
            'stylers': [{'visibility': 'off'}]
          }, {
            'featureType': 'landscape',
            'elementType': 'geometry',
            'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
          }, {
            'featureType': 'water',
            'elementType': 'geometry',
            'stylers': [{'visibility': 'on'}, {'color': '#bfd4ff'}]
          }
        ]
      }
    }
  },

  methods: {
    initMap() {
      var map = this.map
      console.log('InitMap', map)
      // set up the style rules and events for google.maps.Data
      map.data.setStyle(this.styleFeature);
      map.data.addListener('mouseover', this.mouseInToRegion);
      map.data.addListener('mouseout', this.mouseOutOfRegion);

      // wire up the button
      var selectBox = document.getElementById('census-variable');
      google.maps.event.addDomListener(selectBox, 'change', () => {
        this.clearCensusData();
        this.loadCensusData(selectBox.options[selectBox.selectedIndex].value);
      });

      // state polygons only need to be loaded once, do them now
      this.loadMapShapes();

    },

    /** Loads the state boundary polygons from a GeoJSON source. */
    loadMapShapes() {
      // load US state outline polygons from a GeoJson file
      this.map.data.loadGeoJson('https://storage.googleapis.com/mapsdevsite/json/states.js', { idPropertyName: 'STATE' });
      this.map.data.addGeoJson()

      // wait for the request to complete by listening for the first feature to be
      // added
      google.maps.event.addListenerOnce(this.map.data, 'addfeature', () => {
        google.maps.event.trigger(document.getElementById('census-variable'),
            'change');
      });
    },

    /**
     * Loads the census data from a simulated API call to the US Census API.
     *
     * @param {string} variable
     */
    loadCensusData(variable) {
      // load the requested variable from the census API (using local copies)
      var xhr = new XMLHttpRequest();
      xhr.open('GET', variable + '.json');
      xhr.onload = () => {
        var censusData = JSON.parse(xhr.responseText);
        censusData.shift(); // the first row contains column names
        censusData.forEach((row) => {
          var censusVariable = parseFloat(row[0]);
          var stateId = row[1];

          // keep track of min and max values
          if (censusVariable < this.censusMin) {
            this.censusMin = censusVariable;
          }
          if (censusVariable > this.censusMax) {
            this.censusMax = censusVariable;
          }

          // update the existing row with the new data
          this.map.data
            .getFeatureById(stateId)
            .setProperty('census_variable', censusVariable);
        });

        // update and display the legend
        document.getElementById('census-min').textContent =
            this.censusMin.toLocaleString();
        document.getElementById('census-max').textContent =
            this.censusMax.toLocaleString();
      };
      xhr.send();
    },

    /** Removes census data from each shape on the map and resets the UI. */
    clearCensusData() {
      this.censusMin = Number.MAX_VALUE;
      this.censusMax = -Number.MAX_VALUE;
      this.map.data.forEach((row) => {
        row.setProperty('census_variable', undefined);
      });
      document.getElementById('data-box').style.display = 'none';
      document.getElementById('data-caret').style.display = 'none';
    },

    /**
     * Applies a gradient style based on the 'census_variable' column.
     * This is the callback passed to data.setStyle() and is called for each row in
     * the data set.  Check out the docs for Data.StylingFunction.
     *
     * @param {google.maps.Data.Feature} feature
     */
    styleFeature(feature) {
      var low = [5, 69, 54];  // color of smallest datum
      var high = [151, 83, 34];   // color of largest datum

      // delta represents where the value sits between the min and max
      var delta = (feature.getProperty('census_variable') - this.censusMin) /
          (this.censusMax - this.censusMin);

      var color = [];
      for (var i = 0; i < 3; i++) {
        // calculate an integer color based on the delta
        color[i] = (high[i] - low[i]) * delta + low[i];
      }

      // determine whether to show this shape or not
      var showRow = true;
      if (feature.getProperty('census_variable') == null ||
          isNaN(feature.getProperty('census_variable'))) {
        showRow = false;
      }

      var outlineWeight = 0.5, zIndex = 1;
      if (feature.getProperty('state') === 'hover') {
        outlineWeight = zIndex = 2;
      }

      return {
        strokeWeight: outlineWeight,
        strokeColor: '#fff',
        zIndex: zIndex,
        fillColor: 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)',
        fillOpacity: 0.75,
        visible: showRow
      };
    },

    /**
     * Responds to the mouse-in event on a map shape (state).
     *
     * @param {?google.maps.MouseEvent} e
     */
    mouseInToRegion(e) {
      // set the hover state so the setStyle can change the border
      e.feature.setProperty('state', 'hover');

      var percent = (e.feature.getProperty('census_variable') - this.censusMin) /
          (this.censusMax - this.censusMin) * 100;

      // update the label
      document.getElementById('data-label').textContent =
          e.feature.getProperty('NAME');
      document.getElementById('data-value').textContent =
          e.feature.getProperty('census_variable').toLocaleString();
      document.getElementById('data-box').style.display = 'block';
      document.getElementById('data-caret').style.display = 'block';
      document.getElementById('data-caret').style.paddingLeft = percent + '%';
    },

    /**
     * Responds to the mouse-out event on a map shape (state).
     *
     * @param {?google.maps.MouseEvent} e
     */
    mouseOutOfRegion(e) {
      // reset the hover state, returning the border to normal
      e.feature.setProperty('state', 'normal');
    },

    getMap() {
      return this.$refs.mapComponent.$mapObject
    }
  },

  /**
   * The mounted hook life-cycle of
   * the component instance.
   * ------------------------------
   * @member {Function}
   */
  mounted () {
    console.log(`${this.$options.__file.split('/').slice(-1).pop()} Component Mounted!`)
    this.$refs.mapComponent.$mapCreated.then(map => {
      this.map = map
      this.initMap()
    })
  }

}
</script>
