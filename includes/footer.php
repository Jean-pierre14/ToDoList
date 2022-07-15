<div class="content-box" id="content-box">
        <div class="modal" id="data-modal">
            <div class="modal-header">
                <h2>Add new task</h2>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="myForm">
                    <div class="group">
                        <label for="title">Title</label>
                        <input type="text" onkeyup="Title()" id="title" name="title" placeholder="Titre" class="input">
                        <p id="error"></p>
                    </div>
                    <div class="group">
                        <label for="description">Description</label>
                        <textarea class="input" id="description" aria-placeholder="Description" placeholder="Description"></textarea>
                    </div>
                    <div class="group">
                        <button class="btn btn-green" id="create" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <h2>Copyright ~</h2>
                <button id="close" class="btn btn-red">Close</button>
            </div>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/jquery-3.4.0.min.js"></script>
    <script>
        $(document).ready(function(){
            alert("Hool");

            $('#myForm').onclick = (e) => {
                
                e.preventDefault();

                let title = document.getElementById('title'),
                    desc = document.getElementById('desc');

                if(!title || !desc){
                    alert('Les champs sont vide');
                }else{
                    $.ajax({
                        url: './Config/actions.php',
                        method: 'POST',
                        data: {action: 'create', title, desc},
                        success: function(data){
                            $("#results").innerHTML = data;
                        }
                    })
                }
            }
        });

        var myForm = document.getElementById('myForm');
        myForm.onsubmit = (e) => {
            e.preventDefault();
            console.log("Good");
        }



        function SelectAll(){

            let action = 'read';
            $.ajax({
                url: './Config/actions.php',
                method: 'POST',
                data: {
                    action, 
                    title, 
                    desc
                },
                success: function(data){
                    
                    if(data === 'error'){
                        
                        results.innerHTML = `<p class="alert alert-danger">${data}</p>`;

                    }else{
                        results.innerHTML = data;
                    }
                
                }
            });

        }
        SelectAll();
    </script>
</body>

</html>