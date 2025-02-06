<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company</h4>
                    @if (!$company)
                        <a href="{{ route('admin.company.create') }}" class="btn btn-primary">Add</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        SN
                                    </th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($company)
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <img width="120" src="{{ asset($company->logo) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $company->name }}
                                        </td>
                                        <td>
                                            {{ $company->email }}
                                        </td>
                                        <td>
                                            {{ $company->phone }}
                                        </td>
                                        <td>
                                            {{ $company->address }}
                                        </td>
                                        <td>
                                            <form action="{{route('admin.company.destroy', $company->id)}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{route('admin.company.edit', $company->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--
primary-blue
danger-red
success-green
info-skyblue
--}}
