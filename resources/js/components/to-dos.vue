<template>
    <div class="container">
      <div class="row todo">
        <div class="col"></div>
        <div class="col todo-notepad">
          <h1>{{ title }}</h1>
          <h2 class="center">{{status}}</h2>
          <input type="text" id="input" v-model="newTask" placeholder="what needs to be done?" @keyup.enter="addTask" size="35">
          <br>
          <br>

          <ul>
            <li v-for="todo in todos" :key="todo.id">
              <input class='toggle' type='checkbox' @change='updateStatus(todo.id)' id='"checkbox-" + todo.id'
                :value='todo.id' v-model='todo.isComplete'>
              <label for='"checkbox-" + todo.id'>{{ todo.task }}</label>
            </li>
          </ul>

        </div>
        <div class="col"></div>
      </div>

      <br>

      <div class="row">
        <div class="col"></div>
        <div class="col">
          <h4>Items left to do: {{tasksLeft}} </h4>
        </div>
        <div class="col"></div>
      </div>

      <br>

      <div class="row">
        <div class="col"></div>
        <div class="col-sm-1">
          <p>View: </p>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterAll()">All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterCompleted()">Completed</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterRemaining()">To Do</button>
        </div>
        <div class="col"></div>
      </div>
      
      <br>

      <div class="row">
        <div class="col"></div>
        <div class="col-sm-1">
          <p>Actions: </p>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="uncheckAll()">Uncheck All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="checkAll()">Complete All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="clearCompleted()">Remove Completed</button>
        </div>
        <div class="col"></div>
      </div>
    </div>
</template>

<script>
export default {
  name: "to-dos",
  data() {
    return {
        title: "To Do",
        todos: [],
        newTask: '',
        status: 'All',
        tasksLeft: 0
    };
  },
    methods: {
      addTask() {
        axios.post('/new', {body: this.newTask}).then(resp=>{
          this.filterAll();
        })
        this.newTask = '';
    },
      updateStatus(id) {
        axios.post('/update', {id: id}).then(resp=>{
          this.filterAll();
        })
    },
      uncheckAll(id) {
        for (var i = 0; i < this.todos.length; i++) {
          if (this.todos[i].isComplete == true) {

            this.todos[i].isComplete = false;

            axios.post("/update", { id: this.todos[i].id } ).then(resp => {  this.filterAll(); });
          }
        }
      },
      checkAll(id) {
        for(var i = 0; i < this.todos.length; i++){
          if (this.todos[i].isComplete == false) {

            this.todos[i].isComplete = true;

            axios.post("/update", { id: this.todos[i].id } ).then(resp => {  this.filterAll(); });
          }
      }
    },
    clearCompleted() {
      for(var i = 0; i < this.todos.length; i++){
        if(this.todos[i].isComplete == true) {
          axios.post("/clear", { id: this.todos[i].id } ).then(resp => {  this.filterAll(); });
        }
      }
    },
      filterAll(){
        axios.get('/all').then(resp => {
        this.todos = resp.data;
        //url: /all to see all
        this.status = 'All';
        })
      },
      filterCompleted(){
        axios.get('/completed').then(resp => {
        this.todos = resp.data;
        //url: /completed to see completed
        this.status = 'Completed';
        })
      },
      filterRemaining(){
        axios.get('/remaining').then(resp => {
        this.todos = resp.data;
        //url: /remaining to see remaining
        this.status = 'Remaining';
        })
      }
  },
    mounted() {
      axios.get('/all').then(resp => {
        this.todos = resp.data;
      })
      //Count & display remaining tasks To Do on load
      axios.get('/remaining').then(resp => {
        this.tasksLeft = resp.data.length;
      })
    }
}
</script>