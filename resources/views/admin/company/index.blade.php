<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company</h4>
                    <a href="{{route('admin.company.create')}}" class="btn btn-primary">Add</a>
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
                                {{-- <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <img src="" alt="">
                                    </td>
                                    <td>
                                        Company Name
                                    </td>
                                    <td>
                                        Company Email
                                    </td>
                                    <td>
                                        Company Phone
                                    </td>
                                    <td>
                                        Company Address
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr> --}}
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
