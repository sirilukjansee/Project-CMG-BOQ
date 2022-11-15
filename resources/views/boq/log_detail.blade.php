@extends('layout.masterLayout')

@section('content-data')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        {{-- @if ( $log1->template_id) --}}
            History Status {{@$log1->pro_log->brand_master->brand_name}} {{@$log1->pro_log->location_master->location_name}}
        {{-- @endif --}}
    </h2>
</div>
<div class="intro-y box p-5 mt-5">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User_name</th>
            <th scope="col">Designer</th>
            <th scope="col">Status</th>
            <th scope="col">Comment</th>
            <th scope="col">Send_Date</th>
          </tr>
        </thead>
        <tbody>
        @foreach ( $log as $key => $lg )
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <th>
                {{-- approve_by --}}
                {{ @$lg->user_n->name }}
                {{-- create_by --}}
                {{ @$lg->user_n_u->name }}
            </th>
            <td>{{@$lg->pro_log->designer_master->name}}</td>
            <td>
                @if (@$lg->status == '0')
                    Drafted
                @elseif (@$lg->status == '1')
                    Waiting Approval
                @elseif (@$lg->status == '2')
                    Approval
                @elseif (@$lg->status == '3')
                    Reject
                @elseif (@$lg->status == '4')
                    Rework
                @endif
            </td>
            <td>{{@$lg->comment}}</td>
            <td>{{ Carbon\Carbon::parse($lg->date)->format('d M y H:i') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
</div>
    <!-- BEGIN: JS Assets-->
    <script>

    </script>
    <!-- END: JS Assets-->
@endsection
