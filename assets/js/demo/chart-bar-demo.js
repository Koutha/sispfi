// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
var defaultLegendClickHandler = Chart.defaults.global.legend.onClick;


function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
  prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
  sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
  dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
  s = '',
  toFixedFix = function(n, prec) {
    var k = Math.pow(10, prec);
    return '' + Math.round(n * k) / k;
  };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Total años
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: datos, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 13
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjas, //variable declarada arriba y asignada con los datos
      maxTicksLimit: 5,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value)+' Kg';
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,
    },
  },
  tooltips: {
    enable: true
  },
  hover: {
    animationDuration: 0
  },
  }
});
// Bar Chart Total animales por año
var ctxAA = document.getElementById("BarChartAnimales");
var myBarChart = new Chart(ctxAA, {
  type: 'bar',
  data: datosAA, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 13
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjasAnimales, //variable declarada arriba y asignada con los datos
      maxTicksLimit: 5,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value)+' Unid.';
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,
    },
  },
  tooltips: {
    enable: true
  },
  hover: {
    animationDuration: 0
  },
  }
});
// Bar Chart Total en KG por granjas
var ctxG = document.getElementById("barChartGranjas");
var myBarChartGranjas = new Chart(ctxG, {
  type: 'bar',
  data: datosGranjas, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 10
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjas,
      maxTicksLimit: 6,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value)+' Kg.';
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,

    },
   
  },
  tooltips: {
    enable: true,
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    callbacks: {
      label: function(tooltipItem, chart) {
        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ ' Kg';
      }
    }
  },
  hover: {
    animationDuration: 0
  },
  }
});
// Bar Chart Total año en cantidad de animales por granjas
var ctxGA = document.getElementById("barChartGranjasAnimales");
var myBarChartGranjas = new Chart(ctxGA, {
  type: 'bar',
  data: datosGranjasAA, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 10
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjasAnimales,
      maxTicksLimit: 5,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value)+' Unid.';
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,

    },
   
  },
  tooltips: {
    enable: true,
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    callbacks: {
      label: function(tooltipItem, chart) {
        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ ' Unid.';
      }
    }
  },
  hover: {
    animationDuration: 0
  },
  }
});
// Bar Chart Total en KG por seccion
var ctxS = document.getElementById("barChartSeccion");
var myBarChartGranjas = new Chart(ctxS, {
  type: 'bar',
  data: datosSeccion, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 10
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjas,
      maxTicksLimit: 5,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value);
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,

    },
   
  },
  tooltips: {
    enable: true,
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    callbacks: {
      label: function(tooltipItem, chart) {
        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ ' Kg';
      }
    }
  },
  hover: {
    animationDuration: 0
  },
  }
});
// Bar Chart Total en Cantidad de animales por seccion
var ctxSA = document.getElementById("barChartSeccionAnimales");
var myBarChartGranjas = new Chart(ctxSA, {
  type: 'bar',
  data: datosSeccionAnimales, //variable declarada arriba y asignada con los datos
  options: {
  plugins: {
    datalabels :{
      anchor: 'end',
      align: 'top'
    }
  },
  maintainAspectRatio: false,
  layout: {
    padding: {
    left: 10,
    right: 25,
    top: 25,
    bottom: 0
    }
  },
  scales: {
    xAxes: [{
    time: {
      unit: 'month'
    },
    gridLines: {
      display: false,
      drawBorder: false
    },
    ticks: {
      maxTicksLimit: 10
    },
    maxBarThickness: 25,
    }],
    yAxes: [{
    ticks: {
      min: 0,
      max: totalesGranjasAnimales,
      maxTicksLimit: 5,
      padding: 10,
      // Include a dollar sign in the ticks
      callback: function(value, index, values) {
      return  number_format(value)+' Unid.';
      }
    },
    gridLines: {
      color: "rgb(234, 236, 244)",
      zeroLineColor: "rgb(234, 236, 244)",
      drawBorder: false,
      borderDash: [2],
      zeroLineBorderDash: [2]
    }
    }],
  },
  legend: {
    display: true,
    position: 'right',
    labels: {
    padding: 30,

    },
   
  },
  tooltips: {
    enable: true,
    titleMarginBottom: 10,
    titleFontColor: '#6e707e',
    titleFontSize: 14,
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    callbacks: {
      label: function(tooltipItem, chart) {
        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ ' Unid.';
      }
    }
  },
  hover: {
    animationDuration: 0
  },
  }
});