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
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mb-10">
                    <form action="{{url('report-designer-search')}}" method="POST" enctype="multipart/form-data" id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                        @csrf
                        <div class="sm:flex items-center sm:mr-4">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Project</label>
                            <select id="tabulator-html-filter-field" class="form-select w-full sm:w-42 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="brand_id">
                                <option value="0">Select</option>
                                {{-- @foreach ($brands as $value)
                                <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        {{-- <div class="sm:flex items-center sm:mr-4">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Year</label>
                            <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="year">
                                <option value="0">Select</option>
                                <?php
                                    // for ($y = 2000; $y <= date('Y'); $y++) { ?>
                                    <option value ="<?=$y?>"> <?=$y?> </option>
                                <?php
                                // }
                                 ?>
                            </select>
                        </div> --}}
                        {{-- <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                            <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Name</label>
                            <input id="tabulator-html-filter-value" type="text"
                            class="form-control sm:w-42 2xl:w-full mt-2 sm:mt-0" placeholder="Search..." name="name">
                        </div> --}}
                        <div class="mt-2 xl:mt-0">
                            <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16" >Go</button>
                            <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                        </div>
                    </form>
                    {{-- <div class="flex mt-5 sm:mt-0">
                        <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                            <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export </button>
                </div> --}}
                </div>
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
