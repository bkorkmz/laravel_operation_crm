
<style>
    .select2 {
         width: 100%!important;
    }
</style>


    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategori Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="card-block">
                            <form class="" id="category-form">
                                @csrf
                                <div class="form-group ">
                                    <label class="col-form-label">Kategori Adı</label>
                                    <div class="">
                                        <input type="text" id="category-name" name="name" required maxlength="50"
                                               class="form-control form-control-normal" placeholder="Kategori Adı Girin">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 m-b-30 form-group">
                                        <label for="parent_id" class="col-form-label">Üst Kategori</label>
                                        <select  class="form-control form-control-inverse fill" name="parent_id" id="parent_id">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="form-group form-primary">
                                        <label for="exampleTextarea" class="float-label">Kategori Açıklaması</label>
                                        <textarea class="form-control fill" id="exampleTextarea"
                                                  placeholder="Kategori Açıklaması Girin"
                                                  name="description" maxlength="250"></textarea>
                                        <span class="form-bar"></span>

                                    </div>
                                </div>
                                <input type="hidden" name="show" value="1">
                                <button class="btn btn-success float-right" type="submit">Kaydet</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




  @section('after-js')


      <script>
          // $('#parent_id').select2({
          //     theme: 'bootstrap',
          // });

    $(document).ready(function () {
        $('#parent_id').select2( {
            theme: 'bootstrap',
        })
        let model = "{{$model_name}}"

        $("#category-form").submit(function (e) {
            e.preventDefault();

            // Form verilerini al
            var formData = $(this).serialize();
            formData += `&model=${model}`;

            // AJAX isteği gönder
            $.ajax({
                type: "POST",
                url: "{{route('category.store')}}", // İstek yapılacak URL'yi güncelleyin
                data: formData,
                success: function (response) {
                    if( response.status === "success") {
                        let selectedOption = new Option(response.category.name, response.category.id, true, true);
                        // let newOption = new Option(response.category.name, response.category.id);
                        $("select[name='category_id']").append(selectedOption).trigger('change');
                        // $('#parent_id').append(newOption);

                        $('#addCategoryModal').modal('hide');
                        toastr.success(response.message);

                    }
                },
                error: function (error) {
                    console.error('Ajax hatası ',error);
                }
            });
        });


      $('#addCategoryModal').on('shown.bs.modal', function () {
          // Perform AJAX call to load data into the select dropdown
          $.ajax({
              url: '{{ route('category.parent_data') }}',
              data: {
                  model: model,
              },
              dataType: "json",
              success: function (data) {
                  $('#parent_id').empty();
                  $('#parent_id').append('<option value="">Üst Kırılım Seçiniz</option>');

                  appendCategories(data);
                  $('#parent_id').trigger('change');
              }
          });
      });
  });

  function appendCategories(categories) {

      $.each(categories, function (index, item) {
          $('#parent_id').append('<option value="' + item.id + '">'+item.name + '</option>');
          if (item.parent && item.parent.length > 0) {
              appendCategories(item.parent);
          }
      });
  }


  $('#addCategoryModal').on('hidden.bs.modal', function (e) {
      var form =$("#category-form");
      form.trigger("reset");
  });
</script>

  @endsection
