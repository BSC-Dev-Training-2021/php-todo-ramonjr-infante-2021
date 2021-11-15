$(document).ready(function() {
    $(document).on("click","#delete_btn",function(){
        console.log($(this).attr("todo_id"))
        $("#delete_todo_txt").val($(this).attr("todo_id"))  
    })
});