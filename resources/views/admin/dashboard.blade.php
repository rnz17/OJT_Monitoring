@include('partials.head')
@include('partials.sidebar')

<div class ="w-full bg-red-300">
        
    <div class="table-container w-full overflow-x-auto m-auto p-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border">STUDENTID</th>
                    <th class="py-2 px-4 border">NAME</th>
                    <th class="py-2 px-4 border">SECTION</th>
                    <th class="py-2 px-4 border">PROGRAM</th>
                    <th class="py-2 px-4 border">EMAIL</th>
                    <th class="py-2 px-4 border">SCHOOLYEAR</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border">{{ $user->STUDENTID }}</td>
                    <td class="py-2 px-4 border">{{ $user->NAME }}</td>
                    <td class="py-2 px-4 border">{{ $user->SECTION }}</td>
                    <td class="py-2 px-4 border">{{ $user->PROGRAM }}</td>
                    <td class="py-2 px-4 border">{{ $user->EMAIL }}</td>
                    <td class="py-2 px-4 border">{{ $user->SCHOOLYEAR }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</div>