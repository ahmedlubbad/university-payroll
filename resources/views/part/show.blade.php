<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Part Time Employees') }}
        </h2>
        <a href="{{route('part.index')}}" class="btn btn-outline-dark btn-xs">Part time Employees</a></h2>
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
                <tr>
                    <td>{{$employee->id}}</td>
                    <td><a href="/tags/{{$employee->id}}/edit">{{$employee->name}}</a></td>
                    <td>{{$employee->identity}}</td>
                    <td>{{$employee->mobile}}</td>
                    <td>{{$employee->bank_account_number}}</td>
                    <td>{{$employee->salary}}</td>
                    <td>{{$employee->attend}}</td>

                    <td>
                        <form method="post" action="{{route('part.transfer',$employee->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-small"> Salary transfer</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
