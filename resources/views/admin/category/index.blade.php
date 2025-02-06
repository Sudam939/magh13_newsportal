<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Categories</h4>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        SN
                                    </th>
                                    <th>Nepali Title</th>
                                    <th>English Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>
                                            {{ $category->nep_title }}
                                        </td>
                                        <td>
                                            {{ $category->eng_title }}
                                        </td>
                                        <td>
                                            @if ($category->status == true)
                                                <span class="badge bg-success text-white">active</span>
                                            @else
                                                <span class="badge bg-danger text-white">in active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
