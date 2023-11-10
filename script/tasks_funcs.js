function delete_task(task_id){
    if(confirm("Are you sure you want to delete the task?")){
        task_id = parseInt(task_id);
        document.getElementById("taskID").value = task_id;
        document.querySelector("#deleteTask").submit();
    }
}

function delete_all(){
    if(confirm("Are you sure you want to delete all the tasks?")){
        location.href = "backend/deleteall.php";
    }
}