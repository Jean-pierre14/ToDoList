const open = document.getElementById('addBtn'),
    close = document.getElementById('close'),
    content = document.getElementById('content-box');

content.style.display = 'none';

// Open modal
open.onclick = () => content.style.display = 'block';

// close modal
close.onclick = () => content.style.display = 'none';

// Title validation
function Title() {
    alert('This ' + this.target.value);
}


/**
 * Init function
 * 
 * */
function Init(){
    
}
Init();


