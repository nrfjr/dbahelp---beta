<?php 
$title = 'Dashboard';
require APPROOT . '/views/inc/header.php'; 
?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

    <h1 class="text-3xl text-black pb-6 text-white"><b>Dashboard</b></h1>

    <div>
        <div id="chart"></div>
        <script>
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    

    <script>
      //NOLI: I think I fixed the x-axis, or need some adjustment, but then the only problem now is Y-axis.
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>
    
    <script>
  var lastDate = 0;
  var data = []
  var TICKINTERVAL = 15000//86400000  //1000 is recommended which matches 1 second //if any changes, needs to match with the interval below
  let XAXISRANGE = 5000000//777600000  x-axis , time shown //100000 is recommended //this is like the interval, now = to 5 min

  function getDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    while (i < count) {
      var x = baseval;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min; //this one is the initial value for Y
  
      data.push({
        x, y
      });
      lastDate = baseval
      baseval += TICKINTERVAL;
      i++;
    }
  }
  
  getDayWiseTimeSeries(new Date(new Date().toLocaleDateString()).getTime(), 10, {
    min: 10,
    max: 90
  })
  

  function getNewSeries(baseval, yrange) {
    var newDate = baseval + TICKINTERVAL;
    lastDate = newDate
  //change the value below for configuring the data Reset length
    for(var i = 0; i< data.length - 350; i++) {
      // IMPORTANT
      // we reset the x and y of the data which is out of drawing area
      // to prevent memory leaks
      data[i].x = newDate - XAXISRANGE - TICKINTERVAL
      //i dunno about this code, its initial value is 0, i think this is the y value every after page refresh
      data[i].y = 0
    }
  
    data.push({
      x: newDate,
      y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min //this where Y axis and updating can be control
    })
  }
  
  function resetData(){
    // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series 
    data = data.slice(data.length - 400, data.length);
  }
  </script>
  <script>
      
      var options = {
        series: [{
        data: data.slice()
      }],
        chart: {
        foreColor: 'white',
        id: 'realtime',
        height: 350,
        type: 'area',
        animations: {
          enabled: true,
          easing: 'linear',
          dynamicAnimation: {
            speed: 1000
          }
        },
        toolbar: {
          show: false
        },
        zoom: {
          enabled: false
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth'
      },
      title: {
        text: 'Users Session Chart Sample',
        align: 'left'
      },
      markers: {
        size: 0
      },
      xaxis: {
        type: 'datetime',
        range: XAXISRANGE,
      },
      yaxis: {
        max: 100
      },
      legend: {
        show: true
      },
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    
    
      window.setInterval(function () {
      getNewSeries(lastDate, {
        min: 10,
        max: 90
      })
    
      chart.updateSeries([{
        data: data
      }])
    }, 15000 /*refresh interval 15 sec*/)
    
  </script>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>