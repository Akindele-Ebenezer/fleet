let DatalistInputs = document.querySelectorAll('.datalist-input');
let DatalistValues = document.querySelectorAll('.data-values');
let Datalists = document.querySelectorAll('.datalist');
let InputsWrapper = document.querySelectorAll('.new-car-inputs');
let CardNumberInput_ = document.querySelector('input[name=CardNumber]');
 
DatalistInputs.forEach(Input => {
    Input.addEventListener('click', () => { 
        Input.nextElementSibling.classList.toggle('Hide'); 
    }); 

    Input.addEventListener("input", FilterList);

    function FilterList(e) {
        var filter = e.target.value.toUpperCase();
      
        var list = Input.nextElementSibling;
        var divs = list.getElementsByTagName("div");

        for (var i = 0; i < divs.length; i++) {
          var VehicleNumber = divs[i].getElementsByTagName("span")[0];
          var CardNumber = divs[i].querySelectorAll("span:last-of-type")[0];
      
          if (VehicleNumber || CardNumber) {
            if ((VehicleNumber.innerHTML.toUpperCase().indexOf(filter) > -1) 
                || (CardNumber.innerHTML.toUpperCase().indexOf(filter) > -1)) {
              divs[i].style.display = "";
            } else {
              divs[i].style.display = "none";
            }
          }
        }
      
      }
    DatalistValues.forEach(DatalistValue => {
        DatalistValue.addEventListener('click', () => {
            Input.nextElementSibling.classList.remove('Show');  
            DatalistValue.parentElement.previousElementSibling.value = DatalistValue.firstElementChild.textContent; 
            CardNumberInput_.value = DatalistValue.firstElementChild.nextElementSibling.textContent;
        }); 
    });
});

DatalistInputs.forEach(Input => {
    Input.addEventListener('click', (e) => {
        e.stopPropagation();   
    }); 
});

document.addEventListener("click", () => {  
    Datalists.forEach(Datalist => { 
        Datalist.classList.add('Hide');  
    });
});
 