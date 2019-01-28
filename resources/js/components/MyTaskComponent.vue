<template>
  <div class="">
    <form-component @new="addTask"> </form-component>
    <task-component
      v-for="(task, index) in tasks" :task="task"
      :key="task.id"
      @delete="deleteTask(index)"
      @update="updateTask(index, ...arguments)">
    </task-component>
  </div>
</template>
<script>
import FormComponent from './FormComponent.vue';
import TaskComponent from './TaskComponent.vue';

export default {
    data(){
      return{
        tasks: [],
      }
    },
    mounted(){
        axios.get('/api/task')
            .then(({data}) => {
                console.log("Done ===================")
                this.tasks = data
            })
            .catch(e => {
                console.log(e)
                // return e
            } );
    },
    methods: {
      addTask(newTask) {
        this.tasks.push(newTask);
      },
      deleteTask(index) {
        this.tasks.splice(index, 1);
      },
      updateTask(index, task) {
        this.tasks[index] = task;
      }
  },
  components: {
      FormComponent,
      TaskComponent
  }
}
</script>
