<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Part Time Employees') }}
        </h2>
        <a href="{{route('part.create')}}" class="btn btn-outline-dark btn-xs">Add New</a></h2>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Identity</th>
                    <th>Mobile</th>
                    <th>Bank Account NO.</th>
                    <th>Basic Salary</th>
                    <th>Hour Attend</th>

                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td><a href="{{route('part.show',$employee->id)}}">{{$employee->name}}</a></td>
                        <td>{{$employee->identity}}</td>
                        <td>{{$employee->mobile}}</td>
                        <td>{{$employee->bank_account_number}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->attend}}</td>
                        <td>
                            <form method="post" action="{{route('part.attend',$employee->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-small"> Register Attend</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="{{route('part.destroy',$employee->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-small">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
