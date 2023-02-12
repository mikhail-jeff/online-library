<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <title>Online Library</title>
</head>
<body>
  <div class="container mt-4">
    <div class='row'>
      <h2 class='col-9'>Online Library</h2>
      <!-- Trigger Button For Add Book Modal-->
      <button type='button' class='btn btn-success col-3' data-bs-toggle='modal' data-bs-target='#add_modal'>Add New Books</button>
    </div>
    <div class='mt-4'>
      <table class='table table-bordered'>
        <thead class='bg-warning'>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Publisher</th>
            <th>Genre</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id='table'>
          <!-- Data from  database -->
        </tbody>
      </table>
    </div>
    <!--Add New Book Modal Start -->
    <div class='modal fade' id='add_modal' role='dialog'>
      <div class='modal-dialog modal-md'>
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
              <h5>Add New Book</h5>
            </div>
          </div>
          <div class="modal-body">
            <!-- Form -->
            <form>
              <div>
                <label for="">Title:</label>
                <input type="text" name="add_title" id="add_title" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Author:</label>
                <input type="text" name="add_author" id="add_author" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Date:</label>
                <input type="date" name="add_date" id="add_date" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Publisher:</label>
                <input type="text" name="add_publisher" id="add_publisher" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Genre:</label>
                <select  type="text" name="add_genre" id="add_genre" class='form-control mb-2' required>
                  <option value="Romance">Romance</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Drama">Drama</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-success' name='add_save' id='add_save'>Save</button>
            <button class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--Add New Book Modal End -->

    <!-- View Modal Start -->
    <div class='modal fade' id='view_modal' role='dialog'>
      <div class='modal-dialog modal-md'>
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
              <h5>View Book Details</h5>
            </div>
          </div>
          <div class="modal-body">
            <!-- Form -->
            <form>
              <div>
                <label for="">Title:</label>
                <input type="text" name="view_title" id="view_title" class='form-control mb-2' disabled>
              </div>
              <div>
                <label for="">Author:</label>
                <input type="text" name="view_author" id="view_author" class='form-control mb-2' disabled>
              </div>
              <div>
                <label for="">Date:</label>
                <input type="date" name="view_date" id="view_date" class='form-control mb-2' disabled>
              </div>
              <div>
                <label for="">Publisher:</label>
                <input type="text" name="view_publisher" id="view_publisher" class='form-control mb-2' disabled>
              </div>
              <div>
                <label for="">Genre:</label>
                <select  type="text" name="view_genre" id="view_genre" class='form-control mb-2' disabled>
                  <option value="Romance">Romance</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Drama">Drama</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>
    <!--View Modal End -->

    <!-- Edit Modal Start -->
    <div class='modal fade' id='edit_modal' role='dialog'>
      <div class='modal-dialog modal-md'>
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
              <h5>Edit Book Details</h5>
            </div>
          </div>
          <div class="modal-body">
            <!-- Form -->
            <form>
              <div>
                <input type="hidden" name="edit_id" id="edit_id" class='form-control mb-2' >
              </div>
              <div>
                <label for="">Title:</label>
                <input type="text" name="edit_title" id="edit_title" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Author:</label>
                <input type="text" name="edit_author" id="edit_author" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Date:</label>
                <input type="date" name="edit_date" id="edit_date" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Publisher:</label>
                <input type="text" name="edit_publisher" id="edit_publisher" class='form-control mb-2' required>
              </div>
              <div>
                <label for="">Genre:</label>
                <select  type="text" name="edit_genre" id="edit_genre" class='form-control mb-2' required>
                  <option value="Romance">Romance</option>
                  <option value="Comedy">Comedy</option>
                  <option value="Drama">Drama</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-success' name='edit_save' id='edit_save'>Save</button>
            <button class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit Modal End -->
  </div>
</body>
</html>

<?php

  include "ajax.php";

?>