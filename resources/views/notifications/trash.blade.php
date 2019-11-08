@extends("layouts.dashboard")

@section("options")
    <li class="nav-item">
        <a class="nav-link" href="{{route('notifications_list')}}">Back</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('notifications_edit', ['notification_id'=>$notification->id])}}">Edit</a>
    </li>
@endsection

@section("content")
    <div class="container mt-5">
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
        <form class="mx-auto mt-5 form-size-test" action="{{route('notifications_delete')}}" method="post">
            @csrf
            <input type="hidden" name="notification_id" value="{{$notification->id}}"/>
            <h5 class="text-center">Remove</h5>
            <p>Type remove in the field to confirm.</p>
            <input class="form-control" type="text" placeholder="Remove" id="confirm_remove">
            <button id="remove" type="submit" class="btn btn-primary mt-3" disabled>Remove</button>
        </form>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $("#confirm_remove").keyup(function () {
                if($(this).val().toLowerCase()=="remove"){
                    $("#remove").prop("disabled",false);
                } else {
                    $("#remove").prop("disabled",true);
                }
            })
        });
    </script>
@endsection