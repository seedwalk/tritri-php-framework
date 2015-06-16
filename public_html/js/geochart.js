google.load("visualization", "1", {packages:["geochart", "bar"]});
google.setOnLoadCallback(drawRegionsMap);

function drawRegionsMap() {

	var data = google.visualization.arrayToDataTable([
		['Country', 'Popularity'],
		['Germany', 200],
		['United States', 300],
		['Brazil', 400],
		['Canada', 500],
		['France', 600],
		['RU', 700]
		]);

	var options = {
        colorAxis: {
        	colors: ['#db5096', '#8f2382'],
        	width: '200',
        }
      };

	var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

	chart.draw(data, options);
}



//ENGAGEMENT

      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Element', 'Nivel de Compromiso', { role: 'style' }],
         ['Argentina', 8.94, 'fill-color:#b87333'],            // RGB value
         ['Colombia;', 10.49, 'silver'],            // English color name
         ['Chile', 19.30, 'gold'],
         ['Mexico', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
         ['Ecuador', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
        ]);

        var options = {
          chart: {
            title: 'Compromiso',
            subtitle: 'Lorem ipsum dolor sit amet',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('engagement-chart'));

        chart.draw(data, options);
      }