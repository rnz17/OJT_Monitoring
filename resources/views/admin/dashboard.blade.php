@include('partials.head')
@include('partials.sidebar')

<div class ="w-full bg-red-300">

    <div class="table-container w-full overflow-x-auto m-auto p-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    @foreach($columns as $column)
                    <th class="py-2 px-4 border">{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    @foreach($columns as $column)
                    <td class="py-2 px-4 border">{{ $user->$column }}</td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>