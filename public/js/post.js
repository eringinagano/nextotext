window.onload = function () {
      
    let today = new Date();  
    today.setDate(today.getDate());
    let yyyy = today.getFullYear();
    let mm = ("0" + (today.getMonth() + 1)).slice(-2);
    let dd = ("0" + today.getDate()).slice(-2);
    
    document.getElementById("today").value = yyyy + '-' + mm + '-' + dd;
    
  }

function inputChange() {
    let fileName = document.getElementById('fileName');
    let inputFile = document.getElementById('inputFile');
    // console.log(inputFile.value);
    fileName.innerHTML = inputFile.value;
}