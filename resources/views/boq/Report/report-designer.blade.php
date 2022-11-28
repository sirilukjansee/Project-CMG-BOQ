@extends('layout.masterLayout')

@section('content-data')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                   Designer/PM Report
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0"></div>
            </div>
            <!-- BEGIN: HTML Table Data -->
            <div class="intro-y box p-5 mt-5">
                @if (session("success"))
                <div class="alert alert-primary-soft show flex items-center mb-2" role="alert">
                        {{ session('success') }}
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
                @endif
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start mb-10">
                        <form action="{{url('report-designer-search')}}" method="POST" enctype="multipart/form-data" id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                            @csrf
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Brand</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-42 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="brand_id">
                                    <option value="0">Select</option>
                                    @foreach ($brands as $value)
                                    <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:flex items-center sm:mr-4">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Year</label>
                                <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto" name="year">
                                    <option value="0">Select</option>
                                    <?php
                                        for ($y = 2000; $y <= date('Y')+1; $y++) { ?>
                                        <option value ="<?=$y?>"> <?=$y?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Name</label>
                                <input id="tabulator-html-filter-value" type="text"
                                class="form-control sm:w-42 2xl:w-full mt-2 sm:mt-0" placeholder="Search..." name="name">
                            </div>
                            <div class="mt-2 xl:mt-0">
                                <button id="tabulator-html-filter-go" type="submit" class="btn btn-primary w-full sm:w-16" >Go</button>
                                <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                            </div>
                        </form>
                        <div class="flex mt-5 sm:mt-0">
                            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export </button>
                    </div>
                    </div>
                    <table class="table table-hover table-auto sm:mt-2" id="example">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">ม.ค.</th>
                                <th scope="col">ก.พ.</th>
                                <th scope="col">มี.ค.</th>
                                <th scope="col">เม.ย.</th>
                                <th scope="col">พ.ค.</th>
                                <th scope="col">มิ.ย.</th>
                                <th scope="col">ก.ค.</th>
                                <th scope="col">ส.ค.</th>
                                <th scope="col">ก.ย.</th>
                                <th scope="col">ต.ค.</th>
                                <th scope="col">พ.ย.</th>
                                <th scope="col">ธ.ค.</th>
                                <th scope="col">Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sumMonth1 = 0;
                                $sumMonth2 = 0;
                                $sumMonth3 = 0;
                                $sumMonth4 = 0;
                                $sumMonth5 = 0;
                                $sumMonth6 = 0;
                                $sumMonth7 = 0;
                                $sumMonth8 = 0;
                                $sumMonth9 = 0;
                                $sumMonth10 = 0;
                                $sumMonth11 = 0;
                                $sumMonth12 = 0;
                                $grandTotal = 0;
                            @endphp
                            @foreach ($designers as $key => $value)
                                @php
                                    $month1 = 0;
                                    $month2 = 0;
                                    $month3 = 0;
                                    $month4 = 0;
                                    $month5 = 0;
                                    $month6 = 0;
                                    $month7 = 0;
                                    $month8 = 0;
                                    $month9 = 0;
                                    $month10 = 0;
                                    $month11 = 0;
                                    $month12 = 0;

                                    if ($year == '' || $year == 0) {
                                        $year = Carbon\Carbon::today()->format('Y');
                                    }
                                    $projects = App\Models\Project::where('designer_name', $value->id)->whereYear('open_date', $year)->get();

                                    foreach ($projects as $p) {
                                        if (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 1 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month1 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 2 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month2 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 3 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month3 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 4 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month4 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 5 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month5 += 1;
                                        } elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 6 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month6 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 7 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month7 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 8 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month8 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 9 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month9 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 10 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month10 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 11 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month11 += 1;
                                        }elseif (Carbon\Carbon::parse(@$value->project_pm->open_date)->format('m') == 12 && Carbon\Carbon::parse(@$value->project_pm->open_date)->format('Y') == $year)
                                        {
                                            $month12 += 1;
                                        }
                                    }
                                @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 1]) }}">{{$month1}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 2]) }}">{{$month2}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 3]) }}">{{$month3}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 4]) }}">{{$month4}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 5]) }}">{{$month5}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 6]) }}">{{$month6}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 7]) }}">{{$month7}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 8]) }}">{{$month8}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 9]) }}">{{$month9}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 10]) }}">{{$month10}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 11]) }}">{{$month11}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 12]) }}">{{$month12}}</td>
                                <td data-href="{{ url('report-designer-detail', [$value->id, 13]) }}">{{ count($projects) }}</td>
                            </tr>

                            @php
                                $sumMonth1 += $month1;
                                $sumMonth2 += $month2;
                                $sumMonth3 += $month3;
                                $sumMonth4 += $month4;
                                $sumMonth5 += $month5;
                                $sumMonth6 += $month6;
                                $sumMonth7 += $month7;
                                $sumMonth8 += $month8;
                                $sumMonth9 += $month9;
                                $sumMonth10 += $month10;
                                $sumMonth11 += $month11;
                                $sumMonth12 += $month12;
                                $grandTotal += count($projects);
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="font-weight:bold;">
                                <td colspan="2" style="text-align: center;">Grand Total</td>
                                <td>{{$sumMonth1}}</td>
                                <td>{{$sumMonth2}}</td>
                                <td>{{$sumMonth3}}</td>
                                <td>{{$sumMonth4}}</td>
                                <td>{{$sumMonth5}}</td>
                                <td>{{$sumMonth6}}</td>
                                <td>{{$sumMonth7}}</td>
                                <td>{{$sumMonth8}}</td>
                                <td>{{$sumMonth9}}</td>
                                <td>{{$sumMonth10}}</td>
                                <td>{{$sumMonth11}}</td>
                                <td>{{$sumMonth12}}</td>
                                <td>{{ $grandTotal }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

<script type="text/javascript">
    jQuery(document).ready(function() {
     var table = jQuery('#example').DataTable({
         "bLengthChange": true,
         "iDisplayLength": 10,
         "ordering": false,
        //  "bFilter": false
	   });

    $(".dataTables_length").hide();
    });

    //button href
    document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("td[data-href]");

            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.location.href = row.dataset.href;
                });
            });
        });

</script>
<!-- END: JS Assets-->
@endsection
