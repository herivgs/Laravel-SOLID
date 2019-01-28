<template>
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Dashboard</div>

              <div class="card-body">
                  <form class="" action="" @submit.prevent="newTask">
                    <div class="form-group">
                      <label for="task">Describe la nueva tarea:</label>
                      <input v-model="description" type="text"class="form-control" :class="{'is-invalid': error.description}" name="task" value="">
                      <div v-show="error.description" class="invalid-feedback">{{error.description}}</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Tarea</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</template>
<script>
    export default {
    data(){
      return{
        description: '',
        error: {
            description: ''
        },
      }
    },
    methods: {
        newTask() {
            const params = { description: this.description };
            console.log(params);

            axios.post('/api/task', params)
                .then(response => {
                    console.log("RESPONSEO");
                    const task = response.data;
                    this.$emit('new',task)
                    this.description = '';
                    this.error.description = '';
                })
                .catch(e => {
                    console.log(e);
                    if (e.response.data.description) {
                        this.error.description = e.response.data.description.join(', ');
                    }
                });
        }
    }
  }
</script>
