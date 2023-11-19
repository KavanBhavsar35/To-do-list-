$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});


// const tasksJSON = localStorage.getItem("tasks");
// let tasks = tasksJSON ? JSON.parse(tasksJSON) : [];

// function update() {
//   if (tasks.length == 0) {
//     tableBody.innerHTML = `No task found!`;
//     return;
//   }
//   tableBody.innerHTML = ``;
//   for (let i = 0; i < tasks.length; i++) {
//     tableBody.innerHTML += `
//         <tr>
//             <th>${i + 1}</th>
//             <td>${tasks[i]["taskTitle"]}</td>
//             <td>${tasks[i]["taskDesc"]}</td>
//             <td><button class="btn" onclick="deleteTask(${i});">Delete</button></td>
//         </tr>
//         `;
//   }
// }

// update();

// add.addEventListener("click", () => {
//   input.innerHTML = `<br><label for="title">Title</label>
//     <input type="text" name="title" id="title"><br> 
//     <label for="desc">Description</label>
//     <input type="text" name="desc" id="desc"><br>
//     <button class="btn" id="addNewTask">Submit</button>
//     <button class="btn" id="cancel">Cancel</button>`;
//   addNewTask.addEventListener("click", () => {
//     const title = document.getElementById("title").value;
//     const desc = document.getElementById("desc").value;
//     if (!title) {
//       alert("Cannot add empty title!");
//       input.innerHTML = "";
//       return;
//     }
//     if (!desc) {
//       if (confirm("Add new task without adding description")) {
//         let newTask = {
//           taskTitle: title,
//           taskDesc: "-"
//         };
//         tasks.push(newTask);
//         localStorage.setItem("tasks", JSON.stringify(tasks));
//         update();
//         input.innerHTML = "";
//         return;
//       }
//       input.innerHTML = ``;
//       return;
//     }
//     let newTask = {
//       taskTitle: title,
//       taskDesc: desc
//     };
//     tasks.push(newTask);
//     localStorage.setItem("tasks", JSON.stringify(tasks));
//     update();
//     input.innerHTML = "";
//   });
//   cancel.addEventListener("click", () => {
//     input.innerHTML = "";
//   });
// });

// deleteAll.addEventListener("click", () => {
//   if (tasks.length == 0) {
//     alert("No tasks exists!");
//     return;
//   }
//   if (confirm("Are you sure to delete all tasks?")) {
//     localStorage.clear();
//     tasks = [];
//   }
//   update();
// });

// function deleteTask(index) {
//   tasks.splice(index, 1);
//   localStorage.setItem("tasks", JSON.stringify(tasks));
//   update();
// }

// gpts 

// Your existing jQuery and DataTables script
$(document).ready(function () {
  let table = $(".data-table").DataTable();
  table.rows().every( function () {
    // For each row, set the background color of the row to red
    this.node().style.backgroundColor = 'red';
} );
});

// Your existing toggling script
// ...

// Your existing login/signup script
// ...

// Your friend's script
const tableBody = document.getElementById("tableBody");
const input = document.getElementById("input");
const add = document.getElementById("add");
const deleteAll = document.getElementById("deleteAll");
const tasksJSON = localStorage.getItem("tasks");
let tasks = tasksJSON ? JSON.parse(tasksJSON) : [];
tableBody.style.backgroundColor="red";
// function update() {
  if (tasks.length == 0) {
    tableBody.innerHTML = `<tr><td colspan="4">No tasks found!</td></tr>`;
    return;
  }
  // tableBody.innerHTML = "";
  for (let i = 0; i < tasks.length; i++) {
    tableBody.innerHTML += `
            <tr>
                <td>${i + 1}</td>
                <td>${tasks[i]["taskTitle"]}</td>
                <td>${tasks[i]["taskDesc"]}</td>
                <td>
                    <div class="d-flex flex-row">
                        <button style="margin:0px 10px;" class="btn btn-success mark-done">
                            <div class="d-flex flex-row">
                                <i class="bi bi-check-circle" style="padding-right: 5px;"></i>
                                Mark&nbsp;Done
                            </div>
                        </button>
                        <button style="margin:0px 10px;" class="btn btn-primary edit">
                            <div class="d-flex flex-row">
                                <i class="bi bi-pencil" style="padding-right: 5px;"></i> Edit
                            </div>
                        </button>
                        <button style="margin:0px 10px;" class="btn btn-warning delete" onclick="deleteTask(${i});">
                            <div class="d-flex flex-row">
                                <i class="bi bi-trash" style="padding-right: 5px;"></i> Delete
                            </div>
                        </button>
                    </div>
                </td>
            </tr>
            `;
  }
// }

// update();

add.addEventListener("click", () => {
  input.innerHTML = `<br><label for="title">Title</label>
            <input type="text" name="title" id="title"><br> 
            <label for="desc">Description</label>
            <input type="text" name="desc" id="desc"><br>
            <button class="btn btn-success" id="addNewTask">Submit</button>
            <button class="btn btn-warning" id="cancel">Cancel</button>`;
  const addNewTask = document.getElementById("addNewTask");
  const cancel = document.getElementById("cancel");
  addNewTask.addEventListener("click", () => {
    const title = document.getElementById("title").value;
    const desc = document.getElementById("desc").value;
    if (!title) {
      alert("Cannot add empty title!");
      input.innerHTML = "";
      return;
    }
    if (!desc) {
      if (confirm("Add new task without adding description")) {
        let newTask = {
          taskTitle: title,
          taskDesc: "-"
        };
        tasks.push(newTask);
        localStorage.setItem("tasks", JSON.stringify(tasks));
        update();
        input.innerHTML = "";
        return;
      }
      input.innerHTML = ``;
      return;
    }
    let newTask = {
      taskTitle: title,
      taskDesc: desc
    };
    tasks.push(newTask);
    localStorage.setItem("tasks", JSON.stringify(tasks));
    update();
    input.innerHTML = "";
  });
  cancel.addEventListener("click", () => {
    input.innerHTML = "";
  });
});

deleteAll.addEventListener("click", () => {
  if (tasks.length == 0) {
    alert("No tasks exist!");
    return;
  }
  if (confirm("Are you sure to delete all tasks?")) {
    localStorage.clear();
    tasks = [];
  }
  update();
});

function deleteTask(index) {
  tasks.splice(index, 1);
  localStorage.setItem("tasks", JSON.stringify(tasks));
  update();
}
