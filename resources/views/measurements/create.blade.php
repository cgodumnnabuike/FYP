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
</x-app-layout>


    <script>
        const chart = new ApexCharts(document.querySelector("#chart-container"), {
            series: [],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: []
            },
            yaxis: {
                title: {
                    text: 'Reading Value'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        });

        document.querySelector("#meter-reading-form").addEventListener("submit", (event) => {
            event.preventDefault();

            const readingValue = document.querySelector("#reading").value;

            if (readingValue === "") {
                alert("Please enter a reading value.");
                return;
            }

            chart.updateSeries([{
                name: "Reading Value",
                data: [readingValue]
            }]);

            chart.updateOptions({
                xaxis: {
                    categories: ['']
                }
            });

            chart.render();
        });
    </script>


