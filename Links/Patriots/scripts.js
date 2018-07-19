$(document).ready(function() {
  var ticksYear = [5,14,24,33,42,51,60,69,78,87,96];
  var tickLabelsYear = ['0','2008','2009','2010','2011','2012','2013','2014','2015','2016','2017'];

  var ticksYardsYds = [5,9.6,14.2,18.8,23.4,28,32.6,37.2,41.8,46.6,51.2];
  var tickLabelsYardsYds = ['0','500','1000','1500','2000','2500','3000','3500','4000','4500','5000'];

  var ticksTouchdownsTds = [5,9.6,14.2,18.8,23.4,28,32.6,37.2,41.8,46.6,51.2];
  var tickLabelsTouchdownsTds = ['0','20','40','60','80','100','120','140'];

  var ticksInterceptionsInt = [2.8,3.6,4.4,5.2,6,6.8,7.6,8.4,9.2,10,10.8,11.6,12.4,13.2];
  var tickLabelsInterceptionsInt = ['0','1','2','3','4','5','6','7','8','9','10','11','12','13'];

  var ticksSacksSck = [5,8,11,14,17,20,23,26,29,32,35,38];
  var tickLabelsSacksSck = ['0','5','10','15','20','25','30','35','40','45','50','55'];

  var ticksPctPct =[5,10,15,20,25,30,35,40,45,50,55,60];
  var tickLabelsPctPct = ['60','61','62','63','64','65','66','67','68','69','70']

  var ticksAttAtt =[5,12,19,26,33,40,47,54,61,68,75,82,89,96];
  var tickLabelsAttAtt = ['0','50','100','150','200','250','300','350','400','450','500','550','600','650','700']

  InitChartYds();

  function InitChartYds() {
  var lineDataYds = [{
    time: 5,
    price: 5
  }, {
    time: 14,
    price: 7.6    // 76 Yards
  }, {
    time: 24,
    price: 43.98  // 4398 Yards
  }, {
    time: 33,
    price: 39     // 3900 Yards
  }, {
    time: 42,
    price: 52.35  // 5235 Yards
  }, {
    time: 51,
    price: 48.27  // 4827 Yards
  },{
    time: 60,
    price: 43.43  // 4343 Yards
  },{
    time: 69,
    price: 41.09  // 4109 Yards
  },{
    time: 78,
    price: 47.70  // 4770 Yards
  },{
    time: 87,
    price: 35.54  // 3554 Yards
  },{
    time: 96,
    price: 45.77  // 4577 Yards
  }];

  var vis = d3.select('#visualisationYards'),
      WIDTH = 800,
      HEIGHT = 300,
      MARGINS = {
        top: 20,
        right: 0,
        bottom: 20,
        left: 100
      },
      xRangeYds = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataYds, function(d) {
        return d.time;
      }), d3.max(lineDataYds, function(d) {
        return d.time;
      })]),
      yRangeYds = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataYds, function(d) {
        return d.price;
      }), d3.max(lineDataYds, function(d) {
        return d.price;
      })]),

      xAxisYds = d3.axisBottom(xRangeYds)
        .tickSize(5)
        .tickValues(ticksYear)
        .tickFormat(function(d,i){ return tickLabelsYear[i] });

      yAxisYds = d3.axisLeft(yRangeYds)
        .tickSize(5)
        .tickValues(ticksYardsYds)
        .tickFormat(function(d,i){ return tickLabelsYardsYds[i] });

  vis.append('svg:g')
    .attr('class', 'x axis')
    .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
    .call(xAxisYds);

  vis.append('svg:g')
    .attr('class', 'y axis')
    .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
    .call(yAxisYds);

    var lineFunc = d3.line()
      .x(function(d) {
        return xRangeYds(d.time);
      })
      .y(function(d) {
        return yRangeYds(d.price);
      })
      // .curve(d3.curveBasis);

    vis
      .append("svg:path")
      .attr("d", lineFunc(lineDataYds))
      .attr("stroke", "blue")
      .attr("stroke-width", 3)
      .attr("fill", "none");
  }

///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

InitChartTds();

function InitChartTds() {
var lineDataTds = [{
  time: 5,
  price: 5
}, {
  time: 14,
  price: 5    // 76 Yards
}, {
  time: 24,
  price: 28  // 4398 Yards
}, {
  time: 33,
  price: 36     // 3900 Yards
}, {
  time: 42,
  price: 39  // 5235 Yards
}, {
  time: 51,
  price: 34  // 4827 Yards
},{
  time: 60,
  price: 25  // 4343 Yards
},{
  time: 69,
  price: 33  // 4109 Yards
},{
  time: 78,
  price: 36  // 4770 Yards
},{
  time: 87,
  price: 28  // 3554 Yards
},{
  time: 96,
  price: 32  // 4577 Yards
}];

var vis = d3.select('#visualisationTouchdowns'),
    WIDTH = 800,
    HEIGHT = 300,
    MARGINS = {
      top: 20,
      right: 0,
      bottom: 20,
      left: 100
    },
    xRangeTds = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataTds, function(d) {
      return d.time;
    }), d3.max(lineDataTds, function(d) {
      return d.time;
    })]),
    yRangeTds = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataTds, function(d) {
      return d.price;
    }), d3.max(lineDataTds, function(d) {
      return d.price;
    })]),

    xAxisTds = d3.axisBottom(xRangeTds)
      .tickSize(5)
      .tickValues(ticksYear)
      .tickFormat(function(d,i){ return tickLabelsYear[i] });

    yAxisTds = d3.axisLeft(yRangeTds)
      .tickSize(5)
      .tickValues(ticksTouchdownsTds)
      .tickFormat(function(d,i){ return tickLabelsTouchdownsTds[i] });

vis.append('svg:g')
  .attr('class', 'x axis')
  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
  .call(xAxisTds);

vis.append('svg:g')
  .attr('class', 'y axis')
  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
  .call(yAxisTds);

  var lineFunc = d3.line()
    .x(function(d) {
      return xRangeTds(d.time);
    })
    .y(function(d) {
      return yRangeTds(d.price);
    })
    // .curve(d3.curveBasis);

  vis
    .append("svg:path")
    .attr("d", lineFunc(lineDataTds))
    .attr("stroke", "blue")
    .attr("stroke-width", 3)
    .attr("fill", "none");
}


///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////


InitChartInt();

  function InitChartInt() {
  var lineDataInt = [{
  time: 5,
  price: 2.6
}, {
  time: 14,
  price: 4.6    // 76 Yards
}, {
  time: 24,
  price: 13.2  // 4398 Yards
}, {
  time: 33,
  price: 7.4    // 3900 Yards
}, {
  time: 42,
  price: 12.4  // 5235 Yards
}, {
  time: 51,
  price: 8.4  // 4827 Yards
},{
  time: 60,
  price: 10.8  // 4343 Yards
},{
  time: 69,
  price: 9.2  // 4109 Yards
},{
  time: 78,
  price: 7.6  // 4770 Yards
},{
  time: 87,
  price: 4.4  // 3554 Yards
},{
  time: 96,
  price: 8.4  // 4577 Yards
}];

  var vis = d3.select('#visualisationInterceptions'),
      WIDTH = 800,
      HEIGHT = 300,
      MARGINS = {
        top: 18.3,
        right: 0,
        bottom: 20,
        left: 100
      },
      xRangeInt = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataInt, function(d) {
        return d.time;
      }), d3.max(lineDataInt, function(d) {
        return d.time;
      })]),
      yRangeInt = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataInt, function(d) {
        return d.price;
      }), d3.max(lineDataInt, function(d) {
        return d.price;
      })]),

      xAxisInt = d3.axisBottom(xRangeInt)
        .tickSize(5)
        .tickValues(ticksYear)
        .tickFormat(function(d,i){ return tickLabelsYear[i] });

      yAxisInt = d3.axisLeft(yRangeInt)
        .tickSize(5)
        .tickValues(ticksInterceptionsInt)
        .tickFormat(function(d,i){ return tickLabelsInterceptionsInt[i] });

  vis.append('svg:g')
    .attr('class', 'x axis')
    .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
    .call(xAxisInt);

  vis.append('svg:g')
    .attr('class', 'y axis')
    .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
    .call(yAxisInt);

    var lineFunc = d3.line()
      .x(function(d) {
        return xRangeInt(d.time);
      })
      .y(function(d) {
        return yRangeInt(d.price);
      })
      // .curve(d3.curveBasis);

    vis
      .append("svg:path")
      .attr("d", lineFunc(lineDataInt))
      .attr("stroke", "blue")
      .attr("stroke-width", 3)
      .attr("fill", "none");
  }

///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////


InitChartSck();

function InitChartSck() {
var lineDataScks = [{
  time: 5,
  price: 5
}, {
  time: 14,
  price: 8    // 76 Yards
}, {
  time: 24,
  price: 15.3  // 4398 Yards
}, {
  time: 33,
  price: 20     // 3900 Yards
}, {
  time: 42,
  price: 23.5  // 5235 Yards
}, {
  time: 51,
  price: 21  // 4827 Yards
},{
  time: 60,
  price: 29  // 4343 Yards
},{
  time: 69,
  price: 17.5  // 4109 Yards
},{
  time: 78,
  price: 28  // 4770 Yards
},{
  time: 87,
  price: 14  // 3554 Yards
},{
  time: 96,
  price: 26  // 4577 Yards
}];

var vis = d3.select('#visualisationSacks'),
    WIDTH = 800,
    HEIGHT = 300,
    MARGINS = {
      top: 20,
      right: 0,
      bottom: 20,
      left: 100
    },
    xRangeSck = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataScks, function(d) {
      return d.time;
    }), d3.max(lineDataScks, function(d) {
      return d.time;
    })]),
    yRangeSck = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataScks, function(d) {
      return d.price;
    }), d3.max(lineDataScks, function(d) {
      return d.price;
    })]),

    xAxisSck = d3.axisBottom(xRangeSck)
      .tickSize(5)
      .tickValues(ticksYear)
      .tickFormat(function(d,i){ return tickLabelsYear[i] });

    yAxisSck = d3.axisLeft(yRangeSck)
      .tickSize(5)
      .tickValues(ticksSacksSck)
      .tickFormat(function(d,i){ return tickLabelsSacksSck[i] });

vis.append('svg:g')
  .attr('class', 'x axis')
  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
  .call(xAxisSck);

vis.append('svg:g')
  .attr('class', 'y axis')
  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
  .call(yAxisSck);

  var lineFunc = d3.line()
    .x(function(d) {
      return xRangeSck(d.time);
    })
    .y(function(d) {
      return yRangeSck(d.price);
    })
    // .curve(d3.curveBasis);

  vis
    .append("svg:path")
    .attr("d", lineFunc(lineDataScks))
    .attr("stroke", "blue")
    .attr("stroke-width", 3)
    .attr("fill", "none");
}


///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////


InitChartPct();

function InitChartPct() {
var lineDataPct = [{
  time: 5,
  price: 5
}, {
  time: 14,
  price: 23.9    // 76 Yards
}, {
  time: 24,
  price: 34.5  // 4398 Yards
}, {
  time: 33,
  price: 34.8     // 3900 Yards
}, {
  time: 42,
  price: 33.5  // 5235 Yards
}, {
  time: 51,
  price: 20.9  // 4827 Yards
},{
  time: 60,
  price: 5.5  // 4343 Yards
},{
  time: 69,
  price: 25.1  // 4109 Yards
},{
  time: 78,
  price: 25.6  // 4770 Yards
},{
  time: 87,
  price: 40.4  // 3554 Yards
},{
  time: 96,
  price: 35.2  // 4577 Yards
}];

var vis = d3.select('#visualisationPct'),
    WIDTH = 800,
    HEIGHT = 300,
    MARGINS = {
      top: 20,
      right: 0,
      bottom: 20,
      left: 100
    },
    xRangePct = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataPct, function(d) {
      return d.time;
    }), d3.max(lineDataPct, function(d) {
      return d.time;
    })]),
    yRangePct = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataPct, function(d) {
      return d.price;
    }), d3.max(lineDataPct, function(d) {
      return d.price;
    })]),

    xAxisPct = d3.axisBottom(xRangePct)
      .tickSize(5)
      .tickValues(ticksYear)
      .tickFormat(function(d,i){ return tickLabelsYear[i] });

    yAxisPct = d3.axisLeft(yRangePct)
      .tickSize(5)
      .tickValues(ticksPctPct)
      .tickFormat(function(d,i){ return tickLabelsPctPct[i] });

vis.append('svg:g')
  .attr('class', 'x axis')
  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
  .call(xAxisPct);

vis.append('svg:g')
  .attr('class', 'y axis')
  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
  .call(yAxisPct);

  var lineFunc = d3.line()
    .x(function(d) {
      return xRangePct(d.time);
    })
    .y(function(d) {
      return yRangePct(d.price);
    })
    // .curve(d3.curveBasis);

  vis
    .append("svg:path")
    .attr("d", lineFunc(lineDataPct))
    .attr("stroke", "blue")
    .attr("stroke-width", 3)
    .attr("fill", "none");
}


///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////


InitChartAtt();

function InitChartAtt() {
var lineDataAtt = [{
  time: 5,
  price: 5
}, {
  time: 14,
  price: 10.5    // 76 Yards
}, {
  time: 24,
  price: 83.8  // 4398 Yards
}, {
  time: 33,
  price: 73.9     // 3900 Yards
}, {
  time: 42,
  price: 89.9  // 5235 Yards
}, {
  time: 51,
  price: 93.8  // 4827 Yards
},{
  time: 60,
  price: 92.0  // 4343 Yards
},{
  time: 69,
  price: 83.0  // 4109 Yards
},{
  time: 78,
  price: 92.5  // 4770 Yards
},{
  time: 87,
  price: 63.8  // 3554 Yards
},{
  time: 96,
  price: 85.1  // 4577 Yards
}];

var vis = d3.select('#visualisationAtt'),
    WIDTH = 800,
    HEIGHT = 300,
    MARGINS = {
      top: 20,
      right: 0,
      bottom: 20,
      left: 100
    },
    xRangeAtt = d3.scaleLinear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineDataAtt, function(d) {
      return d.time;
    }), d3.max(lineDataAtt, function(d) {
      return d.time;
    })]),
    yRangeAtt = d3.scaleLinear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([d3.min(lineDataAtt, function(d) {
      return d.price;
    }), d3.max(lineDataAtt, function(d) {
      return d.price;
    })]),

    xAxisAtt = d3.axisBottom(xRangeAtt)
      .tickSize(5)
      .tickValues(ticksYear)
      .tickFormat(function(d,i){ return tickLabelsYear[i] });

    yAxisAtt = d3.axisLeft(yRangeAtt)
      .tickSize(5)
      .tickValues(ticksAttAtt)
      .tickFormat(function(d,i){ return tickLabelsAttAtt[i] });

vis.append('svg:g')
  .attr('class', 'x axis')
  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
  .call(xAxisAtt);

vis.append('svg:g')
  .attr('class', 'y axis')
  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
  .call(yAxisAtt);

  var lineFunc = d3.line()
    .x(function(d) {
      return xRangeAtt(d.time);
    })
    .y(function(d) {
      return yRangeAtt(d.price);
    })
    // .curve(d3.curveBasis);

  vis
    .append("svg:path")
    .attr("d", lineFunc(lineDataAtt))
    .attr("stroke", "blue")
    .attr("stroke-width", 3)
    .attr("fill", "none");
}


///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////


  $('#fullpage').fullpage();

  $('.playerBox').click(function(){
  $.fn.fullpage.moveTo(2);
  });

  var dataSpecific = document.querySelectorAll(".Data");
  var chartType = document.querySelectorAll(".fa");
  var chartsActual = document.querySelectorAll(".chart");
  var pie = document.querySelectorAll(".pie");
  var pieSelector = document.querySelector(".pieSelector");


  for(i = 0; i < dataSpecific.length; i++){
      dataSpecific[i].addEventListener('click', dataButtons);
  }

  $(pieSelector).on('click', function(){
        chartType[i].removeEventListener('click', dataButtons);
    });
    
  function dataButtons (){
    $(dataSpecific).removeClass('activeData');
    $(this).addClass('activeData');
  }
  for (i = 0; i < chartType.length; i++){
      chartType[i].addEventListener('click', function(){
        $(chartType).removeClass('activeChart');
        $(this).addClass('activeChart');
      });
  }



  // find elemenet called ul.statDataType
  // find all LI elements inside
  // add class of 'data-0X' to each one increasing X by 1 each time
    // example output. <li class="data-03">

// var two = $(dataSpecific).addClass("number" + three);


// console.log(two);


  for (i = 0; i < dataSpecific.length; i++){
      dataSpecific[i].addEventListener('click', function(){
        var one = this.getAttribute("id");
        for (i = 0; i < chartsActual.length; i++){
              // $(chartsActual).removeClass(one);
              // $(chartsActual).removeClass("chart");

              if (one === "YDS"){
                  $(".TDS").addClass("hide");
                  $(".TDS").removeClass("active");
                  $(".YDS").removeClass("hide");
                  $(".YDS").addClass("active");
                  $(".INT").addClass("hide");
                  $(".INT").removeClass("active");
                  $(".SCK").addClass("hide");
                  $(".SCK").removeClass("active");
                  $(".PCT").addClass("hide");
                  $(".PCT").removeClass("active");
                  $(".ATT").addClass("hide");
                  $(".ATT").removeClass("active");
              }
              if (one === "TDS"){
                  $(".YDS").addClass("hide");
                  $(".YDS").removeClass("active");
                  $(".TDS").addClass("active");
                  $(".TDS").removeClass("hide");
                  $(".INT").addClass("hide");
                  $(".INT").removeClass("active");
                  $(".SCK").addClass("hide");
                  $(".SCK").removeClass("active");
                  $(".PCT").addClass("hide");
                  $(".PCT").removeClass("active");
                  $(".ATT").addClass("hide");
                  $(".ATT").removeClass("active");
              }
              if (one === "INT"){
                  $(".TDS").addClass("hide");
                  $(".TDS").removeClass("active");
                  $(".YDS").addClass("hide");
                  $(".YDS").removeClass("active");
                  $(".INT").addClass("active");
                  $(".INT").removeClass("hide");
                  $(".SCK").addClass("hide");
                  $(".SCK").removeClass("active");
                  $(".PCT").addClass("hide");
                  $(".PCT").removeClass("active");
                  $(".ATT").addClass("hide");
                  $(".ATT").removeClass("active");
              }
              if (one === "SCK"){
                  $(".TDS").addClass("hide");
                  $(".TDS").removeClass("active");
                  $(".INT").addClass("hide");
                  $(".INT").removeClass("active");
                  $(".YDS").addClass("hide");
                  $(".YDS").removeClass("active");
                  $(".SCK").addClass("active");
                  $(".SCK").removeClass("hide");
                  $(".PCT").addClass("hide");
                  $(".PCT").removeClass("active");
                  $(".ATT").addClass("hide");
                  $(".ATT").removeClass("active");
              }
              if (one === "PCT"){
                  $(".TDS").addClass("hide");
                  $(".TDS").removeClass("active");
                  $(".INT").addClass("hide");
                  $(".INT").removeClass("active");
                  $(".YDS").addClass("hide");
                  $(".YDS").removeClass("active");
                  $(".SCK").addClass("hide");
                  $(".SCK").removeClass("active");
                  $(".PCT").addClass("active");
                  $(".PCT").removeClass("hide");
                  $(".ATT").addClass("hide");
                  $(".ATT").removeClass("active");
              }
              if (one === "ATT"){
                  $(".TDS").addClass("hide");
                  $(".TDS").removeClass("active");
                  $(".INT").addClass("hide");
                  $(".INT").removeClass("active");
                  $(".YDS").addClass("hide");
                  $(".YDS").removeClass("active");
                  $(".SCK").addClass("hide");
                  $(".SCK").removeClass("active");
                  $(".PCT").addClass("hide");
                  $(".PCT").removeClass("active");
                  $(".ATT").addClass("active");
                  $(".ATT").removeClass("hide");
              }

              // $(chartsActual[i]).addClass("active");
              // $(chartsActual[i]).addClass("hide");

              // $(".chart:not(one)").addClass("hide");

              // $(chartsActual).addClass("active");
              // $(one).removeClass("active");

              // $("two").toggleClass("TDS");
              // $(chartsActual).removeClass("active");
        }
      });
  }

//////////////////// PIE CHARTS ////////////////////
////////////////////            ////////////////////
////////////////////            ////////////////////


var data = [
  {yearLabel: "Year:", year: "2008", yardsLabel: "Yards:", value: 76},
  {yearLabel: "Year:", year: "2009", yardsLabel: "Yards:", value: 4398},
  {yearLabel: "Year:", year: "2010", yardsLabel: "Yards:", value: 3900},
  {yearLabel: "Year:", year: "2011", yardsLabel: "Yards:", value: 5235},
  {yearLabel: "Year:", year: "2012", yardsLabel: "Yards:", value: 4827},
  {yearLabel: "Year:", year: "2013", yardsLabel: "Yards:", value: 4343},
  {yearLabel: "Year:", year: "2014", yardsLabel: "Yards:", value: 4109},
  {yearLabel: "Year:", year: "2015", yardsLabel: "Yards:", value: 4770},
  {yearLabel: "Year:", year: "2016", yardsLabel: "Yards:", value: 3554},
  {yearLabel: "Year:", year: "2017", yardsLabel: "Yards:", value: 4577},
];
var text = "";

var width = 360;
var height = 360;
var thickness = 85;
var duration = 750;

var radius = Math.min(width, height) / 2;

var color = d3.scaleLinear()
  .domain(d3.range(0, data.length))
  .range(["maroon", "#0C2340", "#C8102E", "#A2AAAD", "blue", "#ffffff", "lime", "skyblue", "black", "#ffff00"]);

var svg = d3.select("#pieYards")
.append('svg')
.attr('class', 'pie')
.attr('width', width)
.attr('height', height);

var g = svg.append('g')
.attr('transform', 'translate(' + (width/2) + ',' + (height/2) + ')');

var arc = d3.arc()
.innerRadius(radius - thickness)
.outerRadius(radius);

var pie = d3.pie()
.value(function(d) { return d.value; })
.sort(null);

var path = g.selectAll('path')
.data(pie(data))
.enter()
.append("g")
.on("mouseover", function(d) {
      let g = d3.select(this)
        .style("cursor", "pointer")
        .style("fill", "black")
        .append("g")
        .attr("class", "text-group");
      
      g.append("text")
        .attr("class", "yearLabel-text")
        .text(`${d.data.yearLabel}`)
        .style("text-transform", "uppercase")
        .style("font-family", "OswaldRegular")
        .style("font-size", "20px")
        .attr('text-anchor', 'middle')
        .attr('dy', '-1em')
        .attr('dx', '-1.25em');
      g.append("text")
        .attr("class", "year-text")
        .text(`${d.data.year}`)
        .style("text-transform", "uppercase")
        .style("font-family", "OswaldRegular")
        .style("font-size", "20px")
        .style("fill", "blue")
        .attr('text-anchor', 'middle')
        .attr('dy', '-1em')
        .attr('dx', '1.25em');
      
      g.append("text")
        .attr("class", "yardsLabel-text")
        .text(`${d.data.yardsLabel}`)
        .style("text-transform", "uppercase")
        .style("font-family", "OswaldRegular")
        .style("font-size", "20px")
        .attr('text-anchor', 'middle')
        .attr('dy', '1.5em')
        .attr('dx', '-1.25em');

      g.append("text")
        .attr("class", "value-text")
        .text(`${d.data.value}`)
        .style("text-transform", "uppercase")
        .style("font-family", "OswaldRegular")
        .style("font-size", "20px")
        .style("fill", "blue")
        .attr('text-anchor', 'middle')
        .attr('dy', '1.5em')
        .attr('dx', '1.25em');
    })
  .on("mouseout", function(d) {
      d3.select(this)
        .style("cursor", "none")  
        .style("fill", color(this._current))
        .select(".text-group").remove();
    })
  .append('path')
  .attr('d', arc)
  .attr('fill', (d,i) => color(i))
  .on("mouseover", function(d) {
      d3.select(this)     
        .style("cursor", "pointer")
        .style("opacity", 0.6);
    })
  .on("mouseout", function(d) {
      d3.select(this)
        .style("cursor", "none")  
        .style("opacity", 1.0)
        .style("fill", color(this._current));
    })
  .each(function(d, i) { this._current = i; });


g.append('text')
  .attr('text-anchor', 'middle')
  .attr('dy', '.35em')
  .text(text);



// for (i = 0; i < pie.length; i++){
//   pie
// }




});
