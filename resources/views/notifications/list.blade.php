@extends("layouts.dashboard")

@section("options")
    <li class="nav-item">
        <a class="nav-link" href="{{route('notifications_create')}}">Register</a>
    </li>
@endsection

@section("content")
    <div class="container p-5">
        @if(session('message_info'))
            <div class="alert alert-success" role="alert">
                {{session('message_info')}}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <b>-</b> {{$error}}<br>
                @endforeach
            </div>
        @endif
        <div class="table-responsive">
            <table id="table-list" class="table table-bordered table-sm display text-center">
                <thead>
                    <tr>
                        <th>ID No.</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>
                                {{$notification->id}}
                            </td>
                            <td>
                                {{$notification->email}}
                            </td>
                            <td>
                                {{$notification->message}}
                            </td>
                            <td>
                                <a href="{{route('notifications_edit', ['notification_id'=>$notification->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="{{route('notifications_trash', ['notification_id'=>$notification->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $('#table-list').DataTable( {
                "columnDefs": [{ "orderable": false, "targets": -1 }],
                "iDisplayLength": 10,
                "language": {
                    "sEmptyTable":     "No data available in table",
                    "sInfo":           "Showing _START_ to _END_ of _TOTAL_ entries",
                    "sInfoEmpty":      "Showing 0 to 0 of 0 entries",
                    "sInfoFiltered":   "(filtered from _MAX_ total entries)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "Show _MENU_ entries",
                    "sLoadingRecords": "Loading...",
                    "sProcessing":     "Processing...",
                    "sSearch":         "Search:",
                    "sZeroRecords":    "No matching records found",
                    "oPaginate": {
                        "sFirst":    "First",
                        "sLast":     "Last",
                        "sNext":     "Next",
                        "sPrevious": "Previous"
                    },
                    "oAria": {
                        "sSortAscending":  ": activate to sort column ascending",
                        "sSortDescending": ": activate to sort column descending"
                    }
                }
            } );
        });
    </script>
@endsection