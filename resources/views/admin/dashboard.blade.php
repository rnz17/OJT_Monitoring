@include('partials.head')
@include('partials.sidebar')

<div class ="w-full bg-red-300">
    @foreach($users as $user)
        <h1>{{ $user->name}}</h1>
    @endforeach



ADMIN
@include('partials.logout')

</div>