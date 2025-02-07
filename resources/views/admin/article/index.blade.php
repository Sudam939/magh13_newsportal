<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Article</h4>
                    <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        SN
                                    </th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $index => $article)
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>
                                            {{ $article->title }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($article->image) }}" width="120" alt="">
                                        </td>
                                        <td>
                                            {{ $article->views }}
                                        </td>
                                        <td>
                                            @if ($article->status == 'pending')
                                                <span class="badge bg-warning text-white">Pending</span>
                                            @elseif($article->status == 'approved')
                                                <span class="badge bg-success text-white">Apprived</span>
                                            @else
                                                <span class="badge bg-danger text-white">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.article.destroy', $article->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('admin.article.edit', $article->id) }}"
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
