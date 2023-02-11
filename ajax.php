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
      var add_pub = $('#add_pub').val()
      var add_genre = $('#add_genre').val()

      if(add_title != '' && add_author != '' && add_date != '' && add_pub != '' && add_genre != ''  ){
        $.ajax({
          url: 'add.php',
          type: 'POST',
          cache: false,
          data: {
            add_title: add_title,
            add_author: add_author,
            add_date: add_date,
            add_pub: add_pub,
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

  })        
</script>