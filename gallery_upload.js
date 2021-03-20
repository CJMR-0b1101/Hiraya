(function() {
    var dropzone = document.getElementById('dropzone');
    var uploads = document.getElementById('uploads');
    var displayUploads = function(data) {
      var anchor, i;
        for(i = 0; i < data.length; i++) {
          anchor = document.createElement('a');
          anchor.innerText = data[i].name + "\n";

          uploads.appendChild(anchor);
        }
    }
    var upload = function(files) {
      // IF USER ALREADY HAS 4 FILES
      if(uploads.childElementCount > 4) {
        alert("Only 4 files can be uploaded per blog.");
        return;
      }
      // IF USER DRAGS MORE THAN 4 FILES AT ONCE
      if(files.length > 4) {
        alert("You can only upload 4 times at a time.");
      }
      else {
        var formData = new FormData(),
            xhr = new XMLHttpRequest(),
            x;
            
            for(i = 0; i < files.length; i++) {
              formData.append('file[]', files[i]);
            }

            xhr.onload = function() {
              var data = JSON.parse(this.responseText);
              displayUploads(data);
            }

            xhr.open('post', 'upload.php');
            xhr.send(formData);
      }
    }

    dropzone.ondrop = function(e) {
      e.preventDefault();
      this.className = 'dropzone';
      upload(e.dataTransfer.files);
    }
    dropzone.ondragover = function() {
      this.className = 'dropzone dragover';
      return false;
    }
    dropzone.ondragleave = function() {
      this.className = 'dropzone';
      return false;
    }
  }());