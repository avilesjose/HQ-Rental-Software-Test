@extends("layouts.dashboard")

@section("options")
    <li class="nav-item">
        <a class="nav-link" href="{{route('notifications_list')}}">Back</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('notifications_trash', ['notification_id'=>$notification->id])}}">Remove</a>
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
        <form class="mx-auto mt-5 form-size-test" action="{{route('notifications_update')}}" method="post">
            @csrf
            <input type="hidden" name="notification_id" value="{{$notification->id}}"/>
            <h5 class="text-center">Edit</h5>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" placeholder="name@example.com" name="email" value="{{$notification->email}}">
            </div>
            <div class="form-group">
                <label>Notification or message</label>
                <textarea class="form-control" rows="5" name="message">{{$notification->message}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection