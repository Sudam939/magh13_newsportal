<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Category Create</h4>
                    <a href="{{ route('admin.article.index') }}" class="btn btn-primary">go back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.article.update', $article->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6 mb-2 form-group">
                                <label for="categories">Select Categories</label>
                                <select name="categories[]" id="categories" class="form-control select2" multiple="">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $article->categories->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->eng_title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="title">Enter Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $article->title }}">
                            </div>


                            <div class="col-12 mb-2">
                                <label for="description">Write News <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control summernote">
                                    {{ old('description') }}
                                </textarea>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="meta_keywords">Enter Meta Keywords (seperated by commas)</label>
                                <textarea name="meta_keywords" id="meta_keywords" class="form-control">
                                    {{ old('meta_keywords') }}
                                </textarea>
                            </div>

                            <div class="col-12 mb-2">
                                <label for="meta_description">Enter Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control">
                                    {{ old('meta_description') }}
                                </textarea>
                            </div>

                            <div class="col-6 mb-2">
                                <label for="image">Upload Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-success">Update Record</button>
                            </div>
                        </div>
                    </form>
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
