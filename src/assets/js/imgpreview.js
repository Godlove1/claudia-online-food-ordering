

//this for the preview of current and new image
function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document
          .querySelector("#imgDisplay")
          .setAttribute("src", e.target.result);
      };
      reader.readAsDataURL(e.files[0]);
    }
  } 