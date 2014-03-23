(function(){
var data = [ {name: "one", value: 1000},
    {name: "two", value:  1000},
    {name: "three", value:  1000}, ];

var margin = {top: 20, right: 20, bottom: 20, left: 20};
width = 600 - margin.left - margin.right;
height = width - margin.top - margin.bottom;

var chart = d3.select("#circle-container")
    .append('svg')
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + ((width/2)+margin.left) + "," + ((height/2)+margin.top) + ")");


var radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range(["#3b5998", "#4099ff", "#ffffff"]);

var arc = d3.svg.arc()
    .outerRadius(radius)
    .innerRadius(radius - 20);

var pie = d3.layout.pie()
    .sort(null)
    .startAngle(1.1*Math.PI)
    .endAngle(3.1*Math.PI)
    .value(function(d) { return d.value; });


var g = chart.selectAll(".arc")
    .data(pie(data))
    .enter().append("g")
    .attr("class", "arc");

g.append("path")
    .style("fill", function(d) { return color(d.data.name); })
    .transition().delay(function(d, i) { return 0; }).duration(3000)
    .attrTween('d', function(d) {
        var i = d3.interpolate(d.startAngle+0.1, d.endAngle);
        return function(t) {
            d.endAngle = i(t);
            return arc(d);
        }
    });
})();
