const open = document.getElementById('addBtn'),
    close = document.getElementById('close'),
    content = document.getElementById('content-box'),
    title = document.getElementById('title'),
    desc = document.getElementById('description'),
    create = document.getElementById('create');


create.onsubmit = (e) => {

    e.preventDefault();

    const t = title.value,
        d = desc.value;

    if (!t || !d) {
        alert("Les champs doivent bien rempli");
    } else {
        alert("Cool");
    }

}

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