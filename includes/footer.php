<div class="content-box" id="content-box">
        <div class="modal" id="data-modal">
            <div class="modal-header">
                <h2>Add new task</h2>
            </div>
            <div class="modal-body">
                
                <div id="error"></div>
                
                <form action="#" method="post" id="myForm">
                    
                    <div class="group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Titre" class="input">
                        <p id="error"></p>
                    </div>
                    <div class="group">
                        <label for="description">Description</label>
                        <textarea class="input" id="desc" aria-placeholder="Description" placeholder="Description"></textarea>
                    </div>

                    <div class="group">
                        <button class="btn btn-green" id="CreateBtn" type="button">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <h4>Copyright ~</h4>
                <button id="close" class="btn btn-red">Close</button>
            </div>
        </div>
    </div>

    
    <script src="./assets/js/jquery-3.4.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>

// const cl = ["one", "two"];
// cl.length = 0;
// console.log(cl[0]);
        
        let results = document.getElementById('results');

        $(document).ready(function(){
            
            function SelectAll(){
                $.ajax({
                    url: './Config/actions.php',
                    method: 'POST',
                    data: {action: 'read'},
                    success: function(data){
                        document.getElementById('results').innerHTML = data;                   
                    }
                });

            }
            
            SelectAll();

            $(document).on("click", ".done", function(){
                let Id = $(this).attr('id'),
                    action = 'done';

                $.ajax({
                    url: './Config/actions.php',
                    method: 'post',
                    data: {action, Id},
                    success: function(data){
                        SelectAll();
                    }
                })
            });
            $(document).on("click", ".delete", function(){
                let Id = $(this).attr('id'),
                    action = 'delete';

                $.ajax({
                    url: './Config/actions.php',
                    method: 'post',
                    data: {action, Id},
                    success: function(data){
                        SelectAll();
                    }
                })
            });

            

            $(document).on('click', '#CreateBtn', function(){

                let title = $('#title').val(),
                    desc = $('#desc').val();

                if(!title || !desc){

                    $('#error').text('Les champs sont vides').addClass('alert alert-danger');
                
                }else{
                    
                    $('#error').text('').removeClass('alert alert-danger');

                    // console.log(title +' '+ desc);

                    $.ajax({
                        url: './Config/actions.php',
                        method: 'POST',
                        data: {action: 'create', title, desc},
                        success: function(data){

                            $("#results").innerHTML = data;
                            $('#title').val('');
                            $('#desc').val('');
                            SelectAll();
                        
                        }
                    });

                }
            });
            
        });


        
        
    </script>
</body>

</html>