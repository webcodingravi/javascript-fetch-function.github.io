function loadTable() {
fetch('load-table.php')
.then((response) => response.json())
.then((data) => {
    var tbody = document.getElementById("tbody");
    if(data['empty']) {
       
        tbody.innerHTML = '<tr><td colspan="6" align="center"><h3>No Record Found.</h3></td></tr>';
    }else {
        var tr = '';
        for(var i in data) {
            tr +=`<tr>
            <td>${data[i].id}</td>
            <td>${data[i].stu_name}</td>
            <td>${data[i].last_name}</td>
            <td>${data[i].Age}</td>
            <td>${data[i].City}</td>
            <td><button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRecord(${data[i].id})">Update</button></td>
            <td><button type="submit" class="btn btn-danger btn-sm" onclick="deleteRecord(${data[i].id})">Delete</button></td>
           </tr>`;
        }

        tbody.innerHTML = tr;
    }
})
.catch((error) => {
    show_message('error','Can not Fetch Data');
});
}
loadTable();


/******select fetch  */
function addNewModal() {
  fetch('fetch-class-field.php')
.then((response) => response.json())
.then((data) => {
  var select = document.getElementById('classlist');
  var option = '<option value="0" disabled selected>Select City..</option>';
   for(var i=0; i < data.length; i++) {
    option +=`<option value="${data[i].City}" >${data[i].City}</option>`;
   }

   select.innerHTML = option;

})
.catch((error) => {
    show_message('error','Can not City Fetch Data');
});
}

/****** insert data ****/

function submit_data() {
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var age = document.getElementById('age').value;
  var city = document.getElementById('classlist').value;

  if(fname === "" || lname === "" || age === "" || city === "0") {
       alert('Please Fill All The Fields');
       return false;
  }else {
      var fromdata = {
        'fname' : fname,
        'lname' : lname,
        'age' : age,
        'city' : city
       
  }
  jsondata = JSON.stringify(fromdata);

  fetch('fetch-insert.php', {
    method : "POST",
    body  :  jsondata,
    headers: {
      'Content-Type' : "application/json",
    }
  })
  .then((response) => response.json())
  .then((result) => {
     if(result.insert == 'success') {
      show_message('success','Data Inserted Successfully.')
          loadTable();
          hide_model();

          document.getElementById('addModal-form').reset();
     }else {
      show_message('error','Data can not Inserted.')
      hide_model();
     }
  
  })
  .catch((error) => {
      show_message('error','Data can not Inserted.');
  });

}
}


/****Search box */

function load_function() {
  var search = document.getElementById('search').value;
  if(search === '') {
    loadTable();
     return false;
  }else {
    fetch('fetch-search.php?search=' + search)
    .then((response) => response.json())
    .then((data) => {
        var tbody = document.getElementById("tbody");
        if(data['empty']) {
           
            tbody.innerHTML = '<tr><td colspan="6" align="center"><h3>No Record Found.</h3></td></tr>';
        }else {
            var tr = '';
            for(var i in data) {
                tr +=`<tr>
                <td>${data[i].id}</td>
                <td>${data[i].stu_name}</td>
                <td>${data[i].last_name}</td>
                <td>${data[i].Age}</td>
                <td>${data[i].City}</td>
                <td><button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editRecord(${data[i].id})">Update</button></td>
                <td><button type="submit" class="btn btn-danger btn-sm" onclick="deleteRecord(${data[i].id})">Delete</button></td>
               </tr>`;
            }
    
            tbody.innerHTML = tr;
        }
    })
    .catch((error) => {
        show_message('error','Can not Fetch Data');
    });
    }
  

}



/*****edit data** */
function editRecord(id) {


fetch('fetch-edit.php?editId=' + id)
.then((response) => response.json())
.then((data) => {
  var option = '';
   for(var i in data['response']) {
    document.getElementById('edit_id').value = data['response'][i].id;
    document.getElementById('edit_name').value = data['response'][i].stu_name;
    document.getElementById('edit_lname').value = data['response'][i].last_name;
    document.getElementById('edit_age').value = data['response'][i].Age;
    document.getElementById('edit_city').value = data['response'][i].City;

    var selected = '';
    for(var j in data['city_name']) {
          if(data['city_name'][j].City == data['response'][i].City){
            selected = 'selected';
          }else{
              selected = '';
          }
          option += `<option ${selected} value="${data['city_name'][j].City}" >${data['city_name'][j].City}</option>`;
    }
    document.getElementById('edit_city').innerHTML = option;

   }
})
.catch((error) => {
    show_message('error','Can not Fetch Data');
});

}


/**********Edit data*********** */
function modify_data() {
  var id = document.getElementById('edit_id').value;
  var fname = document.getElementById('edit_name').value;
  var lname = document.getElementById('edit_lname').value;
  var age = document.getElementById('edit_age').value;
  var city = document.getElementById('edit_city').value;

  if(fname === "" || lname === "" || age === "" || city === "0") {
       alert('Please Fill All The Fields');
       return false;
  }else {
      var fromdata = {
         'id' : id,
        'fname' : fname,
        'lname' : lname,
        'age' : age,
        'city' : city
       
  }
  jsondata = JSON.stringify(fromdata);

  fetch('fetch-update.php', {
    method : "PUT",
    body  :  jsondata,
    headers: {
      'Content-Type' : "application/json",
    }
  })
  .then((response) => response.json())
  .then((result) => {
     if(result.update == 'success') {
      show_message('success', 'Data update Successfully.')
          loadTable();
          hide_model();

     }else {
      show_message('error','Data can not Update.')
      hide_model();
     
     }
  
  })
  .catch((error) => {
      show_message('error','Data can not Update : Server Problem');
  });

}
}

/*********Delete Data */

function deleteRecord(id) {
  if(confirm("Are You sure want to Delete this record ?")) {
    fetch('fetch-delete.php?delId=' + id, {
      method : "DELETE"
   
    })
    .then((response) => response.json())
    .then((result) => {
       if(result.delete == 'success') {
        show_message('success', 'Data Delete Successfully.')
            loadTable();
  
       }else {
        show_message('error','Data can not Delete.')
  
       }
    
    })
    .catch((error) => {
        show_message('error','Data can not Delete : Server Problem');
    });
  

  }
  
}

 

function show_message(type, text) {
  if(type == 'error') {
   var message_box = document.getElementById('error-message');
  }else{
    var message_box = document.getElementById('success-message');
  }
  message_box.innerHTML = text;
  message_box.style.display = "block";
  setTimeout(function(){
    message_box.style.display = "none";
  },3000);
}

