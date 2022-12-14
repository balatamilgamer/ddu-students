<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style>
        .error{
            color:red;
        }
        .sus{
            color: green;
        }
    </style>

    <div id="result"></div>

    <form action="" method="post" id="form">
        <input type="hidden" name="id" id="id">
        <input type="text" name="name" id="name">
        <input type="text" name="email" id="email">
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" id="submit" value="insert">
        <input type="submit" name="update" id="update" value="update" style="display:none;">
    </form>

    <table id="resultTable">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Password</td>
            <td>Action</td>
        </tr>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            //load table data function
            const loadData = () => {
                $.ajax({
                    url: 'load.php',
                    type: 'get',
                    success: function(result){
                        $('#resultTable').html(result);
                    }
                });
            }


            // delete function
            const deleteData = (id) => {

                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {id:id},
                    success: function(result){
                        result = JSON.parse(result);
                        console.log(result);
                        if(result.status){
                            $('#tr'+id).remove();
                        }
                    }
                });

            }

            $("body").on("click",".delete",function(e){
                var id = $(this).data('id');
                console.log(id);
                deleteData(id);
            });
               
            //load data calling
            loadData();

            //insert action
            $('#submit').click(function(e){
                e.preventDefault();

                var formdata = $("#form").serializeArray();

                console.log(formdata);

                $.ajax({
                    url: 'insert.php',
                    type: 'post',
                    data: formdata,
                    success: function(result){
                        console.log(result);
                        result = JSON.parse(result);
                        console.log(result);

                        if(result.status){
                            $('#result').html(result.msg).addClass('sus');
                            $("#form").trigger("reset");
                            $('#resultTable').append("<tr id='tr"+result.id+"'><td>"+result.id+"</td><td>"+result.data.name+"</td><td>"+result.data.email+"</td><td>"+result.password+"</td><td><button data-id='"+result.id+"' class='edit'>Edit</button> | <button data-id='"+result.id+"' class='delete'>Delete</button></td></tr>");
                        } else{
                            $('#result').html(result.msg).addClass('error');
                        }

                    }
                });

            });


            //edit data
            $("body").on("click",".edit",function(e){
                var id = $(this).data('id');
                console.log(id);

                $.ajax({
                    url: 'editLoad.php',
                    type: 'post',
                    data: {id:id},
                    success: function(result){
                        result = JSON.parse(result);

                        console.log(result);

                        if(result.status){
                            $('#name').val(result.data.name);
                            $('#id').val(result.data.id);
                            $('#email').val(result.data.email);
                            $('#password').val(result.data.password);
                            $('#submit').hide();
                            $('#update').show();
                        }
                    }
                });

            });

            //update data
            $("#update").click(function(e){

                e.preventDefault();

                var formdata = $("#form").serializeArray();

                $.ajax({
                    url: 'update.php',
                    type: 'post',
                    data: formdata,
                    success: function(result){
                        result = JSON.parse(result);
                        if(result.status){
                            $('#result').html(result.msg).addClass('sus');
                            $("#form").trigger("reset");
                            $('#submit').show();
                            $('#update').hide();
                            loadData();
                        } else{
                            $('#result').html(result.msg).addClass('error');
                        }
                        
                    }
                });

            });

        });
    </script>
    
</body>
</html>