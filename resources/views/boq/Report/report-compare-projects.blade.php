@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   เปรียบเทียบระหว่างโปรเจค
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0"></div>
            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                <div class="content-center">
                    <canvas id="myChart" height="110"></canvas>
                </div>
            </div>

<script type="text/javascript">
    var xValues = ['Q1', 'Q2', 'Q3', 'Q4'];

    new Chart("myChart", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
        data: [860,1140,1060,1060],
        borderColor: "red",
        fill: false,
        label: 'Project 1',
        }, {
        data: [1600,1700,1700,1900],
        borderColor: "green",
        fill: false,
        label: 'Project 2',
        }, {
        data: [2000,1000,200,1000],
        borderColor: "blue",
        fill: false,
        label: 'Project 3',
        }]
    },
    options: {
        legend: {display: true}
    }
    });
</script>
<!-- END: JS Assets-->
@endsection
