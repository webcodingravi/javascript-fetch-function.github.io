<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAVASCRIPT & PHP CRUID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-div mx-auto">
        <div class="container">
            <div class="row mt-5">
            <h1 class="text-center my-3">JAVASCRTIP & PHP</h1>

                <div class="col-8">
                    <div class="add_data">
                    <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick ="addNewModal()">Add Data</a>
            
                </div>
              
                </div>

                <div class="col-4">
                <input type="text" class="form-control w-100" id="search" onkeyup="load_function()" placeholder="Search..."> 
                 </div>
 

               
                <!-- Modal box add data -->
                
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick='hide_model()'></button>
                    </div>
                    <div class="modal-body">
                     <form method="POST" id="addModal-form">
                        <lable>First Name</lable><br>
                        <input type="text" name = "fname" id="fname" class="form-control"><br>
                        <lable>Last Name</lable><br>
                        <input type="text" name="lname" id="lname" class="form-control"><br>
                        <lable>Age</lable><br>
                        <input type="Number" name="age" id="age" class="form-control"><br>

                        <lable>City</lable><br>
                        <select class="form-select" name="city" id="classlist"> </select><br>
                      
                        <input type="submit" name="sumbit" onclick='submit_data()' id='new-submit' class="btn btn-primary">
                     </form>
                    </div>
                    
                    </div>
                </div>
                </div>
            


        <!-- Modal box edit data-->
      
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick='hide_model()'></button>
                    </div>
                    <div class="modal-body">
                     <form method="POST">
                        <lable>First Name</lable><br>
                        <input type="text" name = "fname" id="edit_name" class="form-control"><br>
                        <input type="text" name = "id" id="edit_id" hidden>
                        <lable>Last Name</lable><br>
                        <input type="text" name="lname" id="edit_lname" class="form-control"><br>
                        <lable>Age</lable><br>
                        <input type="Number" name="age" id="edit_age" class="form-control"><br>

                        <lable>City</lable><br>
                        <select class="form-select" name="city" id="edit_city"> </select><br>
                      
                        <input type="submit" name="sumbit" onclick='modify_data()' id='edit-submit' class="btn btn-primary">
                     </form>
                    </div>
                    
                    </div>
                </div>
                </div>


                
            <div class="col-12">
              <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Modfy</th>
                    <th>Delete</th>
                </thead>
                <tbody id="tbody">
            
                </tbody>
              </table>
            </div>
            </div>

                </div>

                <div id="error-message"></div>
                <div id="success-message"></div>
          
            </div>

              

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="fetch.js"></script>
</body>
</html>