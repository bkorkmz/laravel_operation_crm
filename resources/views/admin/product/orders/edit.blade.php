<form action="{{ route('promotion-categories.store') }}" method="post" enctype="multipart/form-data"
      id="submit-form">
    @csrf
    <div class="form-group row my-4">
        <label for="category_id" class="col-sm-2 col-form-label">Promosyon<span
                class="text-danger"> *</span></label>
        <div class="col-sm-8">
            <select name="promotion_id" class="form-control fill js-example-basic-hide-search"
                    id="promotion_id" required>
                <option value="">Alan seçiniz</option>
                @foreach ($promotion as $alan)
                    <option value="{{ $alan->id }}">{{ $alan->title }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group row my-4">
        <label for="category_id" class="col-sm-2 col-form-label">Kategori <span
                class="text-danger"> *</span></label>
        <div class="col-sm-8">
            <select name="category_id"
                    class="form-control fill js-example-basic-hide-search"
                    id="category_id" required>
                <option value="">Kategori seçiniz</option>
                @foreach ($all_categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <button class="btn btn-primary rounded">Kaydet</button>
</form>

