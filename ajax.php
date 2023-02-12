<script>
  // * To show existing data from the database
  $(document).ready(function(){
    $.ajax({
      url: 'show.php',
      type: 'POST',
      cache: false,
      success: function(data){
        $('#table').html(data)
      }
    })

    // * Add New Book Start
    $('#add_save').on('click', function(){
      var add_title = $('#add_title').val()
      var add_author = $('#add_author').val()
      var add_date = $('#add_date').val()
      var add_publisher = $('#add_publisher').val()
      var add_genre = $('#add_genre').val()

      if(add_title != '' && add_author != '' && add_date != '' && add_publisher != '' && add_genre != ''  ){
        $.ajax({
          url: 'add.php',
          type: 'POST',
          cache: false,
          data: {
            add_title: add_title,
            add_author: add_author,
            add_date: add_date,
            add_publisher: add_publisher,
            add_genre: add_genre
          },
          success: function(dataResult){
            var data = JSON.parse(dataResult)
            if(data.statusCode == 200){
              alert('Book added successfully!');
              location.reload();
            }else if(data.statusCode == 201){
              alert('Error!');
            }
          }
        })
      }else{
        alert('Fields are empty!')
      }
    })
    // * Add New Book End

    // * View Book Details Start
    $(function(){
      $('#view_modal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var view_id = button.data('id');
        var view_title = button.data('title');
        var view_author = button.data('author');
        var view_date = button.data('date');
        var view_publisher = button.data('publisher');
        var view_genre = button.data('genre');

        var modal = $(this);
        modal.find('#view_title').val(view_title);
        modal.find('#view_author').val(view_author);
        modal.find('#view_date').val(view_date);
        modal.find('#view_publisher').val(view_publisher);
        modal.find('#view_genre').val(view_genre);
      })
    })
    // * View Book Details End

    // * Edit Book Details Start
    $(function(){
      $('#edit_modal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var edit_id = button.data('id');
        var edit_title = button.data('title');
        var edit_author = button.data('author');
        var edit_date = button.data('date');
        var edit_publisher = button.data('publisher');
        var edit_genre = button.data('genre');

        var modal = $(this);
        modal.find('#edit_id').val(edit_id);
        modal.find('#edit_title').val(edit_title);
        modal.find('#edit_author').val(edit_author);
        modal.find('#edit_date').val(edit_date);
        modal.find('#edit_publisher').val(edit_publisher);
        modal.find('#edit_genre').val(edit_genre);
      })
    })
    // * Edit Book Details End

    // * Edit Save Start
    $(document).on('click', '#edit_save', function(){
      $.ajax({
        url: 'edit.php',
        type: 'POST',
        cache: false,
        data: {
          edit_id : $('#edit_id').val(),
          edit_title : $('#edit_title').val(),
          edit_author : $('#edit_author').val(),
          edit_date : $('#edit_date').val(),
          edit_publisher : $('#edit_publisher').val(),
          edit_genre : $('#edit_genre').val()
        },
        success: function(dataResult){
          var data = JSON.parse(dataResult)
          if(data.statusCode == 200){
            alert('Updated successfully!');
            location.reload();
          }else if(data.statusCode == 201){
            alert('Error!');
          }
        }
      })
    })
    // * Edit Save End

    // * Delete Start
    $(document).on('click', '#delete', function(){
      var $rowtodelete = $(this).parent().parent();
      $.ajax({
        url: 'delete.php',
        type: 'POST',
        cache: false,
        data:{
          delete_item: $(this).attr('data-id')
        },
        success:function(dataResult){
          var data = JSON.parse(dataResult)
          if(data.statusCode == 200){
            $rowtodelete.fadeOut();
            // location.reload();
          }else if(data.statusCode == 201){
            alert('Error!');
          }
        }
      })

    })
    // * Delete End
  })        
</script>