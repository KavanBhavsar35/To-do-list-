function delete_task(task_id){
    task_id = parseInt(task_id);
    // console.log(task_id);
    document.getElementById("taskID").value = task_id;
    document.querySelector("#deleteTask").submit();
}