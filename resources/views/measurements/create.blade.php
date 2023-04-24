<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Add Meter Reading</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="meter-reading-form">
                                <div class="form-group mb-3">
                                    <label for="reading">Meter Reading</label>
                                    <input type="number" name="reading" id="reading" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn1 btn-block mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </section>
    
<script>
   var options = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'Germany'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
       
</script>
</x-app-layout>


