const open = document.getElementById('addBtn'),
    close = document.getElementById('close'),
    content = document.getElementById('content-box')

content.style.display = 'none';

// Open modal
open.onclick = () => {
    // alert("Open")

    content.style.display = 'block';

}

// close modal
close.onclick = () => {
    // alert("Close")

    content.style.display = 'none';

}


// Title validation

function Title() {
    alert('This ' + this.target.value)
}