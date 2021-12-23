<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Full Time Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('full.store')}}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Employee Name:</label>
                    <div class="mt-3">
                        <input type="text" name="name" value="{{old('name')}}"
                               class="form-control @error('name')is-invalid @enderror">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Employee Identity:</label>
                    <div class="mt-3">
                        <input type="text" name="identity" value="{{old('identity')}}"
                               class="form-control @error('identity')is-invalid @enderror">
                        @error('identity')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Employee Mobile:</label>
                    <div class="mt-3">
                        <input type="text" name="mobile" value="{{old('mobile')}}"
                               class="form-control @error('mobile')is-invalid @enderror">
                        @error('mobile')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Bank Account NO.</label>
                    <div class="mt-3">
                        <input type="text" name="bank_account_number" value="{{old('bank_account_number')}}"
                               class="form-control @error('name')is-invalid @enderror">
                        @error('bank_account_number')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Salary</label>
                    <div class="mt-3">
                        <input type="text" name="salary" value="{{old('salary')}}"
                               class="form-control @error('salary')is-invalid @enderror">
                        @error('salary')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</x-app-layout>
