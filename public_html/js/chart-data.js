var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};

var lineChartData = {
	labels : ["Lunes","Martes","Miercoles","Jueves", "Viernes","Sabado","Domingo"],
	datasets : [
	{
		label: "My Second dataset",
		fillColor : "rgba(48, 164, 255, 0.2)",
		strokeColor : "rgba(48, 164, 255, 1)",
		pointColor : "rgba(48, 164, 255, 1)",
		pointStrokeColor : "#fff",
		pointHighlightFill : "#fff",
		pointHighlightStroke : "rgba(48, 164, 255, 1)",
		data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	}
	]

}

var userYearlineChartData = {
	labels : ["Enero","Febrero","Marzo","Abril", "Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
	datasets : [
	{
		label: "My Second dataset",
		fillColor : "rgba(48, 164, 255, 0.2)",
		strokeColor : "rgba(48, 164, 255, 1)",
		pointColor : "rgba(48, 164, 255, 1)",
		pointStrokeColor : "#fff",
		pointHighlightFill : "#fff",
		pointHighlightStroke : "rgba(48, 164, 255, 1)",
		data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	}
	]

}

var barChartData = {

	labels : ["January","February","March","April","May","June","July"],
	datasets : [
	{
		label: "logros",
		fillColor : "rgba(220,220,220,0.5)",
		strokeColor : "rgba(220,220,220,0.8)",
		highlightFill: "rgba(220,220,220,0.75)",
		highlightStroke: "rgba(220,220,220,1)",
		data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],
	},
	{
		label: "Desafios",
		fillColor : "rgba(48, 164, 255, 0.2)",
		strokeColor : "rgba(48, 164, 255, 0.8)",
		highlightFill : "rgba(48, 164, 255, 0.75)",
		highlightStroke : "rgba(48, 164, 255, 1)",
		data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	},
	{
		label: "Desafios",
		fillColor : "red",
		strokeColor : "red",
		highlightFill : "red",
		highlightStroke : "red",
		data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
	},

	]
	
}

var pieData = [
{
	value: 300,
	color:"#c7197a",
	highlight: "#62b9fb",
	label: "Blue"
},
{
	value: 50,
	color: "#ffb53e",
	highlight: "#fac878",
	label: "Orange"
},
{
	value: 100,
	color: "#1ebfae",
	highlight: "#3cdfce",
	label: "Teal"
},
{
	value: 120,
	color: "#f9243f",
	highlight: "#f6495f",
	label: "Red"
}

];

var doughnutData = [
{
	value: 300,
	color:"#c7197a",
	highlight: "#62b9fb",
	label: "Blue"
},
{
	value: 50,
	color: "#ffb53e",
	highlight: "#fac878",
	label: "Orange"
},
{
	value: 100,
	color: "#1ebfae",
	highlight: "#3cdfce",
	label: "Teal"
},
{
	value: 120,
	color: "#f9243f",
	highlight: "#f6495f",
	label: "Red"
}

];



function UserPerformance() {
	var chart = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart).Line(lineChartData, {
		responsive: true
	});

	var chartYear = document.getElementById("user-year-line-chart").getContext("2d");
	var leChartYear = new Chart(chartYear).Line(userYearlineChartData, {
		responsive: true
	});
}


function generalStats()
{ 
	var chartOptions = {
		responsive: true,
		legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

	}
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	var myBar = new Chart(chart2).Bar(barChartData, chartOptions);
	document.getElementById("bar-chart-legend").innerHTML = myBar.generateLegend();


	
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	});
	
};