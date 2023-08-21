document.getElementById('tps-increase-btn').addEventListener('click', function(e) {
    console.log("button has clicked");
    var containerDiv = document.getElementById('container-div');
    
    var selectedOptionsTotalDiv = document.createElement('div');
    selectedOptionsTotalDiv.id = 'selected-options-total';
    
    var rowDiv = document.createElement('div');
    rowDiv.classList.add('row', 'mb-2');
    
    var col9Div = document.createElement('div');
    col9Div.classList.add('col-9', 'pe-1');
    
    var inputGroupDiv = document.createElement('div');
    inputGroupDiv.classList.add('input-group', 'position-relative');
    
    var selectElement = document.createElement('select');
    selectElement.classList.add('fs-5', 'custom-select', 'form-control', 'rounded-3', 'input-bg', 'selectpicker');
    selectElement.id = 'inputGroupSelect01';
    
    var optionElement = document.createElement('option');
    optionElement.selected = true;
    optionElement.dataset.content = "<span class='select-options-customization'><span class='text-dark'>AED 10 &nbsp;</span><span class='bottole-container'><img class='short-bottle' src='../images/short-bottle.png'></span><span></span></span>";
    
    selectElement.appendChild(optionElement);
    
    var positionAbsoluteDiv = document.createElement('div');
    positionAbsoluteDiv.classList.add('position-absolute', 'top-50', 'end-0', 'translate-middle-y', 'pe-2', 'z-3');
    
    var chevronIcon = document.createElement('i');
    chevronIcon.classList.add('fa-solid', 'fs-5', 'fa-chevron-down');
    
    positionAbsoluteDiv.appendChild(chevronIcon);
    
    inputGroupDiv.appendChild(selectElement);
    inputGroupDiv.appendChild(positionAbsoluteDiv);
    
    col9Div.appendChild(inputGroupDiv);
    
    var col3Div = document.createElement('div');
    col3Div.classList.add('col-3', 'ps-0');
    
    var inputElement = document.createElement('input');
    inputElement.type = 'text';
    inputElement.classList.add('form-control', 'mx-2', 'rounded-2', 'text-center', 'w-100', 'h-100', 'input-bg');
    inputElement.placeholder = '';
    inputElement.setAttribute('aria-label', "Recipient's username");
    inputElement.setAttribute('aria-describedby', 'button-addon2');
    
    col3Div.appendChild(inputElement);
    
    rowDiv.appendChild(col9Div);
    rowDiv.appendChild(col3Div);
    
    selectedOptionsTotalDiv.appendChild(rowDiv);
    
    containerDiv.appendChild(selectedOptionsTotalDiv);
  });
  