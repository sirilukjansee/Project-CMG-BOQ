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
                <div class="items-center">
                    <canvas id="myChart" height="100" style="align-items: center;"></canvas>
                </div>
            </div>

<script type="text/javascript">
    var xValues = ['Q1','Q2','Q3', 'Q4'];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060],
      borderColor: "red",
      fill: false
    }, {
      data: [4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, {
      data: [300,700,2000,5000],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>
<!-- END: JS Assets-->
@endsection
