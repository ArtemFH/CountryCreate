@section('body')
    <div class="container col-6">
        <div class="row pb-4">
            <div class="col">
                <div class="list-group mt-3">
                    @if(auth()->user())
                        <a class="nav-link" href="{{ route('country.create') }}">Добавить страну</a>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Population</th>
                            <th scope="col">View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <th scope="row">{{$country->id}}</th>
                                <td>{{ $country->code }}</td>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->population }}</td>
                                <td><a href="{{ url('countries/'.$country->id) }}">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav>
                        {{$countries->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
